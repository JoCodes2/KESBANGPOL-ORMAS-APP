<?php

namespace App\Repositories;

use App\Http\Requests\ProdukHukumRequest;
use App\Interfaces\ProdukHukumInterfaces;
use App\Models\ProdukHukumModel;
use App\Traits\HttpResponseTraits;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class ProdukHukumRepositories implements ProdukHukumInterfaces
{
    use HttpResponseTraits;
    protected $ProdukHukumModel;

    public function __construct(ProdukHukumModel $ProdukHukumModel)
    {
        $this->ProdukHukumModel = $ProdukHukumModel;
    }

    public function getAllData()
    {
        $data = $this->ProdukHukumModel::all();
        if ($data->isEmpty()) {
            return $this->dataNotFound();
        } else {
            return $this->success($data);
        }
    }

    public function createData(ProdukHukumRequest $request)
    {
        try {
            $data = new $this->ProdukHukumModel;

            $data->nama_produk_hukum = $request->input('nama_produk_hukum');

            if ($request->hasFile('file_produk_hukum')) {
                $file = $request->file('file_produk_hukum');
                $extension = $file->getClientOriginalExtension();
                $filename = 'FILE-PRODUK-HUKUM-' . Str::random(15) . '.' . $extension;
                Storage::makeDirectory('uploads/file-produk-hukum');
                $file->move(public_path('uploads/file-produk-hukum'), $filename);
                $data->file_produk_hukum = $filename;
            }

            $data->save();
            return $this->success($data);
        } catch (\Throwable $th) {
            return $this->error($th->getMessage(), 400, $th, class_basename($this), __FUNCTION__);
        }
    }

    public function getDataById($id)
    {
        $data = $this->ProdukHukumModel::where('id', $id)->first();
        if ($data) {
            return $this->success($data);
        } else {
            return $this->dataNotFound();
        }
    }

    public function updateDataById(ProdukHukumRequest $request, $id)
    {
        try {
            $data = $this->ProdukHukumModel::where('id', $id)->first();
            if (!$data) {
                return $this->dataNotFound();
            }

            $data->nama_produk_hukum = $request->input('nama_produk_hukum');

            if ($request->hasFile('file_produk_hukum')) {
                $file = $request->file('file_produk_hukum');
                $extension = $file->getClientOriginalExtension();
                $filename = 'FILE-PRODUK-HUKUM-' . Str::random(15) . '.' . $extension;

                // Create directory if it doesn't exist
                Storage::makeDirectory('uploads/file-produk-hukum');

                // Move the new file to the public/uploads/file-produk-hukum directory
                $file->move(public_path('uploads/file-produk-hukum'), $filename);

                // Remove the old file if it exists
                $oldFilePath = public_path('uploads/file-produk-hukum/' . $data->file_produk_hukum);
                if (file_exists($oldFilePath)) {
                    unlink($oldFilePath);
                }

                // Update the file_produk_hukum field in the model
                $data->file_produk_hukum = $filename;
            }

            // Update other fields in the model
            $data->update();

            return $this->success($data);
        } catch (\Throwable $th) {
            return $this->error($th->getMessage(), 400, $th, class_basename($this), __FUNCTION__);
        }
    }

    public function deleteData($id)
    {
        $data = $this->ProdukHukumModel::where('id', $id)->first();
        if (!$data) {
            return $this->idOrDataNotFound();
        } else {
            $locationSP = 'uploads/file-produk-hukum/' . $data->file_produk_hukum;
            $data->delete();
            if (File::exists($locationSP)) {
                File::delete($locationSP);
            }
        }

        return $this->delete();
    }
}
