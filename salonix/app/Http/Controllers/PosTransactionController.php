<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PosTransactionService;
use App\Models\Appointment;
use App\Models\User;
use Illuminate\Support\Str;

class PosTransactionController extends Controller
{
    protected $posTransactionService;

    public function __construct(PosTransactionService $posTransactionService)
    {
        $this->posTransactionService = $posTransactionService;
    }

    /**
     * Display a listing of transactions.
     */
    public function index()
    {
        $transactions = $this->posTransactionService->getAll();
        $appointments = Appointment::where('status', 'confirmed')->get();

        return view('pos.index', compact('transactions', 'appointments'));
    }

    /**
     * Show the form for creating a new transaction.
     */
    public function create($appointmentId)
    {
        $appointment = Appointment::findOrFail($appointmentId);
        $customer = User::find($appointment->customer_id);

        return view('pos.create', compact('appointment', 'customer'));
    }

    /**
     * Store a newly created transaction in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'appointment_id' => 'required|exists:appointments,id',
            'customer_id' => 'required|exists:users,id',
            'total_amount' => 'required|numeric|min:0',
            'discount' => 'nullable|numeric|min:0',
            'loyalty_points_used' => 'nullable|integer|min:0',
            'final_amount' => 'required|numeric|min:0',
            'payment_method' => 'required|in:cash,card,wallet,e-pay',
            'payment_status' => 'required|in:pending,paid,refunded',
        ]);

        $validated['invoice_number'] = 'INV-' . strtoupper(Str::random(6));
        $validated['transaction_date'] = now();

        $this->posTransactionService->create($validated);

        return redirect()->route('pos.index')->with('success', 'Transaction recorded successfully.');
    }

    /**
     * Update an existing transaction in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'appointment_id' => 'required|exists:appointments,id',
            'customer_id' => 'required|exists:users,id',
            'total_amount' => 'required|numeric|min:0',
            'discount' => 'nullable|numeric|min:0',
            'loyalty_points_used' => 'nullable|integer|min:0',
            'final_amount' => 'required|numeric|min:0',
            'payment_method' => 'required|in:cash,card,wallet,e-pay',
            'payment_status' => 'required|in:pending,paid,refunded',
            'transaction_date' => 'nullable|date',
        ]);

        $this->posTransactionService->update($id, $validated);

        return redirect()->route('pos.index')->with('success', 'Transaction updated successfully.');
    }

    /**
     * Show the form for editing a transaction.
     */
    public function edit($id)
    {
        $transaction = $this->posTransactionService->find($id);
        return view('pos.edit', compact('transaction'));
    }

    /**
     * Display a specific transaction.
     */
    public function show($id)
    {
        $transaction = $this->posTransactionService->find($id);
        return view('pos.show', compact('transaction'));
    }

    /**
     * Generate a printable/downloadable invoice.
     */
    public function downloadInvoice($invoiceNumber)
    {
        $transaction = $this->posTransactionService->findByInvoiceNumber($invoiceNumber);

        $pdf = \PDF::loadView('pos.invoice', compact('transaction'));
        return $pdf->download("Invoice-{$invoiceNumber}.pdf");
    }

    /**
 * Remove the specified transaction from storage.
 */
     public function destroy($id)
     {
         $this->posTransactionService->delete($id);
         return redirect()->route('pos.index')->with('success', 'Transaction deleted successfully.');
     }
     
}
