    <div class="modal fade" id="ModalEdit{{ $item->id_aset }}" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="exampleModalLabel">Edit {{ $title }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="text-white">&times;</span>
                    </button>
                </div>
                <form action="{{ route('assetPegawaiUpdate', $item->id_aset) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        
                        <div class="mb-3">
                            <label class="form-label">
                                <span class="text-danger">*</span> Barang :
                            </label>
                            <select class="form-control" disabled>
                                <option>
                                    {{ $item->barang->nama_barang }} ({{ $item->barang->kode_barang }})
                                </option>
                            </select>
                            <input type="hidden" name="id_barang" value="{{ $item->id_barang }}">
                        </div>

                        {{-- Pegawai --}}
                        <div class="mb-3">
                            <label class="form-label">
                                <span class="text-danger">*</span> Pegawai :
                            </label>
                            <select name="id_pegawai" class="form-control @error('id_pegawai') is-invalid @enderror">
                            <option value="" disabled selected>-- PILIH PEGAWAI --</option>
                            @foreach ($pegawai as $pgw)
                                <option value="{{ $pgw->id_pegawai }}"
                                    {{ old('id_pegawai', $item->id_pegawai) == $pgw->id_pegawai ? 'selected' : '' }}>
                                    {{ $pgw->nama }}
                                </option>
                            @endforeach
                        </select>
                            @error('id_pegawai')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        {{-- Status --}}
                        <div class="mb-3">
                            <label class="form-label">
                                <span class="text-danger">*</span> Status :
                            </label>
                            <select name="status" class="form-control @error('status') is-invalid @enderror">
                                <option value="" disabled>-- PILIH STATUS --</option>
                                <option value="Digunakan" {{ old('status', $item->status) == 'Digunakan' ? 'selected' : '' }}>
                                    Digunakan</option>
                                <option value="Dikembalikan" {{ old('status', $item->status) == 'Dikembalikan' ? 'selected' : '' }}>
                                    Dikembalikan</option>
                            </select>
                            @error('status')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">
                            <i class="fas fa-times mr-2"></i>Tutup
                        </button>
                        <button type="submit" class="btn btn-primary btn-sm">
                            <i class="fas fa-save mr-1"></i> Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
