<?php

namespace App\Repositories;

use App\Models\ReportTemplate;
use App\Repositories\Interfaces\ReportTemplateRepositoryInterface;

class ReportTemplateRepository implements ReportTemplateRepositoryInterface
{
    public function all()
    {
        return ReportTemplate::all();
    }

    public function find($id)
    {
        return ReportTemplate::findOrFail($id);
    }

    public function create(array $data)
    {
        return ReportTemplate::create($data);
    }

    public function update($id, array $data)
    {
        $template = ReportTemplate::findOrFail($id);
        $template->update($data);
        return $template;
    }

    public function delete($id)
    {
        return ReportTemplate::destroy($id);
    }
}
