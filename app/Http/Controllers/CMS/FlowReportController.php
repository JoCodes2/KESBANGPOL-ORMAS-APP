<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Repositories\FlowReportRepositories;
use Illuminate\Http\Request;
use App\Http\Requests\FlowReportRequest;

class FlowReportController extends Controller
{
    protected $flowReportRepo;
    public function __construct(FlowReportRepositories $flowReportRepo)
    {
        $this->flowReportRepo = $flowReportRepo;
    }
    public function getAllData()
    {
        return $this->flowReportRepo->getAllData();
    }
    public function createData(FlowReportRequest $request)
    {
        return $this->flowReportRepo->createData($request);
    }
    public function getDataById($id)
    {
        return $this->flowReportRepo->getDataById($id);
    }
    public function updateDataById(FlowReportRequest $request, $id)
    {
        return $this->flowReportRepo->updateDataById($request, $id);
    }
    public function deleteData($id)
    {
        return $this->flowReportRepo->deleteData($id);
    }
}
