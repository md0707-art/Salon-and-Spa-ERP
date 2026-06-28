<?php

namespace App\Repositories;

use App\Models\PosTransaction;

class PosTransactionRepository implements PosTransactionRepositoryInterface
{
    public function all()
    {
        return PosTransaction::latest()->get();
    }

    public function find($id)
    {
        return PosTransaction::findOrFail($id);
    }

    public function create(array $data)
    {
        return PosTransaction::create($data);
    }

    public function update($id, array $data)
    {
        $transaction = PosTransaction::findOrFail($id);
        $transaction->update($data);
        return $transaction;
    }

    public function delete($id)
    {
        $transaction = PosTransaction::findOrFail($id);
        return $transaction->delete();
    }

    public function findByInvoiceNumber(string $invoiceNumber)
    {
        return PosTransaction::where('invoice_number', $invoiceNumber)->first();
    }
}
