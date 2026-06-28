<?php
namespace App\Repositories;

use App\Models\Service;

class ServiceRepository implements ServiceRepositoryInterface
{
    public function all()
    {
        return Service::with('category')->latest()->get(); // optional eager loading
    }

    public function find($id)
    {
        return Service::findOrFail($id);
    }

    public function create(array $data)
    {
        return Service::create($data);
    }

    public function update($id, array $data)
    {
        $service = $this->find($id);
        $service->update($data);
        return $service;
    }

    public function delete($id)
    {
        $service = $this->find($id);
        return $service->delete();
    }
}
