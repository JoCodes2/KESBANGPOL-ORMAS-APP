<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Repositories\ProdukHukumRepositories;
use Illuminate\Http\Request;
use App\Http\Requests\ProdukHukumRequest;


class ProdukHukumController extends Controller
{
    protected $ProdukHukumRepo;
    public function __construct(ProdukHukumRepositories $ProdukHukumRepo)
    {
        $this->ProdukHukumRepo = $ProdukHukumRepo;
    }
    public function getAllData()
    {
        return $this->ProdukHukumRepo->getAllData();
    }
    public function createData(ProdukHukumRequest $request)
    {
        return $this->ProdukHukumRepo->createData($request);
    }
    public function getDataById($id)
    {
        return $this->ProdukHukumRepo->getDataById($id);
    }
    public function updateDataById(ProdukHukumRequest $request, $id)
    {
        return $this->ProdukHukumRepo->updateDataById($request, $id);
    }
    public function deleteData($id)
    {
        return $this->ProdukHukumRepo->deleteData($id);
    }
}
