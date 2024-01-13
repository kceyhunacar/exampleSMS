 <!-- sidebar menu area start -->
 @php
     $usr = Auth::guard('admin')->user();
 @endphp
 <div class="sidebar-menu">
     <div class="sidebar-header">
         <div class="logo">
             <a href="{{ route('admin.dashboard') }}">
                 <h2 class="text-white">Admin</h2>
             </a>
         </div>
     </div>
     <div class="main-menu">
         <div class="menu-inner">
             <nav>
                 <ul class="metismenu" id="menu">

                     @if ($usr->can('dashboard.view'))
                         <li class="{{ Route::is('admin.dashboard') ? 'active' : '' }}">
                             <a href="javascript:void(0)" aria-expanded="true"><i class="ti-dashboard"></i><span>dashboard</span></a>
                             <ul class="collapse">
                                 <li class="{{ Route::is('admin.dashboard') ? 'active' : '' }}"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                             </ul>
                         </li>
                     @endif

                        <li>
                         <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-tasks"></i><span>
                                 Sms
                             </span></a>
                         <ul
                             class="collapse {{ Route::is('admin.sms.create') || Route::is('admin.sms.index') || Route::is('admin.sms.edit') || Route::is('admin.sms.show') ? 'in' : '' }}">
                             <li class="{{ Route::is('admin.sms.index') || Route::is('admin.sms.edit') ? 'active' : '' }}">
                                 <a href="{{ route('admin.sms.index') }}">All Sms</a>
                             </li>
                          </ul>
                     </li>


                     @if ($usr->can('admin.create') || $usr->can('admin.view') || $usr->can('admin.edit') || $usr->can('admin.delete'))
                         <li>
                             <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-user"></i><span>
                                     Admins
                                 </span></a>
                             <ul
                                 class="collapse {{ Route::is('admin.admins.create') || Route::is('admin.admins.index') || Route::is('admin.admins.edit') || Route::is('admin.admins.show') ? 'in' : '' }}">

                                 @if ($usr->can('admin.view'))
                                     <li class="{{ Route::is('admin.admins.index') || Route::is('admin.admins.edit') ? 'active' : '' }}"><a
                                             href="{{ route('admin.admins.index') }}">All Admins</a></li>
                                 @endif

                                 @if ($usr->can('admin.create'))
                                     <li class="{{ Route::is('admin.admins.create') ? 'active' : '' }}"><a href="{{ route('admin.admins.create') }}">Create Admin</a></li>
                                 @endif
                             </ul>
                         </li>
                     @endif

                 </ul>
             </nav>
         </div>
     </div>
 </div>
 <!-- sidebar menu area end -->
