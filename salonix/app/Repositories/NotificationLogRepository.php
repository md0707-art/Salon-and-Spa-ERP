<?php

namespace App\Repositories;

use App\Models\NotificationLog;

class NotificationLogRepository implements NotificationLogRepositoryInterface
{
    public function log(array $data)
    {
        return NotificationLog::create($data);
    }

    public function getAll()
    {
        return NotificationLog::all();
    }

    public function getByUser($userId)
    {
        return NotificationLog::where('user_id', $userId)->get();
    }

    public function getFailed()
    {
        return NotificationLog::where('status', 'failed')->get();
    }

    public function find($id)
    {
        return NotificationLog::with('user')->findOrFail($id);
    }
}
