<?php

namespace App\Http\Livewire\Auth;

use App\Http\Livewire\Auth;
use Livewire\Component;

class Logout extends Component
{
    
    public function confirmLogout()
    {
        // Your confirmation logic goes here, if needed

        // Emit Livewire event to trigger actual logout
        $this->emit('logout');
    }
    public function logout() {
        auth()->logout();
        return redirect('/RmjgvnhvFKgA');
    }

    public function render()
    {
        return view('livewire.auth.logout');
    }
    // Livewire event listener
    protected $listeners = ['logout' => 'logout'];
}
