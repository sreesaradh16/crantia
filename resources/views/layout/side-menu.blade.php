 <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
 <aside class="app-sidebar">
     <div class="side-header">
         <a class="header-brand1" href="#">
             <img src="{{asset('assets/images/zimpleq-logo.png')}}" class="header-brand-img desktop-logo" alt="logo">
             <img src="{{asset('assets/images/zimpleq-logo.png')}}" class="header-brand-img toggle-logo" alt="logo">
             <img src="{{asset('assets/images/zimpleq-logo.png')}}" class="header-brand-img light-logo" alt="logo">
             <img src="{{asset('assets/images/zimpleq-logo.png')}}" class="header-brand-img light-logo1" alt="logo">
         </a><!-- LOGO -->
         <a aria-label="Hide Sidebar" class="app-sidebar__toggle ml-auto" data-toggle="sidebar" href="#"></a><!-- sidebar-toggle-->
     </div>
     <div class="app-sidebar__user">
         <div class="dropdown user-pro-body text-center">
         </div>
     </div>
     <ul class="side-menu">
         <li class="slide">
             <a class="side-menu__item @yield('department')" href="{{route('departments.index')}}"><i class="side-menu__icon ti-shield"></i><span class="side-menu__label">Department</span></a>
         </li>
         <li class="slide">
             <a class="side-menu__item @yield('employee')" href="{{route('employees.index')}}"><i class="side-menu__icon ti-shield"></i><span class="side-menu__label">Employees</span></a>
         </li>
     </ul>
 </aside>