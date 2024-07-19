@extends('Layouts.UserTemplete')
@section('content')
 <div class="py-4">
    <div class="py-4 d-flex flex-row align-items-center justify-content-center">
        <h3 class="m-0 font-weight-bold">DATABASE ORMAS</h3>
    </div>
    <div id="table-container" class="tabel-data-ormas  ">
        <table id="loadData" class="table  table-bordered table-striped">
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
                    let tableBody = "";
                    $.each(response.data, function(index, item) {
                        tableBody += "<tr>";
                        tableBody += "<td>" + (index + 1) + "</td>";
                        tableBody += "<td>" + mapBidangOrmas(item.bidang_ormas) + "</td>";
                        tableBody += "<td class='text-center'><strong class='fw-bold fs-10'>" + item.singkatan_ormas + "</strong><br>" + item.nama_ormas + "</td>";
                        tableBody += "<td>" + mapHukumOrmas(item.legalitas_ormas) + "</td>";
                        tableBody += "<td>";
                        tableBody += "<ul>";
                        tableBody += "<li>" + item.nama_ketua + " (Ketua)</li>";
                        tableBody += "<li>" + item.nama_bendahara + " (Bendahara)</li>";
                        tableBody += "<li>" + item.nama_sekretaris + " (Sekretaris)</li>";
                        tableBody += "</ul>";
                        tableBody += "</td>";
                        tableBody += "<td>" + item.alamat_kesekretariatan + "</td>";
                        tableBody += "<td>" + item.npwp + "</td>";
                        tableBody += "<td>" + item.masa_berlaku_ormas + "</td>";
                        tableBody += "<td>" + item.tanggal_berdiri + "</td>";
                        tableBody += "</tr>";
                    });
                    $("#loadData tbody").html(tableBody);

                    $("#loadData").DataTable({
                        "responsive": true,
                        "lengthChange": true,
                        "lengthMenu": [10, 20, 30, 40, 50],
                        "autoWidth": false,
                        "language": {
                            "lengthMenu": "_MENU_",
                            "zeroRecords": "<i class='fas fa-sad-tear pr-2'></i>Tidak ada data yang ditemukan",
                            "info": "Menampilkan halaman _PAGE_ dari _PAGES_",
                            "infoEmpty": "Tidak ada data tersedia",
                            "infoFiltered": "(difilter dari _MAX_ total data)",
                            "paginate": {
                                "first": "Pertama",
                                "last": "Terakhir",
                                "next": "Selanjutnya",
                                "previous": "Sebelumnya"
                            }
                        }
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
    });
</script>
@endsection
