@extends('landing.layouts.main')

@section('content')
    <style>
        .hero {
            background-image: url('/assets/images/logo2.png');
            background-position-y: -12rem;
            height: 100vh;
            background-size: cover;
            box-shadow: inset 0 0 0 2000px rgba(0, 0, 0, 0.6);
        }

        @media only screen and (max-width: 768px) {
            .hero {
                height: 60vh;
            }
        }

        .navbar.scrolled {
            background-color: var(--bs-primary) !important;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
            transition: background-color 200ms linear;
        }
    </style>
    <div class="hero row w-100 mb-3 mx-0">
        <div class="col-12 col-md-7 p-5 d-flex align-items-center">
            <div class="title text-white">
                <h1>Perumahan Al Kautsar Residence</h1>
                <h4>PT. Karya Putra Bersaudara</h4>
                <p>Miliki segera rumah dengan kondisi strategis dengan harga menarik hanya di Perumahan Al Kautsar
                    Residence. Hunian yang nyaman cocok untuk keluarga Anda. Lihat unit rumah yang tersedia disini.</p>
                <a href="/unit-perumahan" class="btn btn-primary px-5 py-4 rounded-0">
                    LIHAT UNIT TERSEDIA
                </a>
            </div>
        </div>
    </div>

    <div class="row w-100 p-5 mx-0">
        <div class="col-12 text-center mb-4">
            <h3 class="text-decoration-underline">TENTANG KAMI</h3>
        </div>
        <div class="col-12 col-md-4 mb-3">
            <img src="/hero.jpg" width="100%">
        </div>
        <div class="col-12 col-md-8 mb-3">
            PT. Karya Putra Bersaudara merupakan perusahaan di Kalimantan Selatan yang bergerak di bidang kontraktor dan
            developer. Hingga saat ini telah ada beberapa perumahan yang sudah dibangun dan salahsatunya yang sedang
            dibangun adalah Perumahan Al Kautsar Residence. Terletak di Jalan Veteran Rt. 037 Rw. 013 Kelurahan Keraton
            Kecamatan Martapura Kota Kabupaten Banjar yang saat ini tengah dalam proses dengan luas 34.775,59 m2 dengan
            bangunan sebanyak lebih dari 200 unit rumah type 36.
        </div>
    </div>

    <div class="row px-5 w-100">
        <hr>
    </div>

    <div id="lokasi-perumahan" class="row p-5 w-100 mx-0">
        <div class="col-12 text-center mb-4">
            <h3 class="text-decoration-underline">LOKASI PERUMAHAN</h3>
        </div>
        <div class="col-12 col-md-7 mb-3">
            <p>
                Perumahan terletak di Jalan Veteran Rt. 037 Rw. 013 Kelurahan Keraton Kecamatan Martapura Kota Kabupaten
                Banjar. Dan berikut merupakan tempat atau destinasi terdekat yang dapat dikunjungi.
            </p>
            <h5>Lokasi Terdekat</h5>
            <ul>
                <li>
                    <i class="fa-solid fa-hospital"></i>
                    10 menit ke
                    <a target="_blank" href="https://goo.gl/maps/ExFjnV3EkNbKRxU19">
                        RSUD Ratu Zalecha Martapura
                    </a>
                </li>
                <li>
                    <i class="fa-solid fa-mosque"></i>
                    5 menit ke
                    <a target="_blank" href="https://goo.gl/maps/FyUfeN67R9W3qkhY6">
                        Masjid Jami Al Ihsan
                    </a>
                </li>
                <li>
                    <i class="fa-solid fa-shop"></i>
                    Dekat dengan pusat pembelanjaan (<a target="_blank"
                        href="https://goo.gl/maps/q6GgXAwrgYGp9Fgu7">Minimarket</a> dan <a target="_blank"
                        href="https://goo.gl/maps/Vx1tYNTWHXUcdnnR8">Pasar Tradisional</a>)
                </li>
                <li>
                    <i class="fa-solid fa-building-shield"></i>
                    10 menit ke
                    <a target="_blank" href="https://goo.gl/maps/7gxhVRbZ6DtW6QkT9">
                        Polsek Martapura Kota
                    </a>
                </li>
            </ul>
        </div>
        <div class="col-12 col-md-5 mb-3">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d1991.3540973092265!2d114.84055023205607!3d-3.4210878495873!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sid!4v1680931182848!5m2!1sen!2sid"
                style="border:0; width: 100%; height: 100%;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>

    <div class="row w-100 text-center py-5 mx-0">
        <div class="col-12 col-md-6 p-4" style="background-color: #a5d8cc;">
            <h4 class="mb-4">Unit Terjual</h4>
            <h3>{{ $unit_terjual }}</h3>
        </div>
        <div class="col-12 col-md-6 p-4" style="background-color: #4cb299;">
            <h4 class="mb-4">Unit Tersedia</h4>
            <h3>{{ $unit_tersedia }}</h3>
        </div>
    </div>

    <div id="lokasi-perumahan" class="row p-5 w-100 mx-0">
        <div class="col-12 text-center mb-4">
            <h3 class="text-decoration-underline">TIPE PERUMAHAN</h3>
        </div>
        <div class="col-12 col-md-7 mb-3">
            <h4>Rumah Tipe 36</h4>
            <p>
                Rumah betipe 36 terdiri dari 2 (dua) kamar tidur, satu kamar mandi dan ruang tamu. Memiliki tanah yang lebih
                untuk penambahan tempat baru atau memperluas rumah.
            </p>
        </div>
        <div class="col-12 col-md-5 mb-3">
            <img src="/assets/images/rumah.png" style="width: 100%; object-fit: cover;">
        </div>
    </div>

    <script>
        const navbar = document.querySelector(".fixed-top");
        const hero = document.querySelector(".hero");

        const navbarList = document.querySelector("#navbarNav ul");
        const navbarNavLink = navbarList.querySelectorAll("li a");
        // Navbar When Scrolling
        document.addEventListener("scroll", function() {
            if (document.querySelector("html").scrollTop > hero.offsetHeight / 4) {
                navbar.classList.add("scrolled");
                // navbar.classList.remove("navbar-dark");
                navbarList.style.borderBottomColor = "#000";
            } else {
                navbar.classList.remove("scrolled");
                navbar.classList.add("navbar-dark");
                navbar.style.backgroundColor = "";
                navbarList.style.borderBottomColor = "#191919";
            }
        });
    </script>
@endsection
