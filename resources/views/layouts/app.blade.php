<!DOCTYPE html>
<html lang="en" style="scroll-behavior: smooth">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="assets/img/favicon.png" type="image/png" />

    <title>Shine - TailwindCSS Startup and SaaS Landing Page Template</title>

    <!-- Icon -->
    <link rel="stylesheet" href="assets/css/lineicons.css" />
    <!-- Tailwind css -->
    <link rel="stylesheet" href="assets/css/tailwindcss.css" />
    <link rel="stylesheet" href="assets/css/search.css" />
  </head>
  <body>
    <!-- Header Area wrapper Starts -->
    <header id="header-wrap" class="relative">
      <!-- Navbar Start -->
      <div class="navigation fixed top-0 left-0 w-full z-30 duration-300">
        <div class="container px-4">
          <nav
            class="
              navbar
              py-2
              navbar-expand-lg
              flex
              justify-between
              items-center
              relative
              duration-300
            "
          >
            <a class="navbar-brand" href="index.html">
              <img src="assets/img/logo.svg" alt="Logo" />
            </a>
            <button class="navbar-toggler focus:outline-none block lg:hidden">
              <span
                class="
                  toggler-icon
                  block
                  bg-gray-700
                  relative
                  duration-300
                  h-[2px]
                  w-[30px]
                  my-[6px]
                "
              >
              </span>
              <span
                class="
                  toggler-icon
                  block
                  bg-gray-700
                  relative
                  duration-300
                  h-[2px]
                  w-[30px]
                  my-[6px]
                "
              >
              </span>
              <span
                class="
                  toggler-icon
                  block
                  bg-gray-700
                  relative
                  duration-300
                  h-[2px]
                  w-[30px]
                  my-[6px]
                "
              >
              </span>
            </button>

            <div
              class="
                collapse
                navbar-collapse
                hidden
                lg:block
                duration-300
                shadow
                absolute
                top-full
                left-0
                mt-full
                bg-white
                z-20
                px-5
                py-3
                w-full
                lg:static lg:bg-transparent lg:shadow-none
              "
              id="navbarSupportedContent"
            >
              <ul
                class="navbar-nav mr-auto justify-center items-center lg:flex"
              >
                <li class="nav-item">
                  <a class="page-scroll nav-link active" href="#hero-area"
                    >Home</a
                  >
                </li>
                <li class="nav-item">
                  <a class="page-scroll nav-link" href="#about">About</a>
                </li>
                <li class="nav-item">
                  <a class="page-scroll nav-link" href="#team">Team</a>
                </li>
                <li class="nav-item">
                  <a class="page-scroll nav-link" href="#contact">Contact</a>
                </li>
              </ul>
            </div>
            <div
              class="
                header-btn
                hidden
                sm:block sm:absolute sm:right-0 sm:mr-16
                lg:static lg:mr-0
              "
            >
              <a
                class="
                  text-blue-600
                  border border-blue-600
                  px-10
                  py-3
                  rounded-full
                  duration-300
                  hover:bg-blue-600 hover:text-white
                "
                href="#feature"
              >
                FAQ</a
              >
            </div>
          </nav>
        </div>
      </div>
      <!-- Navbar End -->
    </header>
    <!-- Header Area wrapper End -->

    <!-- Hero Area Start -->
    <section id="hero-area" class="bg-blue-100 pt-48 pb-10">
      <div class="container px-4">
        <div class="flex justify-between">
          <div class="w-full text-center">
            <h2 class="text-4xl font-bold leading-snug text-gray-700 mb-10">
              Welcome to <br class="hidden lg:block" />
              Game System
            </h2>
            <div class="text-center">
              <img class="img-fluid mx-auto" src="assets/img/hero.svg" alt="" />
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Hero Area End -->

    <!-- Services Section Start -->
    <section id="#search" class="py-24">
        @yield('content')
    </section>
    <!-- Services Section End -->

    <!-- Footer Section Start -->
    <footer id="footer" class="bg-gray-800 py-16">
      <div class="container px-4">
        <div class="flex flex-wrap">
          <div class="w-full sm:w-1/2 md:w-1/2 lg:w-1/4">
            <div class="mx-3 mb-8">
              <div class="footer-logo mb-3">
                <img src="assets/img/logo.svg" alt="" />
              </div>
              <p class="text-gray-300">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                Quisquam excepturi quasi, ipsam voluptatem.
              </p>
            </div>
          </div>
          
          <div class="w-full sm:w-1/2 md:w-1/2 lg:w-1/4">
            <div class="mx-3 mb-8">
              <h3 class="font-bold text-xl text-white mb-5">Find us on</h3>

              <ul class="social-icons flex justify-start">
                <li class="mr-4">
                  <a
                    href="javascript:void(0)"
                    class="
                      flex
                      justify-center
                      items-center
                      w-8
                      h-8
                      bg-white
                      rounded-full
                      text-sm text-gray-700
                      duration-300
                      hover:text-white hover:bg-indigo-500
                    "
                  >
                    <i class="lni lni-facebook-filled" aria-hidden="true"> </i>
                  </a>
                </li>
                <li class="mr-4">
                  <a
                    href="javascript:void(0)"
                    class="
                      flex
                      justify-center
                      items-center
                      w-8
                      h-8
                      bg-white
                      rounded-full
                      text-sm text-gray-700
                      duration-300
                      hover:text-white hover:bg-blue-400
                    "
                  >
                    <i class="lni lni-twitter-filled" aria-hidden="true"> </i>
                  </a>
                </li>
                <li class="mr-4">
                  <a
                    href="javascript:void(0)"
                    class="
                      flex
                      justify-center
                      items-center
                      w-8
                      h-8
                      bg-white
                      rounded-full
                      text-sm text-gray-700
                      duration-300
                      hover:text-white hover:bg-red-500
                    "
                  >
                    <i class="lni lni-instagram-filled" aria-hidden="true"> </i>
                  </a>
                </li>
                <li class="mr-4">
                  <a
                    href="javascript:void(0)"
                    class="
                      flex
                      justify-center
                      items-center
                      w-8
                      h-8
                      bg-white
                      rounded-full
                      text-sm text-gray-700
                      duration-300
                      hover:text-white hover:bg-indigo-600
                    "
                  >
                    <i class="lni lni-linkedin-original" aria-hidden="true">
                    </i>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </footer>
    <!-- Footer Section End -->

    <section class="bg-gray-800 py-6 border-t-2 border-gray-700 border-dotted">
      <div class="container px-4">
        <div class="flex flex-wrap">
          <div class="w-full text-center">
            <p class="text-white">
              Designed and Developed by
              <a
                class="text-white duration-300 hover:text-blue-600"
                href="https://tailwindtemplates.co"
                rel="nofollow"
              >
                TailwindTemplates
              </a>
              and
              <a
                class="text-white duration-300 hover:text-blue-600"
                href="https://uideck.com"
                rel="nofollow"
              >
                UIdeck
              </a>
            </p>
          </div>
        </div>
      </div>
    </section>

    <!-- Go to Top Link -->
    <a
      href="#"
      class="
        back-to-top
        w-10
        h-10
        fixed
        bottom-0
        right-0
        mb-5
        mr-5
        flex
        items-center
        justify-center
        rounded-full
        bg-blue-600
        text-white text-lg
        z-20
        duration-300
        hover:bg-blue-400
      "
    >
      <i class="lni lni-chevron-up"> </i>
    </a>

    <!-- All js Here -->
    <script src="assets/js/main.js"></script>
  </body>
</html>
