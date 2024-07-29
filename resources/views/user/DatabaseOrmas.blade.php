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
                'Lingkungan Hidup': 'Bidang Lingkungan Hidup',
                'Energi atau Sumberdaya Alam': 'Bidang Energi atau Sumberdaya Alam',
                'Pendidikan': 'Bidang Pendidikan',
                'Ekonomi': 'Bidang Ekonomi',
                'Seni': 'Bidang Seni',
                'Sosial': 'Bidang Sosial',
                'Budaya': 'Bidang Budaya',
                'Hukum': 'Bidang Hukum',
                'Hobi, Minat, atau Bakat': 'Bidang Hobi, Minat, atau Bakat',
                'Perlindungan HAM': 'Bidang Perlindungan HAM',
                'Kemanusiaan': 'Bidang Kemanusiaan',
                'Kebudayaan dan/atau Adat Istiadat': 'Bidang Kebudayaan dan/atau Adat Istiadat',
                'Agama': 'Bidang Agama',
                'Kepercayaan Kepada Tuhan Yang Maha Esa': 'Bidang Kepercayaan Kepada Tuhan Yang Maha Esa',
                'Penelitian dan Pengembangan': 'Bidang Penelitian dan Pengembangan',
                'Penguatan Kapasitas': 'Bidang Penguatan Kapasitas',
                'Sumber Daya Manusia': 'Bidang Sumber Daya Manusia',
                'Ketenagakerjaan': 'Bidang Ketenagakerjaan',
                'Pertanian': 'Bidang Pertanian',
                'Peternakan': 'Bidang Peternakan',
                'Kelautan dan Perikanan': 'Bidang Kelautan dan Perikanan',
                'Kehutanan': 'Bidang Kehutanan',
                'Kesehatan': 'Bidang Kesehatan',
                'Kepemudaan dan Olahraga dan/atau Bela Diri': 'Bidang Kepemudaan dan Olahraga dan/atau Bela Diri',
                'Demokrasi dan/atau Politik': 'Bidang Demokrasi dan/atau Politik',
                'Pelayanan Masyarakat': 'Bidang Pelayanan Masyarakat',
                'Pemberdayaan Masyarakat': 'Bidang Pemberdayaan Masyarakat',
                'Industri dan Konstruksi': 'Bidang Industri dan Konstruksi',
                'Pariwisata': 'Bidang Pariwisata',
                'Kebencanaan': 'Bidang Kebencanaan',
                'Jurnalistik': 'Bidang Jurnalistik',
                'Ketertiban atau Keamanan': 'Bidang Ketertiban atau Keamanan',
                'Pertahanan dan Belanegara': 'Bidang Pertahanan dan Belanegara',
                'Pemerintahan': 'Bidang Pemerintahan',
                'Pekerjaan Umum dan Penataan Ruang': 'Bidang Pekerjaan Umum dan Penataan Ruang',
                'Perumahan Rakyat dan Kawasan Pemukiman': 'Bidang Perumahan Rakyat dan Kawasan Pemukiman',
                'Ketentetaman, Ketertiban Umum, dan Perlindungan Masyarakat': 'Bidang Ketentetaman, Ketertiban Umum, dan Perlindungan Masyarakat',
                'Pemberdayaan Perempuan dan Perlindungan Anak': 'Bidang Pemberdayaan Perempuan dan Perlindungan Anak',
                'Pangan': 'Bidang Pangan',
                'Pertanahan': 'Bidang Pertanahan',
                'Pemberdayaan Desa': 'Bidang Pemberdayaan Desa',
                'Perhubungan': 'Bidang Perhubungan',
                'Komunikasi dan Informatika': 'Bidang Komunikasi dan Informatika',
                'Penanaman Modal': 'Bidang Penanaman Modal',
                'Perdagangan': 'Bidang Perdagangan',
                'Transmigrasi': 'Bidang Transmigrasi',
                'Statistik': 'Bidang Statistik',
                'Kepustakaan': 'Bidang Kepustakaan',
                'Kearsipan': 'Bidang Kearsipan',
                'Koperasi, Usaha Kecil, dan Menengah': 'Bidang Koperasi, Usaha Kecil, dan Menengah',
                'Kependudukan': 'Bidang Kependudukan',
                'Lainnya': 'Bidang Lainnya'
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
                        tableBody += "<td>" + item.no_badan_hukum + "</td>";
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
