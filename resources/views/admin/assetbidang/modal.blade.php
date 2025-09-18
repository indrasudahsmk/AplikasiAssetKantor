<div class="modal fade" id="ModalHapus{{ $item->id_aset }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="exampleModalLabel">Kembalikan {{ $title }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-white">&times;</span>
                </button>
            </div>
            <div class="modal-body text-left">
                <div class="row">
                    <div class="col-6">Barang</div>
                    <div class="col-6">
                        : <span>{{ $item->barang->nama_barang ?? '-' }}</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">Bidang</div>
                    <div class="col-6">
                        : <span>{{ $item->bidang->nama_bidang ?? '-' }}</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">Status</div>
                    <div class="col-6">
                        : <span>{{ $item->status ?? '-' }}</span>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">
                    <i class="fas fa-times mr-2"></i>Tutup
                </button>
                <form action="{{ route('assetBidangDelete', $item->id_aset) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-success btn-sm">
                        <i class="fas fa-trash mr-2"></i>Kembalikan
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
