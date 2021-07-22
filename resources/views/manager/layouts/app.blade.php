@guest
@else
@if(auth()->user()->usertype=='Manager')
@else
<script type="text/javascript">
  window.location = "{{URL::to('/')}}";
</script>
@endif
@endguest


<!DOCTYPE html>
<html lang="en">
   <!-- BEGIN HEAD -->
   <head>
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta content="width=device-width, initial-scale=1" name="viewport" />
      <meta name="description" content="Responsive Admin Template" />
      <meta name="author" content="SmartUniversity" />
      <title>@yield('pagename')</title>
      <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet" type="text/css" />
      <link href="{{URL::to('/public/assets/plugins/simple-line-icons/simple-line-icons.min.css')}}" rel="stylesheet" type="text/css" />
      <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet" type="text/css"/>
      <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
      <link href="{{URL::to('/public/assets/css/plugins.min.css')}}" rel="stylesheet" type="text/css" />
      <link href="{{URL::to('/public/assets/css/style.css')}}" rel="stylesheet" type="text/css" />
      <link href="{{URL::to('/public/assets/css/responsive.css')}}" rel="stylesheet" type="text/css" />
      <link href="{{URL::to('/public/assets/css/theme-color.css')}}" rel="stylesheet" type="text/css" />
      <link rel="shortcut icon" href="http://radixtouch.in/templates/admin/smile/source/assets/img/favicon.ico" />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
      <style media="screen">
      .modal a.close-modal {
        top: 2.5px;
        right: 2.5px;
      }
      </style>
      <style media="screen">
      /* .page-content-wrapper .page-content {
  min-height: 630px !important;
} */
@font-face {
    font-family: 'Material Icons';
    font-style: normal;
    font-weight: 400;
    src: url(iconfont/MaterialIcons-Regular.eot); /* For IE6-8 */
    src: local('Material Icons'),
         local('MaterialIcons-Regular'),
         url(iconfont/MaterialIcons-Regular.woff2) format('woff2'),
         url(iconfont/MaterialIcons-Regular.woff) format('woff'),
         url(iconfont/MaterialIcons-Regular.ttf) format('truetype');
 }

 .material-icons {
   font-family: 'Material Icons';
   font-weight: normal;
   font-style: normal;
   font-size: 24px;  /* Preferred icon size */
   display: inline-block;
   line-height: 1;
   text-transform: none;
   letter-spacing: normal;
   word-wrap: normal;
   white-space: nowrap;
   direction: ltr;

   /* Support for all WebKit browsers. */
   -webkit-font-smoothing: antialiased;
   /* Support for Safari and Chrome. */
   text-rendering: optimizeLegibility;

   /* Support for Firefox. */
   -moz-osx-font-smoothing: grayscale;

   /* Support for IE. */
   font-feature-settings: 'liga';
 }

      </style>

      <style media="screen">
      .card-header {
  padding: .75rem 1.25rem;
  /* margin-bottom: 0; */
  /* background-color: rgba(0,0,0,.03); */
  /* border-bottom: 1px solid rgba(0,0,0,.125); */
  background-color: #ffffff;
  border-left: 4px solid #1761fd;
  border-bottom: 1px solid #e4e5e6;
}
      </style>
      @yield('css')

   </head>
   <!-- END HEAD -->
   <body class="page-header-fixed sidemenu-closed-hidelogo page-content-white page-md header-white dark-sidebar-color logo-dark">
      <div class="page-wrapper">
      <!-- start header -->
      <div class="page-header navbar navbar-fixed-top">
        @include('manager.layouts.includes.topbar')
      </div>
      <!-- end header -->
      <!-- start color quick setting -->
      <!-- end color quick setting -->
      <!-- start page container -->
      <div class="page-container">
         <!-- start sidebar menu -->
         <div class="sidebar-container">
           @include('manager.layouts.includes.sidebar')
         </div>
         <!-- end sidebar menu -->
         <!-- start page content -->


         <div class="page-content-wrapper">
                <div class="page-content">
                    <div class="page-bar">
                        <div class="page-title-breadcrumb">
                            <div class=" pull-left">
                                <div class="page-title">@yield('pagename')</div>
                            </div>
                        </div>
                    </div>


                      @if(session()->has('successmessage'))
                          <div class="alert label-success alert-dismissible" role="alert">
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              {{ session()->get('successmessage') }}
                          </div>
                      @endif
                      @if(session()->has('failmessage'))
                          <div class="alert label-danger alert-dismissible" role="alert">
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              {{ session()->get('failmessage') }}
                          </div>
                      @endif




                     <div class="row">
                        <div class="col-sm-12">
                               <div class="card-box">
                                   <div class="card-body ">
                                    @yield('content')
                                  </div>
                           </div>
                        </div>
                      </div>
                </div>



            </div>


         <div class="page-footer">
            @include('layouts.includes.footer')
         </div>
         <!-- end footer -->
      </div>
      <!-- start js include path -->
      <script src="{{URL::to('/public/assets/plugins/jquery/jquery.min.js')}}" ></script>
      <script src="{{URL::to('/public/assets/plugins/popper/popper.min.js')}}" ></script>
      <script src="{{URL::to('/public/assets/plugins/jquery-blockui/jquery.blockui.min.js')}}" ></script>
      <script src="{{URL::to('/public/assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
      <!-- bootstrap -->
      <script src="{{URL::to('/public/assets/plugins/bootstrap/js/bootstrap.min.js')}}" ></script>
      <script src="{{URL::to('/public/assets/js/app.js')}}" ></script>
      <script src="{{URL::to('/public/assets/js/layout.js')}}" ></script>
      <script src="{{URL::to('/public/assets/js/theme-color.js')}}" ></script>
      <script src="{{URL::to('/public/assets/js/pages/ui/animations.js')}}" ></script>
      @yield('js')
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
      
   </body>
</html>
