<div class="modal fade" id="ModalHapus{{ $item->id_aset }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="exampleModalLabel">Hapus {{ $title }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-white">&times;</span>
                </button>
            </div>
            <div class="modal-body text-left">
                <div class="row">
                    <div class="col-4">Barang</div>
                    <div class="col-8">
                        <p class="mb-0">: {{ $item->barang->nama_barang ?? '-' }}</p>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-4">Bidang</div>
                    <div class="col-8">
                        <p class="mb-0">: {{ $item->bidang->nama_bidang ?? '-' }}</p>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-4">Status</div>
                    <div class="col-8">
                        <p class="mb-0">: {{ $item->status ?? '-' }}</p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">
                    <i class="fas fa-times mr-2"></i>Tutup
                </button>
                <form action="{{ route('assetBidangDelete', $item->id_aset) }}" method="post" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">
                        <i class="fas fa-trash mr-2"></i>Hapus
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
