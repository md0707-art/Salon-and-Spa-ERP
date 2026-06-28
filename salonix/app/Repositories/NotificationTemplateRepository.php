<?php

namespace App\Repositories;

use App\Models\NotificationTemplate;

class NotificationTemplateRepository implements NotificationTemplateRepositoryInterface
{
    public function getAll()
    {
        return NotificationTemplate::all();
    }

    public function find($id)
    {
        return NotificationTemplate::findOrFail($id);
    }

    public function create(array $data)
    {
        return NotificationTemplate::create($data);
    }

    public function update($id, array $data)
    {
        $template = NotificationTemplate::findOrFail($id);
        $template->update($data);
        return $template;
    }

    public function delete($id)
    {
        return NotificationTemplate::destroy($id);
    }
}
