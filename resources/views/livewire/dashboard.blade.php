 <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
   <div class="container-fluid py-4">
     <div class="row">
       <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
         <div class="card">
           <div class="card-body p-3">
             <div class="row">
               <div class="col-8">
                 <div class="numbers">
                   <p class="text-sm mb-0 text-capitalize font-weight-bold">{{ __('translate.total_links') }}</p>
                   <h5 class="font-weight-bolder mb-0">

                     <span class="text-success text-sm font-weight-bolder">{{ $specs['Total_Links'] }}</span>
                   </h5>
                 </div>
               </div>
               <div class="col-4 text-end">
                 <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                   <i class="fa fa-link fa-2x  text-lg opacity-10" aria-hidden="true"></i>
                 </div>
               </div>
             </div>
           </div>
         </div>
       </div>
       <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
         <div class="card">
           <div class="card-body p-3">
             <div class="row">
               <div class="col-8">
                 <div class="numbers">
                   <p class="text-sm mb-0 text-capitalize font-weight-bold">{{ __('translate.admin') }}</p>
                   <h5 class="font-weight-bolder mb-0">
                     <span class="text-success text-sm font-weight-bolder">{{ $specs['admin'] }}</span>
                   </h5>
                 </div>
               </div>
               <div class="col-4 text-end">
                 <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                   <!-- <i class="ni ni-world-2 text-lg opacity-10" aria-hidden="true"></i> -->
                   <i class="fa fa-user fa-2x text-lg opacity-10" aria-hidden="true"></i>
                 </div>
               </div>
             </div>
           </div>
         </div>
       </div>
       <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
         <div class="card">
           <div class="card-body p-3">
             <div class="row">
               <div class="col-8">
                 <div class="numbers">
                   <p class="text-sm mb-0 text-capitalize font-weight-bold">{{ __('translate.time') }}</p>
                   <h5 class="font-weight-bolder mb-0">
                     <span class="text-danger time text-sm font-weight-bolder"></span>
                   </h5>
                 </div>
               </div>
               <div class="col-4 text-end">
                 <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                   <i class="ni ni-watch-time text-lg opacity-10" aria-hidden="true"></i>
                 </div>
               </div>
             </div>
           </div>
         </div>
       </div>
       <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
         <div class="card">
           <div class="card-body p-3">
             <div class="row">
               <div class="col-8">
                 <div class="numbers">
                   <p class="text-sm mb-0 text-capitalize font-weight-bold">{{ __('translate.date') }}</p>
                   <h5 class="font-weight-bolder mb-0">
                     <span class="text-success text-sm date font-weight-bolder"></span>
                   </h5>
                 </div>
               </div>
               <div class="col-4 text-end">
                 <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                   <!-- <i class="ni ni-world-2 text-lg opacity-10" aria-hidden="true"></i> -->
                   <i class="ni ni-calendar-grid-58 fa-2x text-lg opacity-10" aria-hidden="true"></i>
                 </div>
               </div>
             </div>
           </div>
         </div>
       </div>
     </div>

     <div class="row">
       <div class="col-md-7 mt-4">
         <div class="card">
           <div class="card-header pb-0 px-3">
             <h6 class="mb-0">{{ __('translate.webpage') }}</h6>
           </div>
           <div class="card-body">
             <a href="../" target="_blank">
               <img src="{{ asset('storage/'.($admin->webimage ?? '')) }}" alt="" style="background-size: contain; width:100%;">
             </a>
           </div>
         </div>
       </div>

       <div class="col-md-5 mt-4">
         <div class="card h-100 mb-4">
           <div class="card-header pb-0 px-3">
             <div class="row">
               <div class="col-md-6">
                 <h6 class="mb-0">{{ __('translate.landing_page_details') }}</h6>
               </div>
             </div>
           </div>
           <div class="card-body pt-4 p-3">
             <ul class="list-group">
               <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                 <div class="d-flex align-items-center">
                   <button class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i class="fa fa-desktop fa-fw" aria-hidden="true"></i></button>
                   <div class="d-flex flex-column">
                     <h6 class="mb-1 text-dark text-sm">PHP {{ __('translate.version') }}</h6>
                     <!-- <span class="text-xs">{{ $specs['php_v'] }}</span> -->
                   </div>
                 </div>
                 <div class="d-flex align-items-center text-success text-gradient text-sm font-weight-bold">
                   {{ $specs['php_v'] }}
                 </div>
               </li>
               <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                 <div class="d-flex align-items-center">
                   <button class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i class="ni ni-world-2" aria-hidden="true"></i></button>
                   <div class="d-flex flex-column">
                     <h6 class="mb-1 text-dark text-sm">{{ __('translate.website') }}</h6>
                     <!-- <a class="text-xs" href="https://179988.vip/">179988.vip</a> -->
                   </div>
                 </div>
                 <a href="https://179988.vip/" class="d-flex align-items-center text-success text-gradient text-sm font-weight-bold">
                   {{ $admin->link ?? ''}}
                 </a>
               </li>
               <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                 <div class="d-flex align-items-center">
                   <button class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i class="ni ni-tv-2" aria-hidden="true"></i></button>
                   <div class="d-flex flex-column">
                     <h6 class="mb-1 text-dark text-sm">{{ __('translate.operating_system') }}</h6>
                     <!-- <a class="text-xs" href="https://179988.vip/">179988.vip</a> -->
                   </div>
                 </div>
                 <div class="d-flex align-items-center text-success text-gradient text-sm font-weight-bold">
                   {{ $specs['OS'] }}
                 </div>
               </li>
               <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                 <div class="d-flex align-items-center">
                   <button class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i class="ni ni-collection" aria-hidden="true"></i></button>
                   <div class="d-flex flex-column">
                     <h6 class="mb-1 text-dark text-sm">{{ __('translate.server') }}</h6>
                     <!-- <a class="text-xs" href="https://179988.vip/">179988.vip</a> -->
                   </div>
                 </div>
                 <div - class="d-flex align-items-center text-success text-gradient text-sm font-weight-bold">
                   {{ $specs['server'] }}
                 </div>
               </li>
               <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                 <div class="d-flex align-items-center">
                   <button class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i class="fa fa-user" aria-hidden="true"></i></button>
                   <div class="d-flex flex-column">
                     <h6 class="mb-1 text-dark text-sm">{{ __('translate.administrator') }}</h6>
                     <!-- <a class="text-xs" href="https://179988.vip/">179988.vip</a> -->
                   </div>
                 </div>
                 <div class="d-flex align-items-center text-success text-gradient text-sm font-weight-bold">
                   {{ $user->name }}
                 </div>
               </li>
             </ul>
           </div>
         </div>
       </div>
     </div>
   </div>
 </main>
 <script>
   // Time and Date
   function updateDateTime() {
     var currentDate = new Date();

     // Update the date
     var dateElement = document.querySelector(".date");
     var translate = "{{ __('translate.language')}}";
     var language = 'en';

     if (translate === 'English') {
       language = 'en';
     } else {
       language = 'zh';
     }


     var options = {
       year: "numeric",
       month: "long",
       day: "numeric",
     };

     if (language === "zh") {
       options = {
         year: "numeric",
         month: "long",
         day: "numeric",
         weekday: "long",
       };
       dateElement.textContent = currentDate.toLocaleDateString("zh-CN", options);
     } else {
       dateElement.textContent = currentDate.toLocaleDateString("en-US", options);
     }

     // Update the time
     var hours = currentDate.getHours();
     var minutes = currentDate.getMinutes();
     var seconds = currentDate.getSeconds();

     // Convert to 12-hour format if language is English
     var meridiem = "";
     if (language === "en") {
       meridiem = hours >= 12 ? "PM" : "AM";
       hours = hours % 12;
       hours = hours ? hours : 12;
     }
     console.log(language);

     // Add leading zeros if necessary
     hours = hours < 10 ? "0" + hours : hours;
     minutes = minutes < 10 ? "0" + minutes : minutes;
     seconds = seconds < 10 ? "0" + seconds : seconds;
     // Update the time
     var timeElement = document.querySelector(".time");
     timeElement.textContent = hours + ":" + minutes + ":" + seconds + " " + meridiem;
   }

   // Update the date and time initially
   updateDateTime();

   // Update the date and time every second
   setInterval(updateDateTime, 1000);
 </script>
 <!--   Core JS Files   -->
 <script src="/assets/js/plugins/chartjs.min.js"></script>
 <script src="/assets/js/plugins/Chart.extension.js"></script>