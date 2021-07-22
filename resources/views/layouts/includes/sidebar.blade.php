<div class="sidemenu-container navbar-collapse collapse fixed-menu">
   <div id="remove-scroll">
      <ul class="sidemenu  page-header-fixed" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
         <li class="sidebar-toggler-wrapper hide">
            <div class="sidebar-toggler">
               <span></span>
            </div>
         </li>
         <li class="sidebar-user-panel">
            <div class="user-panel">
               <div class="pull-left image">
                  <img src="https://i.pinimg.com/originals/51/f6/fb/51f6fb256629fc755b8870c801092942.png" class="img-circle user-img-circle" alt="User Image" />
               </div>
               <h3></h3>
               <div class="pull-left info">
                  <p>{{auth()->user()->name}}</p>
                  <a href="#"><i class="fa fa-circle user-online"></i><span class="txtOnline"> Online</span></a>
               </div>
            </div>
         </li>

         <li class="nav-item">
            <a href="{{URL::to('/')}}" class="nav-link nav-toggle">
            <span class="title"><i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard</span>
            </a>
         </li>
         <li class="nav-item">
            <a href="{{URL::to('/orders')}}" class="nav-link nav-toggle">
            <span class="title"><i class="fa fa-cart-plus" aria-hidden="true"></i> Order <span class="badge badge-primary">{{App\Models\Cart::whereNotNull('purchase_code')->groupBy('purchase_code')->selectRaw('count(*) as total, purchase_code')->get()->count()}}</span></span>
            </a>
         </li>
         <li class="nav-item">
            <a href="{{URL::to('/product')}}" class="nav-link nav-toggle">
            <span class="title"><i class="fa fa-gift" aria-hidden="true"></i> Products <span class="badge badge-primary">{{App\Models\Product::all()->count()}}</span> </span>
            </a>
         </li>
         <li class="nav-item">
            <a href="{{URL::to('/store')}}" class="nav-link nav-toggle">
            <span class="title"><i class="fa fa-shopping-bag" aria-hidden="true"></i> Store</span>
            </a>
         </li>
         <li class="nav-item">
            <a href="{{URL::to('user')}}" class="nav-link nav-toggle">
            <span class="title"><i class="fa fa-user" aria-hidden="true"></i> User <span class="badge badge-primary">{{App\Models\User::all()->count()}}</span></span>
            </a>
         </li>

         <li class="nav-item start ">
            <a href="#" class="nav-link nav-toggle">
                <span class="title"><i class="fa fa-file-text" aria-hidden="true"></i>Report</span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item   ">
                    <a href="{{URL::to('/treport')}}" class="nav-link ">
                        <span class="title"><i class="fa fa-file-text" aria-hidden="true"></i>Transaction</span>
                    </a>
                </li>
                <li class="nav-item ">
                    <a href="{{URL::to('/qtyreport')}}" class="nav-link ">
                        <span class="title"><i class="fa fa-file-text" aria-hidden="true"></i>Stock</span>
                    </a>
                </li>
            </ul>
            </li>


         <li class="nav-item start ">
            <a href="#" class="nav-link nav-toggle">
                <span class="title"><i class="fa fa-cog" aria-hidden="true"></i> Settings</span>
                <!-- <span class="arrow"></span> -->
                <!-- <i class="fa fa-arrow-right" aria-hidden="true"></i> -->
                 <!-- <i class="material-icons f-left">account_circle</i> -->
            </a>
            <ul class="sub-menu">
                <li class="nav-item   ">
                    <a href="{{URL::to('/attributes')}}" class="nav-link ">
                        <span class="title"><i class="fa fa-file-text" aria-hidden="true"></i> Attributes</span>
                    </a>
                </li>
                <li class="nav-item ">
                    <a href="{{URL::to('/subattributes')}}" class="nav-link ">
                        <span class="title"><i class="fa fa-file-text" aria-hidden="true"></i> SubAttributes</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{URL::to('/productcategory')}}" class="nav-link ">
                        <span class="title"><i class="fa fa-file-text" aria-hidden="true"></i> Products Category</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{URL::to('/productsubcategory')}}" class="nav-link ">
                        <span class="title"><i class="fa fa-file-text" aria-hidden="true"></i> Products SubCategory</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{URL::to('/country')}}" class="nav-link ">
                        <span class="title"><i class="fa fa-globe" aria-hidden="true"></i> Country</span>
                    </a>
                </li>
                <!-- <li class="nav-item">
                    <a href="dashboard3.html" class="nav-link ">
                        <span class="title"><i class="fa fa-user" aria-hidden="true"></i> UserType</span>
                    </a>
                </li> -->
            </ul>
            </li>


         <!-- <li class="nav-item">
            <a href="#" class="nav-link nav-toggle">
                <i class="material-icons">email</i>
                <span class="title">Email</span>
                <span class="arrow"></span>
                <span class="label label-rouded label-menu label-danger">new</span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item">
                    <a href="email_inbox.html" class="nav-link ">
                        <span class="title">Inbox</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="email_view.html" class="nav-link ">
                        <span class="title">View Mail</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="email_compose.html" class="nav-link ">
                        <span class="title">Compose Mail</span>
                    </a>
                </li>
            </ul>
            </li>
            <li class="nav-item">
            <a href="#" class="nav-link nav-toggle"> <i class="material-icons">desktop_mac</i>
                <span class="title">Layout</span> <span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item">
                    <a href="layout_boxed.html" class="nav-link "> <span class="title">Boxed</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="layout_full_width.html" class="nav-link "> <span class="title">Full Width</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="layout_collapse.html" class="nav-link "> <span class="title">Collapse Menu</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="layout_right_sidebar.html" class="nav-link "> <span class="title">Right Sidebar</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="layout_sidebar_hover_menu.html" class="nav-link "> <span class="title">Hover Sidebar Menu</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="layout_mega_menu.html" class="nav-link "> <span class="title">Mega Menu</span>
                    </a>
                </li>
            </ul>
            </li>
            <li class="nav-item">
            <a href="#" class="nav-link nav-toggle"> <i class="material-icons">grain</i>
                <span class="title">Apps</span> <span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item">
                    <a href="chat.html" class="nav-link "> <span class="title">Chat</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="contact_list.html" class="nav-link "> <span class="title">Contact List</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="contact_grid.html" class="nav-link "> <span class="title">Contact Grid</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="gallery.html" class="nav-link "> <span class="title">Gallery</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="support.html" class="nav-link "> <span class="title">Support</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="calendar.html" class="nav-link "> <span class="title">Calendar</span>
                    </a>
                </li>
            </ul>
            </li>
            <li class="nav-item">
            <a href="widget.html" class="nav-link nav-toggle"> <i class="material-icons">widgets</i>
                <span class="title">Widget</span>
            </a>
            </li>
            <li class="nav-item">
            <a href="#" class="nav-link nav-toggle">
                <i class="material-icons">dvr</i>
                <span class="title">UI Elements</span>
                <span class="label label-rouded label-menu label-warning">new</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item">
                    <a href="buttons.html" class="nav-link ">
                        <span class="title">Buttons</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="alert.html" class="nav-link ">
                        <span class="title">Alert</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="tabs_accordions_navs.html" class="nav-link ">
                        <span class="title">Tabs &amp; Accordions</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="typography.html" class="nav-link ">
                        <span class="title">Typography</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="notification.html" class="nav-link ">
                        <span class="title">Notifications</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="sweet_alert.html" class="nav-link ">
                        <span class="title">Sweet Alert</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="panels.html" class="nav-link ">
                        <span class="title">Panels</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="grid.html" class="nav-link ">
                        <span class="title">Grids</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="tree.html" class="nav-link ">
                        <span class="title">Tree View</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="carousel.html" class="nav-link ">
                        <span class="title">Carousel</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="animation.html" class="nav-link ">
                        <span class="title">Animations</span>
                    </a>
                </li>
            </ul>
            </li>
            <li class="nav-item">
            <a href="#" class="nav-link nav-toggle">
                <i class="material-icons">store</i>
                <span class="title">Material Elements</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item">
                    <a href="material_button.html" class="nav-link ">
                        <span class="title">Buttons</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="material_tab.html" class="nav-link ">
                        <span class="title">Tabs</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="material_chips.html" class="nav-link ">
                        <span class="title">Chips</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="material_grid.html" class="nav-link ">
                        <span class="title">Grid</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="material_form.html" class="nav-link ">
                        <span class="title">Form</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="material_datepicker.html" class="nav-link ">
                        <span class="title">DatePicker</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="material_select.html" class="nav-link ">
                        <span class="title">Select Item</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="material_loading.html" class="nav-link ">
                        <span class="title">Loading</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="material_menu.html" class="nav-link ">
                        <span class="title">Menu</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="material_slider.html" class="nav-link ">
                        <span class="title">Slider</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="material_tables.html" class="nav-link ">
                        <span class="title">Tables</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="material_toggle.html" class="nav-link ">
                        <span class="title">Toggle</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="material_badges.html" class="nav-link ">
                        <span class="title">Badges</span>
                    </a>
                </li>
            </ul>
            </li>
            <li class="nav-item">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="material-icons">subtitles</i>
                <span class="title">Forms </span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item">
                    <a href="layouts_form.html" class="nav-link ">
                        <span class="title">Form Layout</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="advance_form.html" class="nav-link ">
                        <span class="title">Advance Component</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="validation_form.html" class="nav-link ">
                        <span class="title">Form Validation</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="steps.html" class="nav-link ">
                        <span class="title">Wizard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="wizard_form.html" class="nav-link ">
                        <span class="title">Smart Wizard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="file_upload.html" class="nav-link ">
                        <span class="title">File Upload</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="editable_form.html" class="nav-link ">
                        <span class="title">Editor</span>
                    </a>
                </li>
            </ul>
            </li>
            <li class="nav-item">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="material-icons">list</i>
                <span class="title">Data Tables</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item">
                    <a href="basic_table.html" class="nav-link ">
                        <span class="title">Basic Tables</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="advanced_table.html" class="nav-link ">
                        <span class="title">Advance Tables</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="editable_table.html" class="nav-link ">
                        <span class="title">Editable Tables</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="group_table.html" class="nav-link ">
                        <span class="title">Grouping</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="table_data.html" class="nav-link ">
                        <span class="title">Tables With Sourced Data</span>
                    </a>
                </li>
            </ul>
            </li>
            <li class="nav-item">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="material-icons">timeline</i>
                <span class="title">Charts</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item">
                    <a href="charts_echarts.html" class="nav-link ">
                        <span class="title">eCharts</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="charts_morris.html" class="nav-link ">
                        <span class="title">Morris Charts</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="charts_chartjs.html" class="nav-link ">
                        <span class="title">Chartjs</span>
                    </a>
                </li>
            </ul>
            </li>
            <li class="nav-item">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="material-icons">map</i>
                <span class="title">Maps</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item">
                    <a href="google_maps.html" class="nav-link ">
                        <span class="title">Google Maps</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="vector_maps.html" class="nav-link ">
                        <span class="title">Vector Maps</span>
                    </a>
                </li>
            </ul>
            </li>
            <li class="nav-item">
            <a href="#" class="nav-link nav-toggle"> <i class="material-icons">album</i>
                <span class="title">Icons</span> <span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item">
                    <a href="fontawesome_icons.html" class="nav-link "> <span class="title">Font Awesome</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="simpleline_icons.html" class="nav-link "> <span class="title">Simple Line Icon</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="material_icons.html" class="nav-link "> <span class="title">Material Icon</span>
                    </a>
                </li>
            </ul>
            </li>



            <li class="nav-item active">
            <a href="javascript:;" class="nav-link nav-toggle"> <i class="material-icons">description</i>
            <span class="title">Extra pages</span>
            <span class="selected"></span>
               <span class="arrow open"></span>
            </a>
            <ul class="sub-menu">
              <li class="nav-item">
                    <a href="timeline.html" class="nav-link "> <span class="title">Timeline</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="login.html" class="nav-link "> <span class="title">Login</span>
                    </a>
                </li>
                <li class="nav-item">
                  <a href="user_profile.html" class="nav-link "><span class="title">Profile</span>
            </a>
                </li>
                <li class="nav-item">
                  <a href="pricing.html" class="nav-link "><span class="title">Pricing</span>
            </a>
                </li>
                <li class="nav-item">
                    <a href="contactus.html" class="nav-link "> <span class="title">Contact Us</span>
                    </a>
                </li>
                <li class="nav-item">
                  <a href="invoice.html" class="nav-link "><span class="title">Invoice</span>
            </a>
                </li>
                <li class="nav-item">
                  <a href="faq.html" class="nav-link "><span class="title">Faq</span>
            </a>
                </li>
                <li class="nav-item">
                    <a href="lock_screen.html" class="nav-link "> <span class="title">Lock Screen</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="page-404.html" class="nav-link "> <span class="title">404 Page</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="page-500.html" class="nav-link "> <span class="title">500 Page</span>
                    </a>
                </li>
                <li class="nav-item active">
                    <a href="blank_page.html" class="nav-link "> <span class="title">Blank Page</span>
                    <span class="selected"></span>
                    </a>
                </li>
            </ul>
            </li>
            <li class="nav-item">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="material-icons">slideshow</i>
                <span class="title">Multi Level Menu</span>
                <span class="arrow "></span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="fa fa-university"></i> Item 1
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="fa fa-bell-o"></i> Arrow Toggle
                                <span class="arrow "></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item">
                                    <a href="javascript:;" class="nav-link">
                                        <i class="fa fa-calculator"></i> Sample Link 1</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="fa fa-clone"></i> Sample Link 2</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="fa fa-cogs"></i> Sample Link 3</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fa fa-file-pdf-o"></i> Sample Link 1</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fa fa-rss"></i> Sample Link 2</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fa fa-hdd-o"></i> Sample Link 3</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="fa fa-gavel"></i> Arrow Toggle
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fa fa-paper-plane"></i> Sample Link 1</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fa fa-power-off"></i> Sample Link 1</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fa fa-recycle"></i> Sample Link 1
                             </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fa fa-volume-up"></i> Item 3 </a>
                </li>
            </ul>
            </li> -->
      </ul>
   </div>
</div>
