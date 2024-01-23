<!-- Modal -->
<div wire:ignore.self class="modal fade" id="addnewBannerModal" tabindex="-1" aria-labelledby="addnewBannerModalLabel" aria-hidden="true" data-bs-keyboard="false" data-bs-backdrop="static">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="addnewBannerModalLabel">{{ __('translate.new') }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click="closeModal" aria-label="Close"><i class="fas fa-close text-secondary text-sm"></i></button>
            </div>
            <form wire:submit.prevent="saveLink">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <!-- <label>Image</label> -->
                                <div class="col-lg-12 ms-auto text-center mt-5 mt-lg-0">
                                    <div class="position-relative d-flex align-items-center justify-content-center h-100">
                                        @if($banner)
                                        <img class="w-100 position-relative z-index-2 pt-4" src="{{ $banner->temporaryUrl() }}" alt="">
                                        @else
                                        <label for="file" class="custum-file-upload">
                                            <div class="icon">
                                                <svg viewBox="0 0 24 24" fill="" xmlns="http://www.w3.org/2000/svg">
                                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                                    <g id="SVGRepo_iconCarrier">
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M10 1C9.73478 1 9.48043 1.10536 9.29289 1.29289L3.29289 7.29289C3.10536 7.48043 3 7.73478 3 8V20C3 21.6569 4.34315 23 6 23H7C7.55228 23 8 22.5523 8 22C8 21.4477 7.55228 21 7 21H6C5.44772 21 5 20.5523 5 20V9H10C10.5523 10 11 9.55228 11 9V3H18C18.5523 18 19 3.44772 19 4V9C19 9.55228 19.4477 10 20 10C20.5523 10 21 9.55228 21 9V4C21 2.34315 19.6569 1 18 1H10ZM9 7H6.41421L9 4.41421V7ZM14 15.5C14 14.1193 15.1193 13 16.5 13C17.8807 13 19 14.1193 19 15.5V16V17H20C21.1046 17 22 17.8954 22 19C22 20.1046 21.1046 21 20 21H13C11.8954 21 11 20.1046 11 19C11 17.8954 11.8954 17 13 17H14V16V15.5ZM16.5 11C14.142 11 12.2076 12.8136 12.0156 15.122C10.2825 15.5606 9 17.1305 9 19C9 21.2091 10.7909 23 13 23H20C22.2091 23 24 21.2091 24 19C24 17.1305 22.7175 15.5606 20.9844 15.122C20.7924 12.8136 18.858 11 16.5 11Z" fill=""></path>
                                                    </g>
                                                </svg>
                                            </div>
                                            <div class="text">
                                                <span>{{ __('translate.click_to_upload') }}</span>
                                            </div>
                                            <input id="file" wire:model="banner" type="file" class="form-control">
                                        </label>
                                        @endif

                                    </div>
                                    @error('banner') <span class="text-danger">{{ __('translate.error_image') }}</span> @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label>{{ __('translate.order_number') }}</label>
                                    <input type="text" wire:model="order_number" class="form-control">
                                    @error('order_number') <span class="text-danger">{{ __('translate.error_order') }}</span> @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="isMobile">{{ __('translate.device_type') }}</label>
                                    <select class="custom-select custom-select-lg mb-3 w-100" wire:model="isMobile" id="isMobile">
                                        <option value="">{{ __('translate.select_one') }}</option>
                                        <option value="0">Desktop</option>
                                        <option value="1">Mobile</option>
                                    </select>
                                    {{-- Show the selected category --}}
                                    <!-- <p>Selected Category: {{ $isMobile }}</p> -->
                                    @error('isMobile') <span class="text-danger">{{ __('translate.error_devicetype') }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label>{{ __('translate.group') }}</label>
                                    <input type="text" wire:model="_group" class="form-control">
                                    @error('_group') <span class="text-danger">{{ __('translate.error_group') }}</span> @enderror
                                </div>
                                <div class="mb-3">
                                    <label>{{ __('translate.description') }}</label>
                                    <textarea type="text" wire:model="description" class="form-control"></textarea>
                                    @error('description') <span class="text-danger">{{ __('translate.error_description') }}</span> @enderror
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn bg-gradient-success"><i class="fas fa-save" aria-hidden="true"></i> &nbsp; {{ __('translate.save') }}</button>
                </div>
            </form>

        </div>
    </div>
</div>

<!-- Update Banner Modal -->
<div wire:ignore.self class="modal fade" id="updateBannerModal" tabindex="-1" aria-labelledby="updateBannerModalLabel" aria-hidden="true" data-bs-keyboard="false" data-bs-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="updateBannerModalLabel">{{ __('translate.update') }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click="closeModal" aria-label="Close"><i class="fas fa-close text-secondary text-sm"></i></button>
            </div>
            <form wire:submit.prevent="updateBanner">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="mb-3">
                                <!-- <label>Image</label> -->
                                <div class="col-lg-12 ms-auto text-center mt-5 mt-lg-0">
                                    <div class="position-relative d-flex align-items-center justify-content-center h-100">
                                        <!-- <input type="file" wire:model="banner" class="form-control"> -->
                                        @if($banner && method_exists($banner, 'temporaryUrl'))
                                        <img class="w-50 position-relative z-index-2 pt-4" src="{{ $banner->temporaryUrl() }}" alt="">
                                        @elseif(is_string($bannerPath))
                                        {{-- Display the existing image --}}
                                        @if($bannerPath == 'No Image upload')
                                        <label for="file" class="custum-file-upload">
                                            <div class="icon">
                                                <svg viewBox="0 0 24 24" fill="" xmlns="http://www.w3.org/2000/svg">
                                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                                    <g id="SVGRepo_iconCarrier">
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M10 1C9.73478 1 9.48043 1.10536 9.29289 1.29289L3.29289 7.29289C3.10536 7.48043 3 7.73478 3 8V20C3 21.6569 4.34315 23 6 23H7C7.55228 23 8 22.5523 8 22C8 21.4477 7.55228 21 7 21H6C5.44772 21 5 20.5523 5 20V9H10C10.5523 10 11 9.55228 11 9V3H18C18.5523 18 19 3.44772 19 4V9C19 9.55228 19.4477 10 20 10C20.5523 10 21 9.55228 21 9V4C21 2.34315 19.6569 1 18 1H10ZM9 7H6.41421L9 4.41421V7ZM14 15.5C14 14.1193 15.1193 13 16.5 13C17.8807 13 19 14.1193 19 15.5V16V17H20C21.1046 17 22 17.8954 22 19C22 20.1046 21.1046 21 20 21H13C11.8954 21 11 20.1046 11 19C11 17.8954 11.8954 17 13 17H14V16V15.5ZM16.5 11C14.142 11 12.2076 12.8136 12.0156 15.122C10.2825 15.5606 9 17.1305 9 19C9 21.2091 10.7909 23 13 23H20C22.2091 23 24 21.2091 24 19C24 17.1305 22.7175 15.5606 20.9844 15.122C20.7924 12.8136 18.858 11 16.5 11Z" fill=""></path>
                                                    </g>
                                                </svg>
                                            </div>
                                            <div class="text">
                                                <span>{{ __('translate.click_to_upload') }}</span>
                                            </div>
                                            <input id="file" wire:model="banner" type="file" class="form-control">
                                        </label>
                                        @else
                                        <label for="file" class="custum-file-update ">
                                            <img class="w-100 position-relative z-index-2 pt-2" src="{{ asset('storage/'.$bannerPath) }}" alt="{{ __('translate.existing_image') }}">
                                            <input id="file" wire:model="banner" type="file" class="form-control">
                                        </label>

                                        @endif
                                        @else
                                        @endif
                                    </div>
                                </div>
                                @error('banner') <span id="text-danger" class="text-danger">{{ __('translate.error_image') }}</span> @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3 d-flex align-items-left">
                                <div class="form-check form-switch ps-0 ">
                                    <input wire:model="status" class="form-check-input ms-auto" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" id="flexSwitchCheckDefault">
                                    <label class="form-check-label mt-1 text-body text-truncate" for="flexSwitchCheckDefault">{{ $status == '1' ? __('translate.active'):__('translate.inactive') }}</label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label>{{ __('translate.description') }}</label>
                                <textarea type="text" wire:model="description" class="form-control"></textarea>
                                @error('description') <span class="text-danger">{{ __('translate.error_description') }}</span> @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label>{{ __('translate.order_number') }}</label>
                                    <input type="number" pattern="\d*" wire:model="order_number" class="form-control">
                                    @error('order_number') <span class="text-danger">{{ __('translate.error_order') }}</span> @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="isMobile">{{ __('translate.device_type') }}</label>
                                    <select class="custom-select custom-select-lg mb-3 w-100" wire:model="isMobile" id="isMobile">
                                        <option value="">{{ __('translate.select_one') }}</option>
                                        <option value="0">Desktop</option>
                                        <option value="1">Mobile</option>
                                    </select>
                                    {{-- Show the selected category --}}
                                    <!-- <p>Selected Category: {{ $isMobile }}</p> -->
                                    @error('isMobile') <span class="text-danger">{{ __('translate.error_devicetype') }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label>{{ __('translate.group') }}</label>
                                    <input type="text" wire:model="_group" class="form-control">
                                    @error('_group') <span class="text-danger">{{ __('translate.error_group') }}</span> @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-secondary" wire:click="closeModal" data-bs-dismiss="modal">Close</button> -->
                    <button type="submit" class="btn bg-gradient-info"><i class="fas fa-edit" aria-hidden="true"></i>&nbsp; {{ __('translate.update') }}</button>
                </div>
            </form>

        </div>
    </div>
</div>


<!-- Delete Link Modal -->
<div wire:ignore.self class="modal fade" id="deleteBannerModal" tabindex="-1" aria-labelledby="deleteBannerModalLabel" aria-hidden="true" data-bs-keyboard="false" data-bs-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="card h-100">
                <div class="card-header pb-0 p-3">
                    <div class="row">
                        <div class="col-md-8 d-flex align-items-center">
                            <h6 class="mb-0">{{ __('translate.remove') }}</h6>
                        </div>
                        <div class="col-md-4 text-right">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click="closeModal" aria-label="Close"><i class="fas fa-close text-secondary text-sm"></i></button>
                            <!-- <a href="javascript:;">
                                <i class="fas fa-close text-secondary text-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="" aria-hidden="true" data-bs-original-title="Edit Profile" aria-label="Edit Profile"></i><span class="sr-only">Edit Profile</span>
                            </a> -->
                        </div>
                    </div>
                </div>
                <div class="card-body p-3">
                    <form wire:submit.prevent="destroyBanner">
                        @if($bannerDetails)
                        <p class="text-sm">
                            {{ __('translate.delete_message') }}
                        </p>
                        <hr class="horizontal gray-light my-4">
                        <ul class="mb-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <li class="border-0 ps-0 pt-0 text-sm"><strong class="text-dark">{{ __('translate.name') }}:
                                        </strong> &nbsp; {{ $bannerDetails->name }}</li>
                                    <li class="border-0 ps-0 pt-0 text-sm"><strong class="text-dark">{{ __('translate.device_type') }}:
                                        </strong> &nbsp; {{ $bannerDetails->isMobile }}</li>
                                    <li class="border-0 ps-0 pt-0 text-sm"><strong class="text-dark">{{ __('translate.status') }}:
                                        </strong> &nbsp; {{ $bannerDetails->status == '1' ? __('translate.active'):__('translate.inactive') }}</li>
                                    <li class="border-0 ps-0 pt-0 text-sm"><strong class="text-dark">{{ __('translate.order_number') }}:
                                        </strong> &nbsp; {{ $bannerDetails->order_number }}</li>
                                    <li class="border-0 ps-0 pt-0 text-sm"><strong class="text-dark">{{ __('translate.description') }}:
                                        </strong> &nbsp; {{ $bannerDetails->description }}</li>
                                    <li class="border-0 ps-0 pt-0 text-sm"><strong class="text-dark">{{ __('translate.group') }}:
                                        </strong> &nbsp; {{ $bannerDetails->_group }}</li>
                                    <li class="border-0 ps-0 text-sm"><strong class="text-dark">{{ __('translate.image') }}:</strong>
                                        &nbsp; {{ $bannerDetails->image_path }}</li>
                                </div>
                                <div class="col-md-6">
                                    <li class="custum-file-update ">
                                        @if($bannerDetails->image_path)
                                        @if($bannerDetails->image_path == 'No Image upload')
                                        @else
                                        <img class="w-50 position-relative z-index-2 pt-4" src="{{ asset('storage/'.$bannerDetails->image_path) }}" alt="{{ __('translate.existing_image') }}">
                                        @endif
                                        @endif
                                    </li>
                                </div>
                            </div>
                        </ul>
                        <div class="modal-footer align-items-center">
                            <!-- <button type="submit" class="btn text-md cursor-pointer">
                                <i class="cursor-pointer fas fa-trash text-danger mr-3" aria-hidden="true"></i>Delete
                            </button> -->
                            <button class="btn bg-gradient-danger btn-md" type="submit"><i class="cursor-pointer fas fa-trash mr-3" aria-hidden="true"></i> {{ __('translate.delete') }}</button>
                        </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>