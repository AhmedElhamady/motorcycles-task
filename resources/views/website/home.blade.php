@extends('website.layouts.master')
@section('title', 'Motorcycle Group — Find the Motorcycle That Moves You')
@section('content')

    {{-- ==================== HERO ==================== --}}
    <section id="home" class="relative flex aspect-[1/1] lg:aspect-[2.5/1] w-full items-center overflow-hidden">
        <!-- Background Image -->
        <img class="absolute inset-0 h-full w-full object-cover" src="{{ asset('website/images/hero.webp') }}" alt="image">

        <!-- Black Transparent Gradient Overlay (Left to Right) -->
        <div class="absolute inset-0 bg-gradient-to-r from-black/70 via-black/30 to-transparent z-[1]"></div>

        <!-- Vertically Centered Left Content Container (Transparent Background) -->
        <div class="relative z-[2] w-full px-6 py-8 sm:px-10 md:px-12 lg:w-[700px] lg:pl-16">
            <p class="eyebrow text-white/90" data-aos="fade-up">Your Journey Starts Here</p>
            <h1 data-aos="fade-up" data-aos-delay="100"
                class="mt-3.5 text-[33px] font-extrabold leading-[1.13] tracking-[-0.028em] text-white sm:text-[38px] md:text-[48px] lg:text-[52px] xl:text-[56px]">
                Find the Motorcycle That Moves You<span class="text-primary">.</span>
            </h1>
            <p data-aos="fade-up" data-aos-delay="200"
                class="mt-4 max-w-[520px] text-[15.5px] leading-[1.55] text-gray-200 md:text-[17px]">
                Discover premium motorcycle brands, explore different riding styles, and find the
                perfect motorcycle for your next adventure.
            </p>
            <div data-aos="fade-up" data-aos-delay="300" class="mt-5 flex flex-wrap gap-2.5 sm:gap-5">
                <a href="#motorcycles"
                    class="group inline-flex h-[38px] sm:h-[46px] items-center justify-center gap-2 sm:gap-[11px] rounded-[5px] bg-primary px-3.5 sm:px-[26px] text-xs sm:text-sm font-semibold leading-none text-white transition hover:-translate-y-px hover:bg-[#F0641D] hover:shadow-[0_8px_20px_rgba(255,116,45,0.24)] active:translate-y-0 active:shadow-none">
                    Explore Motorcycles
                    <i class="fa-solid fa-arrow-right text-[10px] sm:text-xs transition-transform group-hover:translate-x-[3px]"
                        aria-hidden="true"></i>
                </a>
                <a href="#brands"
                    class="group inline-flex h-[38px] sm:h-[46px] items-center justify-center gap-2 sm:gap-[11px] rounded-[5px] border border-white px-3.5 sm:px-[26px] text-xs sm:text-sm font-semibold leading-none text-white transition hover:bg-white hover:text-navy">
                    Discover Our Brands
                    <i class="fa-solid fa-arrow-right text-[10px] sm:text-xs transition-transform group-hover:translate-x-[3px]"
                        aria-hidden="true"></i>
                </a>
            </div>
        </div>
    </section>

    {{-- ==================== BRANDS ==================== --}}
    @if ($brands->isNotEmpty())
        <section class="bg-white pb-[52px] pt-[34px] md:pb-16 lg:pb-[85px] lg:pt-[41px]" id="brands">
            <div class="page-container">
                <p class="eyebrow" data-aos="fade-up">Our Brands</p>
                <div class="max-w-[620px]">
                    <h2 data-aos="fade-up" data-aos-delay="80"
                        class="mt-2 text-3xl font-bold leading-[1.2] tracking-[-0.022em] text-navy sm:text-4xl">
                        Explore Our Brands
                    </h2>
                    <p data-aos="fade-up" data-aos-delay="160"
                        class="mt-2.5 max-w-[560px] text-[15px] leading-[1.55] text-muted md:text-[17px]">
                        Discover premium motorcycle brands, engineered for every ride.
                    </p>
                </div>

                <div class="swiper brands-swiper mt-6 border-y border-line md:mt-8" data-aos="fade-up" data-aos-delay="240">
                    <div class="swiper-wrapper items-stretch">
                        @foreach ($brands as $brand)
                            <div class="swiper-slide h-auto border-l border-line last:border-r">
                                <a class="flex h-[66px] items-center justify-center transition hover:-translate-y-px hover:opacity-60 sm:h-[78px]"
                                    href="#motorcycles" aria-label="{{ $brand->name }}">
                                    <img src="{{ asset($brand->logo) }}" alt="{{ $brand->name }}"
                                        class="h-full w-full object-contain py-2">
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    @endif

    {{-- ==================== ABOUT ==================== --}}
    <section class="bg-white pb-[46px] lg:pb-[63px]" id="about">
        <div class="page-container grid items-start gap-6 md:gap-12 lg:grid-cols-2 xl:grid-cols-[640px_minmax(0,1fr)]">
            <figure class="overflow-hidden rounded-[3px]" data-aos="fade-right">
                <img src="{{ asset('website/images/about.png') }}" alt="Riders preparing their motorcycles" loading="lazy"
                    class="h-[250px] w-full object-cover sm:h-[340px] lg:h-[300px] xl:h-[318px]">
            </figure>

            <div class="lg:pt-[45px]" data-aos="fade-left" data-aos-delay="100">
                <p class="eyebrow">About Us</p>
                <h2 class="mt-2 text-[26px] font-bold leading-[1.3] tracking-[-0.018em] text-navy md:text-[32px]">
                    More Than Motorcycles.<br>A Complete Riding Experience.
                </h2>
                <p class="mt-3.5 max-w-[600px] text-[15.5px] leading-[1.55] text-muted md:text-[17px]">
                    We are a leading motorcycle dealership group, representing the world’s most
                    iconic brands. From sales to service, we’re here to support every rider on their journey.
                </p>
                <a href="#services"
                    class="group mt-5 inline-flex h-[46px] items-center justify-center gap-[11px] rounded-[5px] bg-primary px-[26px] text-sm font-semibold leading-none text-white transition hover:-translate-y-px hover:bg-[#F0641D] hover:shadow-[0_8px_20px_rgba(255,116,45,0.24)] active:translate-y-0 active:shadow-none">
                    Learn More About Us
                    <i class="fa-solid fa-arrow-right text-xs transition-transform group-hover:translate-x-[3px]"
                        aria-hidden="true"></i>
                </a>
            </div>
        </div>
    </section>

    {{-- ==================== RIDING STYLES ==================== --}}
    @if ($categories->isNotEmpty())
        <section class="bg-pale py-[38px] md:py-[48px] lg:pb-[62px]" id="styles">
            <div class="page-container">
                <div>
                    <p class="eyebrow" data-aos="fade-up">Find Your Riding Style</p>
                    <h2 data-aos="fade-up" data-aos-delay="80"
                        class="mt-2.5 text-3xl font-bold leading-[1.2] tracking-[-0.022em] text-navy sm:text-4xl">
                        Find Your Riding Style
                    </h2>
                    <p data-aos="fade-up" data-aos-delay="160"
                        class="mt-2 max-w-[520px] text-[15.5px] leading-[1.55] text-muted md:text-[17px]">
                        Different roads. Different journeys. Find the perfect motorcycle for the way you ride.
                    </p>
                </div>

                <div class="swiper cards-swiper mt-5" data-aos="fade-up" data-aos-delay="240">
                    <div class="swiper-wrapper">
                        @foreach ($categories as $category)
                            <div class="swiper-slide h-auto">
                                <a class="group flex h-[316px] flex-col overflow-hidden rounded border border-line bg-white transition hover:-translate-y-[3px] hover:border-[#CBD9E2] hover:shadow-card sm:h-[326px]"
                                    href="#motorcycles">
                                    <img class="aspect-[4/3] w-full flex-none object-cover transition duration-[450ms] group-hover:scale-[1.035]"
                                        src="{{ asset($category->image) }}" alt="{{ $category->name }}" loading="lazy">
                                    <div class="flex flex-1 items-center justify-between gap-3 px-5 py-[18px]">
                                        <div>
                                            <h3 class="text-[17px] text-navy font-bold leading-[1.3] tracking-[-0.01em]">
                                                {{ $category->name }}
                                            </h3>
                                            <p class="mt-1 text-[13px] leading-[1.45] text-muted">
                                                {{ Str::limit($category->name, 40) }}
                                            </p>
                                        </div>
                                        <i class="fa-solid fa-arrow-right shrink-0 text-sm text-navy transition group-hover:translate-x-[3px] group-hover:text-primary"
                                            aria-hidden="true"></i>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    @endif

    {{-- ==================== FEATURED MOTORCYCLES ==================== --}}
    @if ($featuredMotos->isNotEmpty())
        <section class="bg-white py-[34px] md:py-[39px] lg:pb-[44px]" id="motorcycles">
            <div class="page-container">
                <div>
                    <p class="eyebrow" data-aos="fade-up">Featured Motorcycles</p>
                    <h2 data-aos="fade-up" data-aos-delay="80"
                        class="mt-2.5 text-3xl font-bold leading-[1.2] tracking-[-0.022em] text-navy sm:text-4xl">
                        Featured Motorcycles
                    </h2>
                    <p data-aos="fade-up" data-aos-delay="160"
                        class="mt-2 max-w-[520px] text-[15.5px] leading-[1.55] text-muted md:text-[17px]">
                        Handpicked models from our top brands, ready for the road.
                    </p>
                </div>

                <div class="swiper bikes-swiper relative mt-5 pb-12" data-aos="fade-up" data-aos-delay="240">
                    <div class="swiper-wrapper">
                        @foreach ($featuredMotos as $motorcycle)
                            <div class="swiper-slide h-auto">
                                <article
                                    class="group flex h-full flex-col overflow-hidden rounded border border-line bg-white transition-all duration-300 hover:-translate-y-1 hover:border-[#CBD9E2] hover:shadow-card">

                                    {{-- Motorcycle Image --}}
                                    <div
                                        class="relative w-full flex-none overflow-hidden bg-gradient-to-b from-white via-[#FCFDFE] to-[#F1F6FA] p-4">

                                        {{-- Brand Logo --}}
                                        @if ($motorcycle->brand?->logo)
                                            <img src="{{ asset($motorcycle->brand->logo) }}"
                                                alt="{{ $motorcycle->brand->name }}"
                                                class="absolute left-[12px] top-[12px] z-10 h-10 w-10 object-contain"
                                                loading="lazy">
                                        @endif

                                        {{-- Ground Shadow --}}
                                        <span aria-hidden="true"
                                            class="pointer-events-none absolute inset-x-[20%] bottom-2 h-4 rounded-full bg-[radial-gradient(ellipse_at_center,rgba(16,54,79,0.18)_0%,rgba(16,54,79,0)_72%)] blur-[2px]">
                                        </span>

                                        {{-- Motorcycle --}}
                                        <img src="{{ asset($motorcycle->image) }}" alt="{{ $motorcycle->name }}"
                                            class="relative z-[1] aspect-[4/3] w-full object-contain transition-transform duration-300 group-hover:scale-[1.035]"
                                            loading="lazy">
                                    </div>

                                    {{-- Motorcycle Information --}}
                                    <div class="flex flex-1 flex-col p-[18px]">

                                        {{-- Name & Category --}}
                                        <div class="flex-1">
                                            <h3 class="text-xl font-medium leading-tight tracking-[-0.01em] text-navy">
                                                {{ $motorcycle->name }}
                                            </h3>

                                            @if ($motorcycle->category)
                                                <p
                                                    class="mt-1 flex items-center gap-1.5 text-sm leading-relaxed text-muted">
                                                    <i class="fa-solid fa-layer-group"></i>
                                                    <span>{{ $motorcycle->category->name }}</span>
                                                </p>
                                            @endif
                                        </div>

                                        {{-- Details Link --}}
                                        <a href="#contact"
                                            class="mt-5 inline-flex w-fit items-center gap-2 text-[13px] font-bold text-navy transition-colors hover:text-primary">

                                            View Details

                                            <i class="fa-solid fa-arrow-right text-xs transition-transform duration-300 group-hover:translate-x-1"
                                                aria-hidden="true">
                                            </i>
                                        </a>
                                    </div>
                                </article>
                            </div>
                        @endforeach
                    </div>

                    {{-- Swiper Bottom Pagination --}}
                    <div class="swiper-pagination !bottom-0"></div>
                </div>
            </div>
        </section>
    @endif

    {{-- ==================== SERVICES ==================== --}}
    @if ($services->isNotEmpty())
        <section class="bg-pale py-10 md:py-[65px] lg:pb-[52px]" id="services">
            <div class="page-container grid gap-7 xl:grid-cols-[400px_minmax(0,1fr)] xl:gap-8">
                <div>
                    <p class="eyebrow" data-aos="fade-up">Our Services</p>
                    <h2 data-aos="fade-up" data-aos-delay="80"
                        class="mt-2 text-3xl font-bold leading-[1.2] tracking-[-0.022em] text-navy sm:text-4xl">
                        Everything You Need<br>for the Road Ahead
                    </h2>
                    <p data-aos="fade-up" data-aos-delay="160"
                        class="mt-3.5 max-w-[420px] text-[15.5px] leading-[1.55] text-muted md:text-[17px]">
                        Keep your bike in top condition with our comprehensive services and support.
                    </p>
                </div>

                <div class="grid grid-cols-2 gap-y-9 md:grid-cols-3 xl:grid-cols-5 xl:divide-x xl:divide-line">
                    @foreach ($services as $service)
                        <div class="px-3.5 text-center" data-aos="fade-up" data-aos-delay="{{ $loop->index * 80 }}">
                            <span class="flex h-9 items-center justify-center text-primary" aria-hidden="true">
                                @if ($service->image)
                                    <img src="{{ asset($service->image) }}" alt="" width="24"
                                        class="h-10 w-10 object-contain">
                                @else
                                    <i class="fa-solid fa-screwdriver-wrench text-4xl"></i>
                                @endif
                            </span>
                            <h3 class="mt-4 text-navy font-bold leading-[1.1] tracking-[-0.01em] text-[14px]">
                                {{ $service->name }}
                            </h3>
                            <p class="mt-2 text-[13px] leading-[1.25] text-muted">
                                {!! Str::limit(strip_tags($service->description), 60) !!}
                            </p>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- ==================== SHOWROOM ==================== --}}
    <section class="grid bg-white lg:h-[346px] lg:grid-cols-2 xl:grid-cols-[712px_minmax(0,1fr)]" id="showrooms">
        <div class="h-[250px] overflow-hidden md:h-[320px] lg:h-full" data-aos="fade-right">
            <img src="https://images.pexels.com/photos/30445390/pexels-photo-30445390.jpeg?auto=compress&amp;cs=tinysrgb&w=1600"
                alt="Adventure motorcycles displayed inside a modern showroom" width="1600" height="1067"
                loading="lazy" class="h-full w-full object-cover">
        </div>

        <div data-aos="fade-left" data-aos-delay="100"
            class="px-5 pb-[38px] pt-8 sm:px-6 lg:pb-9 lg:pl-[42px] lg:pr-10 lg:pt-10 xl:pb-9 xl:pl-[52px] xl:pr-[60px] xl:pt-12">
            <p class="eyebrow">Visit Our Showrooms</p>
            <h2 class="mt-2 text-[26px] font-bold leading-[1.3] tracking-[-0.018em] text-navy md:text-[32px]">
                Your Next Ride Deserves<br>to Be Experienced in Person.
            </h2>
            <p class="mt-3.5 max-w-[610px] text-[15.5px] leading-[1.55] text-muted md:text-[17px]">
                See the bikes up close, meet our team, and get expert advice at one of our showrooms across the region.
            </p>
            <div class="mt-5 flex flex-wrap gap-3 sm:gap-4">
                <a href="#contact"
                    class="group inline-flex h-[46px] flex-1 items-center justify-center gap-[11px] rounded-[5px] bg-primary px-[26px] text-sm font-semibold leading-none text-white transition hover:-translate-y-px hover:bg-[#F0641D] hover:shadow-[0_8px_20px_rgba(255,116,45,0.24)] active:translate-y-0 active:shadow-none sm:flex-none">
                    Find a Showroom
                    <i class="fa-solid fa-arrow-right text-xs transition-transform group-hover:translate-x-[3px]"
                        aria-hidden="true"></i>
                </a>
                <a href="#contact"
                    class="group inline-flex h-[46px] flex-1 items-center justify-center gap-[11px] rounded-[5px] border border-navy px-[26px] text-sm font-semibold leading-none text-navy transition hover:bg-navy hover:text-white sm:flex-none">
                    Book a Test Ride
                    <i class="fa-solid fa-arrow-right text-xs transition-transform group-hover:translate-x-[3px]"
                        aria-hidden="true"></i>
                </a>
            </div>
        </div>
    </section>

    {{-- ==================== CONTACT ==================== --}}
    <section class="bg-offwhite py-12" id="contact">
        <div class="page-container grid items-start gap-9 xl:grid-cols-[1.15fr_1fr]">
            <div data-aos="fade-right">
                <p class="eyebrow">Get In Touch</p>
                <h2 class="mt-2 text-[26px] font-bold leading-[1.3] tracking-[-0.018em] text-navy md:text-[32px]">
                    Have a Motorcycle in Mind?
                </h2>
                <p class="mt-3 max-w-[540px] text-[15.5px] leading-[1.55] text-muted md:text-[17px]">
                    Tell us what you’re looking for and our team will get back to you with the best options.
                </p>

                <form class="contact-form mt-5" id="request-form">
                    @csrf
                    <div class="mb-4 grid gap-4 sm:grid-cols-2 md:mb-[22px]">
                        <div class="flex min-w-0 flex-col">
                            <label class="mb-1.5 text-[13px] font-semibold leading-tight text-navy" for="full-name">
                                Full Name <span class="text-primary">*</span>
                            </label>
                            <input
                                class="h-[41px] w-full rounded-[4px] border border-line bg-white px-3.5 text-[13px] text-navy outline-none transition placeholder:text-[#A9B8C3] hover:border-[#C9D7E0] focus:border-primary focus:ring-[3px] focus:ring-primary/10"
                                id="full-name" name="fullName" type="text" placeholder="Your full name"
                                autocomplete="name" required>
                            <p class="field-error text-[12px] text-red-500 mt-1" data-error-for="full-name"></p>
                        </div>

                        <div class="flex min-w-0 flex-col">
                            <label class="mb-1.5 text-[13px] font-semibold leading-tight text-navy" for="email">
                                Email Address <span class="text-primary">*</span>
                            </label>
                            <input
                                class="h-[41px] w-full rounded-[4px] border border-line bg-white px-3.5 text-[13px] text-navy outline-none transition placeholder:text-[#A9B8C3] hover:border-[#C9D7E0] focus:border-primary focus:ring-[3px] focus:ring-primary/10"
                                id="email" name="email" type="email" placeholder="you@example.com"
                                autocomplete="email" required>
                            <p class="field-error text-[12px] text-red-500 mt-1" data-error-for="email"></p>
                        </div>
                    </div>

                    <div class="mb-4 grid gap-4 sm:grid-cols-2 md:mb-[22px]">
                        <div class="flex min-w-0 flex-col">
                            <label class="mb-1.5 text-[13px] font-semibold leading-tight text-navy" for="phone">
                                Phone Number <span class="text-primary">*</span>
                            </label>
                            <div
                                class="flex h-[41px] overflow-hidden rounded-[4px] border border-line bg-white transition focus-within:border-primary focus-within:ring-[3px] focus-within:ring-primary/10">
                                <input
                                    class="h-[39px] w-full rounded-none border-0 bg-transparent px-3.5 text-[13px] text-navy outline-none placeholder:text-[#A9B8C3] focus:ring-0"
                                    id="phone" name="phone" type="tel" placeholder="123 456 7890"
                                    autocomplete="tel" required>
                            </div>
                            <p class="field-error text-[12px] text-red-500 mt-1" data-error-for="phone"></p>
                        </div>

                        <div class="flex min-w-0 flex-col">
                            <label class="mb-1.5 text-[13px] font-semibold leading-tight text-navy" for="model">
                                Motorcycle Selection <span class="text-primary">*</span>
                            </label>
                            <div class="relative">
                                <select
                                    class="h-[41px] w-full cursor-pointer appearance-none rounded-[4px] border border-line bg-white pl-3.5 pr-9 text-[13px] text-navy outline-none transition hover:border-[#C9D7E0] focus:border-primary focus:ring-[3px] focus:ring-primary/10"
                                    id="model" name="model" required>
                                    <option value="" selected disabled>Select a motorcycle</option>
                                    @foreach ($motos as $motorcycle)
                                        <option value="{{ $motorcycle->id }}">
                                            {{ $motorcycle->brand?->name }} {{ $motorcycle->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <i class="fa-solid fa-chevron-down pointer-events-none absolute right-3.5 top-1/2 -translate-y-1/2 text-[10px] text-muted"
                                    aria-hidden="true"></i>
                            </div>
                            <p class="field-error text-[12px] text-red-500 mt-1" data-error-for="model"></p>
                        </div>
                    </div>

                    <div class="mb-4 flex flex-col md:mb-[13px]">
                        <label class="mb-1.5 text-[13px] font-semibold leading-tight text-navy" for="message">
                            Message
                        </label>
                        <textarea
                            class="h-[58px] min-h-[58px] w-full resize-y rounded-[4px] border border-line bg-white px-3.5 py-2.5 text-[13px] leading-[1.45] text-navy outline-none transition placeholder:text-[#A9B8C3] hover:border-[#C9D7E0] focus:border-primary focus:ring-[3px] focus:ring-primary/10"
                            id="message" name="message" placeholder="Tell us how we can help…"></textarea>
                        <p class="field-error text-[12px] text-red-500 mt-1" data-error-for="message"></p>
                    </div>

                    <button type="submit" id="submit-btn"
                        class="group mt-3 inline-flex h-[45px] w-full min-w-[176px] items-center justify-center gap-[11px] rounded-[5px] bg-primary px-[26px] text-sm font-semibold leading-none text-white transition hover:-translate-y-px hover:bg-[#F0641D] hover:shadow-[0_8px_20px_rgba(255,116,45,0.24)] active:translate-y-0 active:shadow-none disabled:cursor-not-allowed disabled:opacity-70 sm:w-auto">
                        <span class="btn-text">Send Enquiry</span>
                        <i class="fa-solid fa-arrow-right text-xs transition-transform group-hover:translate-x-[3px] btn-icon"
                            aria-hidden="true"></i>
                    </button>
                </form>

                {{-- Success Popup --}}
                <div id="success-popup" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/50 px-4">
                    <div class="w-full max-w-md scale-95 rounded-xl bg-white p-6 text-center opacity-0 shadow-2xl transition-all duration-300"
                        id="success-popup-content">
                        <div class="mx-auto mb-4 flex h-16 w-16 items-center justify-center rounded-full bg-green-100">
                            <svg class="h-8 w-8 text-green-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                        </div>
                        <h3 class="mb-2 text-lg font-bold text-navy">Enquiry Sent Successfully!</h3>
                        <p class="mb-6 text-sm text-gray-600">Thank you for reaching out. We'll get back to you soon.</p>
                        <button type="button"
                            class="popup-close inline-flex h-[42px] items-center justify-center rounded-[5px] bg-primary px-6 text-sm font-semibold text-white transition hover:bg-[#F0641D]">
                            Close
                        </button>
                    </div>
                </div>

                {{-- Error Popup --}}
                <div id="error-popup" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/50 px-4">
                    <div class="w-full max-w-md scale-95 rounded-xl bg-white p-6 text-center opacity-0 shadow-2xl transition-all duration-300"
                        id="error-popup-content">
                        <div class="mx-auto mb-4 flex h-16 w-16 items-center justify-center rounded-full bg-red-100">
                            <svg class="h-8 w-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </div>
                        <h3 class="mb-2 text-lg font-bold text-navy">Submission Failed</h3>
                        <p class="mb-6 text-sm text-gray-600" id="error-popup-message">
                            Something went wrong. Please try again.
                        </p>
                        <button type="button"
                            class="popup-close inline-flex h-[42px] items-center justify-center rounded-[5px] bg-red-500 px-6 text-sm font-semibold text-white transition hover:bg-red-600">
                            Close
                        </button>
                    </div>
                </div>
            </div>

            <figure data-aos="fade-left" data-aos-delay="100">
                <img src="https://images.pexels.com/photos/30428901/pexels-photo-30428901.jpeg?auto=compress&amp;cs=tinysrgb&w=1200"
                    alt="Motorcycle on display in a modern dealership showroom" width="1200" height="1800"
                    loading="lazy" class="h-[300px] w-full rounded-[3px] object-cover md:h-[380px] xl:h-[450px]">
            </figure>
        </div>
    </section>
@endsection
@section('js')
    <script>
        $(function() {
            const $form = $('#request-form');
            const $submitBtn = $('#submit-btn');
            const $btnText = $submitBtn.find('.btn-text');
            const $btnIcon = $submitBtn.find('.btn-icon');
            const $successPop = $('#success-popup');
            const $successCont = $('#success-popup-content');
            const $errorPop = $('#error-popup');
            const $errorCont = $('#error-popup-content');
            const $errorMsg = $('#error-popup-message');

            // Open / close helpers with Tailwind animations
            function openPopup($pop, $cont) {
                $pop.removeClass('hidden').addClass('flex');
                // trigger animation next frame
                requestAnimationFrame(() => {
                    $cont.removeClass('opacity-0 scale-95').addClass('opacity-100 scale-100');
                });
            }

            function closePopup($pop, $cont) {
                $cont.removeClass('opacity-100 scale-100').addClass('opacity-0 scale-95');
                setTimeout(() => {
                    $pop.removeClass('flex').addClass('hidden');
                }, 250);
            }

            $('.popup-close').on('click', function() {
                const $btn = $(this);
                if ($btn.closest('#success-popup').length) {
                    closePopup($successPop, $successCont);
                } else {
                    closePopup($errorPop, $errorCont);
                }
            });
            // click outside to close
            $('#success-popup, #error-popup').on('click', function(e) {
                if (e.target === this) {
                    if (this.id === 'success-popup') {
                        closePopup($successPop, $successCont);
                    } else {
                        closePopup($errorPop, $errorCont);
                    }
                }
            });

            // Clear previous field errors
            function clearErrors() {
                $form.find('.field-error').text('');
                $form.find('input, select, textarea').removeClass('border-red-500');
            }

            // Submit handler
            $form.on('submit', function(e) {
                e.preventDefault();

                clearErrors();

                const originalText = $btnText.text();
                $submitBtn.prop('disabled', true);
                $btnText.text('Sending...');
                $btnIcon.addClass('hidden');

                $.ajax({
                    url: "{{ route('enquery.store') }}",
                    type: 'POST',
                    data: $form.serialize(),
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') ||
                            $form.find('input[name="_token"]').val()
                    },
                    success: function(res) {
                        if (res.status) {
                            $form[0].reset();
                            openPopup($successPop, $successCont);
                        } else {
                            $errorMsg.text(res.message || 'Something went wrong.');
                            openPopup($errorPop, $errorCont);
                        }
                    },
                    error: function(xhr) {
                        if (xhr.status === 422 && xhr.responseJSON?.errors) {
                            const errors = xhr.responseJSON.errors;
                            $.each(errors, function(field, messages) {
                                const $errEl = $form.find(
                                    `[data-error-for="${field}"]`);
                                if ($errEl.length) {
                                    $errEl.text(messages[0]);
                                    $('#' + $errEl.attr('data-error-for'))
                                        .addClass('border-red-500');
                                }
                            });
                            $errorMsg.text(xhr.responseJSON.message ||
                                'Please check the form fields.');
                        } else {
                            $errorMsg.text(
                                xhr.responseJSON?.message ||
                                'Something went wrong. Please try again.'
                            );
                        }
                        openPopup($errorPop, $errorCont);
                    },
                    complete: function() {
                        $submitBtn.prop('disabled', false);
                        $btnText.text(originalText);
                        $btnIcon.removeClass('hidden');
                    }
                });
            });



            AOS.init({
                duration: 700,
                easing: 'ease-out-cubic',
                once: true,
                offset: 80,
                disable: window.matchMedia('(prefers-reduced-motion: reduce)').matches
            });
        });
    </script>
@endsection
