<?php

namespace App\Services;

use App\Repositories\NotificationTemplateRepositoryInterface;

class NotificationTemplateService
{
    protected $notificationTemplateRepo;

    public function __construct(NotificationTemplateRepositoryInterface $notificationTemplateRepo)
    {
        $this->notificationTemplateRepo = $notificationTemplateRepo;
    }

    public function getAll()
    {
        return $this->notificationTemplateRepo->getAll();
    }

    public function find($id)
    {
        return $this->notificationTemplateRepo->find($id);
    }

    public function create(array $data)
    {
        return $this->notificationTemplateRepo->create($data);
    }

    public function update($id, array $data)
    {
        return $this->notificationTemplateRepo->update($id, $data);
    }

    public function delete($id)
    {
        return $this->notificationTemplateRepo->delete($id);
    }
}
