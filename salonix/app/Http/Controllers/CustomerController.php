<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Services\CustomerService;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    protected $customerService;

    public function __construct(CustomerService $customerService)
    {
        $this->customerService = $customerService;
    }

    public function index()
    {
        $customers = $this->customerService->all();
        return view('customers.index', compact('customers'));
    }

    public function create()
    {
        return view('customers.create');
    }

    public function store(StoreCustomerRequest $request)
    {
        $this->customerService->store($request->validated());
        return redirect()->route('customers.index')->with('success', 'Customer created successfully.');
    }

    public function show($id)
    {
        $customer = $this->customerService->find($id);
        return view('customers.show', compact('customer'));
    }

    public function edit($id)
    {
        $customer = $this->customerService->find($id);
        return view('customers.edit', compact('customer'));
    }

    public function update(UpdateCustomerRequest $request, $id)
       {
           $customer = $this->customerService->find($id);  // Get Customer model by ID
       
           $this->customerService->update($customer, $request->validated());
       
           return redirect()->route('customers.index')->with('success', 'Customer updated successfully.');
       }


    public function destroy($id)
      {
          $customer = $this->customerService->find($id); // Get the model
          $this->customerService->delete($customer);     // Pass the model, not the ID
      
          return redirect()->route('customers.index')->with('success', 'Customer deleted successfully.');
      }

}
