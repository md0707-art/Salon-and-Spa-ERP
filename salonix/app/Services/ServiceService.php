<?php

namespace App\Services;

use App\Repositories\ServiceRepositoryInterface;

class ServiceService
{
    protected $serviceRepository;

    public function __construct(ServiceRepositoryInterface $serviceRepository)
    {
        $this->serviceRepository = $serviceRepository;
    }

    public function getAll()
    {
        return $this->serviceRepository->all();
    }

    public function getById($id)
    {
        return $this->serviceRepository->find($id);
    }

    public function create(array $data)
    {
        return $this->serviceRepository->create($data);
    }

    public function find($id)
     {
         return $this->serviceRepository->find($id);
     }


    public function update($id, array $data)
    {
        return $this->serviceRepository->update($id, $data);
    }

    public function delete($id)
    {
        return $this->serviceRepository->delete($id);
    }
}
