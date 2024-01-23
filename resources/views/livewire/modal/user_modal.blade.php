<!-- Modal -->
<div wire:ignore.self class="modal fade" id="addnewUsersModal" tabindex="-1" aria-labelledby="addnewUsersModalLabel" aria-hidden="true" data-bs-keyboard="false" data-bs-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content" style="width: 100% !important;">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="addnewUsersModalLabel">{{ __('translate.new') }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click="closeModal" aria-label="Close"><i class="fas fa-close text-secondary text-sm"></i></button>
            </div>
            <form wire:submit.prevent="saveUser">
                <div class="modal-body">
                    <div class="row">
                        <div class="mb-3">
                            <label>{{ __('translate.name') }}</label>
                            <input type="text" wire:model="name" class="form-control">
                            @error('name') <span class="text-danger">{{ __('translate.error_name') }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label>{{ __('translate.email') }}</label>
                            <input type="text" wire:model="email" class="form-control">
                            @error('email') <span class="text-danger">{{ __('translate.error_email') }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label>{{ __('translate.password') }}</label>
                            <input type="password" wire:model="password" class="form-control">
                            @error('password') <span class="text-danger">{{ __('translate.error_password') }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="role">{{ __('translate.role') }}</label>
                            <select class="custom-select custom-select-lg mb-3" wire:model="role" id="role">
                                <option value="">Select One</option>
                                <option value="1">Super admin</option>
                                <option value="2">Admin</option>
                            </select>
                            {{-- Show the selected category --}}
                            <!-- <p>Selected Category: {{ $role }}</p> -->
                            @error('role') <span class="text-danger">{{ __('translate.error_role') }}</span> @enderror
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
<!-- Update Links Modal -->
<div wire:ignore.self class="modal fade" id="updateUsersModal" tabindex="-1" aria-labelledby="updateUsersModalLabel" aria-hidden="true" data-bs-keyboard="false" data-bs-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="updateUsersModalLabel">{{ __('translate.update') }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click="closeModal" aria-label="Close"><i class="fas fa-close text-secondary text-sm"></i></button>
            </div>
            @if ($showSuccesNotification)
            <div wire:model="showSuccesNotification" class="mt-3 alert alert-primary alert-dismissible fade show" role="alert">
                <span class="alert-icon text-white"><i class="fa fa-hand-paper-o"></i></span>
                <span class="alert-text text-white">{{ __('translate.error_pwnotmatch') }}</span>
                <button wire:click="$set('showSuccesNotification', false)" type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                </button>
            </div>
            @endif

            <form wire:submit.prevent="resetPassword" action="#" method="POST" role="form text-left">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label>{{ __('translate.name') }}</label>
                                <input type="text" wire:model="name" class="form-control">
                                @error('name') <span id="text-danger" class="text-danger">{{ __('translate.error_name') }}</span> @enderror
                            </div>
                            <div class="mb-3">
                                <label>{{ __('translate.email') }}</label>
                                <input readonly type="text" wire:model="email" class="form-control">
                                @error('email') <span id="text-danger" class="text-danger">{{ __('translate.error_email') }}</span> @enderror
                            </div>
                            <div class="mb-3">
                                <label for="role">{{ __('translate.role') }}</label>
                                <select class="custom-select custom-select-lg mb-3 w-100" wire:model="role" id="role">
                                    <option value="">Select One</option>
                                    <option value="1">Super admin</option>
                                    <option value="2">Admin</option>
                                </select>
                                {{-- Show the selected category --}}
                                <!-- <p>Selected Category: {{ $role }}</p> -->
                                @error('role') <span class="text-danger">{{ __('translate.error_role') }}</span> @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label>{{ __('translate.password') }}</label>
                                <input type="password" wire:model="password" class="form-control">
                                @error('password') <span id="text-danger" class="text-danger">{{ __('translate.error_password') }}</span> @enderror
                            </div>
                            <div class="mb-3">
                                <label>{{ __('translate.confirmation_password') }}</label>
                                <input type="password" wire:model="passwordConfirmation" class="form-control">
                                @error('passwordConfirmation') <span id="text-danger" class="text-danger">{{ __('translate.error_confirmpassword') }}</span> @enderror
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


<!-- Delete User Modal -->
<div wire:ignore.self class="modal fade" id="deleteUsersModal" tabindex="-1" aria-labelledby="deleteUsersModalLabel" aria-hidden="true" data-bs-keyboard="false" data-bs-backdrop="static">
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
                    <form wire:submit.prevent="destroyUser">
                        @if($usersDetails)
                        <p class="text-sm">
                            {{ __('translate.delete_message') }}
                        </p>
                        <hr class="horizontal gray-light my-4">
                        <ul class="mb-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <li class="border-0 ps-0 pt-0 text-sm"><strong class="text-dark">{{ __('translate.name') }}:
                                        </strong> &nbsp; {{ $usersDetails->name }}</li>
                                    <li class="border-0 ps-0 text-sm"><strong class="text-dark">{{ __('translate.email') }}:</strong>
                                        &nbsp; {{ $usersDetails->email }}</li>
                                    <li class="border-0 ps-0 text-sm"><strong class="text-dark">{{ __('translate.role') }}:</strong>
                                        &nbsp; {{ $usersDetails->role }}</li>
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