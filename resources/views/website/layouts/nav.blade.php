<header class="site-header" id="site-header">
    <div class="page-container header-inner">
        <a href="#home" class="brand" aria-label="Motorcycle Group — home">
            <img src="{{ asset('logo/logo.png') }}" class="h-12">
        </a>

        <nav class="main-nav" aria-label="Main navigation">
            <a href="#home" class="nav-link">Home</a>
            <a href="#brands" class="nav-link">Brands</a>
            <a href="#motorcycles" class="nav-link">Motorcycles</a>
            <a href="#styles" class="nav-link">Categories</a>
            <a href="#services" class="nav-link">Services</a>
            <a href="#about" class="nav-link">About Us</a>
            <a href="#contact" class="nav-link">Contact</a>
        </nav>

        <div class="header-actions">
            <button class="search-toggle" type="button" aria-label="Open search" aria-expanded="false"
                aria-controls="search-drawer">
                <i class="fa-solid fa-magnifying-glass" aria-hidden="true"></i>
            </button>
            <a href="#contact" class="btn btn-primary btn-header">
                <i class="fa-regular fa-calendar-days" aria-hidden="true"></i>
                <span>Book a Test Ride</span>
                <i class="fa-solid fa-arrow-right btn-arrow" aria-hidden="true"></i>
            </a>
            <button class="menu-toggle" type="button" aria-label="Open menu" aria-expanded="false"
                aria-controls="mobile-menu">
                <i class="fa-solid fa-bars" aria-hidden="true"></i>
            </button>
        </div>
    </div>

    <div class="search-drawer" id="search-drawer">
        <form class="search-form" role="search" onsubmit="return false;">
            <label class="sr-only" for="site-search">Search motorcycles</label>
            <i class="fa-solid fa-magnifying-glass" aria-hidden="true"></i>
            <input id="site-search" type="search" placeholder="Search motorcycles, brands, categories…">
            <button type="button" class="search-close" aria-label="Close search"><i class="fa-solid fa-xmark"
                    aria-hidden="true"></i></button>
        </form>
    </div>

    <div class="mobile-menu" id="mobile-menu">
        <nav aria-label="Mobile navigation">
            <a href="#home" class="mobile-link">Home</a>
            <a href="#brands" class="mobile-link">Brands</a>
            <a href="#motorcycles" class="mobile-link">Motorcycles</a>
            <a href="#styles" class="mobile-link">Categories</a>
            <a href="#services" class="mobile-link">Services</a>
            <a href="#about" class="mobile-link">About Us</a>
            <a href="#contact" class="mobile-link">Contact</a>
        </nav>
        <a href="#contact" class="btn btn-primary mobile-cta">
            <i class="fa-regular fa-calendar-days" aria-hidden="true"></i>
            Book a Test Ride
            <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
        </a>
    </div>
</header>
