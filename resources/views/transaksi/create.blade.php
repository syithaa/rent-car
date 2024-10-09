<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
<div class="col-sm-12 col-xl-10">
        <div class="bg-light rounded h-100 p-4">
            <h6 class="mb-4">Add Transaksi</h6>
                <form>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Pemesan</label>
                            <input type="text" wire:model="nama" id="nama" value="{{( old('nama'))}}" class="form-control @error('nama') is-invalid @enderror" />
                            @error('nama')
                                <div class="form-text text-danger">{{ $message }}</div>
                            @enderror
                    </div>
                    <div class="mb-3">
                        <label for="ponsel" class="form-label">Nomor Ponsel Pemesan</label>
                            <input type="text" wire:model="ponsel" id="ponsel" value="{{( old('ponsel'))}}" class="form-control @error('ponsel') is-invalid @enderror" />
                            @error('ponsel')
                                <div class="form-text text-danger">{{ $message }}</div>
                            @enderror
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat Pemesan</label>
                            <input type="text" wire:model="alamat" id="alamat" value="{{( old('alamat'))}}" class="form-control @error('alamat') is-invalid @enderror" />
                            @error('alamat')
                                <div class="form-text text-danger">{{ $message }}</div>
                            @enderror
                    </div>
                    <div class="mb-3">
                        <label for="lama" class="form-label">Lama Pesan</label>
                            <input type="number" class="form-control" wire:change="hitung" wire:model="lama" id="lama" value="{{( old('lama'))}}">
                            @error('lama')
                                <div class="form-text text-danger">{{ $message }}</div>
                            @enderror
                    </div>
                    <div class="mb-3">
                        <label for="tgl_pesan" class="form-label">Tanggal Pemesanan</label>
                            <input type="date" class="form-control" wire:model="tgl_pesan" id="tgl_pesan" value="{{( old('tgl_pesan'))}}">
                            @error('tgl_pesan')
                                <div class="form-text text-danger">{{ $message }}</div>
                            @enderror
                    </div>
                    <div class="mb-3">
                        <label for="tgl_kembali" class="form-label">Tanggal Pengembalian</label>
                            <input type="date" class="form-control" wire:model="tgl_kembali" id="tgl_kembali" value="{{( old('tgl_kembali'))}}">
                            @error('tgl_kembali')
                                <div class="form-text text-danger">{{ $message }}</div>
                            @enderror
                    </div>
                    <div class="mb-3">
                       Total : {{ $total }}
                    </div>
                    <button type="button" wire:click="store" class="btn btn-primary">Simpan</button>
                </form>
        </div>
    </div>
</div>
</div>
