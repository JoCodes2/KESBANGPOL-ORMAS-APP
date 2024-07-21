<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Models\DocumentOrmasModel;
use App\Models\OrmasModel;
use App\Models\ProdukHukumModel;
use App\Models\ReportOrmasModel;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalProdukHukum = ProdukHukumModel::count();
        $totalReportOrmas = ReportOrmasModel::count();
        $totalOrmas = OrmasModel::count();
        $totalDocumentOrmas = DocumentOrmasModel::count();



        return response()->json([
            'total_ProdukHukum' => $totalProdukHukum,
            'total_ReportOrmas' => $totalReportOrmas,
            'total_Ormas' => $totalOrmas,
            'total_Document' => $totalDocumentOrmas
        ]);
    }
}
