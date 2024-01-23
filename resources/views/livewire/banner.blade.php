<div class="main-content" id="mainList">
    <x-loading-indicator />
    <div class="row">
        @include('livewire.modal.banner_modal')
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0 p-3">
                    <div class="row">
                        <div class="col-md-8">
                            <h6 class="mb-1">{{ __('translate.banner') }}</h6>
                            <p class="text-sm">{{ __('translate.banner_details') }}</p>
                        </div>
                        <div class="col-md-4 p-2 pr-4">
                            <input class="inputSearch" type="text" wire:model="search" placeholder="{{ __('translate.search')}}..." id="email" name="email" placeholder="Email" aria-label="Email" aria-describedby="email-addon">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-search" aria-hidden="true"></i>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="card-body p-3">
                    <div class="row">
                        @if(count($bannerData) > 0)
                        @foreach($bannerData as $banner)
                        <div class="col-xl-3 col-md-6 mb-xl-0 mb-4 mt-2">
                            <div class="card card-blog card-plain">
                                <div class="position-relative align-items-center">
                                    <a class="d-block shadow-xl border-radius-xl">
                                        <img src="{{ asset('storage/'.$banner->image_path) }}" alt="img-blur-shadow" class="img-fluid shadow border-radius-xl">
                                    </a>
                                </div>
                                <div class="card-body px-1 pb-0">
                                    <p class="text-gradient text-dark mb-2 text-sm">{{ __('translate.banner') }} #{{ $banner->order_number ? $banner->order_number :0 }}</p>
                                    <div href="javascript:;">
                                        <h5>
                                            {{$banner->isMobile == 1 ? __('translate.mobile') : __('translate.desktop')}}
                                        </h5>
                                    </div>
                                    <p class="mb-4 text-sm" style="color: <?php echo $banner->status == '1' ? 'green' : 'red'; ?>">
                                        {{ $banner->status == '1' ? __('translate.active') : __('translate.inactive') }}
                                    </p>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <button type="button" data-bs-toggle="modal" data-bs-target="#updateBannerModal" wire:click="editBanner({{$banner->id}})" class="btn btn-outline-primary btn-sm mb-0">{{ __('translate.v_banner') }}
                                        </button>
                                        <div class="avatar-group mt-2">
                                            <button href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="modal" data-bs-target="#deleteBannerModal" wire:click="deleteBanner({{$banner->id}})">
                                                <i class="cursor-pointer fas fa-trash text-danger"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @else

                        <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">
                            <div class="card h-100 card-plain border">
                                <div class="card-body d-flex flex-column justify-content-center text-center">
                                    <button data-bs-toggle="modal" data-bs-backdrop="static" data-bs-keyboard="false" data-bs-target="#addnewBannerModal">
                                        <i class="fa fa-minus text-secondary mb-3" aria-hidden="true"></i>
                                        <h5 class=" text-secondary">{{ __('translate.norecordfound') }}</h5>
                                    </button>
                                </div>
                            </div>
                        </div>
                        @endif
                        <div class="col-xl-3 col-md-6 mb-xl-0 mb-4 mt-2">
                            <div class="card h-100 card-plain border">
                                <div class="card-body d-flex flex-column justify-content-center text-center">
                                    <button data-bs-toggle="modal" data-bs-backdrop="static" data-bs-keyboard="false" data-bs-target="#addnewBannerModal">
                                        <i class="fa fa-plus text-secondary mb-3" aria-hidden="true"></i>
                                        <h5 class=" text-secondary">{{ __('translate.new_banner') }} </h5>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="p-1">
                    {{ $bannerDatasPaginator->links() }}
                </div>
            </div>
        </div>

    </div>
</div>