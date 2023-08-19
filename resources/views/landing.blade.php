<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('home/assets/main.css') }}" />
    <!-- Akhir Custom CSS -->
    <!-- Animation -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <!-- akhir animation -->
    <title>TalentFinder</title>
</head>

<body class="bg-primary text-primary">
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="#">TALENTFINDER</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-auto">
                    <a class="nav-link" href="pages/faq-pages.html">FAQ</a>
                    <a class="nav-link" href="#">Contact Us</a>
                    <a class="nav-link" href="#">About Us</a>
                </div>
            </div>
        </div>
    </nav>
    <!-- akhir navbar -->

    {{-- header --}}
    {{-- content --}}
    @yield('content')
    {{-- content --}}
    {{-- footer --}}
    <!-- Footer -->
    <footer class="mt-4 bg-primary text-white text-lg-start">
        <!-- Grid container -->
        <div class="container p-4">
            <!--Grid row-->
            <div class="row">
                <!--Grid column-->
                <div class="col-lg-4 col-md-12 mb-4 mb-md-0">
                    <h5 class="text-uppercase">TALENTFINDER</h5>
                    <p>TF.inc © 2023 Privacy - Terms</p>
                    <p></p>
                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-lg-2 col-md-6 mb-4 mb-md-0 col-6">
                    <h5 class="text-uppercase">Home</h5>

                    <ul class="list-unstyled mb-0">
                        <li>
                            <a href="#!" class="text-white">About Us</a>
                        </li>
                        <li>
                            <a href="#!" class="text-white">FAQ</a>
                        </li>
                        <li>
                            <a href="#!" class="text-white">Contact</a>
                        </li>
                    </ul>
                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-lg-2 col-md-6 mb-4 mb-md-0 col-6">
                    <h5 class="text-uppercase mb-0">About Us</h5>

                    <ul class="list-unstyled">
                        <li>
                            <a href="#!" class="text-white">How we Operate</a>
                        </li>
                        <li>
                            <a href="#!" class="text-white">Testimony</a>
                        </li>
                        <li>
                            <a href="#!" class="text-white">News</a>
                        </li>
                    </ul>
                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-lg-2 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase mb-0">How we can help you</h5>

                    <ul class="list-unstyled">
                        <li>
                            <a href="#!" class="text-white">Contact</a>
                        </li>
                    </ul>
                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-lg-2 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase mb-0">Connect with us</h5>

                    <ul class="list-unstyled">
                        <li>
                            <a href="#!" class="text-white">Instagram</a>
                        </li>
                        <li>
                            <a href="#!" class="text-white">Facebook</a>
                        </li>
                        <li>
                            <a href="#!" class="text-white">Youtube</a>
                        </li>
                    </ul>
                </div>
                <!--Grid column-->
            </div>
            <!--Grid row-->
        </div>
        <!-- Grid container -->

        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
            © 2023 Copyright:
            <a class="text-white" href="#">talentfinder.com</a>
        </div>
        <!-- Copyright -->
    </footer>
    <!-- Akhir Footer -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        AOS.init();
    </script>
    @yield('script')
</body>

</html>
