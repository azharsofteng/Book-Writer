<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                {{-- <div class="sb-sidenav-menu-heading">Core</div> --}}
                <a class="nav-link {{ Request::is('/dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                {{-- <div class="sb-sidenav-menu-heading">Interface</div> --}}
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Web Content
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ route('banner.edit') }}">Banner</a>
                        <a class="nav-link" href="{{ route('category.index') }}">Category</a>
                        <a class="nav-link" href="#">Product</a>
                        <a class="nav-link" href="{{ route('blog.index') }}">Blog</a>
                    </nav>
                </div>

                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsOrder" aria-expanded="false" aria-controls="collapsOrder">
                    <div class="sb-nav-link-icon"><i class="fas fa-list"></i></div>
                    Order
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapsOrder" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                        <a class="nav-link" href="#">Static Navigation</a>
                    </nav>
                </div>

                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsSettings" aria-expanded="false" aria-controls="collapsSettings">
                    <div class="sb-nav-link-icon"><i class="fas fa-cogs"></i></div>
                    Settings
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapsSettings" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                        <a class="nav-link" href="{{ route('content.edit') }}">Company Content</a>
                        <a class="nav-link" href="{{ route('about.edit') }}">Update About</a>
                    </nav>
                </div>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseAdministration" aria-expanded="false" aria-controls="collapseAdministration">
                    <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                    Administration
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseAdministration" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                        <a class="nav-link" href="#">Create User</a>
                    </nav>
                </div>
                {{-- <div class="sb-sidenav-menu-heading">Addons</div> --}}
                <a class="nav-link" href="#">
                    <div class="sb-nav-link-icon"><i class="fas fa-envelope "></i></div>
                    Public Message
                </a>
                {{-- <a class="nav-link {{ Request::is('table') ? 'active' : '' }}" href="{{ route('table') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                    Tables
                </a>
                <a class="nav-link {{ Request::is('form') ? 'active' : '' }}" href="{{ route('form') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                    Input Group
                </a> --}}
            </div>
        </div>
    </nav>
</div>