<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Repositories\DocumentOrmasRepositories;
use Illuminate\Http\Request;

class DocumentOrmasController extends Controller
{
    protected $documentOrmasRepo;
    public function __construct(DocumentOrmasRepositories $documentOrmasRepo)
    {
        $this->documentOrmasRepo = $documentOrmasRepo;
    }
    public function getAllData()
    {
        return $this->documentOrmasRepo->getAllData();
    }
    public function deleteData($id)
    {
        return $this->documentOrmasRepo->deleteData($id);
    }
}
