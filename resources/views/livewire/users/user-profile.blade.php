<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
    <x-loading-indicator />
    <div class="row">
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12 col-xl-2">
                </div>
                <div class="col-12 col-xl-8">
                    <div class="card">
                        <div class="card-header pb-0 px-3">
                            <h6 class="mb-0">{{ __('translate.i_profile') }}</h6>
                        </div>
                        <div class="card-body pt-4 p-3">
                            @if ($showSuccesNotification)
                            <div wire:model="showSuccesNotification" class="mt-3 alert alert-primary alert-dismissible fade show" role="alert">
                                <span class="alert-icon text-white"><i class="ni ni-like-2"></i></span>
                                <span class="alert-text text-white">{{ __('translate.profile_update_message') }}</span>
                                <button wire:click="$set('showSuccesNotification', false)" type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                </button>
                            </div>
                            @endif

                            <form wire:submit.prevent="save" action="#" method="POST" role="form text-left">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="user-name" class="form-control-label">{{ __('translate.name') }}</label>
                                            <div class="@error('user.name')border border-danger rounded-3 @enderror">
                                                <input wire:model="user.name" class="form-control" type="text" placeholder="{{ __('translate.name') }}" id="user-name">
                                            </div>
                                            @error('user.name') <div class="text-danger">{{ $message }}</div> @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="user-email" class="form-control-label">{{ __('translate.email') }}</label>
                                            <div class="@error('user.email')border border-danger rounded-3 @enderror">
                                                <input wire:model="user.email" class="form-control" type="email" placeholder="@example.com" id="user-email">
                                            </div>
                                            @error('user.email') <div class="text-danger">{{ $message }}</div> @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="user.phone" class="form-control-label">{{ __('translate.phone') }}</label>
                                            <div class="@error('user.phone')border border-danger rounded-3 @enderror">
                                                <input wire:model="user.phone" class="form-control" pattern="\d*"  type="number" placeholder="40770888444" id="phone">
                                            </div>
                                            @error('user.phone') <div class="text-danger">{{ $message }}</div> @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="user.location" class="form-control-label">{{ __('translate.location') }}</label>
                                            <div class="@error('user.location') border border-danger rounded-3 @enderror">
                                                <input wire:model="user.location" class="form-control" type="text" placeholder="Location" id="name">
                                            </div>
                                            @error('user.location') <div class="text-danger">{{ $message }}</div> @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="about">{{ __('translate.about_me') }}</label>
                                    <div class="@error('user.about')border border-danger rounded-3 @enderror">
                                        <textarea wire:model="user.about" class="form-control" id="about" rows="3" placeholder="Say something about yourself"></textarea>
                                    </div>
                                    @error('user.about') <div class="text-danger">{{ $message }}</div> @enderror
                                </div>
                                <div class="d-flex justify-content-end">
                                    <button type="submit" class="btn bg-gradient-dark btn-md mt-4 mb-4">{{ __('translate.save_changes') }}</button>
                                </div>
                            </form>

                        </div>
                    </div>
                    <div class="col-12 col-xl-2">
                    </div>
                </div>
            </div>
        </div>
</main>