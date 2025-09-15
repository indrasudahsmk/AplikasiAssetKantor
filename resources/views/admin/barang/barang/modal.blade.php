<div class="modal fade" id="ModalHapus{{ $item->id_barang }}" tabindex="-1" aria-labelledby="exampleModalLabel"
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
                <div class="row mb-1">
                    <div class="col-5 font-weight-bold">Kode Barang</div>
                    <div class="col-7">: {{ $item->kode_barang }}</div>
                </div>
                <div class="row mb-1">
                    <div class="col-5 font-weight-bold">Nama Barang</div>
                    <div class="col-7">: {{ $item->nama_barang }}</div>
                </div>
                <div class="row mb-1">
                    <div class="col-5 font-weight-bold">Jenis</div>
                    <div class="col-7">: {{ $item->jenis->jenis_barang ?? '-' }}</div>
                </div>
                <div class="row mb-1">
                    <div class="col-5 font-weight-bold">Merk</div>
                    <div class="col-7">: {{ $item->merk->merk ?? '-' }}</div>
                </div>
                <div class="row mb-1">
                    <div class="col-5 font-weight-bold">Tipe</div>
                    <div class="col-7">: {{ $item->tipe->tipe ?? '-' }}</div>
                </div>
                <div class="row mb-1">
                    <div class="col-5 font-weight-bold">Tahun Pembelian</div>
                    <div class="col-7">: {{ $item->tahun_pembelian }}</div>
                </div>
                <div class="row mb-1">
                    <div class="col-5 font-weight-bold">Harga</div>
                    <div class="col-7">: {{ number_format($item->harga, 0, ',', '.') }}</div>
                </div>
                <div class="row mb-1">
                    <div class="col-5 font-weight-bold">Nomor Register</div>
                    <div class="col-7">: {{ $item->nomor_register }}</div>
                </div>
                <div class="row mb-1">
                    <div class="col-5 font-weight-bold">Keterangan</div>
                    <div class="col-7">: {{ $item->keterangan }}</div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">
                    <i class="fas fa-times mr-2"></i>Tutup
                </button>
                <form action="{{ route('barangDestroy', $item->id_barang) }}" method="post">
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

<div class="modal fade" id="ModalView{{ $item->id_barang }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header bg-warning text-white">
                <h5 class="modal-title" id="exampleModalLabel">Detail {{ $title }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-white">&times;</span>
                </button>
            </div>
            <div class="modal-body text-left">
                <div class="row mb-1">
                    <div class="col-5 font-weight-bold">Kode Barang</div>
                    <div class="col-7">: {{ $item->kode_barang }}</div>
                </div>
                <div class="row mb-1">
                    <div class="col-5 font-weight-bold">Nama Barang</div>
                    <div class="col-7">: {{ $item->nama_barang }}</div>
                </div>
                <div class="row mb-1">
                    <div class="col-5 font-weight-bold">Jenis</div>
                    <div class="col-7">: {{ $item->jenis->jenis_barang ?? '-' }}</div>
                </div>
                <div class="row mb-1">
                    <div class="col-5 font-weight-bold">Merk</div>
                    <div class="col-7">: {{ $item->merk->merk ?? '-' }}</div>
                </div>
                <div class="row mb-1">
                    <div class="col-5 font-weight-bold">Tipe</div>
                    <div class="col-7">: {{ $item->tipe->tipe ?? '-' }}</div>
                </div>
                <div class="row mb-1">
                    <div class="col-5 font-weight-bold">Tahun Pembelian</div>
                    <div class="col-7">: {{ $item->tahun_pembelian }}</div>
                </div>
                <div class="row mb-1">
                    <div class="col-5 font-weight-bold">Ketersediaan</div>
                    <div class="col-7">: {{ $item->status_ketersediaan }}</div>
                </div>
                <div class="row mb-1">
                    <div class="col-5 font-weight-bold">Harga</div>
                    <div class="col-7">: {{ number_format($item->harga, 0, ',', '.') }}</div>
                </div>
                <div class="row mb-1">
                    <div class="col-5 font-weight-bold">Nomor Register</div>
                    <div class="col-7">: {{ $item->nomor_register }}</div>
                </div>
                <div class="row mb-1">
                    <div class="col-5 font-weight-bold">Keterangan</div>
                    <div class="col-7">: {{ $item->keterangan }}</div>
                </div>
                <div class="row mb-1">
                    <div class="col-5 font-weight-bold">No. Pabrik</div>
                    <div class="col-7">: {{ $item->no_pabrik }}</div>
                </div>
                <div class="row mb-1">
                    <div class="col-5 font-weight-bold">No. Rangka</div>
                    <div class="col-7">: {{ $item->no_rangka }}</div>
                </div>
                <div class="row mb-1">
                    <div class="col-5 font-weight-bold">No. Mesin</div>
                    <div class="col-7">: {{ $item->no_mesin }}</div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">
                    <i class="fas fa-times mr-2"></i>Tutup
                </button>
            </div>
        </div>
    </div>
</div>