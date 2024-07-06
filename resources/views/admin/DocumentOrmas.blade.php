@extends('Layouts.master')

@section('content')

<div class="card">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h3 class="m-0 font-weight-bold "><i class="fa-solid fa-book pr-2"></i>Dokumen Persyaratan</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="loadData" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Surat Permohonan Pendaftaran</th>
                    <th>Akte Pendirian atau Status Orkesmas Yang Disahkan Notaris</th>
                    <th>Anggaran Dasar dan Anggaran Rumah Tangga</th>
                    <th>Tujuan dan Program Organisasi</th>
                    <th>Surat Keputusan Tentang Susunan Orkesmas</th>
                    <th>Biodata Pengurus Organisasi</th>
                    <th>Pas Foto Pengurus</th>
                    <th>Surat Keterangan Domisili Organisasi</th>
                    <th>Foto Copy Kartu Tanda Penduduk Pengurus Organisasi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody id="tbody">

            </tbody>
        </table>
    </div>


@endsection
@section('script')
    $(document).ready(function(){

    })
@endsection
