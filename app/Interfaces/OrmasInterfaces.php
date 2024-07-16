<?php

namespace App\Interfaces;

use App\Http\Requests\OrmasRequest;
use Illuminate\Database\Eloquent\Collection;

interface OrmasInterfaces
{
    public function getAllData();
    public function createData(OrmasRequest $request);
    public function getDataById($id);
    public function updateDataById(OrmasRequest $request, $id);
    public function deleteData($id);
    // public function searchByNameOrAbbreviation($keyword);
    public function findByName($namaOrmas); // Tambahkan metode ini

}
