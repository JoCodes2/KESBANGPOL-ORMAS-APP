<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrmasRequest;
use App\Repositories\OrmasRepositories;
use Illuminate\Http\Request;

class OrmasController extends Controller
{
    protected $ormasRepo;
    public function __construct(OrmasRepositories $ormasRepo)
    {
        $this->ormasRepo = $ormasRepo;
    }
    public function getAllData()
    {
        return $this->ormasRepo->getAllData();
    }
    public function createData(OrmasRequest $request)
    {
        return $this->ormasRepo->createData($request);
    }
    public function getDataById($id)
    {
        return $this->ormasRepo->getDataById($id);
    }
    public function updateDataById(OrmasRequest $request, $id)
    {
        return $this->ormasRepo->updateDataById($request, $id);
    }
    public function deleteData($id)
    {
        return $this->ormasRepo->deleteData($id);
    }
}
