<?php

namespace App\Http\Livewire;

use Livewire\WithPagination;
use Livewire\Component;
use App\Models\Links;
use Livewire\WithFileUploads;

class Banner extends Component
{
    use WithPagination;
    use WithFileUploads;
    protected $paginationTheme = 'bootstrap';
    public $search = '';

    public $banner, $isMobile, $category, $_group, $banner_id;
    public $order_number, $description, $status;
    public $bannerPath;

    public $showSuccesNotification  = false;
    public $bannerData;
    public $bannerDetails;

    protected function rules()
    {
        return [
            // 'banner' => 'required',
            'isMobile' => 'required',
            'order_number' => 'numeric|required',
            '_group' => 'required',
        ];
    }

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    public function saveLink()
    {
        $validatedData = $this->validate();

        $saveData = [
            'name' => 'banner',
            'links' => '-',
            'image_path' => 'No Image upload',
            'category' => 'banner',
            'isMobile' => $this->isMobile,
            'status' => 1,
            'order_number' => $this->order_number,
            'description' => $this->description,
            '_group' => $this->_group
        ];

        if ($this->banner) {
            $saveData['image_path'] = $this->banner->storePublicly('banner', 'public');
        }

        Links::create($saveData);
        // session()->flash('message', 'Link Added Successfully');

        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
    }

    public function updateBanner()
    {
        $this->validate();

        $updateData = [
            'name' => 'banner',
            'links' => '-',
            'category' => 'banner',
            'isMobile' => $this->isMobile,
            'status' => $this->status,
            'order_number' => $this->order_number,
            'description' => $this->description,
            '_group' => $this->_group
        ];
        if ($this->banner) {
            $updateData['image_path'] = $this->banner->storePublicly('banner', 'public');
        }

        Links::find($this->banner_id)->update($updateData);

        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
        // $this->dispatchBrowserEvent('close-modal');
    }

    public function editBanner(int $banner_id)
    {
        $bannerData = Links::findOrFail($banner_id);
        if ($bannerData) {
            $this->banner_id = $bannerData->id;
            $this->category = $bannerData->category;
            $this->bannerPath = $bannerData->image_path;
            $this->isMobile = $bannerData->isMobile;
            $this->status = $bannerData->status;
            $this->order_number = $bannerData->order_number;
            $this->description = $bannerData->description;
            $this->_group = $bannerData->_group;
        } else {
            return redirect()->to('/BxQzqzKceUmg');
        }
    }
    public function deleteBanner(int $banner_id)
    {
        $this->banner_id = $banner_id;
        $this->bannerDetails = Links::find($banner_id);
    }
    public function destroyBanner()
    {
        Links::find($this->banner_id)->delete();
        // session()->flash('message', 'Link Deleted Successfully');
        $this->banner_id = null;
        $this->bannerDetails = null;
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
        // $bannerDatasPaginator = Links::where('category', 'banner')
        $bannerDatasPaginator = Links::where(function ($query) {
            $query->where('category', '=', 'banner')
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
                        })
                        ->orWhere(function ($query) {
                            if (strtolower($this->search) === 'mobile') {
                                $query->where('isMobile', 1);
                            } elseif (strtolower($this->search) === 'desktop') {
                                $query->where('isMobile', 0);
                            } else {
                                $query->where('isMobile', 'like', '%' . $this->search . '%');
                            }
                        });
                });
        })->orderBy('isMobile')->orderBy('order_number')->orderBy('_group')->paginate(7);



        // Extract the items from the paginator
        $this->bannerData = $bannerDatasPaginator->items();
        return view('livewire.banner', ['bannerData' => $this->bannerData], ['bannerDatasPaginator' => $bannerDatasPaginator]);
    }
}
