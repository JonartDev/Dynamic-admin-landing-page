<!-- Modal -->
<!-- Update Admin Modal -->
<div wire:ignore.self class="modal fade" id="updateAdminModal" tabindex="-1" aria-labelledby="updateAdminModalLabel" aria-hidden="true" data-bs-keyboard="false" data-bs-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="updateAdminModalLabel">{{ __('translate.update') }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click="closeModal" aria-label="Close"><i class="fas fa-close text-secondary text-sm"></i></button>
            </div>
            <form wire:submit.prevent="updateAdmin">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3 d-flex align-items-center">
                                <label>{{ __('translate.title') }}</label>
                                <input type="text" wire:model="title" placeholder="Admin title" class="form-control ml-3">
                                @error('title') <span id="text-danger" class="text-danger">{{ __('translate.error_title') }}</span> @enderror
                            </div>
                            <div class="mb-3 d-flex align-items-center">
                                <label>{{ __('translate.link') }}</label>
                                <input type="text" wire:model="link" placeholder="Admin link" class="form-control ml-3">
                                @error('link') <span id="text-danger" class="text-danger">{{ __('translate.error_link') }}</span> @enderror
                            </div>
                            <div class="mb-3">
                                <label>{{ __('translate.information') }}</label>
                                <textarea wire:model="info" class="form-control" id="about" rows="3" placeholder="Admin details"></textarea>
                                @error('info') <span id="text-danger" class="text-danger">{{ __('translate.error_info') }}</span> @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3 w-30">
                                <label for="logoFile" class="custum-file-update d-flex align-items-center">{{ __('translate.logo') }}
                                    @if($logo && method_exists($logo, 'temporaryUrl'))
                                    <img class="w-50 position-relative z-index-2 pt-2 zoom-in-out-box" style="width: 100px !important;" src="{{ $logo->temporaryUrl() }}" alt="">
                                    @elseif($logo == null)
                                    <label for="logoFile" class="custum-file-upload h-15">
                                        <div class="icon">
                                            <svg viewBox="0 0 24 24" fill="" xmlns="http://www.w3.org/2000/svg">
                                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                                <g id="SVGRepo_iconCarrier">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M10 1C9.73478 1 9.48043 1.10536 9.29289 1.29289L3.29289 7.29289C3.10536 7.48043 3 7.73478 3 8V20C3 21.6569 4.34315 23 6 23H7C7.55228 23 8 22.5523 8 22C8 21.4477 7.55228 21 7 21H6C5.44772 21 5 20.5523 5 20V9H10C10.5523 10 11 9.55228 11 9V3H18C18.5523 18 19 3.44772 19 4V9C19 9.55228 19.4477 10 20 10C20.5523 10 21 9.55228 21 9V4C21 2.34315 19.6569 1 18 1H10ZM9 7H6.41421L9 4.41421V7ZM14 15.5C14 14.1193 15.1193 13 16.5 13C17.8807 13 19 14.1193 19 15.5V16V17H20C21.1046 17 22 17.8954 22 19C22 20.1046 21.1046 21 20 21H13C11.8954 21 11 20.1046 11 19C11 17.8954 11.8954 17 13 17H14V16V15.5ZM16.5 11C14.142 11 12.2076 12.8136 12.0156 15.122C10.2825 15.5606 9 17.1305 9 19C9 21.2091 10.7909 23 13 23H20C22.2091 23 24 21.2091 24 19C24 17.1305 22.7175 15.5606 20.9844 15.122C20.7924 12.8136 18.858 11 16.5 11Z" fill=""></path>
                                                </g>
                                            </svg>
                                        </div>
                                        <!-- <input id="logoFile" wire:model="logo" type="file" class="form-control"> -->
                                    </label>
                                    @else
                                    <img class="w-100 position-relative z-index-2 pt-2 logo zoom-in-out-box" style="width: 100px !important;" src="{{ asset('storage/'.$admin->logo) }}" alt="{{ __('translate.existing_image') }}">
                                    @endif
                                    <input id="logoFile" wire:model="logo" type="file" class="form-control">
                                </label>
                            </div>
                            <div class="d-flex align-items-center">
                                <label for="webimage" class="custum-file-update ">
                                    @if($webimage && method_exists($webimage, 'temporaryUrl'))
                                    <img class="w-50 position-relative z-index-2 pt-4" src="{{ $webimage->temporaryUrl() }}" alt="">
                                    @elseif($webimage == null)
                                    <label for="webimage" class="custum-file-upload">
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
                                        <input id="file" wire:model="webimage" type="file" class="form-control">
                                    </label>
                                    @else
                                    <img class="w-100 position-relative z-index-2 pt-2" src="{{ asset('storage/'.$admin->webimage) }}" alt="{{ __('translate.existing_image') }}">
                                    @endif
                                    <input id="webimage" wire:model="webimage" type="file" class="form-control">
                                </label>
                            </div>
                        </div>
                        @error('logo') <span id="text-danger" class="text-danger">{{ __('translate.error_image') }}</span> @enderror
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