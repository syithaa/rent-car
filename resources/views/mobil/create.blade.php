<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
<div class="col-sm-12 col-xl-10">
        <div class="bg-light rounded h-100 p-4">
            <h6 class="mb-4">Add Mobil</h6>
                <form>
                    <div class="mb-3">
                        <label for="nopolisi" class="form-label">No Polisi</label>
                            <input type="text" wire:model="nopolisi" id="nopolisi" value="{{( old('nopolisi'))}}" class="form-control @error('nopolisi') is-invalid @enderror" />
                            @error('nopolisi')
                                <div class="form-text text-danger">{{ $message }}</div>
                            @enderror
                    </div>
                    <div class="mb-3">
                        <label for="merek" class="form-label">Merek</label>
                            <input type="text" class="form-control" wire:model="merek" id="merek" value="{{( old('merek'))}}">
                            @error('merek')
                                <div class="form-text text-danger">{{ $message }}</div>
                            @enderror
                    </div>
                    <div class="mb-3">
                        <label for="jenis" class="form-label">Jenis Mobil</label>
                            <select id="jenis" class="form-select" wire:model="jenis">
                                <option value="">--pilih--</option>
                                <option value="sedan">Sedan</option>
                                <option value="MPV">MPV</option>
                                <option value="SUV">SUV</option>
                            </select>
                            @error('jenis')
                            <div class="form-text text-danger">{{ $message }}</div>
                            @enderror
                    </div>
                    <div class="mb-3">
                        <label for="kapasitas" class="form-label">Kapasitas</label>
                            <input type="text" class="form-control" wire:model="kapasitas" id="kapasitas" value="{{( old('kapasitas'))}}">
                            @error('kapasitas')
                                <div class="form-text text-danger">{{ $message }}</div>
                            @enderror
                    </div>
                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga</label>
                            <input type="text" class="form-control" wire:model="harga" id="harga" value="{{( old('harga'))}}">
                            @error('harga')
                                <div class="form-text text-danger">{{ $message }}</div>
                            @enderror
                    </div>
                    <div class="mb-3">
                        <label for="foto" class="form-label">Foto Mobil</label>
                            <input type="file" class="form-control" wire:model="foto" id="foto" value="{{( old('foto'))}}">
                            @error('foto')
                                <div class="form-text text-danger">{{ $message }}</div>
                            @enderror
                    </div>
                    <button type="button" wire:click="store" class="btn btn-primary">Simpan</button>
                </form>
        </div>
    </div>
</div>
</div>
