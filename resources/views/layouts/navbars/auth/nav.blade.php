<main class="main-content mt-1 border-radius-lg">
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 mb-5 shadow-none horizontal dark mt-0 border-radius-xl" id="navbarBlur" navbar-scroll="true">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                    <li class="breadcrumb-item text-md"><a class="opacity-5 text-dark" href="javascript:;">{{ __('translate.pages')}}</a>
                    </li>
                    <li class="breadcrumb-item text-sm text-dark active text-capitalize" aria-current="page">
                        {{ str_replace('-', ' ', Route::currentRouteName()) }}
                    </li>
                </ol>
            </nav>
            <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4 d-flex justify-content-end" id="navbar">
                <ul class="navbar-nav justify-content-end">
                    <li class="nav-item d-flex align-items-center">
                        <div class="row flex">
                            <div class="col-md-12 d-flex flex-row">
                                <div class="nav-item dropdown mr-3">
                                    <a class="nav-link" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ __('translate.language')}}</a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                        @foreach (Config::get('languages') as $lang => $language)
                                        @if ($lang != App::getLocale())<a class="dropdown-item" href="{{ route('lang.switch', $lang) }}">{{$language}}</a>@endif
                                        @endforeach
                                    </div>
                                </div>
                                <a href="javascript:;" class="nav-link text-body font-weight-bold px-0">
                                    <livewire:auth.logout/>
                                </a>
                            </div>

                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>