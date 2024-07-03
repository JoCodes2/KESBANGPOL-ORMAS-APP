<?php

namespace App\Repositories;

use App\Http\Requests\FlowReportRequest;
use App\Interfaces\FlowReportInterfaces;
use App\Models\ReportOrmasModel;
use App\Traits\HttpResponseTraits;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class FlowReportRepositories implements FlowReportInterfaces
{
    use HttpResponseTraits;
    protected $flowReportModel;
    public function __construct(ReportOrmasModel $flowReportModel)
    {
        $this->flowReportModel = $flowReportModel;
    }
    public function getAllData()
    {
        $data = $this->flowReportModel::all();
        if ($data->isEmpty()) {
            return $this->dataNotFound();
        } else {
            return $this->success($data);
        }
    }
    public function createData(FlowReportRequest $request)
    {
        try {
            $data = new $this->flowReportModel;
            if ($request->hasFile('file_alur_lapor')) {
                $file = $request->file('file_alur_lapor');
                $extension = $file->getClientOriginalExtension();
                $filename = 'FILE-ALUR-REPORT-' . Str::random(15) . '.' . $extension;
                Storage::makeDirectory('uploads/file-alur-report');
                $file->move(public_path('uploads/file-alur-report'), $filename);
                $data->file_alur_lapor = $filename;
            }
            $data->save();
            return $this->success($data);
        } catch (\Throwable $th) {
            return $this->error($th->getMessage(), 400, $th, class_basename($this), __FUNCTION__);
        }
    }
    public function getDataById($id)
    {
        $data = $this->flowReportModel::where('id', $id)->first();
        if ($data) {
            return $this->success($data);
        } else {
            return $this->dataNotFound();
        }
    }
    public function updateDataById(FlowReportRequest $request, $id)
    {
        try {
            $data = $this->flowReportModel::where('id', $id)->first();
            if (!$data) {
                return $this->dataNotFound();
            }

            if ($request->hasFile('file_alur_lapor')) {
                $file = $request->file('file_alur_lapor');
                $extension = $file->getClientOriginalExtension();
                $filename = 'FILE-ALUR-REPORT-' . Str::random(15) . '.' . $extension;

                // Create directory if it doesn't exist
                Storage::makeDirectory('uploads/file-alur-report');

                // Move the new file to the public/uploads/file-alur-report directory
                $file->move(public_path('uploads/file-alur-report'), $filename);

                // Remove the old file if it exists
                $oldFilePath = public_path('uploads/file-alur-report/' . $data->file_alur_lapor);
                if (file_exists($oldFilePath)) {
                    unlink($oldFilePath);
                }

                // Update the file_alur_lapor field in the model
                $data->file_alur_lapor = $filename;
            }

            // Update other fields in the model
            $data->update($request->except(['file_alur_lapor']));

            return $this->success($data);
        } catch (\Throwable $th) {
            return $this->error($th->getMessage(), 400, $th, class_basename($this), __FUNCTION__);
        }
    }
    public function deleteData($id)
    {
        $data = $this->flowReportModel::where('id', $id)->first();
        if (!$data) {
            return $this->idOrDataNotFound();
        } else {
            $locationSP = 'uploads/file-alur-report/' . $data->file_alur_lapor;
            $data->delete();
            if (File::exists($locationSP)) {
                File::delete($locationSP);
            }
        }

        return $this->delete();
    }
}
