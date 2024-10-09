<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-12">
            <div class="bg-secondary rounded h-100 p-4">
                <form>
                <div class="mb-3">
                    <label for="nopolisi" class="form-label">Nopolisi</label>
                        <input type="text" class="form-control" wire:model="nopolisi" id="nopolisi" value="{{( old('nopolisi'))}}">
                            @error('nopolisis')
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
                        <label for="jenis" class="form-label">Jenis</label>
                            <input type="text" class="form-control" wire:model="jenis" id="jenis" value="{{( old('jenis'))}}">
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
                        <label for="foto" class="form-label">Foto</label>
                            <input type="file" class="form-control" wire:model="foto" id="foto" value="{{( old('foto'))}}">
                            @error('foto')
                                <div class="form-text text-danger">{{ $message }}</div>
                            @enderror
                </div>
                <button type="button" wire:click="update" class="btn btn-primary">Simpan</button>   
                </form>
            </div>
        </div>
    </div>
</div>