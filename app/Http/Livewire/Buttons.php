<?php

namespace App\Http\Livewire;

use Livewire\WithPagination;
use Livewire\Component;
use App\Models\Links;
use Livewire\WithFileUploads;

class Buttons extends Component
{
    use WithPagination;
    use WithFileUploads;
    protected $paginationTheme = 'bootstrap';
    public $search = '';

    public $name, $buttons, $_group, $image_path, $category, $button_id;
    public $order_number, $description, $status;
    public $imagePath;
    public $buttonsData;
    public $buttonDetails;

    // protected function rules()
    // {
    //     return [
    //         'name' => 'required',
    //         'buttons' => 'required|url',
    //         '_group' => 'required',
    //         // 'image_path' => 'required',
    //     ];
    // }
    protected $rules = [
        'name' => 'required',
        'buttons' => 'required|url',
        '_group' => 'required',
        'order_number' => 'numeric|required',
        // 'image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ];

    public function saveButton()
    {
        $this->validate();
        $saveData = [
            'name' => $this->name,
            'links' => $this->buttons,
            'category' => 'button',
            '_group' => $this->_group,
            'image_path' => 'No Image upload',
            'status' => 1,
            'order_number' => $this->order_number,
            'description' => $this->description,
        ];

        if ($this->image_path) {
            $saveData['image_path'] = $this->image_path->storePublicly('buttons', 'public');
        }

        Links::create($saveData);
        // session()->flash('message', 'Link Added Successfully');

        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
    }
    public function updated($fields)
    {
        $this->validateOnly($fields);
    }
    public function updateButton()
    {
        $this->validate();
        $updateData = [
            'name' => $this->name,
            'links' => $this->buttons,
            'category' => 'button',
            '_group' => $this->_group,
            'status' => $this->status,
            'order_number' => $this->order_number,
            'description' => $this->description,
        ];

        if ($this->image_path) {
            $updateData['image_path'] = $this->image_path->storePublicly('buttons', 'public');
        }

        Links::find($this->button_id)->update($updateData);

        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
    }


    public function editButton(int $button_id)
    {
        $button = Links::findOrFail($button_id);
        if ($button) {
            $this->button_id = $button->id;
            $this->name = $button->name;
            $this->buttons = $button->links;
            $this->category = $button->category;
            $this->imagePath = $button->image_path;
            $this->_group = $button->_group;
            $this->status = $button->status;
            $this->order_number = $button->order_number;
            $this->description = $button->description;
        } else {
            return redirect()->to('/BuddfgsdsaYu');
        }
    }

    public function deleteButton(int $button_id)
    {
        $this->button_id = $button_id;
        $this->buttonDetails = Links::find($button_id);
    }
    public function destroyButton()
    {
        Links::find($this->button_id)->delete();
        // session()->flash('message', 'Link Deleted Successfully');
        $this->button_id = null;
        $this->buttonDetails = null;
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
    public $sortField;
    public $sortDirection = 'asc';
    public function render()
    {
        $buttonPaginator = Links::where(function ($query) {
            $query->where('category', '=', 'button')
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
        })->orderBy('_group')->orderBy('order_number')->paginate(5);
        $this->buttonsData = $buttonPaginator->items();

        $data = [
            // Fetch your data here, for example from a model
            // $items = YourModel::orderBy($this->sortField, $this->sortDirection)->get();
            'items' => [],
        ];

        return view('livewire.buttons', ['buttonsData' => $this->buttonsData], ['buttonsPaginator' => $buttonPaginator], $data);
    }
    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortDirection = 'asc';
        }

        $this->sortField = $field;
    }
}
