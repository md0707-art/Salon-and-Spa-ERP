<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreAppointmentRequest;
use App\Http\Requests\UpdateAppointmentRequest;
use App\Services\AppointmentService;
use App\Repositories\ServiceRepositoryInterface;
use App\Repositories\StaffRepositoryInterface;
use App\Models\User;
use App\Models\Appointment;


class AppointmentController extends Controller
{
    protected $appointmentService;
    protected $serviceRepository;
    protected $staffRepository;

    public function __construct(
        AppointmentService $appointmentService,
        ServiceRepositoryInterface $serviceRepository,
        StaffRepositoryInterface $staffRepository
    ) {
        $this->appointmentService = $appointmentService;
        $this->serviceRepository = $serviceRepository;
        $this->staffRepository = $staffRepository;
    }

    public function index()
    {
        $appointments = $this->appointmentService->getAll();
        return view('appointments.index', compact('appointments'));
    }

    public function create()
    {
        $services = $this->serviceRepository->all();
        $staff = $this->staffRepository->all();
        $customers = User::all();
        return view('appointments.create', compact('services', 'staff','customers'));
    }

 public function store(StoreAppointmentRequest $request)
{
    $data = $request->validated();

    // If it's a new customer
    if (empty($data['customer_id'])) {
        $customer = User::create([
            'name' => $data['customer_name'],
            'email' => $data['customer_email'],
            'phone' => $data['customer_phone'],
            'password' => bcrypt('password'), // default password, or make nullable
        ]);

        $data['customer_id'] = $customer->id;
    }

    // Remove non-appointment fields
    unset($data['customer_name'], $data['customer_email'], $data['customer_phone']);

    // Create the appointment
    Appointment::create($data);

    return redirect()->route('appointments.index')->with('success', 'Appointment booked successfully.');
}

     public function show($id)
{
    $appointment = $this->appointmentService->find($id);

    return view('appointments.show', compact('appointment'));
}

    public function edit($id)
    {
        $appointment = $this->appointmentService->find($id);
        $services = $this->serviceRepository->all();
        $staff = $this->staffRepository->all();
        $customers = User::all();
        return view('appointments.edit', compact('appointment', 'services', 'staff','customers'));
    }

    public function update(UpdateAppointmentRequest $request, $id)
{
    $this->appointmentService->update($id, $request->validated());
    return redirect()->route('appointments.index')->with('success', 'Appointment updated successfully!');
}


    public function destroy($id)
    {
        $this->appointmentService->delete($id);
        return redirect()->route('appointments.index')->with('success', 'Appointment deleted.');
    }

public function publicCreate()
{
    $services = $this->serviceRepository->all();
    $staff = $this->staffRepository->all();

    return view('appointments.public_create', compact('services', 'staff'));
}

public function publicStore(Request $request)
{
    $data = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'nullable|email',
        'phone' => 'nullable|string|max:20',
        'service_id' => 'required|exists:services,id',
        'staff_id' => 'required|exists:staff,id',
        'appointment_date' => 'required|date',
        'appointment_time' => 'required',
    ]);

    // Create or find customer
    $customer = User::firstOrCreate(
        ['email' => $data['email']],
        ['name' => $data['name'], 'phone' => $data['phone'], 'password' => bcrypt('password')] // optional
    );

    // Save appointment
    $appointment = Appointment::create([
        'customer_id' => $customer->id,
        'service_id' => $data['service_id'],
        'staff_id' => $data['staff_id'],
        'appointment_date' => $data['appointment_date'],
        'appointment_time' => $data['appointment_time'],
        'status' => 'pending',
        'channel' => 'online', // optional
    ]);

    return redirect()->route('appointments.public.create')->with('success', 'Your appointment has been booked!');
}


}
