<h1 align='center'>Data Tugas</h1>
<h1 align='center'>Tanggal : {{ $date }}</h1>
<hr>
<table width='100%' style="border-collapse: collapse;">
        <tr>
            <td>Nama</td>
            <td>{{ $tugas->user->nama }}</td>
        </tr>
        <tr>
            <td>Email</td>
            <td>{{ $tugas->user->email }}</td>
        </tr>
        <tr>
            <td>Tugas</td>
            <td>{{ $tugas->tugas }}</td>
        </tr>
        <tr>
            <td>Tanggal Mulai</td>
            <td>{{ $tugas->tanggal_mulai }}</td>
        </tr>
        <tr>
            <td>Tanggal Selesai</td>
            <td>{{ $tugas->tanggal_selesai }}</td>
        </tr>
</table>
<hr>