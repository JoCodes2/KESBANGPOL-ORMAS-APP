<?php

namespace App\Interfaces;

use App\Http\Requests\FlowReportRequest;

interface FlowReportInterfaces
{
    public function getAllData();
    public function createData(FlowReportRequest $request);
    public function getDataById($id);
    public function updateDataById(FlowReportRequest $request, $id);
    public function deleteData($id);
}
