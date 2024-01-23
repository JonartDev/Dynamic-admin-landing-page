<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="{{ asset('storage/'.($admin->logo ?? '')) }}">
    <title>
        {{ __('translate.admin_dashboard') }}
    </title>
    <!-- Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="../assets/css/soft-ui-dashboard.css?v=1" rel="stylesheet" />
    <!-- Alpine -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

    <!-- LOGIN -->
    <!-- <link rel="icon" type="image/png" href="images/icons/favicon.ico" /> -->
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link href="../assets/css/alert.css" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    @livewireStyles

</head>

<body class="g-sidenav-show bg-gray-100">
    <x-loading-indicator />

    <div id="loader-container">
        <div class="loader-container"></div>
    </div>


    {{ $slot }}

    <!--   Core JS Files   -->
    <script src="assets/js/core/popper.min.js"></script>
    <script src="assets/js/core/bootstrap.min.js"></script>
    <script src="assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="assets/js/soft-ui-dashboard.js"></script>

    <!-- LOGIN -->
    <!--===============================================================================================-->
    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/bootstrap/js/popper.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/tilt/tilt.jquery.min.js"></script>
    <script>
        $('.js-tilt').tilt({
            scale: 1.1
        })
    </script>
    <!--===============================================================================================-->
    <script src="js/main.js"></script>
    <script src="assets/js/alert.js"></script>

    <script>
        function showAddSuccessMessage() {
            FancyAlerts.show({
                msg: "{{ __('translate.link_add_message')}}"
            });
        }

        function showUpdateSuccessMessage() {
            FancyAlerts.show({
                msg: "{{ __('translate.link_update_message')}}",
                type: "info",
            });
        }

        function showDeleteSuccessMessage() {
            FancyAlerts.show({
                msg: "{{ __('translate.link_delete_message')}}",
                type: "error",
            });
        }

        function showAdminUpdateMessage() {
            FancyAlerts.show({
                msg: "{{ __('translate.admin_success_update')}}"
            });
        }

        $('.btn-close').click(function() {
            $('#addnewLinksModal').off('hidden.bs.modal', showAddSuccessMessage);
            $('#updateLinksModal').off('hidden.bs.modal', showUpdateSuccessMessage);
            $('#deleteLinksModal').off('hidden.bs.modal', showDeleteSuccessMessage);
            $('#updateAdminModal').off('hidden.bs.modal', showAdminUpdateMessage);
            $('#addnewBannerModal').off('hidden.bs.modal', showAddSuccessMessage);
            $('#updateBannerModal').off('hidden.bs.modal', showUpdateSuccessMessage);
            $('#deleteBannerModal').off('hidden.bs.modal', showDeleteSuccessMessage);
            $('#addnewButtonsModal').off('hidden.bs.modal', showAddSuccessMessage);
            $('#updateButtonsModal').off('hidden.bs.modal', showUpdateSuccessMessage);
            $('#deleteButtonsModal').off('hidden.bs.modal', showDeleteSuccessMessage);


            $('#addnewUsersModal').off('hidden.bs.modal', showAddSuccessMessage);
            $('#updateUsersModal').off('hidden.bs.modal', showUpdateSuccessMessage);
            $('#deleteusersModal').off('hidden.bs.modal', showDeleteSuccessMessage);
        });

        window.addEventListener('close-modal', event => {
            // Remove the event listeners when closing the modal
            $('#addnewLinksModal').one('hidden.bs.modal', showAddSuccessMessage);
            $('#updateLinksModal').one('hidden.bs.modal', showUpdateSuccessMessage);
            $('#deleteLinksModal').one('hidden.bs.modal', showDeleteSuccessMessage);
            $('#updateAdminModal').one('hidden.bs.modal', showAdminUpdateMessage);
            $('#addnewBannerModal').one('hidden.bs.modal', showAddSuccessMessage);
            $('#updateBannerModal').one('hidden.bs.modal', showUpdateSuccessMessage);
            $('#deleteBannerModal').one('hidden.bs.modal', showDeleteSuccessMessage);

            $('#addnewButtonsModal').one('hidden.bs.modal', showAddSuccessMessage);
            $('#updateButtonsModal').one('hidden.bs.modal', showUpdateSuccessMessage);
            $('#deleteButtonsModal').one('hidden.bs.modal', showDeleteSuccessMessage);

            $('#addnewUsersModal').one('hidden.bs.modal', showAddSuccessMessage);
            $('#updateUsersModal').one('hidden.bs.modal', showUpdateSuccessMessage);
            $('#deleteUsersModal').one('hidden.bs.modal', showDeleteSuccessMessage);


            // Dispatch the 'hidden.bs.modal' event when closing the modal
            $('#addnewLinksModal').modal('hide');
            $('#updateLinksModal').modal('hide');
            $('#deleteLinksModal').modal('hide');
            $('#updateAdminModal').modal('hide');
            $('#addnewBannerModal').modal('hide');
            $('#updateBannerModal').modal('hide');
            $('#deleteBannerModal').modal('hide');

            $('#addnewButtonsModal').modal('hide');
            $('#updateButtonsModal').modal('hide');
            $('#deleteButtonsModal').modal('hide');

            $('#addnewUsersModal').modal('hide');
            $('#updateUsersModal').modal('hide');
            $('#deleteUsersModal').modal('hide');
            setTimeout(function() {
                // Use jQuery to fade out the element with a duration of 500 milliseconds
                $('#alertMessage').fadeOut(500);
            }, 3000); // 3000 milliseconds (3 seconds)
        })
    </script>
    <script>
        $(function() {
            $('.toggle-class').change(function() {
                var status = $(this).prop('checked') == true ? 1 : 0;
                var sidebar_id = $(this).data('id');

                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: '/changeStatus',
                    data: {
                        'status': status,
                        'sidebar_id': sidebar_id
                    },
                    success: function(data) {
                        // Convert the response to a string explicitly
                        var responseString = (data['success']);
                        // Check if the response contains the success message
                        if (responseString) {
                            showAdminUpdateMessage()
                            // Reload the page after 3 seconds
                            setTimeout(function() {
                                location.reload();
                            }, 3000);
                        } else {
                            console.log('Unexpected response:', responseString);
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.error('Ajax request failed:', textStatus, errorThrown);
                    }
                });
            })

        })
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Show the loader initially
            document.getElementById("loader-container").style.display = "flex";

            // Hide the loader when the page is fully loaded
            window.addEventListener("load", function() {
                document.getElementById("loader-container").style.display = "none";
            });
        });

        let idleTime = 0;

        $(document).ready(function() {
            // Increment idle time every minute
            setInterval(timerIncrement, 60000);

            // Reset idle time on any activity
            $(this).mousemove(function(e) {
                idleTime = 0;
            });
            $(this).keypress(function(e) {
                idleTime = 0;
            });
        });

        function timerIncrement() {
            idleTime = idleTime + 1;
            if (idleTime >= 5) { // 30 minutes of inactivity
                console.log('timeout', idleTime);
                Livewire.emit('logout');
            }
        }
    </script>


    @livewireScripts
</body>

</html>