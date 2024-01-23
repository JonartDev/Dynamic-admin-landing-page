<div>
    <x-loading-indicator />
    <i class="fa fa-user me-sm-1 {{ in_array(request()->route()->getName(),['profile', 'my-profile']) ? 'text-white' : '' }}"></i>
    <span class="d-sm-inline d-none {{ in_array(request()->route()->getName(),['profile', 'my-profile']) ? 'text-white' : '' }}" onclick="confirmLogout()">{{ __('translate.signout') }}</span>
</div>

<script>
    function confirmLogout() {
        // Use SweetAlert for confirmation
        Swal.fire({
            title: 'Sign out',
            text: 'Are you sure you would like to sign out of your account?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Sign out',
            cancelButtonText: 'Cancel',
        }).then((result) => {
            if (result.isConfirmed) {
                handleLogout();
            }
        });
    }

    function handleLogout() {
        // Implement your logout logic here
        // alert('Performing logout...');

        Livewire.emit('logout');
        // You can replace the alert with your actual logout logic
    }
</script>