<div class="main-content" id="mainList">
    <x-loading-indicator />
    <div class="row">
        @include('livewire.modal.button_modal')
        <div class="col-12">
            @if (session()->has('message'))
            @endif
            <div class="card mb-4 mx-4">
                <div class="card-header pb-0">
                    <div class="d-flex flex-row justify-content-between">
                        <div>
                            <h5 class="mb-0">{{ __('translate.list') }}</h5>
                        </div>

                        <button data-bs-toggle="modal" data-bs-backdrop="static" data-bs-keyboard="false" data-bs-target="#addnewButtonsModal" class="btn bg-gradient-primary btn-sm mb-0" id="addnew" type="button">
                            +&nbsp; {{ __('translate.add') }}</button>
                        <!-- <button class="btn bg-gradient-primary btn-sm mb-0" id="addnew" type="button">+&nbsp; Add New</button> -->

                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
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
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0" id="myTable">
                            <thead>
                                <tr>
                                    <th onclick="sortTable(0)" class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        {{ __('translate.order_number') }}
                                    </th>
                                    <th onclick="sortTable(1)" class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        {{ __('translate.group') }}
                                    </th>
                                    <!-- <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Photo
                                    </th> -->
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
                                @if(count($buttonsData) > 0)
                                @foreach($buttonsData as $button)
                                <tr>
                                    <td class="ps-4">
                                        <p class="text-xs font-weight-bold mb-0">{{$button->order_number}}</p>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">{{ $button->_group }}</p>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">{{$button->name}}</p>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">{{ $button->links }}</p>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">
                                            @if($button->image_path === 'No Image upload')
                                            {{$button->image_path}}
                                            @else
                                            <img class="w-50 " src=" {{ asset('storage/'.$button->image_path) }}" alt="">
                                            @endif
                                        </p>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0" style="color: <?php echo $button->status == '1' ? 'green' : 'red'; ?>">
                                            {{ $button->status == '1' ? __('translate.active') : __('translate.inactive') }}
                                        </p>
                                    </td>
                                    <td class="text-center">
                                        <button type="button" class="mx-3" data-bs-toggle="modal" data-bs-target="#updateButtonsModal" wire:click="editButton({{$button->id}})">
                                            <i class="fas fa-edit text-secondary"></i>
                                        </button>
                                        <span>
                                            <button type="button" class="mx-3" data-bs-toggle="modal" data-bs-target="#deleteButtonsModal" wire:click="deleteButton({{$button->id}})">
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
                        {{ $buttonsPaginator }}
                    </div>

                    <script>
                        function sortTable(n) {
                            var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
                            table = document.getElementById("myTable");
                            switching = true;
                            dir = "asc";

                            while (switching) {
                                switching = false;
                                rows = table.rows;

                                for (i = 1; i < (rows.length - 1); i++) {
                                    shouldSwitch = false;
                                    x = rows[i].getElementsByTagName("TD")[n];
                                    y = rows[i + 1].getElementsByTagName("TD")[n];

                                    if (dir == "asc") {
                                        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                                            shouldSwitch = true;
                                            break;
                                        }
                                    } else if (dir == "desc") {
                                        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
                                            shouldSwitch = true;
                                            break;
                                        }
                                    }
                                }

                                if (shouldSwitch) {
                                    rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                                    switching = true;
                                    switchcount++;
                                } else {
                                    if (switchcount == 0 && dir == "asc") {
                                        dir = "desc";
                                        switching = true;
                                    }
                                }
                            }
                        }

                        // Usage of sortTable function
                        sortTable(0);
                    </script>

                </div>
            </div>
        </div>
    </div>
</div>