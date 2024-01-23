<div class="main-content" id="mainList">
    <x-loading-indicator />
    <div class="row">
        @include('livewire.modal.link_modal')
        <div class="col-12">
            @if (session()->has('message'))
            <!-- <div class="alert alert-success p-2 mt-3 alert-dismissible fade show" role="alert" id="alertMessage">{{ session('message')}}</div> -->
            <!-- <div wire:model="showSuccesNotification" class="mt-3 alert alert-success alert-dismissible fade show" id="alertMessage" role="alert">
                <span class="alert-icon text-white"><i class="ni ni-like-2"></i></span>
                <span class="alert-text text-white">{{ session('message')}}</span>
                <button wire:click="$set('showSuccesNotification', false)" type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                </button>
            </div>
            <div class="check">
                <i class="far fa-check-circle color"></i> &nbsp; &nbsp;
                <span>Nailed It!</span>
            </div> -->
            @endif
            <div class="card mb-4 mx-4">
                <div class="card-header pb-0">
                    <div class="d-flex flex-row justify-content-between">
                        <div>
                            <h5 class="mb-0">{{ __('translate.list') }}</h5>
                        </div>

                        <button data-bs-toggle="modal" data-bs-backdrop="static" data-bs-keyboard="false" data-bs-target="#addnewLinksModal" class="btn bg-gradient-primary btn-sm mb-0" id="addnew" type="button">
                            +&nbsp; {{ __('translate.add') }}</button>
                        <!-- <button class="btn bg-gradient-primary btn-sm mb-0" id="addnew" type="button">+&nbsp; Add New</button> -->
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="row ">
                        <div class="col-md-8"></div>
                        <div class="col-md-4 p-2 pr-4">
                            <input class="inputSearch" type="text" wire:model="search" placeholder="{{ __('translate.search')}}..." id="email" name="email" placeholder="Email" aria-label="Email" aria-describedby="email-addon">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-search" aria-hidden="true"></i>
                            </span>
                        </div>
                    </div>
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        {{ __('translate.order_number') }}
                                    </th>
                                    <!-- <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Photo
                                    </th> -->
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        {{ __('translate.group') }}
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        {{ __('translate.name') }}
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        {{ __('translate.link') }}
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        {{ __('translate.image_path') }}
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        {{ __('translate.status') }}
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        {{ __('translate.action') }}
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($linksData) > 0)
                                @foreach($linksData as $link)
                                <tr>
                                    <td class="ps-4">
                                        <p class="text-xs font-weight-bold mb-0">{{$link->order_number}}</p>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">{{ $link->_group }}</p>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">{{$link->name}}</p>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">{{ $link->links }}</p>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">
                                            @if($link->image_path === 'No Image upload')
                                            {{$link->image_path}}
                                            @else
                                            <img class="w-50" src=" {{ asset('storage/'.$link->image_path) }}" alt="">
                                            @endif
                                        </p>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0" style="color: <?php echo $link->status == '1' ? 'green' : 'red'; ?>">
                                            {{ $link->status == '1' ? __('translate.active') : __('translate.inactive') }}
                                        </p>
                                    </td>
                                    <td class="text-center">
                                        <button type="button" class="mx-3" data-bs-toggle="modal" data-bs-target="#updateLinksModal" wire:click="editLink({{$link->id}})">
                                            <i class="fas fa-edit text-secondary"></i>
                                        </button>
                                        <span>
                                            <button type="button" class="mx-3" data-bs-toggle="modal" data-bs-target="#deleteLinksModal" wire:click="deleteLink({{$link->id}})">
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
                    </div>
                    <div class="p-1">
                        {{ $linksPaginator->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>