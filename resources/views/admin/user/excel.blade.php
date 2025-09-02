<table>
    <thead>
        <tr>
            <th align="center" colspan="5" class="bg-primary">Data User</th>
        </tr>
        <tr>
            <th align="center" colspan="5" class="bg-primary">Cetak : {{ $date }}</th>
        </tr>
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