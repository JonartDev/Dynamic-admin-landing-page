<?php

namespace App\Http\Livewire;

use Livewire\WithPagination;
use Livewire\Component;
use App\Models\Links;
use Livewire\WithFileUploads;
use App\Models\Links_199zx;

class LinksManagement extends Component
{
    use WithPagination;
    use WithFileUploads;
    protected $paginationTheme = 'bootstrap';
    public $search = '';

    public $name, $links, $image_path, $_group, $category, $link_id;
    public $order_number, $description, $status;
    public $imagePath;

    public $showSuccesNotification  = false;
    public $linksData;
    public $linkDetails;

    protected function rules()
    {
        return [
            'name' => 'required',
            'links' => 'required|url',
            '_group' => 'required',
            'order_number' => 'numeric|required',
            // 'image_path' => 'required',
        ];
    }

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    public function saveLink()
    {
        $this->validate();
        $saveData = [
            'name' => $this->name,
            'links' => $this->links,
            'category' => 'link',
            'image_path' => 'No Image upload',
            '_group' => $this->_group,
            'status' => 1,
            'order_number' => $this->order_number,
            'description' => $this->description,
        ];

        if ($this->image_path) {
            $saveData['image_path'] = $this->image_path->storePublicly('images', 'public');
        }

        Links::create($saveData);
        // session()->flash('message', 'Link Added Successfully');

        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
    }

    public function updateLink()
    {
        $this->validate();

        $updateData = [
            'name' => $this->name,
            'links' => $this->links,
            'category' => 'link',
            '_group' => $this->_group,
            'status' => $this->status,
            'order_number' => $this->order_number,
            'description' => $this->description,
        ];

        if ($this->image_path) {
            $updateData['image_path'] = $this->image_path->storePublicly('images', 'public');
        }

        Links::find($this->link_id)->update($updateData);

        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
    }

    public function editLink(int $link_id)
    {
        $link = Links::findOrFail($link_id);
        if ($link) {
            $this->link_id = $link->id;
            $this->name = $link->name;
            $this->links = $link->links;
            $this->category = $link->category;
            $this->imagePath = $link->image_path;
            $this->status = $link->status;
            $this->order_number = $link->order_number;
            $this->description = $link->description;
            $this->_group = $link->_group;
        } else {
            return redirect()->to('/BxQzqzKceUmg');
        }
    }
    public function deleteLink(int $link_id)
    {
        $this->link_id = $link_id;
        $this->linkDetails = Links::find($link_id);
    }
    public function destroyLink()
    {
        Links::find($this->link_id)->delete();
        // session()->flash('message', 'Link Deleted Successfully');
        $this->link_id = null;
        $this->linkDetails = null;
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
        $linksPaginator = Links::where(function ($query) {
            $query->where('category', '=', 'link')
                ->where(function ($subQuery) {
                    $subQuery->where('name', 'like', '%' . $this->search . '%')
                        ->orWhere('_group', 'like', '%' . $this->search . '%')
                        ->orWhere('links', 'like', '%' . $this->search . '%')
                        ->orWhere('order_number', 'like', '%' . $this->search . '%')
                        ->orWhere(function ($query) {
                            if (strtolower($this->search) === 'active') {
                                $query->where('status', 1);
                            } elseif (strtolower($this->search) === 'inactive') {
                                $query->where('status', 0);
                            } else {
                                $query->where('status', 'like', '%' . $this->search . '%');
                            }
                        });
                });
        })->orderBy('order_number')->orderBy('_group')->paginate(5);
        // Extract the items from the paginator
        $this->linksData = $linksPaginator->items();

        return view('livewire.links-management', ['linksData' => $this->linksData], ['linksPaginator' => $linksPaginator]);
    }
}
