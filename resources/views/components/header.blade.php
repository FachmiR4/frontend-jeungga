{{-- <header id="header" class="header d-flex align-items-center sticky-top ps-md-2 pe-md-2 py-md-2  ps-2 pe-3 py-3">
    <div class="container-fluid container-xl position-relative d-flex justify-content-between align-items-center">
        <div>
            <div class="mobile-toggle d-flex align-items-center justify-content-start d-xl-none">
                <i class="mobile-nav-toggle  bi bi-list fa-xs"></i>
            </div>

            <a href="#" class="logo d-flex align-items-center d-block d-none d-md-none d-lg-block">
                <div class="frame-parent4">
                    <div class="parent2">
                        <div class="div2">®</div>
                        <img class="jeung-ga2" alt="" src="{{ asset('assets/file/jeung--ga.svg') }}">
                    </div>
                    <img class="svgg-icon4" alt="" src="{{ asset('assets/file/svgg3.svg') }}">
                </div>
            </a>

        </div>

        <div>
            <a href="#" class="logo d-flex align-items-center d-xl-none ps-5">
                <div class="frame-parent4">
                    <div class="parent2">
                        <div class="div2">®</div>
                        <img class="jeung-ga2" alt="" src="{{ asset('assets/file/jeung--ga.svg') }}">
                    </div>
                    <img class="svgg-icon4" alt="" src="{{ asset('assets/file/svgg3.svg') }}">
                </div>
            </a>
            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="{{ url('') }}" class="{{ Request::is('/') ? 'active' : '' }}">Home</a></li>
                    <li><a href="{{ url('about-us') }}" class="{{ Request::is('about-us') ? 'active' : '' }}">About Us</a></li>
                    <li><a href="{{ url('product') }}" class="{{ Request::is('product') ? 'active' : '' }}">Products</a></li>
                    <li><a href="{{ url('why-jeungga') }}" class="{{ Request::is('why-jeungga') ? 'active' : '' }}">Why ®Jeungga?</a></li>
                    <li><a href="{{ url('technology') }}" class="{{ Request::is('technology') ? 'active' : '' }}">Technology</a></li>
                    <li class="dropdown ">
                        <a href="#" class="{{ Request::is('newsroom', 'partnership', 'clients', 'contact-us') ? 'active' : '' }}"><span>More</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                        <ul>
                            <li><a href="{{ url('newsroom') }}" class="{{ Request::is('newsroom') ? 'active' : '' }}">Newsroom</a></li>
                            <li><a href="#" class="{{ Request::is('partnership') ? 'active' : '' }}">Partnership</a></li>
                            <li><a href="#" class="{{ Request::is('clients') ? 'active' : '' }}">Clients</a></li>
                            <li><a href="{{ url('contact-us') }}" class="{{ Request::is('contact-us') ? 'active' : '' }}">Contact Us</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>

        <div>
            <a class="btn-getstarted ms-3" href="">Contact</a>
        </div>
    </div>
</header> --}}
@php
use App\Utility\HttpHandler;

$cookielang = 'en';
$response_menu = HttpHandler::postJson("module/menus/list",[
    'lang' => $cookielang
])->getData();
@endphp

