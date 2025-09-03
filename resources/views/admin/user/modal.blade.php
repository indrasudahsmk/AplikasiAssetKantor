<div class="modal fade" id="ModalHapus{{ $item->id_pegawai }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="exampleModalLabel">Hapus {{ $title }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-white">&times;</span>
                </button>
            </div>
            <div class="modal-body text-left">
                <div class="row">
                    <div class="col-6">NIP / NIK</div>
                    <div class="col-6">
                        : <span class="badge badge-dark">{{ $item->nip_nik }}</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">Nama</div>
                    <div class="col-6">
                        : <span class="badge badge-success">{{ $item->nama }}</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">Jabatan</div>
                    <div class="col-6">
                        :
                        <span class="badge {{ $item->jabatan->id_jabatan === 1 ? 'badge-primary' : 'badge-danger' }}">
                            {{ $item->jabatan->jabatan ?? '-' }}
                        </span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">Bidang</div>
                    <div class="col-6">
                        : <span class="badge badge-info">{{ $item->bidang->nama_bidang ?? '-' }}</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">Status Pegawai</div>
                    <div class="col-6">
                        :
                        <span class="badge {{ $item->status_pegawai == 'ASN' ? 'badge-info' : 'badge-warning' }}">
                            {{ $item->status_pegawai ?? '-' }}
                        </span>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal"><i
                        class="fas fa-times mr-2"></i>Tutup</button>
                <form action="{{ route('userDestroy', $item->id_pegawai) }}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash mr-2"></i>Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>
