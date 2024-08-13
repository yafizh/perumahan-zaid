@extends('landing.layouts.main')

@section('content')
    <style>
        .navbar {
            background-color: #204A40 !important;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
            transition: background-color 200ms linear;
        }
    </style>
    <div class="row w-100 p-5 mx-0">
        <div class="col-12 col-md-6 mb-3">
            <h4 class="text-center">LOKASI KANTOR</h4>
            <p>
                Kantor pemasan PT. Citra Putri Mustika berlokasi di Jalan Veteran Rt. 037 Rw. 013 Kelurahan Keraton
                Kecamatan Martapura Kota Kabupaten Banjar.
            </p>
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15930.796738821866!2d114.7896627!3d-3.4232554!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2de6839b8770d1bb%3A0xb3b233a2a9910cd9!2sCitra%20Putri%20Mustika!5e0!3m2!1sen!2sid!4v1723551480539!5m2!1sen!2sid"
                style="border:0; width: 100%; min-height: 16rem;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <div class="col-12 col-md-6 mb-3">
            <h4 class="text-center">KONTAK</h4>
            <p class="mb-5">
                PT. Citra Putri Mustika mempunya beberapa layanan yang dapat dihubungi untuk tujuan peyalanan atau janji
                temu yang dapat dihubungi.
            </p>
            <div class="row text-center">
                <div class="col-12 py-4">
                    <i style="font-size: 2rem;" class="fa-solid fa-phone"></i>
                    <p>0821 3558 5026</p>
                </div>
                <div class="col-12 py-4">
                    <i style="font-size: 2rem;" class="fa-solid fa-envelope"></i>
                    <p>ptcitraputrimustika@gmail.com</p>
                </div>
            </div>
        </div>
    </div>

    <script>
        const navbar = document.querySelector(".fixed-top");
        const hero = document.querySelector(".hero");

        const navbarList = document.querySelector("#navbarNav ul");
        const navbarNavLink = navbarList.querySelectorAll("li a");
        navbar.classList.add("scrolled");
        navbarList.style.borderBottomColor = "#000";
    </script>
@endsection
