<?php

namespace App\Livewire;

use App\Models\User;
use App\Models\Mobil;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class MobilComponent extends Component
{
    use WithPagination, WithoutUrlPagination, WithFileUploads;
    protected $paginationTheme = 'bootstrap';
    public $addPage, $editPage = false;
    public $nopolisi, $merek, $jenis, $kapasitas, $harga, $foto, $id;
    public function render()
    {
        $data['mobil'] = Mobil::paginate(10);
        return view('livewire.mobil-component', $data);
    }
    public function create()
    {
        $this->addPage = true;
    }
    public function store()
    {
        $this->validate([
            'nopolisi' => 'required',
            'merek' => 'required',
            'jenis' => 'required',
            'kapasitas' => 'required',
            'harga' => 'required',
            'foto' => 'required|image'
        ], [
            'nopolisi.required' => 'Nomor Polisi tidak Boleh Kosong!',
            'merek.required' => 'Merek tidak Boleh Kosong!',
            'jenis.required' => 'Jenis tidak Boleh Kosong!',
            'kapasitas.required' => 'Kapasitas tidak Boleh Kosong!',
            'harga.required' => 'Harga tidak Boleh Kosong!',
            'foto.required' => 'Foto tidak Boleh Kosong!',
            'foto.image' => 'Foto Dalam Format Image!'
        ]);
        $fillname = $this->foto->store('mobil', 'public');
        Mobil::create([
            'user_id' => auth()->user()->id,
            'nopolisi' => $this->nopolisi,
            'merek' => $this->merek,
            'jenis' => $this->jenis,
            'kapasitas' => $this->kapasitas,
            'harga' => $this->harga,
            'foto' => $this->foto->hashName()
        ]);
        session()->flash('succes', 'Berhasil Simpan Data!!');
        $this->reset();
    }
    public function destroy ($id)
    {
        $data = Mobil::find($id);
        $data->delete();
        session()->flash('succes', 'Berhasil Hapus Data!!');
        $this->reset();
    }
    public function edit($id)
    {
        $mobil = Mobil::find($id);
        $this->editPage = true;
        $this->id = $mobil->id;
        $this->nopolisi = $mobil->nopolisi;
        $this->merek = $mobil->merek;
        $this->jenis = $mobil->jenis;
        $this->kapasitas = $mobil->kapasitas;
        $this->harga = $mobil->harga;
        $this->foto = $mobil->foto;
    }
    
    public function update()
{
    $mobil = Mobil::find($this->id);

    // Jika foto baru diunggah
    if ($this->foto) {
        // Simpan foto baru
        $filename = $this->foto->store('mobil', 'public');
        $mobil->update([
            'nopolisi' => $this->nopolisi,
            'merek' => $this->merek,
            'kapasitas' => $this->kapasitas,
            'harga' => $this->harga,
            'foto' => $this->foto->hashName() // Ganti dengan nama file baru
        ]);
    } else {
        // Jika tidak ada foto baru, hanya perbarui atribut lainnya
        $mobil->update([
            'nopolisi' => $this->nopolisi,
            'merek' => $this->merek,
            'kapasitas' => $this->kapasitas,
            'harga' => $this->harga,
        ]);
    }

    session()->flash('succes', 'Berhasil update data !');
    $this->reset();
}
}