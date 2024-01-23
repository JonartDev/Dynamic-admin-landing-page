<!-- information Modal -->
<div wire:ignore.self class="modal fade" style="transform: translate(10%,0);" id="infoModal" tabindex="-1" aria-labelledby="infoModalLabel" aria-hidden="true" data-bs-keyboard="false" data-bs-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">

            @switch($sidebar_id)
            @case(1)
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="infoModalLabel">
                    {{ __('translate.banner') }}
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click="closeModal" aria-label="Close"><i class="fas fa-close text-secondary text-sm"></i></button>
            </div>
            <div class="modal-body ml-3 pr-3">
                <div class="row">
                    <ul class="list-group ">
                        <li class="list-group-item border-1 ps-0 pt-0 text-sm mb-1">
                            <h4 class="p-2 ">
                                {{ __('translate.table') }}
                            </h4>
                            <div class="row m-2">
                                <div class="col-md-5">
                                    <strong class="text-dark">
                                        {{ __('translate.variable') }}:</strong> &nbsp; $banner
                                    <br>
                                    <strong class="text-dark">
                                        {{ __('translate.condition') }}:</strong> $_group
                                </div>
                                <div class="col-md-7">
                                    <strong class="text-dark">
                                        {{ __('translate.sample') }}:</strong> &nbsp;
                                    @include('components.pre_table')

                                </div>
                            </div>
                        </li>
                        <li class="list-group-item border-1 ps-0 pt-0 text-sm mb-1">
                            <h4 class="p-2 ">
                                {{ __('translate.ajax') }}
                            </h4>
                            <div class="row m-2">
                                <div class="col-md-5">
                                    <strong class="text-dark">
                                        {{ __('translate.route_name') }}:</strong> &nbsp;get.banner
                                    <br>
                                    <strong class="text-dark">
                                        {{ __('translate.condition') }}:</strong> &nbsp; isMobile
                                </div>
                                <div class="col-md-7">
                                    <strong class="text-dark">
                                        {{ __('translate.sample') }}:</strong> &nbsp;
                                    <!-- <img src="images/ajax_links.jpg" class="position-relative z-index-2 w-90 h-70" alt=""> -->
                                    @include('components.pre_ajax')
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            @break

            @case(2)
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="infoModalLabel">
                    {{ __('translate.links_management') }}
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click="closeModal" aria-label="Close"><i class="fas fa-close text-secondary text-sm"></i></button>
            </div>
            <div class="modal-body ml-3 pr-3">
                <div class="row">
                    <ul class="list-group ">
                        <li class="list-group-item border-1 ps-0 pt-0 text-sm mb-1">
                            <h4 class="p-2 ">
                                {{ __('translate.table') }}
                            </h4>
                            <div class="row m-2">
                                <div class="col-md-5">
                                    <strong class="text-dark">
                                        {{ __('translate.variable') }}:</strong> &nbsp; $links
                                    <br>
                                    <strong class="text-dark">
                                        {{ __('translate.condition') }}:</strong> $_group
                                </div>
                                <div class="col-md-7">
                                    <strong class="text-dark">
                                        {{ __('translate.sample') }}:</strong> &nbsp;
                                    @include('components.pre_table')

                                </div>
                            </div>
                        </li>
                        <li class="list-group-item border-1 ps-0 pt-0 text-sm mb-1">
                            <h4 class="p-2 ">
                                {{ __('translate.ajax') }}
                            </h4>
                            <div class="row m-2">
                                <div class="col-md-5">
                                    <strong class="text-dark">
                                        {{ __('translate.route_name') }}:</strong> &nbsp;get.link
                                    <br>
                                    <strong class="text-dark">
                                        {{ __('translate.condition') }}:</strong> &nbsp; isMobile
                                </div>
                                <div class="col-md-7">
                                    <strong class="text-dark">
                                        {{ __('translate.sample') }}:</strong> &nbsp;
                                    <!-- <img src="images/ajax_links.jpg" class="position-relative z-index-2 w-90 h-70" alt=""> -->
                                    @include('components.pre_ajax')
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            @break

            @case(3)
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="infoModalLabel">
                    {{ __('translate.buttons') }}
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click="closeModal" aria-label="Close"><i class="fas fa-close text-secondary text-sm"></i></button>
            </div>
            <div class="modal-body ml-3 pr-3">
                <div class="row">
                    <ul class="list-group ">
                        <li class="list-group-item border-1 ps-0 pt-0 text-sm mb-1">
                            <h4 class="p-2 ">
                                {{ __('translate.table') }}
                            </h4>
                            <div class="row m-2">
                                <div class="col-md-5">
                                    <strong class="text-dark">
                                        {{ __('translate.variable') }}:</strong> &nbsp; $buttons
                                    <br>
                                    <strong class="text-dark">
                                        {{ __('translate.condition') }}:</strong> $_group
                                </div>
                                <div class="col-md-7">
                                    <strong class="text-dark">
                                        {{ __('translate.sample') }}:</strong> &nbsp;
                                    @include('components.pre_table')

                                </div>
                            </div>
                        </li>
                        <li class="list-group-item border-1 ps-0 pt-0 text-sm mb-1">
                            <h4 class="p-2 ">
                                {{ __('translate.ajax') }}
                            </h4>
                            <div class="row m-2">
                                <div class="col-md-5">
                                    <strong class="text-dark">
                                        {{ __('translate.route_name') }}:</strong> &nbsp;get.button
                                    <br>
                                    <strong class="text-dark">
                                        {{ __('translate.condition') }}:</strong> &nbsp; isMobile
                                </div>
                                <div class="col-md-7">
                                    <strong class="text-dark">
                                        {{ __('translate.sample') }}:</strong> &nbsp;
                                    <!-- <img src="images/ajax_links.jpg" class="position-relative z-index-2 w-90 h-70" alt=""> -->
                                    @include('components.pre_ajax')
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            @break

            @default
            {{ __('translate.buttons') }}
            @endswitch

        </div>
    </div>
</div>