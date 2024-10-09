<?php

namespace App\Livewire;

use App\Models\User;
use App\Models\Mobil;
use App\Models\Transaksi;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class TransaksiComponent extends Component
{
    use WithPagination, WithoutUrlPagination;
    public $addPage, $editPage = false;
    public $nama, $ponsel, $alamat, $lama, $tgl_pesan, $tgl_kembali, $mobil_id, $harga, $total;
    public function render()
    {
        $data['mobil'] = Mobil::paginate(10);
        return view('livewire.transaksi-component', $data);
    }
    public function create($id, $harga)
    {
        $this->mobil_id = $id;
        $this->harga = $harga;
        $this->addPage = true;
    }
    public function hitung()
    {
        $lama = $this->lama;
        $harga = $this->harga;
        $this->total = $lama * $harga; 
    }
    public function store()
    {
        $this->validate([
            'nama' => 'required',
            'ponsel' => 'required',
            'alamat' => 'required',
            'lama' => 'required',
            'tgl_pesan' => 'required',
            'tgl_kembali' => 'required'
        ],[
            'nama.required' => 'Nama Tidak Boleh Kosong!',
            'ponsel.required' => 'Nomor Ponsel Tidak Boleh Kosong!',
            'alamat.required' => 'Alamat Tidak Boleh Kosong!',
            'lama.required' => 'Lama Pesan tidak boleh Kosong!',
            'tgl_pesan.required' => 'Tanggal Pesan Tidak Boleh Kosong!',
            'tgl_kembali.required' => 'Tanggal Kembali Tidak Boleh Kosong!'
        ]);
        $cari = Transaksi::where('mobil_id', $this->mobil_id)->where('status', '<>', 'PROSES')->get()->where('tgl_pesan', $this->tgl_pesan)->where('tgl_kembali', $this->tgl_kembali);
        if ($cari) {
            session()->flash('error', 'Mobil Sudah Ada Yang Memesan!');
        } else {
            Transaksi::create([
                'user_id' => auth()->user()->id,
                'mobil_id' => $this->mobil_id,
                'nama' => $this->nama,
                'ponsel' => $this->ponsel,
                'alamat' => $this->alamat,
                'lama' => $this->lama,
                'tgl_pesan' => $this->tgl_pesan,
                'tgl_kembali' => $this->tgl_kembali,
                'total' => $this->total,
                'status' => 'WAIT'
            ]);
            session()->flash('succes', 'Berhasil Simpan Data!!'); 
        }
        $this->reset();
    }
}
