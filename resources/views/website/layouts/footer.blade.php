<footer class="bg-navy text-gray-300 pt-16 pb-8 border-t border-gray-800">
    <div class="page-container">
        <!-- Main Footer Content -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8 lg:gap-10 pb-4">

            <!-- Brand & Social Column -->
            <div class="sm:col-span-2 md:col-span-3 lg:col-span-1 space-y-6">
                <a href="#home" class="inline-block focus:outline-none focus:ring-2 focus:ring-primary rounded"
                    aria-label="Motorcycle Group — home">
                    <img src="{{ asset('logo/logo.png') }}" alt="Motorcycle Group logo"
                        class="h-10 sm:h-12 w-auto object-contain brightness-0 invert">
                </a>
                <p class="text-sm text-gray-400 leading-relaxed max-w-xs">
                    Your trusted destination for premium motorcycle brands, styles, and expert service.
                </p>
                <!-- Social Media Icons -->
                <div class="flex items-center gap-3 pt-2">
                    <a href="#" aria-label="Facebook"
                        class="w-9 h-9 flex items-center justify-center rounded-full bg-gray-800/80 text-gray-300 hover:bg-primary hover:text-white transition-colors duration-200">
                        <i class="fa-brands fa-facebook-f text-sm" aria-hidden="true"></i>
                    </a>
                    <a href="#" aria-label="Instagram"
                        class="w-9 h-9 flex items-center justify-center rounded-full bg-gray-800/80 text-gray-300 hover:bg-primary hover:text-white transition-colors duration-200">
                        <i class="fa-brands fa-instagram text-sm" aria-hidden="true"></i>
                    </a>
                    <a href="#" aria-label="YouTube"
                        class="w-9 h-9 flex items-center justify-center rounded-full bg-gray-800/80 text-gray-300 hover:bg-primary hover:text-white transition-colors duration-200">
                        <i class="fa-brands fa-youtube text-sm" aria-hidden="true"></i>
                    </a>
                    <a href="#" aria-label="LinkedIn"
                        class="w-9 h-9 flex items-center justify-center rounded-full bg-gray-800/80 text-gray-300 hover:bg-primary hover:text-white transition-colors duration-200">
                        <i class="fa-brands fa-linkedin-in text-sm" aria-hidden="true"></i>
                    </a>
                </div>
            </div>

            <!-- Quick Links -->
            <div class="space-y-4">
                <h3 class="text-white text-base font-semibold tracking-wider uppercase">Quick Links</h3>
                <ul class="space-y-2.5 text-sm">
                    <li><a href="#home" class="hover:text-white transition-colors duration-150 inline-block">Home</a>
                    </li>
                    <li><a href="#brands"
                            class="hover:text-white transition-colors duration-150 inline-block">Brands</a></li>
                    <li><a href="#motorcycles"
                            class="hover:text-white transition-colors duration-150 inline-block">Motorcycles</a></li>
                    <li><a href="#styles"
                            class="hover:text-white transition-colors duration-150 inline-block">Categories</a></li>
                    <li><a href="#services"
                            class="hover:text-white transition-colors duration-150 inline-block">Services</a></li>
                    <li><a href="#about" class="hover:text-white transition-colors duration-150 inline-block">About
                            Us</a></li>
                </ul>
            </div>

            <!-- Our Brands -->
            <div class="space-y-4">
                <h3 class="text-white text-base font-semibold tracking-wider uppercase">Our Brands</h3>
                <ul class="space-y-2.5 text-sm">
                    @foreach ($Brands as $brand)
                        <li>
                            <a href="#" class="hover:text-white transition-colors duration-150 inline-block">
                                {{ $brand->name }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

            <!-- Contact Us -->
            <div class="space-y-4">
                <h3 class="text-white text-base font-semibold tracking-wider uppercase">Contact Us</h3>
                <ul class="space-y-3 text-sm">
                    <li>
                        <a href="tel:+20212345678"
                            class="flex items-center gap-3 hover:text-white transition-colors duration-150 group">
                            <span
                                class="w-8 h-8 flex items-center justify-center rounded bg-gray-800/50 group-hover:bg-primary group-hover:text-white text-primary transition-colors">
                                <i class="fa-solid fa-phone text-xs" aria-hidden="true"></i>
                            </span>
                            <span>+20 2 1234 5678</span>
                        </a>
                    </li>
                    <li>
                        <a href="mailto:info@motorcyclegroup.com"
                            class="flex items-center gap-3 hover:text-white transition-colors duration-150 group">
                            <span
                                class="w-8 h-8 flex items-center justify-center rounded bg-gray-800/50 group-hover:bg-primary group-hover:text-white text-primary transition-colors">
                                <i class="fa-regular fa-envelope text-xs" aria-hidden="true"></i>
                            </span>
                            <span class="break-all">info@motorcyclegroup.com</span>
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center gap-3">
                            <span class="w-8 h-8 flex items-center justify-center rounded bg-gray-800/50 text-primary">
                                <i class="fa-solid fa-location-dot text-xs" aria-hidden="true"></i>
                            </span>
                            <span>Cairo, Egypt</span>
                        </div>
                    </li>
                </ul>
            </div>

        </div>

        <!-- Footer Bottom Bar -->
        <div class="pt-8 flex flex-col sm:flex-row items-center justify-between gap-4 text-xs text-gray-400">
            <p>© 2026 Motorcycle Group. All rights reserved.</p>
            <div class="flex items-center gap-6">
                <a href="#" class="hover:text-white transition-colors duration-150">Privacy Policy</a>
                <span class="w-1 h-1 rounded-full bg-gray-700" aria-hidden="true"></span>
                <a href="#" class="hover:text-white transition-colors duration-150">Terms of Use</a>
            </div>
        </div>
    </div>
</footer>
