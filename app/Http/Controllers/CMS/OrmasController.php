<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrmasRequest;
use App\Repositories\OrmasRepositories;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

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

    public function search(Request $request)
    {
        $keyword = $request->get('keyword');
        $results = $this->ormasRepo->searchByNameOrAbbreviation($keyword);

        if ($results->isEmpty()) {
            return response()->json([
                'message' => 'Data tidak ditemukan',
            ], 404);
        }

        return response()->json([
            'message' => 'Data ditemukan',
            'data' => $results,
        ], 200);
    }

    public function getByName(Request $request)
    {
        $namaOrmas = $request->get('nama_ormas');
        $ormas = $this->ormasRepo->findByName($namaOrmas);

        if ($ormas) {
            return response()->json([
                'success' => true,
                'data' => $ormas,
            ], 200);
        }

        return response()->json([
            'success' => false,
            'message' => 'Data tidak ditemukan',
        ], 404);
    }
    public function exportData(Request $request)
    {
        return $this->ormasRepo->exportData($request);
    }
}
