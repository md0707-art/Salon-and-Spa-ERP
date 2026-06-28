<?php

namespace App\Services;

use App\Repositories\Interfaces\AppointmentRepositoryInterface;

class AppointmentService
{
    protected $appointmentRepository;

    public function __construct(AppointmentRepositoryInterface $appointmentRepository)
    {
        $this->appointmentRepository = $appointmentRepository;
    }

    public function create(array $data)
    {
        return $this->appointmentRepository->create($data);
    }

    public function update($id, array $data)
    {
        return $this->appointmentRepository->update($id, $data);
    }

    public function delete($id)
    {
        return $this->appointmentRepository->delete($id);
    }

    public function getAll()
    {
        return $this->appointmentRepository->all();
    }
    public function find($id)
{
    return $this->appointmentRepository->find($id);
}

}
