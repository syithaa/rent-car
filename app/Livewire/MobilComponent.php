<?php

namespace App\Livewire;

use App\Models\User;
use App\Models\Mobil;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithoutUrlPagination;
use Livewire\WithFileUploads;

class MobilComponent extends Component
{
    use WithPagination, WithoutUrlPagination, WithFileUploads;
    protected $pahinationTheme = 'bootstrap';
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

        $this->foto->storeAs('public/mobil', $this->foto->hashName());
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
    }
    public function update()
    {
        $mobil = Mobil::find($this->id);
        if (empty($this->foto)) {
            $mobil->update([
                'user_id' => auth()->user()->id,
                'nopolisi' => $this->nopolisi,
                'merek' => $this->merek,
                'jenis' => $this->jenis,
                'kapasitas' => $this->kapasitas,
                'harga' => $this->harga
            ]);
        } else {
            $mobil->update([
                'user_id' => auth()->user()->id,
                'nopolisi' => $this->nopolisi,
                'merek' => $this->merek,
                'jenis' => $this->jenis,
                'kapasitas' => $this->kapasitas,
                'harga' => $this->harga,
                'foto' => $this->foto->hashName()
            ]);
        }
        session()->flash('succes', 'Berhasil Simpan Data!!');
        $this->reset();
    }
    public function destroy($id)
    {
        $mobil = Mobil::find($id);
        $mobil->delete();
        session()->flash('succes', 'Berhasil Hapus Data!!');
        $this->reset();
    }
}