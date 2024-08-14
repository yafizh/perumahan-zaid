@extends('landing.layouts.main')

@section('content')
    <style>
        .hero {
            background-image: url('/assets/images/hero.jpg');
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
                <h1>Perumahan Permata Intan</h1>
                <h4>PT. Citra Putri Mustika</h4>
                <p>Miliki segera rumah dengan kondisi strategis dengan harga menarik hanya di Perumahan Pemata Intan.
                    Hunian yang nyaman cocok untuk keluarga Anda. Lihat unit rumah yang tersedia disini.</p>
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
            <img src="/assets/images/rumah.jpg" width="100%">
        </div>
        <div class="col-12 col-md-8 mb-3">
            Perumahan Mustika”ini diinisiasi oleh PT. Citra Putri Mustika untuk mengembangkan lokasi tanah kosong
            yang berlokasi di daerah yang cukup strategis di jl. Permata Kelurahan Tanjung Rema Darat Kecamatan Martapura
            yang berada di tengah-tengah pemukiman penduduk, serta lingkungan yang nuansa alam nya masih sangat alami, bebas
            polusi udara dan akses jalan yang dekat dengan kota martapura dan Banjarbaru.
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
                Lokasi perumahan ini cukup strategis untuk kelas masyarakat berpenghasilan menengah ke bawah. Lokasi Proper
                dekat dengan sejumlah fasilitas publik antara lain:
            </p>
            <ul>
                <li>Kubah Abah Guru Sekumpul</li>
                <li>Pasar Tradisional</li>
                <li>Bank</li>
                <li>Rumah Sakit</li>
            </ul>
        </div>
        <div class="col-12 col-md-5 mb-3">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3982.7030351891503!2d114.86025947351855!3d-3.422329241688734!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2de6804e8177c3bd%3A0x475acd6fbaaf5416!2sJl.%20Permata%20No.156%2C%20Sungai%20Paring%2C%20Kec.%20Martapura%2C%20Kabupaten%20Banjar%2C%20Kalimantan%20Selatan%2070714!5e0!3m2!1sen!2sid!4v1723470064524!5m2!1sen!2sid"
                style="border:0; width: 100%; height: 100%;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>

    <div class="row w-100 text-center py-5 mx-0">
        <div class="col-12 col-md-6 p-4" style="background-color: #698ea2;">
            <h4 class="mb-4">Unit Terjual</h4>
            <h3>{{ $unit_terjual }}</h3>
        </div>
        <div class="col-12 col-md-6 p-4" style="background-color: #376883;">
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
            <img src="/assets/images/rumah2.jpg" style="width: 100%; object-fit: cover;">
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
