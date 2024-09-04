
        <!-- Header Start -->
        <div class="header-area header-transparent">
            <div class="main-header header-sticky">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <!-- Logo -->
                        <div class="col-xl-2 col-lg-2 col-md-1">
                            <div class="logo">
                                <a href="/"><img src="assets/img/logo/Newlogo.png" alt=""></a>
                            </div>
                        </div>
                        <div class="col-xl-10 col-lg-10 col-md-10">
                            <div class="menu-main d-flex align-items-center justify-content-end">
                                <!-- Main-menu -->
                                <div class="main-menu f-right d-none d-lg-block">
                                    <nav>
                                        <ul id="navigation">
                                            <li class="home-active"><a href="/">Home</a></li>
                                            <li><a href="/Service">Services</a></li>
                                            <li><a href="{{ url('/About') }}">About</a></li>
                                            <li><a href="{{ url('/Product') }}">Product</a></li>
                                            <!-- <li><a href="{{ url('/Supplier') }}">Supplier</a></li> -->
                                            <li><a href="/Blog">Blog</a></li>
                                            <li><a href="/ContactUs">Contact</a></li>
                                            <li><a href="#" id="user-icon">
                                        <img src="assets/img/logo/user.png" class="user-icon" alt="User Icon">
                                    </a>
                                    <ul class="submenu">
                                                    <li><a href="{{ route('login') }}">Login</a></li>
                                                    <li><a href="{{ route('register') }}">Register</a></li>

                                                    <li><a href="{{ url('/dashboard') }}">Dashboard</a></li> 
                                                </ul>  

                                            

                                            </li>
                                        </ul>
                                        </ul>
                                    </nav>
                                </div>
                                <div  class="header-right-btn f-right d-none d-lg-block ml-30">
                                    @if(auth()->check())
                                    <a href="/Appointment" id="appointmentButton" class="header-btn">Appointment</a>
                                @else
                                    <a href="{{ route('login') }}" class="header-btn">Appointment</a>
                                @endif
                                </div>
                            </div>
                        </div>
                        <!-- Mobile Menu -->
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header End -->
