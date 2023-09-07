<header class="main-nav">
    <div class="sidebar-user text-center">
        <a class="setting-primary" href="javascript:void(0)"><i data-feather="settings"></i></a><img
            class="img-90 rounded-circle" src="{{ asset('assets/images/dashboard/1.png') }}" alt="" />
        <div class="badge-bottom"><span class="badge badge-primary">New</span></div>
        <a href="user-profile">
            <h6 class="mt-3 f-14 f-w-600">Emay Walter</h6>
        </a>
        <p class="mb-0 font-roboto">Human Resources Department</p>
        <ul>
            <li>
                <span><span class="counter">19.8</span>k</span>
                <p>Follow</p>
            </li>
            <li>
                <span>2 year</span>
                <p>Experince</p>
            </li>
            <li>
                <span><span class="counter">95.2</span>k</span>
                <p>Follower</p>
            </li>
        </ul>
    </div>
    <nav>
        <div class="main-navbar">
            <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
            <div id="mainnav">
                <ul class="nav-menu custom-scrollbar">
                    <li class="back-btn">
                        <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2"
                                aria-hidden="true"></i></div>
                    </li>

                    {{-- Properties --}}
                    <li class="dropdown">
                        <a class="nav-link menu-title {{ prefixActive('/properties') }}" href="javascript:void(0)"><i
                                data-feather="layers"></i><span>Properties</span></a>
                        <ul class="nav-submenu menu-content" style="display: {{ prefixBlock('/properties') }};">
                            <li><a href="{{ route('properties') }}"
                                    class="{{ routeActive('state-color') }}">properties</a></li>
                            <li><a href="{{ route('create.property') }}"class="{{ routeActive('typography') }}">create
                                    property</a></li>
                        </ul>
                    </li>


                    {{-- property documents --}}
                    <li class="dropdown">
                        <a class="nav-link menu-title {{ prefixActive('/property_documents') }}"
                            href="javascript:void(0)"><i data-feather="file-text"></i><span>Property
                                Documents</span></a>
                        <ul class="nav-submenu menu-content" style="display: {{ prefixBlock('/property_documents') }};">
                            <li><a href="{{ route('property_documents') }}"
                                    class="{{ routeActive('state-color') }}">property
                                    documents</a></li>
                            <li><a
                                    href="{{ route('create.property_document') }}"class="{{ routeActive('typography') }}">create
                                    property document</a></li>

                        </ul>
                    </li>


                    {{-- flats --}}
                    <li class="dropdown">
                        <a class="nav-link menu-title {{ prefixActive('/flats') }}" href="javascript:void(0)"><i
                                data-feather="box"></i><span>Flats</span></a>
                        <ul class="nav-submenu menu-content" style="display: {{ prefixBlock('/flats') }};">
                            <li><a href="{{ route('flats') }}" class="{{ routeActive('state-color') }}">flats</a></li>
                            <li><a href="{{ route('create.flat') }}"class="{{ routeActive('typography') }}">create
                                    flat</a></li>
                        </ul>
                    </li>


                    {{-- users --}}
                    <li class="dropdown">
                        <a class="nav-link menu-title {{ prefixActive('/users') }}" href="javascript:void(0)"><i
                                data-feather="users"></i><span>Users</span></a>
                        <ul class="nav-submenu menu-content" style="display: {{ prefixBlock('/users') }};">
                            <li><a href="{{ route('users') }}" class="{{ routeActive('state-color') }}">users</a></li>
                            <li><a href="{{ route('create.user') }}"class="{{ routeActive('typography') }}">create
                                    user</a></li>

                        </ul>
                    </li>


                    {{-- user documents --}}
                    <li class="dropdown">
                        <a class="nav-link menu-title {{ prefixActive('/user_documents') }}"
                            href="javascript:void(0)"><i data-feather="file-text"></i><span>User Documents</span></a>
                        <ul class="nav-submenu menu-content" style="display: {{ prefixBlock('/user_documents') }};">
                            <li><a href="{{ route('user_documents') }}" class="{{ routeActive('state-color') }}">user
                                    documents</a></li>
                            <li><a href="{{ route('create.user_document') }}"class="{{ routeActive('typography') }}">create
                                    user document</a></li>

                        </ul>
                    </li>


                    {{-- contracts --}}
                    <li class="dropdown">
                        <a class="nav-link menu-title {{ prefixActive('/contracts') }}" href="javascript:void(0)"><i
                                data-feather="file-text"></i><span>Contracts</span></a>
                        <ul class="nav-submenu menu-content" style="display: {{ prefixBlock('/contracts') }};">
                            <li><a href="{{ route('contracts') }}"
                                    class="{{ routeActive('state-color') }}">contracts</a></li>
                            <li><a href="{{ route('create.contract') }}"class="{{ routeActive('typography') }}">create
                                    contracts</a></li>

                        </ul>
                    </li>



                    {{-- services --}}
                    <li class="dropdown">
                        <a class="nav-link menu-title {{ prefixActive('/services') }}" href="javascript:void(0)"><i
                                data-feather="airplay"></i><span>Services</span></a>
                        <ul class="nav-submenu menu-content" style="display: {{ prefixBlock('/services') }};">
                            <li><a href="{{ route('services') }}"
                                    class="{{ routeActive('state-color') }}">services</a></li>
                            <li><a href="{{ route('create.service') }}"class="{{ routeActive('typography') }}">create
                                    services</a></li>

                        </ul>
                    </li>



                    {{-- requests --}}
                    <li class="dropdown">
                        <a class="nav-link menu-title {{ prefixActive('/requests') }}" href="javascript:void(0)"><i
                                data-feather="repeat"></i><span>Request</span></a>
                        <ul class="nav-submenu menu-content" style="display: {{ prefixBlock('/requests') }};">
                            <li><a href="{{ route('requests') }}"
                                    class="{{ routeActive('state-color') }}">requests</a></li>
                            <li><a href="{{ route('create.request') }}"class="{{ routeActive('typography') }}">create
                                    requests</a></li>

                        </ul>
                    </li>


                    {{-- invoices --}}
                    <li class="dropdown">
                        <a class="nav-link menu-title {{ prefixActive('/invoices') }}" href="javascript:void(0)"><i
                                data-feather="file-text"></i><span>Invoices</span></a>
                        <ul class="nav-submenu menu-content" style="display: {{ prefixBlock('/invoices') }};">
                            <li><a href="{{ route('invoices') }}"
                                    class="{{ routeActive('state-color') }}">invoices</a></li>
                            <li><a href="{{ route('create.invoice') }}"class="{{ routeActive('typography') }}">create
                                    invoice</a></li>

                        </ul>
                    </li>





                </ul>
            </div>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </div>
    </nav>
</header>
