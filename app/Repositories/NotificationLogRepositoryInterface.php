<?php

namespace App\Repositories;

interface NotificationLogRepositoryInterface
{
    public function log(array $data);
    public function getAll();
    public function getByUser($userId);
    public function getFailed();
    public function find($id);
}