@if(isset($response_menu))
<div class="sidebar-menus">
    <div class="sidebar-child-menus" style="height: 100%; margin-left:auto;">
        <div class="py-3 px-3 close-click"  style="color: black">
            <a href="{{url('/')}}">
                <div class="frame-parent4" style="scale: .8; margin-top:10px;">
                    <div class="parent2">
                    <div class="div2">®</div>
                    <img class="jeung-ga2" alt="" src="{{ asset('assets/file/jeung--ga.svg') }}">
                    </div>
                    <img class="svgg-icon4" alt="" src="{{ asset('assets/file/svgg3.svg') }}">
                </div>
            </a>
            <svg class="ms-auto d-block" viewBox="0 0 29 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M17.5 20.5L11.5 14.5L17.5 8.5" stroke="#ECE5D3" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </div>
        <div class="menusss">
            <div class="link-group">
                @if(isset($response_menu->data))
                    @foreach ($response_menu->data as $row)

                        @if($row->link != "#")
                            <a href="{{ url($row->link) }}" class="nav-link sidebar-link {{ Request::is($row->link) ? 'isActive' : ''}}" style=" color: black ">
                                {{ $row->menu ?? '' }}
                            </a>
                        @elseif($row->link == "#")
                            @if(isset($row->children))
                                @foreach ($row->children as  $row_detail)
                                    <a href="{{ url($row_detail->link) }}" class="nav-link sidebar-link {{Request::is(str_replace('/','',$row_detail->link)) ? 'isActive' : ''}}" style=" color: black ">
                                        {{ $row_detail->menu ?? '' }}
                                    </a>
                                @endforeach
                            @endif
                        @endif
                    @endforeach
                @endif
                {{-- <a href="{{url('/')}}" class="nav-link sidebar-link {{ Request::is('/') ? 'isActive' : ''}}" style=" color: black ">
                    Home
                </a>
                <a href="{{url('about-us')}}" class="nav-link sidebar-link {{ Request::is('about-us') ? 'isActive' : ''}}" style=" color: black">
                    About Us
                </a>
                <a href="{{url('product')}}" class="nav-link sidebar-link {{ Request::is('product') ? 'isActive' : ''}}" style=" color: black">
                    Products
                </a>
                <a href="{{url('why-jeungga')}}" class="nav-link sidebar-link {{ Request::is('why-jeungga') ? 'isActive' : ''}}" style=" color: black">
                    Why <small class="section-copy-right-header">®</small>Jeungga?
                </a>
                <a href="{{url('technology')}}" class="nav-link sidebar-link {{ Request::is('technology') ? 'isActive' : ''}}" style=" color: black">
                    Technology
                </a>
                <a href="{{url('clients')}}" class="nav-link sidebar-link {{ Request::is('client') ? 'isActive' : ''}}" style=" color: black">
                    Clients
                </a>
                <a href="{{url('newsroom')}}" class="nav-link sidebar-link {{ Request::is('newsroom') ? 'isActive' : ''}}" style=" color: black">
                    Newsroom
                </a>
                <a href="{{url('contact-us')}}" class="nav-link sidebar-link {{ Request::is('contact-us') ? 'isActive' : ''}}" style=" color: black">
                    Contact Us
                </a>
                <a href="{{url('partnership')}}" class="nav-link sidebar-link {{ Request::is('partnership') ? 'isActive' : ''}}" style=" color: black">
                    Partnership
                </a> --}}
            </div>
        </div>
    </div>
