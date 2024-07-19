<!DOCTYPE html>
<html>
<head>
    <title>Data Ormas</title>
    <style>
        body {
            font-size: 12px;
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
                <th>Tanggal Berdiri</th>
                <th>Masa Berlaku</th>
            </tr>
        </thead>
        <tbody>
            @php
                function mapBidangOrmas($value) {
                    $bidangMapping = [
                        'sosial kemanusiaan' => 'Bidang Sosial Kemanusiaan',
                        'sosial kemasyarakatan' => 'Bidang Sosial Kemasyarakatan',
                        'agama' => 'Bidang Agama',
                        'pendidikan' => 'Bidang Pendidikan',
                        'ekonomi' => 'Bidang Ekonomi',
                        'budaya' => 'Bidang Budaya',
                        'hukum dan politik' => 'Bidang Hukum dan Politik',
                        'aliran keagamaan' => 'Bidang Aliran Kepercayaan',
                        'nasional' => 'Bidang Nasionalis, Sosial Kemasyarakatan',
                        'lingkungan' => 'Bidang Lingkungan',
                        'perdagangan' => 'Bidang Perdagangan',
                        'hukum' => 'Bidang Hukum',
                        'kesehatan' => 'Bidang Kesehatan',
                        'seni' => 'Bidang Seni',
                        'demokrasi dan kebangsaan' => 'Bidang Demokrasi dan Kebangsaan',
                        'olahraga' => 'Bidang Olahraga',
                        'sosial keagamaan' => 'Bidang Sosial Keagamaan'
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
                <td>{{ $item->tanggal_berdiri }}</td>
                <td>{{ $item->masa_berlaku_ormas }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
