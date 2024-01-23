<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class SignUp extends Component
{
    public $name = '';
    public $email = '';
    public $password = '';

    protected $rules = [
        'name' => 'required|min:3',
        'email' => 'required|email:rfc,dns|unique:users',
        'password' => 'required|min:6'
    ];

    public function mount() {
        if(auth()->user()){
            redirect('/NVrvBGpeKBKs');
        }
    }

    public function register() {
        $this->validate();
        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'role' => '2',
            'password' => Hash::make($this->password)
        ]);

        auth()->login($user);

        return redirect('/NVrvBGpeKBKs');
    }

    public function render()
    {
        return view('livewire.auth.sign-up');
    }
}
