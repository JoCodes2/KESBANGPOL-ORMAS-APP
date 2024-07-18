@extends('Layouts.UserTemplete')
@section('content')
 <div class="">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-center">
        <h3 class="m-0 font-weight-bold "><i class="fa-solid fa-book pr-2"></i>Database Ormas</h3>
    </div>
    <!-- /.card-header -->
    <div class="">
        <table id="loadData" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Bidang</th>
                    <th>Singkatan/Nama Ormas</th>
                    <th>No. Badan Hukum</th>
                    <th>Nama (KBS)</th>
                    <th>Alamat Kesekretariatan</th>
                    <th>NPWP</th>
                    <th>Masa Berlaku Kepengurusan</th>
                    <th>Tahun Berdiri</th>
                    <th>No Telepon Ormas</th>
                </tr>
            </thead>

            <tbody id="tbody">

            </tbody>
        </table>
    </div>
 </div>
@endsection
@section('scripts')
<script>
    $(document).ready(function(){
        function mapBidangOrmas(value) {
            const bidangMapping = {
                'sosial kemanusiaan': 'Bidang Sosial Kemanusiaan',
                'sosial kemasyarakatan': 'Bidang Sosial Kemasyarakatan',
                'agama': 'Bidang Agama',
                'pendidikan': 'Bidang Pendidikan',
                'ekonomi': 'Bidang Ekonomi',
                'budaya': 'Bidang Budaya',
                'hukum dan politik': 'Bidang Hukum dan Politik',
                'aliran keagamaan': 'Bidang Aliran Kepercayaan',
                'nasional': 'Bidang Nasionalis, Sosial Kemasyarakatan',
                'lingkungan': 'Bidang Lingkungan',
                'perdagangan': 'Bidang Perdagangan',
                'hukum': 'Bidang Hukum',
                'kesehatan': 'Bidang Kesehatan',
                'seni': 'Bidang Seni',
                'demokrasi dan kebangsaan': 'Bidang Demokrasi dan Kebangsaan',
                'olahraga': 'Bidang Olahraga',
                'sosial keagamaan': 'Bidang Sosial Keagamaan'
            };

            return bidangMapping[value] || value;
        }

        function mapHukumOrmas(value) {
            const bidangMapping = {
                'berbadan hukum': 'Berbadan Hukum',
                'tidak berbadan hukum': 'Tidak berbadan Hukum',
            };

            return bidangMapping[value] || value;
        }

        function getData() {
            $.ajax({
                url: `/v1/ormas`,
                method: "GET",
                dataType: "json",
                success: function(response) {
                    console.log(response);
                    let tableBody = "";
                    $.each(response.data, function(index, item) {
                        tableBody += "<tr>";
                        tableBody += "<td>" + (index + 1) + "</td>";
                        tableBody += "<td class ='text-center'><strong class ='fw-bold fs-10'>" + item.singkatan_ormas + "</strong><br>" + item.nama_ormas + "</td>";
                        tableBody += "<td>" + mapBidangOrmas(item.bidang_ormas) + "</td>";
                        tableBody += "<td>" + mapHukumOrmas(item.legalitas_ormas) + "</td>";
                        tableBody += "<td>" + item.alamat_kesekretariatan + "</td>";
                        tableBody += "<td class ='text-center'><strong class ='fw-bold fs-10'>" + item.nama_ketua  + "</strong><br>" + item.no_hp_ketua + "</td>";
                        tableBody += "<td class ='text-center'><strong class ='fw-bold fs-10'>" + item.nama_sekretaris  + "</strong><br>" + item.no_hp_sekretaris + "</td>";
                        tableBody += "<td class ='text-center'><strong class ='fw-bold fs-10'>" + item.nama_bendahara  + "</strong><br>" + item.no_hp_bendahara + "</td>";

                        tableBody += "<td>";
                            tableBody += "<button type='button' class='btn btn-outline-success detail-ormas' data-id='" + item.id + "'><i class='fa-solid fa-eye'></i></button>";
                            tableBody += "<button type='button' class='btn btn-outline-primary edit-ormas' data-id='" + item.id + "'><i class='fa-solid fa-pen-to-square'></i></button>";
                            tableBody += "<button type='button' class='btn btn-outline-danger delete-confirm' data-id='" + item.id + "'><i class='fa fa-trash'></i></button>";
                        tableBody += "</td>";
                        tableBody += "</tr>";
                    });

                    $("#loadData tbody").html(tableBody);

                    $("#loadData").DataTable({
                        "responsive": true,
                        "lengthChange": true,
                        "lengthMenu": [10, 20, 30, 40, 50],
                        "autoWidth": false,
                    });


                },
                error: function() {
                    console.log("Gagal mengambil data dari server");
                }
            });
        }

        getData();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

    })
</script>
@endsection
