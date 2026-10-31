/* ==========================================================================
   Motorcycle Group — interactions
   Sticky header, navigation, search, sliders and enquiry form validation.
   ========================================================================== */
(function ($) {
  "use strict";

  $(function () {
    var $header = $("#site-header");
    var $searchDrawer = $("#search-drawer");
    var $searchToggle = $(".search-toggle");
    var $mobileMenu = $("#mobile-menu");
    var $menuToggle = $(".menu-toggle");
    var $navLinks = $(".main-nav .nav-link");
    var $sections = $("main section[id]");
    var ticking = false;

    /* ----------------------------------------------------------------------
       Header state + scroll spy
       ---------------------------------------------------------------------- */
    function updateScrollState() {
      var scrollTop = window.pageYOffset || document.documentElement.scrollTop;
      $header.toggleClass("is-stuck", scrollTop > 8);

      var probe = scrollTop + 120;
      var currentId = "";

      $sections.each(function () {
        if (this.offsetTop <= probe) {
          currentId = this.id;
        }
      });

      $navLinks.each(function () {
        $(this).toggleClass("is-active", $(this).attr("href") === "#" + currentId);
      });

      ticking = false;
    }

    function requestScrollUpdate() {
      if (!ticking) {
        ticking = true;
        window.requestAnimationFrame(updateScrollState);
      }
    }

    $(window).on("scroll", requestScrollUpdate);
    updateScrollState();

    /* ----------------------------------------------------------------------
       Search drawer
       ---------------------------------------------------------------------- */
    function openSearch() {
      closeMobileMenu();
      $searchDrawer.addClass("is-open");
      $searchToggle.attr("aria-expanded", "true");
      window.setTimeout(function () {
        $("#site-search").trigger("focus");
      }, 60);
    }

    function closeSearch() {
      $searchDrawer.removeClass("is-open");
      $searchToggle.attr("aria-expanded", "false");
    }

    $searchToggle.on("click", function () {
      if ($searchDrawer.hasClass("is-open")) {
        closeSearch();
      } else {
        openSearch();
      }
    });

    $(".search-close").on("click", closeSearch);

    $(".search-form").on("submit", function (event) {
      event.preventDefault();
      closeSearch();
      var target = document.getElementById("motorcycles");
      if (target) {
        target.scrollIntoView({ behavior: "smooth", block: "start" });
      }
    });

    /* ----------------------------------------------------------------------
       Mobile menu
       ---------------------------------------------------------------------- */
    function openMobileMenu() {
      closeSearch();
      $mobileMenu.addClass("is-open");
      $menuToggle.attr("aria-expanded", "true").attr("aria-label", "Close menu");
      $("body").addClass("menu-open");
    }

    function closeMobileMenu() {
      $mobileMenu.removeClass("is-open");
      $menuToggle.attr("aria-expanded", "false").attr("aria-label", "Open menu");
      $("body").removeClass("menu-open");
    }

    $menuToggle.on("click", function () {
      if ($mobileMenu.hasClass("is-open")) {
        closeMobileMenu();
      } else {
        openMobileMenu();
      }
    });

    $(".mobile-link, .mobile-cta").on("click", closeMobileMenu);

    $(document).on("click", function (event) {
      if (!$(event.target).closest(".site-header").length) {
        closeSearch();
        closeMobileMenu();
      }
    });

    $(document).on("keydown", function (event) {
      if (event.key === "Escape") {
        closeSearch();
        closeMobileMenu();
      }
    });

    $(window).on("resize", function () {
      if (window.innerWidth >= 1200) {
        closeMobileMenu();
        closeSearch();
      }
    });

    /* ----------------------------------------------------------------------
       Swiper sliders
       ---------------------------------------------------------------------- */
    if (window.Swiper) {
      /* eslint-disable no-new */
      new window.Swiper(".brands-swiper", {
        slidesPerView: 2.4,
        spaceBetween: 0,
        speed: 500,
        watchOverflow: true,
        breakpoints: {
          480: { slidesPerView: 3 },
          640: { slidesPerView: 3.35 },
          900: { slidesPerView: 5 },
          1200: {
            slidesPerView: 7,
          }
        }
      });

      var cardBreakpoints = {
        640: { slidesPerView: 2.1, spaceBetween: 20 },
        900: { slidesPerView: 3, spaceBetween: 24 },
        1200: {
          slidesPerView: 4,
          spaceBetween: 28,
          allowTouchMove: false
        }
      };

      new window.Swiper(".cards-swiper", {
        slidesPerView: 1.14,
        spaceBetween: 16,
        speed: 500,
        watchOverflow: true,
        breakpoints: cardBreakpoints
      });

      new window.Swiper(".bikes-swiper", {
        slidesPerView: 1.14,
        spaceBetween: 16,
        speed: 500,
        watchOverflow: true,
        loop: true,
        autoplay: {
          delay: 3000,
          disableOnInteraction: false,
          pauseOnMouseEnter: true
        },
        pagination: {
          el: ".bikes-swiper .swiper-pagination",
          clickable: true
        },
        breakpoints: {
          640: { slidesPerView: 2.1, spaceBetween: 20 },
          900: { slidesPerView: 3, spaceBetween: 24 },
          1200: {
            slidesPerView: 4,
            spaceBetween: 28,
          }
        }
      });
    }

    /* ----------------------------------------------------------------------
       Enquiry form
       ---------------------------------------------------------------------- */
    var $form = $("#contact-form");
    var $success = $("#form-success");
    var successTimer = null;

    function errorElement($field) {
      return $('[data-error-for="' + $field.attr("id") + '"]');
    }

    function setError($field, message) {
      $field.addClass("is-invalid").attr("aria-invalid", "true");
      $field.closest(".phone-group").addClass("is-invalid");
      var $error = errorElement($field);
      $error.text(message).addClass("is-visible");
    }

    function clearError($field) {
      $field.removeClass("is-invalid").removeAttr("aria-invalid");
      $field.closest(".phone-group").removeClass("is-invalid");
      errorElement($field).text("").removeClass("is-visible");
    }

    function clearAllErrors() {
      $form.find(".field, .check").each(function () {
        clearError($(this));
      });
      $success.prop("hidden", true);
    }

    $form.on("input change", function (event) {
      var $field = $(event.target);
      if ($field.hasClass("field") || $field.hasClass("check")) {
        clearError($field);
      }
    });

    $form.on("submit", function (event) {
      event.preventDefault();
      var valid = true;
      var $name = $("#full-name");
      var $email = $("#email");
      var $phone = $("#phone");
      var $model = $("#model");
      var $terms = $("#terms");

      clearAllErrors();

      if ($.trim($name.val()).length < 2) {
        setError($name, "Please enter your full name.");
        valid = false;
      }

      var emailValue = $.trim($email.val());
      var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/;
      if (!emailPattern.test(emailValue)) {
        setError($email, "Please enter a valid email address.");
        valid = false;
      }

      var phoneValue = $.trim($phone.val());
      var digits = phoneValue.replace(/\D/g, "");
      if (digits.length < 7 || digits.length > 15) {
        setError($phone, "Please enter a valid phone number.");
        valid = false;
      }

      if (!$model.val()) {
        setError($model, "Please select a motorcycle.");
        valid = false;
      }

      if (!$terms.is(":checked")) {
        $terms.addClass("is-invalid").attr("aria-invalid", "true");
        errorElement($terms)
          .text("Please accept the Privacy Policy and Terms of Use.")
          .addClass("is-visible");
        valid = false;
      }

      if (!valid) {
        var $firstInvalid = $form.find(".is-invalid").first();
        if ($firstInvalid.length) {
          $firstInvalid.trigger("focus");
        }
        return;
      }

      $success.prop("hidden", false);
      $form[0].reset();
      $form.find(".is-invalid").each(function () {
        clearError($(this));
      });

      if (successTimer) {
        window.clearTimeout(successTimer);
      }
      successTimer = window.setTimeout(function () {
        $success.prop("hidden", true);
      }, 9000);
    });
  });
})(jQuery);
