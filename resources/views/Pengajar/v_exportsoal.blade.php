<?php
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header("Content-Disposition: attachment;filename=\"Data Siswa.xls\"");
header('Cache-Control: max-age=0');
?>
<!DOCTYPE html>
<html>
<style type="text/css">
    body {
        font-family: sans-serif;
    }

    table {
        margin: 20px auto;
        border-collapse: collapse;
    }

    table th,
    table td {
        border: 1px solid #3c3c3c;
        padding: 3px 8px;

    }

    a {
        background: blue;
        color: #fff;
        padding: 8px 10px;
        text-decoration: none;
        border-radius: 2px;
    }
</style>

<head>
    <title>Export Data Ke Excel</title>
</head>

<body>
    <div>
        <table border="1">
            <thead>
                <tr>
                    <th>soal</th>
                    <th>opsi_satu</th>
                    <th>opsi_dua</th>
                    <th>opsi_tiga</th>
                    <th>opsi_empat</th>
                    <th>kunci</th>
                    <th>skor</th>
                    <th>pembahasan</th>
                    <th>kode_soal</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($soal as $all)
                    <tr>
                        <td>{{ $all->soal }}</td>
                        <td>{{ $all->opsi_satu }}</td>
                        <td>{{ $all->opsi_dua }}</td>
                        <td>{{ $all->opsi_tiga }}</td>
                        <td>{{ $all->opsi_empat }}</td>
                        <td>{{ $all->kunci }}</td>
                        <td>{{ $all->skor }}</td>
                        <td>{{ $all->pembahasan }}</td>
                        <td>{{ $all->kode_soal }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
