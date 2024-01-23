<?php

namespace App\Http\Livewire\Users;

use Livewire\Component;

use Livewire\WithPagination;;

use App\Models\User;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Hash;

class UserManagement extends Component
{
    use WithPagination;
    use WithFileUploads;
    protected $paginationTheme = 'bootstrap';
    public $search = '';

    public $name, $email, $phone, $about, $location, $role, $user_id, $password;
    public $passwordConfirmation = '';
    public $urlID = '';


    public $showSuccesNotification  = false;
    public $usersData;
    public $usersDetails;

    protected $rules = [
        'name' => 'required|min:3',
        'email' => 'required|email:rfc,dns|unique:users',
        'password' => 'required|min:6',
        'role' => 'required'
    ];
    public function updated($fields)
    {
        $this->validateOnly($fields);
    }
    public function saveUser()
    {
        $this->validate();
        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'role' => $this->role,
            'password' => Hash::make($this->password)
        ]);

        // session()->flash('message', 'Link Added Successfully');

        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
    }
    public function validation()
    {
        return [
            'email' => 'required|email',
            'password' => 'min:6|same:passwordConfirmation'
        ];
    }
    public function updateUser()
    {
        $this->validation();
        $updateData = [
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
            'role' => $this->role,
        ];

        User::find($this->user_id)->update($updateData);
        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
    }
    public function resetPassword()
    {
        $this->validation();
        $user = User::where('email', $this->email)->first();
        if ($user && $user->id == $this->urlID) {

            if ($this->password == $this->passwordConfirmation) {
                $user->update([
                    'name' => $this->name,
                    'email' => $this->email,
                    'password' => Hash::make($this->password),
                    'role' => $this->role
                ]);
                $this->resetInput();
                $this->dispatchBrowserEvent('close-modal');
            }
            else if ($this->password != $this->passwordConfirmation) {
                $this->showSuccesNotification = true;
            } else {
                $user->update([
                    'name' => $this->name,
                    'email' => $this->email,
                    'role' => $this->role
                ]);
                $this->resetInput();
                $this->dispatchBrowserEvent('close-modal');
            }
        } else {
            dd($user);
        }
    }


    public function editUser(int $user_id)
    {
        $user = User::findOrFail($user_id);
        $this->urlID = intval($user->id);
        if ($user) {
            $this->user_id = $user->id;
            $this->name = $user->name;
            $this->email = $user->email;
            $this->phone = $user->phone;
            $this->about = $user->about;
            $this->role = $user->role;
            $this->location = $user->location;
        } else {
            return redirect()->to('/gUNFVbDsWtFk');
        }
    }

    public function deleteUser(int $user_id)
    {
        $this->user_id = $user_id;
        $this->usersDetails = User::find($user_id);
    }
    public function destroyUser()
    {
        User::find($this->user_id)->delete();
        // session()->flash('message', 'Link Deleted Successfully');
        $this->user_id = null;
        $this->usersDetails = null;
        $this->dispatchBrowserEvent('close-modal');
    }
    public function closeModal()
    {
        $this->resetInput();
    }
    public function resetInput()
    {
        $this->reset();
        $this->resetValidation();
    }
    public function render()
    {
        $usersPaginator = User::where('name', 'like', '%' . $this->search . '%')
            ->orderBy('id', 'DESC')
            ->paginate(5);

        // Extract the items from the paginator
        $this->usersData = $usersPaginator->items();
        return view('livewire.users.user-management', ['usersData' => $this->usersData], ['usersPaginator' => $usersPaginator]);
    }
}
