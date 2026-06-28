<?php

namespace App\Services;

use App\Repositories\PosTransactionRepositoryInterface;

class PosTransactionService
{
    protected $posTransactionRepository;

    public function __construct(PosTransactionRepositoryInterface $posTransactionRepository)
    {
        $this->posTransactionRepository = $posTransactionRepository;
    }

    public function getAll()
    {
        return $this->posTransactionRepository->all();
    }

    public function find($id)
    {
        return $this->posTransactionRepository->find($id);
    }

    public function findByInvoiceNumber(string $invoiceNumber)
    {
        return $this->posTransactionRepository->findByInvoiceNumber($invoiceNumber);
    }

    public function create(array $data)
    {
        return $this->posTransactionRepository->create($data);
    }

    public function update($id, array $data)
    {
        return $this->posTransactionRepository->update($id, $data);
    }

    public function delete($id)
    {
        return $this->posTransactionRepository->delete($id);
    }
}
