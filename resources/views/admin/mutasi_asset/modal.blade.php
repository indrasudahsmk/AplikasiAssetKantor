<div class="modal fade" id="ModalHapus{{ $item->id_mutasi }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="exampleModalLabel">Hapus {{ $title }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-white">&times;</span>
                </button>
            </div>
            <div class="modal-body text-left">
                <div class="row mb-2">
                    <div class="col-5">Nama Barang</div>
                    <div class="col-7">: {{ $item->barang->nama_barang ?? '-' }}</div>
                </div>
                <div class="row mb-2">
                    <div class="col-5">Dari Bidang</div>
                    <div class="col-7">: {{ $item->dariBidang->nama_bidang ?? '-' }}</div>
                </div>
                <div class="row mb-2">
                    <div class="col-5">Ke Bidang</div>
                    <div class="col-7">: {{ $item->keBidang->nama_bidang ?? '-' }}</div>
                </div>
                <div class="row">
                    <div class="col-5">Tanggal Mutasi</div>
                    <div class="col-7">: {{ \Carbon\Carbon::parse($item->tanggal_mutasi)->format('d/m/Y') }}</div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">
                    <i class="fas fa-times mr-2"></i>Tutup
                </button>
                <form action="{{ route('mutasiDestroy', $item->id_mutasi) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-success btn-sm">
                        <i class="fas fa-undo-alt mr-2"></i>Kembalikan
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
