<section>
    <x-loading-indicator />
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-pic js-tilt" data-tilt>
                    @if(isset($admin->logo))
                    <img src="{{ asset('storage/'.($admin->logo ?? '')) }}" alt="IMG">
                    @else
                    <img src="{{ asset('images/img-01.png') }}" alt="IMG">
                    @endif
                </div>

                <form wire:submit.prevent="login" action="#" method="POST" role="form text-left" class="login100-form validate-form">
                    <span class="login100-form-title">
                        {{ $admin->title ?? ''}}
                    </span>
                    <span>
                        @error('email') <div class="text-danger">{{ $message }}</div> @enderror
                    </span>
                    <div class=" @error('email')border border-danger rounded-3 @enderror wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                        <input class="input100" type="email" wire:model="email" id="email" name="email" placeholder="Email" aria-label="Email" aria-describedby="email-addon">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="@error('password')border border-danger rounded-3 @enderror wrap-input100 validate-input" data-validate="Password is required">
                        <input class="input100" type="password" wire:model="password" id="password" name="password" placeholder="Password" aria-label="Password" aria-describedby="password-addon">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="container-login100-form-btn">
                        <button type="submit" class="login100-form-btn">
                            {{ __('translate.login') }}
                        </button>
                    </div>

                    <div class="text-center p-t-12">
                        <!-- <span class="txt1">
                            Forgot
                        </span>
                        <a class="txt2" href="#">
                            Username / Password?
                        </a> -->
                    </div>

                    <div class="text-center p-t-136">
                        <!-- <a class="txt2" href="#">
                            Create your Account
                            <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                        </a>
                    </div> -->
                </form>
            </div>
        </div>
    </div>
</section>