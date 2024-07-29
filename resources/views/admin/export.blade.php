<!DOCTYPE html>
<html>
<head>
    <title>Data Ormas</title>
    <style>
        body {
            font-size: 10px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 5px;
            text-align: center;
        }
        th {
            font-size: 11px;
        }
        h2 {
            text-align: center;
        }
    </style>
</head>
<body>
    <h2>Data Ormas</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Ormas</th>
                <th>Singkatan</th>
                <th>Bidang</th>
                <th>Legalitas</th>
                <th>Alamat Kesekretariatan</th>
                <th>Nama Ketua</th>
                <th>No HP Ketua</th>
                <th>Nama Sekretaris</th>
                <th>No HP Sekretaris</th>
                <th>Nama Bendahara</th>
                <th>No HP Bendahara</th>
                <th>NPWP</th>
                <th>No.Telepon Ormas</th>
                <th>No.Badan Hukum</th>
                <th>Tanggal Berdiri</th>
                <th>Masa Berlaku</th>
            </tr>
        </thead>
        <tbody>
            @php
                function mapBidangOrmas($value) {
                    $bidangMapping = [
                       'Lingkungan Hidup'=> 'Bidang Lingkungan Hidup',
                        'Energi atau Sumberdaya Alam'=> 'Bidang Energi atau Sumberdaya Alam',
                        'Pendidikan'=> 'Bidang Pendidikan',
                        'Ekonomi'=> 'Bidang Ekonomi',
                        'Seni'=> 'Bidang Seni',
                        'Sosial'=> 'Bidang Sosial',
                        'Budaya'=> 'Bidang Budaya',
                        'Hukum'=> 'Bidang Hukum',
                        'Hobi, Minat, atau Bakat'=> 'Bidang Hobi, Minat, atau Bakat',
                        'Perlindungan HAM'=> 'Bidang Perlindungan HAM',
                        'Kemanusiaan'=> 'Bidang Kemanusiaan',
                        'Kebudayaan dan/atau Adat Istiadat'=> 'Bidang Kebudayaan dan/atau Adat Istiadat',
                        'Agama'=> 'Bidang Agama',
                        'Kepercayaan Kepada Tuhan Yang Maha Esa'=> 'Bidang Kepercayaan Kepada Tuhan Yang Maha Esa',
                        'Penelitian dan Pengembangan'=> 'Bidang Penelitian dan Pengembangan',
                        'Penguatan Kapasitas'=> 'Bidang Penguatan Kapasitas',
                        'Sumber Daya Manusia'=> 'Bidang Sumber Daya Manusia',
                        'Ketenagakerjaan'=> 'Bidang Ketenagakerjaan',
                        'Pertanian'=> 'Bidang Pertanian',
                        'Peternakan'=> 'Bidang Peternakan',
                        'Kelautan dan Perikanan'=> 'Bidang Kelautan dan Perikanan',
                        'Kehutanan'=> 'Bidang Kehutanan',
                        'Kesehatan'=> 'Bidang Kesehatan',
                        'Kepemudaan dan Olahraga dan/atau Bela Diri'=> 'Bidang Kepemudaan dan Olahraga dan/atau Bela Diri',
                        'Demokrasi dan/atau Politik'=> 'Bidang Demokrasi dan/atau Politik',
                        'Pelayanan Masyarakat'=> 'Bidang Pelayanan Masyarakat',
                        'Pemberdayaan Masyarakat'=> 'Bidang Pemberdayaan Masyarakat',
                        'Industri dan Konstruksi'=> 'Bidang Industri dan Konstruksi',
                        'Pariwisata'=> 'Bidang Pariwisata',
                        'Kebencanaan'=> 'Bidang Kebencanaan',
                        'Jurnalistik'=> 'Bidang Jurnalistik',
                        'Ketertiban atau Keamanan'=> 'Bidang Ketertiban atau Keamanan',
                        'Pertahanan dan Belanegara'=> 'Bidang Pertahanan dan Belanegara',
                        'Pemerintahan'=> 'Bidang Pemerintahan',
                        'Pekerjaan Umum dan Penataan Ruang'=> 'Bidang Pekerjaan Umum dan Penataan Ruang',
                        'Perumahan Rakyat dan Kawasan Pemukiman'=> 'Bidang Perumahan Rakyat dan Kawasan Pemukiman',
                        'Ketentetaman, Ketertiban Umum, dan Perlindungan Masyarakat'=> 'Bidang Ketentetaman, Ketertiban Umum, dan Perlindungan Masyarakat',
                        'Pemberdayaan Perempuan dan Perlindungan Anak'=> 'Bidang Pemberdayaan Perempuan dan Perlindungan Anak',
                        'Pangan'=> 'Bidang Pangan',
                        'Pertanahan'=> 'Bidang Pertanahan',
                        'Pemberdayaan Desa'=> 'Bidang Pemberdayaan Desa',
                        'Perhubungan'=> 'Bidang Perhubungan',
                        'Komunikasi dan Informatika'=> 'Bidang Komunikasi dan Informatika',
                        'Penanaman Modal'=> 'Bidang Penanaman Modal',
                        'Perdagangan'=> 'Bidang Perdagangan',
                        'Transmigrasi'=> 'Bidang Transmigrasi',
                        'Statistik'=> 'Bidang Statistik',
                        'Kepustakaan'=> 'Bidang Kepustakaan',
                        'Kearsipan'=> 'Bidang Kearsipan',
                        'Koperasi, Usaha Kecil, dan Menengah'=> 'Bidang Koperasi, Usaha Kecil, dan Menengah',
                        'Kependudukan'=> 'Bidang Kependudukan',
                        'Lainnya'=> 'Bidang Lainnya',
                    ];

                    return $bidangMapping[$value] ?? $value;
                }

                function mapHukumOrmas($value) {
                    $bidangMapping = [
                        'berbadan hukum' => 'Berbadan Hukum',
                        'tidak berbadan hukum' => 'Tidak berbadan Hukum',
                    ];

                    return $bidangMapping[$value] ?? $value;
                }
            @endphp

            @foreach($ormas as $index => $item)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $item->nama_ormas }}</td>
                <td>{{ $item->singkatan_ormas }}</td>
                <td>{{ mapBidangOrmas($item->bidang_ormas) }}</td>
                <td>{{ mapHukumOrmas($item->legalitas_ormas) }}</td>
                <td>{{ $item->alamat_kesekretariatan }}</td>
                <td>{{ $item->nama_ketua }}</td>
                <td>{{ $item->no_hp_ketua }}</td>
                <td>{{ $item->nama_sekretaris }}</td>
                <td>{{ $item->no_hp_sekretaris }}</td>
                <td>{{ $item->nama_bendahara }}</td>
                <td>{{ $item->no_hp_bendahara }}</td>
                <td>{{ $item->npwp }}</td>
                <td>{{ $item->no_hp_ormas }}</td>
                <td>{{ $item->no_badan_hukum }}</td>
                <td>{{ $item->tanggal_berdiri }}</td>
                <td>{{ $item->masa_berlaku_ormas }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
