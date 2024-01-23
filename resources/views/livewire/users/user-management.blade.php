<div class="main-content">
    @include('livewire.modal.user_modal')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4 mx-4">
                <div class="card-header pb-0">
                    <div class="d-flex flex-row justify-content-between">
                        <div>
                            <h5 class="mb-0">{{ __('translate.all_users') }}</h5>
                        </div>
                        <button data-bs-toggle="modal" data-bs-backdrop="static" data-bs-keyboard="false" data-bs-target="#addnewUsersModal" class="btn bg-gradient-primary btn-sm mb-0" id="addnew" type="button">
                            +&nbsp; {{ __('translate.new_user') }}</button>
                        <!-- <a href="#" class="btn bg-gradient-primary btn-sm mb-0" type="button">+&nbsp; New User</a> -->
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <div class="row">
                            <div class="col-md-8"></div>
                            <div class="col-md-4 p-2 pr-4">
                                <input class="inputSearch" type="text" wire:model="search" placeholder="{{ __('translate.search')}}..." id="email" name="email" placeholder="Email" aria-label="Email" aria-describedby="email-addon">
                                <span class="focus-input100"></span>
                                <span class="symbol-input100">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                </span>
                            </div>
                        </div>
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        {{ __('translate.id') }}
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        {{ __('translate.name') }}
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        {{ __('translate.email') }}
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        {{ __('translate.role') }}
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        {{ __('translate.action') }}
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(isset($usersData) && count($usersData) > 0)
                                @foreach($usersData as $user)
                                <tr>
                                    <td class="ps-4">
                                        <p class="text-xs font-weight-bold mb-0">{{$user->id}}</p>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">{{$user->name}}</p>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">{{$user->email}}</p>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">{{$user->role}}</p>
                                    </td>
                                    <td class="text-center">
                                        <button type="button" class="mx-3" data-bs-toggle="modal" data-bs-target="#updateUsersModal" wire:click="editUser({{$user->id}})">
                                            <i class="fas fa-user-edit text-secondary"></i>
                                        </button>
                                        <span>
                                            <button type="button" class="mx-3" data-bs-toggle="modal" data-bs-target="#deleteUsersModal" wire:click="deleteUser({{$user->id}})">
                                                <i class="cursor-pointer fas fa-trash text-danger"></i>
                                            </button>
                                        </span>
                                    </td>
                                </tr>

                                @endforeach
                                @else
                                <tr class="text-center">
                                    <td colspan="5">{{ __('translate.norecordfound') }}</td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                        <div class="p-1">
                            {{ $usersPaginator->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>