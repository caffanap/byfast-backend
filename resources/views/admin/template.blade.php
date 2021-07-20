<!--

=========================================================
* Notus JS - v1.1.0 based on Tailwind Starter Kit by Creative Tim
=========================================================

* Product Page: https://www.creative-tim.com/product/notus-js
* Copyright 2021 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://github.com/creativetimofficial/notus-js/blob/main/LICENSE.md)

* Tailwind Starter Kit Page: https://www.creative-tim.com/learning-lab/tailwind-starter-kit/presentation

* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

-->
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="theme-color" content="#000000" />
    <link rel="shortcut icon" href="/assets/img/favicon.ico" />
    <link rel="apple-touch-icon" sizes="76x76" href="/assets/img/apple-icon.png" />
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css" /> -->
    <link rel="stylesheet" href="/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
    @yield('css')
    <title>Dashboard | Notus JS by Creative Tim</title>
</head>

<body class="antialiased text-gray-700">
    <noscript>You need to enable JavaScript to run this app.</noscript>
    <div id="root">
        <nav class="relative z-10 flex flex-wrap items-center justify-between px-6 py-4 bg-white shadow-xl md:left-0 md:block md:fixed md:top-0 md:bottom-0 md:overflow-y-auto md:flex-row md:flex-nowrap md:overflow-hidden md:w-64">
            <div class="flex flex-wrap items-center justify-between w-full px-0 mx-auto md:flex-col md:items-stretch md:min-h-full md:flex-nowrap">
                <button class="px-3 py-1 text-xl leading-none text-black bg-transparent border border-transparent border-solid rounded opacity-50 cursor-pointer md:hidden" type="button" onclick="toggleNavbar('example-collapse-sidebar')">
                    <i class="fas fa-bars"></i>
                </button>
                <a class="inline-block p-4 px-0 mr-0 text-sm font-bold text-left text-gray-600 uppercase md:block md:pb-2 whitespace-nowrap" href="/index.html">
                    Notus JS
                </a>
                <ul class="flex flex-wrap items-center list-none md:hidden">
                    <li class="relative inline-block">
                        <a class="block px-3 py-1 text-gray-500" href="#pablo" onclick="openDropdown(event,'notification-dropdown')"><i class="fas fa-bell"></i></a>
                        <div class="z-50 hidden float-left py-2 text-base text-left list-none bg-white rounded shadow-lg min-w-48" id="notification-dropdown">
                            <a href="#pablo" class="block w-full px-4 py-2 text-sm font-normal text-gray-700 bg-transparent whitespace-nowrap">Action</a><a href="#pablo" class="block w-full px-4 py-2 text-sm font-normal text-gray-700 bg-transparent whitespace-nowrap">Another
                                action</a><a href="#pablo" class="block w-full px-4 py-2 text-sm font-normal text-gray-700 bg-transparent whitespace-nowrap">Something
                                else here</a>
                            <div class="h-0 my-2 border border-gray-100 border-solid"></div>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                @csrf
                                <input type="submit" value="Log Out" class="block w-full px-4 py-2 text-sm font-normal text-gray-700 bg-transparent whitespace-nowrap">
                            </form>
                            <!-- <a href="#pablo" class="block w-full px-4 py-2 text-sm font-normal text-gray-700 bg-transparent whitespace-nowrap">Seprated link</a> -->
                        </div>
                    </li>
                    <li class="relative inline-block">
                        <a class="block text-gray-500" href="#pablo" onclick="openDropdown(event,'user-responsive-dropdown')">
                            <div class="flex items-center">
                                <span class="inline-flex items-center justify-center w-12 h-12 text-sm text-white bg-gray-200 rounded-full"><img alt="..." class="w-full align-middle border-none rounded-full shadow-lg" src="/assets/img/team-1-800x800.jpg" /></span>
                            </div>
                        </a>
                        <div class="z-50 hidden float-left py-2 text-base text-left list-none bg-white rounded shadow-lg min-w-48" id="user-responsive-dropdown">
                            <a href="#pablo" class="block w-full px-4 py-2 text-sm font-normal text-gray-700 bg-transparent whitespace-nowrap">Action</a><a href="#pablo" class="block w-full px-4 py-2 text-sm font-normal text-gray-700 bg-transparent whitespace-nowrap">Another
                                action</a><a href="#pablo" class="block w-full px-4 py-2 text-sm font-normal text-gray-700 bg-transparent whitespace-nowrap">Something
                                else here</a>
                            <div class="h-0 my-2 border border-gray-100 border-solid"></div>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                @csrf
                                <input type="submit" value="Log Out" class="block w-full px-4 py-2 text-sm font-normal text-gray-700 bg-transparent whitespace-nowrap">
                            </form>
                            <!-- <a href="#pablo" class="block w-full px-4 py-2 text-sm font-normal text-gray-700 bg-transparent whitespace-nowrap">Seprated link</a> -->
                        </div>
                    </li>
                </ul>
                <div class="absolute top-0 left-0 right-0 z-40 items-center flex-1 hidden h-auto overflow-x-hidden overflow-y-auto rounded shadow md:flex md:flex-col md:items-stretch md:opacity-100 md:relative md:mt-4 md:shadow-none" id="example-collapse-sidebar">
                    <div class="block pb-4 mb-4 border-b border-gray-200 border-solid md:min-w-full md:hidden">
                        <div class="flex flex-wrap">
                            <div class="w-6/12">
                                <a class="inline-block p-4 px-0 mr-0 text-sm font-bold text-left text-gray-600 uppercase md:block md:pb-2 whitespace-nowrap" href="/index.html">
                                    Notus JS
                                </a>
                            </div>
                            <div class="flex justify-end w-6/12">
                                <button type="button" class="px-3 py-1 text-xl leading-none text-black bg-transparent border border-transparent border-solid rounded opacity-50 cursor-pointer md:hidden" onclick="toggleNavbar('example-collapse-sidebar')">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <form class="mt-6 mb-4 md:hidden">
                        <div class="pt-0 mb-3">
                            <input type="text" placeholder="Search" class="w-full h-12 px-3 py-2 text-base font-normal leading-snug text-gray-600 placeholder-gray-300 bg-white border-0 border-gray-500 border-solid rounded shadow-none outline-none focus:outline-none" />
                        </div>
                    </form>
                    <!-- Divider -->
                    <hr class="my-4 md:min-w-full" />
                    <!-- Heading -->
                    <h6 class="block pt-1 pb-4 text-xs font-bold text-gray-500 no-underline uppercase md:min-w-full">
                        Admin Layout Pages
                    </h6>
                    <!-- Navigation -->

                    <ul class="flex flex-col list-none md:flex-col md:min-w-full">
                        <li class="items-center">
                            <a href="{{ route('admin.dashboard') }}" class="{{strpos(Route::currentRouteName(), 'admin.dashboard') === 0 ? 'active-menu' : ''}} block py-3 text-xs font-bold text-gray-700 uppercase hover:text-gray-500">
                                <i class="{{strpos(Route::currentRouteName(), 'admin.dashboard') === 0 ? 'active-menu' : ''}} mr-2 text-sm text-gray-300 fas fa-tv"></i>
                                Dashboard
                            </a>
                            <a href="{{ route('admin.packets.index') }}" class="{{strpos(Route::currentRouteName(), 'admin.packets') === 0 ? 'active-menu' : ''}} block py-3 text-xs font-bold text-gray-700 uppercase hover:text-gray-500">
                                <i class="{{strpos(Route::currentRouteName(), 'admin.packets') === 0 ? 'active-menu' : ''}} mr-2 text-sm text-gray-300 fas fa-tv"></i>
                                Packets
                            </a>
                            <a href="{{ route('admin.toppings.index') }}" class="{{strpos(Route::currentRouteName(), 'admin.toppings') === 0 ? 'active-menu' : ''}} block py-3 text-xs font-bold text-gray-700 uppercase hover:text-gray-500">
                                <i class="{{strpos(Route::currentRouteName(), 'admin.toppings') === 0 ? 'active-menu' : ''}} mr-2 text-sm text-gray-300 fas fa-tv"></i>
                                Toppings
                            </a>
                            <a href="{{ route('admin.banners.index') }}" class="{{strpos(Route::currentRouteName(), 'admin.banners') === 0 ? 'active-menu' : ''}} block py-3 text-xs font-bold text-gray-700 uppercase hover:text-gray-500">
                                <i class="{{strpos(Route::currentRouteName(), 'admin.banners') === 0 ? 'active-menu' : ''}} mr-2 text-sm text-gray-300 fas fa-tv"></i>
                                Banners
                            </a>
                            <a href="{{ route('admin.packet-categories.index') }}" class="{{strpos(Route::currentRouteName(), 'admin.packet-categories') === 0 ? 'active-menu' : ''}} block py-3 text-xs font-bold text-gray-700 uppercase hover:text-gray-500">
                                <i class="{{strpos(Route::currentRouteName(), 'admin.packet-categories') === 0 ? 'active-menu' : ''}} mr-2 text-sm text-gray-300 fas fa-tv"></i>
                                Packet Category
                            </a>
                            <a href="{{ route('admin.credits.index') }}" class="{{strpos(Route::currentRouteName(), 'admin.credits') === 0 ? 'active-menu' : ''}} block py-3 text-xs font-bold text-gray-700 uppercase hover:text-gray-500">
                                <i class="{{strpos(Route::currentRouteName(), 'admin.credits') === 0 ? 'active-menu' : ''}} mr-2 text-sm text-gray-300 fas fa-tv"></i>
                                Credits
                            </a>
                        </li>

                    </ul>

                </div>
            </div>
        </nav>
        <div class="relative md:ml-64 bg-gray-50">
            <nav class="absolute top-0 left-0 z-10 flex items-center w-full p-4 bg-transparent md:flex-row md:flex-nowrap md:justify-start">
                <div class="flex flex-wrap items-center justify-between w-full px-4 mx-autp md:flex-nowrap md:px-10">
                    <a class="hidden text-sm font-semibold text-white uppercase lg:inline-block" href="./index.html">Dashboard</a>
                    <form class="flex-row flex-wrap items-center hidden mr-3 md:flex lg:ml-auto">
                        <div class="relative flex flex-wrap items-stretch w-full">
                            <span class="absolute z-10 items-center justify-center w-8 h-full py-3 pl-3 text-base font-normal leading-snug text-center text-gray-300 bg-transparent rounded"><i class="fas fa-search"></i></span>
                            <input type="text" placeholder="Search here..." class="relative w-full px-3 py-3 pl-10 text-sm text-gray-600 placeholder-gray-300 bg-white border-0 rounded shadow outline-none focus:outline-none focus:ring" />
                        </div>
                    </form>
                    <ul class="flex-col items-center hidden list-none md:flex-row md:flex">
                        <a class="block text-gray-500" href="#pablo" onclick="openDropdown(event,'user-dropdown')">
                            <div class="flex items-center">
                                <span class="inline-flex items-center justify-center w-12 h-12 text-sm text-white bg-gray-200 rounded-full"><img alt="..." class="w-full align-middle border-none rounded-full shadow-lg" src="/assets/img/team-1-800x800.jpg" /></span>
                            </div>
                        </a>
                        <div class="z-50 hidden float-left py-2 text-base text-left list-none bg-white rounded shadow-lg min-w-48" id="user-dropdown">
                            <a href="#pablo" class="block w-full px-4 py-2 text-sm font-normal text-gray-700 bg-transparent whitespace-nowrap">Action</a><a href="#pablo" class="block w-full px-4 py-2 text-sm font-normal text-gray-700 bg-transparent whitespace-nowrap">Another
                                action</a><a href="#pablo" class="block w-full px-4 py-2 text-sm font-normal text-gray-700 bg-transparent whitespace-nowrap">Something
                                else here</a>
                            <div class="h-0 my-2 border border-gray-100 border-solid"></div>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                @csrf
                                <input type="submit" value="Log Out" class="block w-full px-4 py-2 text-sm font-normal text-gray-700 bg-transparent whitespace-nowrap">
                            </form>
                            <!-- <a href="#pablo" class="block w-full px-4 py-2 text-sm font-normal text-gray-700 bg-transparent whitespace-nowrap">Seprated link</a> -->
                        </div>
                    </ul>
                </div>
            </nav>

            <!-- Header -->
            <div class="relative pt-12 pb-32 bg-pink-600 md:pt-32">
                @if(session('message'))
                <div class="relative px-6 py-4 mb-4 text-white border-0 rounded md:mx-10">
                    <span class="inline-block mr-5 text-xl align-middle">
                        <i class="fas fa-bell"></i>
                    </span>
                    <span class="inline-block mr-8 align-middle">
                        {{session('message')}}
                    </span>
                    <button class="absolute top-0 right-0 mt-4 mr-6 text-2xl font-semibold leading-none bg-transparent outline-none focus:outline-none" onclick="closeAlert(event)">
                        <span>×</span>

                    </button>
                </div>
                <script>
                    function closeAlert(event) {
                        let element = event.target;
                        while (element.nodeName !== "BUTTON") {
                            element = element.parentNode;
                        }
                        element.parentNode.parentNode.removeChild(element.parentNode);
                    }
                </script>
                @endif
                <div class="w-full px-4 mx-auto md:px-10">
                    @yield('dashboard')
                </div>
            </div>
            <div class="w-full px-4 mx-auto -m-24 md:px-10">
                <div class="flex flex-wrap mt-4">
                    @yield('content')
                </div>
                <footer class="block py-4">
                    <div class="container px-4 mx-auto">
                        <hr class="mb-4 border-gray-200 border-b-1" />
                        <div class="flex flex-wrap items-center justify-center md:justify-between">
                            <div class="w-full px-4 md:w-4/12">
                                <div class="py-1 text-sm font-semibold text-center text-gray-500 md:text-left">
                                    Copyright © <span id="get-current-year"></span>
                                    <a href="https://www.creative-tim.com?ref=njs-dashboard" class="py-1 text-sm font-semibold text-gray-500 hover:text-gray-700">
                                        Creative Tim
                                    </a>
                                </div>
                            </div>
                            <div class="w-full px-4 md:w-8/12">
                                <ul class="flex flex-wrap justify-center list-none md:justify-end">
                                    <li>
                                        <a href="https://www.creative-tim.com?ref=njs-dashboard" class="block px-3 py-1 text-sm font-semibold text-gray-600 hover:text-gray-800">
                                            Creative Tim
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://www.creative-tim.com/presentation?ref=njs-dashboard" class="block px-3 py-1 text-sm font-semibold text-gray-600 hover:text-gray-800">
                                            About Us
                                        </a>
                                    </li>
                                    <li>
                                        <a href="http://blog.creative-tim.com?ref=njs-dashboard" class="block px-3 py-1 text-sm font-semibold text-gray-600 hover:text-gray-800">
                                            Blog
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://github.com/creativetimofficial/notus-js/blob/main/LICENSE.md?ref=njs-dashboard" class="block px-3 py-1 text-sm font-semibold text-gray-600 hover:text-gray-800">
                                            MIT License
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </div>
    @yield('script')
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" charset="utf-8"></script> -->
    <script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.js"></script>
    <script type="text/javascript">
        /* Make dynamic date appear */
        (function() {
            if (document.getElementById("get-current-year")) {
                document.getElementById(
                    "get-current-year"
                ).innerHTML = new Date().getFullYear();
            }
        })();
        /* Sidebar - Side navigation menu on mobile/responsive mode */
        function toggleNavbar(collapseID) {
            document.getElementById(collapseID).classList.toggle("hidden");
            document.getElementById(collapseID).classList.toggle("bg-white");
            document.getElementById(collapseID).classList.toggle("m-2");
            document.getElementById(collapseID).classList.toggle("py-3");
            document.getElementById(collapseID).classList.toggle("px-6");
        }
        /* Function for dropdowns */
        function openDropdown(event, dropdownID) {
            let element = event.target;
            while (element.nodeName !== "A") {
                element = element.parentNode;
            }
            Popper.createPopper(element, document.getElementById(dropdownID), {
                placement: "bottom-start",
            });
            document.getElementById(dropdownID).classList.toggle("hidden");
            document.getElementById(dropdownID).classList.toggle("block");
        }
    </script>
</body>

</html>