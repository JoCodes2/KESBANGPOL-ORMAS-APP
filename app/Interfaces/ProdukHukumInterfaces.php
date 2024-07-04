<?php

namespace App\Interfaces;

use App\Http\Requests\ProdukHukumRequest;

interface ProdukHukumInterfaces
{
    public function getAllData();
    public function createData(ProdukHukumRequest $request);
    public function getDataById($id);
    public function updateDataById(ProdukHukumRequest $request, $id);
    public function deleteData($id);
}
