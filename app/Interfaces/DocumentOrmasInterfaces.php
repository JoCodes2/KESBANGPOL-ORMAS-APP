<?php

namespace App\Interfaces;

use App\Http\Requests\OrmasRequest;

interface DocumentOrmasInterfaces
{
    public function getAllData();
    public function deleteData($id);
}
