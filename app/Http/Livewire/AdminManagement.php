<?php

namespace App\Http\Livewire;


use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Admin;
use App\Models\Sidebar;
use App\Http\Controllers\SidebarController;

class AdminManagement extends Component
{
    use WithFileUploads;
    public $admin;
    public $showSuccesNotification  = false;

    public $showDemoNotification = false;

    public $title, $info, $logo, $link, $webimage, $sidebar_id, $sidebar_name, $admin_id;

    public $sidebar;
    public $sidebarData, $sidebarItems;
    protected $rules = [
        'title' => 'required|max:40|min:3',
        'link' => 'required|url',
        'info' => 'max:200'
    ];


    public function mount()
    {
    }
    public function toggle($sidebarId)
    {
        $sidebar = Sidebar::find($sidebarId);

        if ($sidebar) {
            $sidebar->update([
                'status' => !$sidebar->status
            ]);
        }
    }


    public function updateAdmin()
    {
        $this->validate();
        $updateData = [
            'title' => $this->title,
            'info' => $this->info,
            'link' => $this->link,
        ];

        $admin = Admin::findOrFail(1);
        if ($admin->logo != $this->logo) {
            $updateData['logo'] = $this->logo->storePublicly('logo', 'public');
        }
        if ($admin->webimage != $this->webimage) {
            $updateData['webimage'] = $this->webimage->storePublicly('webpage', 'public');
        }

        Admin::find($this->admin_id)->update($updateData);
        $this->dispatchBrowserEvent('close-modal');
        return redirect()->to('/TmayyvrJFhKc');
    }

    public function editSidebar(int $sidebar_id)
    {
        $sidebar = Sidebar::findOrFail($sidebar_id);
        if ($sidebar) {
            $this->sidebar_id = $sidebar_id;
            $this->sidebar_name = $sidebar->name;
        } else {
            return redirect()->to('/TmayyvrJFhKc');
        }
    }
    public function editAdmin(int $admin_id)
    {
        $admin = Admin::findOrFail($admin_id);
        if ($admin) {
            $this->admin_id = $admin_id;
            $this->title = $admin->title;
            $this->info = $admin->info;
            $this->link = $admin->link;
            $this->logo = $admin->logo;
            $this->webimage = $admin->webimage;
        } else {
            return redirect()->to('/TmayyvrJFhKc');
        }
    }
    public function save()
    {
        $this->validate();
        $this->admin->save();
        $this->showSuccesNotification = true;
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
        $sidebarController = new SidebarController();
        $this->sidebarData = $sidebarController->index();
        $this->admin = Admin::where(["id" => 1])->first();
        $this->sidebar = Sidebar::all();

        return view('livewire.admin-management');
    }
}
