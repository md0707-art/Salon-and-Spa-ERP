<?php

namespace App\Services;

use App\Repositories\Interfaces\ReportTemplateRepositoryInterface;

class ReportTemplateService
{
    protected $templateRepo;

    public function __construct(ReportTemplateRepositoryInterface $templateRepo)
    {
        $this->templateRepo = $templateRepo;
    }

    public function getAll()
    {
        return $this->templateRepo->all();
    }

    public function getById($id)
    {
        return $this->templateRepo->find($id);
    }

    public function create(array $data)
    {
        return $this->templateRepo->create($data);
    }

    public function update($id, array $data)
    {
        return $this->templateRepo->update($id, $data);
    }

    public function delete($id)
    {
        return $this->templateRepo->delete($id);
    }
}
