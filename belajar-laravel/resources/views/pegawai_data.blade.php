<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pegawai</title>
    <style>
        body { font-family: sans-serif; padding: 20px; }
        h1 { border-bottom: 2px solid #ccc; padding-bottom: 10px; }
        ul { list-style-type: none; padding-left: 0; }
        li { margin-bottom: 5px; }
        .status { font-weight: bold; color: {{ $current_semester < 3 ? 'green' : 'red' }}; }
    </style>
</head>
<body>

    <h1>Detail Data Pegawai</h1>

    <table>
        <tr>
            <td><strong>Nama</strong></td>
            <td>:</td>
            <td>{{ $name }}</td>
        </tr>
        <tr>
            <td><strong>Umur (my_age)</strong></td>
            <td>:</td>
            <td>{{ $my_age }} tahun</td>
        </tr>
        <tr>
            <td><strong>Cita-cita (future_goal)</strong></td>
            <td>:</td>
            <td>{{ $future_goal }}</td>
        </tr>
        <tr>
            <td><strong>Semester Saat Ini</strong></td>
            <td>:</td>
            <td>{{ $current_semester }}</td>
        </tr>
        <tr>
            <td><strong>Tanggal Target Wisuda</strong></td>
            <td>:</td>
            <td>{{ $tgl_harus_wisuda }}</td>
        </tr>
        <tr>
            <td><strong>Waktu Tersisa (time_to_study_left)</strong></td>
            <td>:</td>
            <td>{{ $time_to_study_left }} hari</td>
        </tr>
    </table>

    <br>

    <h2>Status Studi:</h2>
    <p class="status">{{ $semester_status }}</p>

    <br>

    <h2>Hobi (hobbies):</h2>
    <ul>
        @foreach ($hobbies as $hobi)
            <li>- {{ $hobi }}</li>
        @endforeach
    </ul>

</body>
</html>
