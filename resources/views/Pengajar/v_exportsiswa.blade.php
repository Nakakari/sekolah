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
                    <th>NIS</th>
                    <th>name</th>
                    <th>kelas</th>
                    <th>password</th>
                    <th>email</th>
                    <th>mapel</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($siswa as $all)
                    <tr>
                        <td>{{ $all->nis }}</td>
                        <td>{{ $all->name }}</td>
                        <td>{{ $all->kelas }}</td>
                        <td>{{ $all->password }}</td>
                        <td>{{ $all->email }}</td>
                        <td>{{ $all->mapel }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
