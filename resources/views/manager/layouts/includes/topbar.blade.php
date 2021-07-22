<div class="page-header-inner ">
   <!-- logo start -->
   <div class="page-logo">
      <a href="{{URL::to('/manager')}}">
      <img alt="" src="assets/img/logo.png">
      <span class="logo-default" >MANAGER</span> </a>
   </div>
   <!-- logo end -->
   <!-- start mobile menu -->
   <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
   <span></span>
   </a>
   <!-- end mobile menu -->
   <!-- start header menu -->
   <div class="top-menu">
      <ul class="nav navbar-nav pull-right">
         <!-- start language menu -->
         <!-- end message dropdown -->
         <!-- start manage user dropdown -->
         @php($cnt=App\Models\Cart::where('auth_id',auth()->user()->id)->where('isbooking',NULL)->count())

         <li class="dropdown dropdown-user" style="margin-top: 11px;">
            <span><i class="fa fa-shopping-cart" aria-hidden="true"></i><span class="badge badge-primary"><a href="{{URL::to('/manager/cart')}}" class="text-white">{{$cnt}}</a></span></span>
         </li>

         <li class="dropdown dropdown-user">


            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
            <img alt="" class="img-circle " src="https://i.pinimg.com/originals/51/f6/fb/51f6fb256629fc755b8870c801092942.png" />
            <span class="username username-hide-on-mobile"> {{auth()->user()->name}} </span>
            </a>


            <ul class="dropdown-menu dropdown-menu-default animated jello">

               <li>
                  <a href="{{URL::to('/logoutadmin')}}">
                  <i class="icon-logout"></i> Log Out </a>
               </li>
            </ul>
         </li>
         <!-- end manage user dropdown -->
      </ul>
   </div>
</div>
