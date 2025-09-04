<h1 align='center'>Data User</h1>
<h1 align='center'>Tanggal : {{ $date }}</h1>
<hr>
<table width='100%' border='1px' style="border-collapse: collapse;">
    <thead>
    <tr>
        <th width='20' align="center">No</th>
        <th width='20' align="center">Nama</th>
        <th width='20' align="center">Email</th>
        <th width='20' align="center">Jabatan</th>
        <th width='20' align="center">Status</th>
    </tr>
    </thead>
    <tbody>
        @foreach ($user as $item)
            <tr>
                <td align="center">{{ $loop->iteration }}</td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->email }}</td>
                <td align="center">{{ $item->jabatan }}</td>
                @if ($item->is_tugas==false)
                    <td align="center">Belum Ditugaskan</td>
                    @else
                    <td align="center">Sudah Ditugaskan</td>
                @endif
            </tr>
        @endforeach
    </tbody>
</table>