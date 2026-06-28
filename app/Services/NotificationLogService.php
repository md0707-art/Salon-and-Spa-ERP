<?php

namespace App\Services;

use App\Repositories\NotificationLogRepositoryInterface;

class NotificationLogService
{
    protected $notificationLogRepo;

    public function __construct(NotificationLogRepositoryInterface $notificationLogRepo)
    {
        $this->notificationLogRepo = $notificationLogRepo;
    }

    public function getAll()
    {
        return $this->notificationLogRepo->getAll();
    }

    public function find($id)
    {
        return $this->notificationLogRepo->find($id);
    }

    public function create(array $data)
    {
        return $this->notificationLogRepo->create($data);
    }

    public function delete($id)
    {
        return $this->notificationLogRepo->delete($id);
    }
}
