<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class UsersComponent extends Component
{   
    use WithPagination, WithoutUrlPagination;
    protected $paginationTheme = 'bootstrap';
    public $addPage, $editPage = false;
    public $nama, $email, $password, $role, $id;
    public function render()
    {
        $data['user'] = User::paginate(2);
        return view('livewire.users-component', $data);
    }

    public function index()
{
    $user = User::all(); // Retrieve all users from the database
    return view('index', compact('users')); // Pass the users to the view
}

    public function create()
    {
        $this->reset();
        $this->addPage = true;
    }

    public function store()
    {
        $this->validate([
            'nama' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6',
            'role' => 'required'
        ],[
            'nama.required' => 'Nama harus diisi!',
            'email.required' => 'Email harus diisi!',
            'email.email' => 'Email tidak valid!',
            'password.required' => 'Password harus diisi!',
            'role.required' => 'Role harus diisi!'
        ]);

        // Create a new model instance and save it to the database
        $user = new User(); // Replace with your actual model nama
        $user->nama = $this->nama;
        $user->email = $this->email;
        $user->password = bcrypt($this->password); // Hash the password
        $user->role = $this->role;
        $user->save();
    

        session()->flash('success', 'Berhasil Simpan Data!!');
        $this->reset();
    }
    
    public function destroy ($id)
    {
        $cari = User::find($id);
        $cari->delete();
        session()->flash('success', 'Berhasil Hapus Data!!');
        $this->reset();
    }
    public function edit($id)
    {
        $this->reset();
        $cari = User::find($id);
        $this->nama = $cari->nama;
        $this->email = $cari->email;
        $this->role = $cari->role;
        $this->id = $cari->id;
        $this->editPage = true;
    }
    public function update()
    {
        $cari = User::find($this->id);
        if ($this->password == "") {
        $cari->update([
            'name' => $this->nama,
            'email' => $this->email,
            'role' => $this->role
        ]);
    } else {
        $cari->update([
            'name' => $this->nama,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'role' => $this->role
        ]);
    }
        session()->flash('success', 'Berhasil Update Data!!');
        $this->reset();
    }
}