</div>
<div class="position-relative" style="width: 100%">
    <div class="home-button">
        <div class="header-2-button">
            <div class="navigations">
                <div class="home-button-parent">

                    @if(isset($response_menu->data))
                        @foreach ($response_menu->data as $row)
                            @if($row->link != '#')
                                <div class="links technology-button {{Request::is($row->link) ? 'currentLink' : ''}}"><a href="{{ url($row->link) }}">{{ $row->menu }}</a></div>
                            @endif
                            @if($row->link == '#')
                                <div class="group-button-header {{ Request::is('newsroom', 'partnership', 'clients', 'contact-us') ? 'currentLink' : '' }}">
                                    {{ $row->menu }}
                                    <svg width="21" height="20" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M15.1218 7.93103L10.9839 12.069L6.84595 7.93103" stroke="#22333C" stroke-opacity="0.5" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                    <div class="group-button">
                                        @if(isset($row->children))
                                            @foreach ($row->children as $row)
                                                <div class="{{Request::is($row->link) ? 'currentLink' : ''}}"><a href="{{url($row->link)}}">{{ $row->menu }}</a></div>
                                            @endforeach
                                        @endif
                                        {{-- <div class="{{Request::is('newsroom') ? 'currentLink' : ''}}"><a href="{{url('newsroom')}}">Newsroom</a></div> --}}
                                        {{-- <div class="{{Request::is('partnership') ? 'currentLink' : ''}}"><a href="{{url('partnership')}}">Partnership</a></div> --}}
                                        {{-- <div class="{{Request::is('clients') ? 'currentLink' : ''}}"><a href="{{url('clients')}}">Client</a></div> --}}
                                        {{-- <div class="{{Request::is('contact-us') ? 'currentLink' : ''}}"><a href="{{ url('contact-us') }}">Contact Us</a></div> --}}
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @endif
                    {{-- <div class="links about-us- {{ Request::is('about-us') ? 'currentLink' : ''}}"><a href="{{ url('/about-us') }}">About Us</a></div>
                    <div class="links products-button {{ Request::is('product') ? 'currentLink' : ''}}"><a href="{{url('product')}}">Products</a></div>
                    <div class="links why-jeungga- {{ Request::is('why-jeungga') ? 'currentLink' : ''}}"><a href="{{url('why-jeungga')}}">Why <small class="section-copy-right-header">®</small>Jeungga?</a></div>
                    <div class="links technology-button {{ Request::is('technology') ? 'currentLink' : ''}}"><a href="{{url('technology')}}">Technology</a></div>
                    <div class="group-button-header {{ Request::is('newsroom', 'partnership', 'clients', 'contact-us') ? 'currentLink' : '' }}">
                        More <svg width="21" height="20" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M15.1218 7.93103L10.9839 12.069L6.84595 7.93103" stroke="#22333C" stroke-opacity="0.5" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        <div class="group-button">
                            <div class="{{Request::is('newsroom') ? 'currentLink' : ''}}"><a href="{{url('newsroom')}}">Newsroom</a></div>
                            <div class="{{Request::is('partnership') ? 'currentLink' : ''}}"><a href="{{url('partnership')}}">Partnership</a></div>
                            <div class="{{Request::is('clients') ? 'currentLink' : ''}}"><a href="{{url('clients')}}">Client</a></div>
                            <div class="{{Request::is('contact-us') ? 'currentLink' : ''}}"><a href="{{ url('contact-us') }}">Contact Us</a></div>
                        </div>
                    </div> --}}
                </div>
                <div class="stylefilled">
                    <div class="contact-button">
                        <a href="{{ url('contact-us') }}">Contact</a>
                    </div>
                </div>
            </div>
            <a href="{{url('/')}}">
                <div class="frame-parent4">
                    <div class="parent2">
                    <div class="div2">®</div>
                    <img class="jeung-ga2" alt="" src="{{ asset('assets/file/jeung--ga.svg') }}">
                    </div>
                    <img class="svgg-icon4" alt="" src="{{ asset('assets/file/svgg3.svg') }}">
                </div>
            </a>
            <div class="hamburger menus-click">
                <i class="bi bi-list fa-xs text-white"></i>
            </div>
        </div>
    </div>
</div>
@endif
@push('after-script')
    {{--<script>
        var menuNavigation = getAllItem('menus')
        let menuHtml = '';
        console.log(window.location.pathname)
        menuNavigation.forEach(element => {
            currlink = ""
            if (window.location.pathname == element.link) {
                currlink = "isActive"
            }
            menuHtml += `<a href="${element.link}" class="nav-link sidebar-link ${currlink}" style=" color: black ">
                    ${element.menu}
                </a>`
            if (typeof element.children != 'undefined') {
                element.children.forEach(child => {
                    menuHtml += `<a href="${child.link}" class="nav-link sidebar-link ${currlink}" style=" color: black ">
                        ${child.menu}
                    </a>`
                });
            }
        });
        $(".link-group").html(menuHtml)
    </script> --}}
    <script>
        var menus = document.querySelector(".menus-click")
        var menusClose = document.querySelector(".close-click")
        const debounce = (func, delay) => {
            let timeout
            return (...args) => {
                if (timeout) clearTimeout(timeout)
                timeout = setTimeout(() => {
                    func(...args)
                }, delay);
            }
        }
        menus.addEventListener("click", debounce(function () {
            var menusBody = document.querySelector(".sidebar-menus")
            var menusBodyChild = document.querySelector(".sidebar-child-menus")
            if (menusBody.classList.contains("active-menus")) {
                menusBody.classList.remove('active-menus')
                menusBodyChild.classList.remove('active-menus')
            }else{
                menusBody.classList.add('active-menus')
                menusBodyChild.classList.add('active-menus')
            }
        }, 200))
        menusClose.addEventListener("click", debounce(function () {
            var menusBody = document.querySelector(".sidebar-menus")
            var menusBodyChild = document.querySelector(".sidebar-child-menus")
            if (menusBody.classList.contains("active-menus")) {
                setTimeout(() => {
                    menusBody.classList.remove('active-menus')
                }, 400);
                menusBodyChild.classList.remove('active-menus')
            }else{
                menusBody.classList.add('active-menus')
                menusBodyChild.classList.add('active-menus')
            }
        }, 200))
    </script>
@endpush
