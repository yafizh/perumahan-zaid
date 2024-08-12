@extends('landing.layouts.main')

@section('content')
    <style>
        .navbar {
            background-color: #204A40 !important;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
            transition: background-color 200ms linear;
        }
    </style>
    <div class="row w-100 p-5 mx-0 text-justify">
        <div class="col-12 mb-3" style="text-align: justify;">
            <h4>PT. CITRA PUTRI MUSTIKA</h4>
            <div class="ps-4 pb-4 float-end" style="width: 28rem;">
                <img src="https://lh3.googleusercontent.com/proxy/hqXy7NfU0-rPVejSIjM_IPwPPqz0hxNyS63tl6sP7raABlpJ4NizYIG7msrMwqCLa8BsUm-SF9pGNgdZvoAIEE2g4jWlwvn3ppBwoWzVnCrUxcvQDdCG42bIV9I4PaNC0d2Du7R05rPtSBl4pY-jm6ibcp-2fwmKJGVbBw=s680-w680-h510"
                    class="w-100">

            </div>
            <p>
                PT. Citra Putri Mustika merupakan perusahaan di Kalimantan Selatan yang bergerak di bidang kontraktor dan
                developer. PT. Citra Putri Mustika memulai unit bisnisnya dalam bidang contractor developer dengan
                membangun komplek perumahan pertama dengan nama 'Bauntung Permai' yang terletak di Jl. Bauntung RT.05 RW.
                III Desa Sungai Sipai Kecamatan Martapura Kabupaten Banjar Provinsi Kalimantan Selatan dengan total lahan
                seluas 1,04 Ha, dengan bangunan sebanyak 48 unit rumah yang terdiri dari tipe 45 sebanyak 13 unit dan tipe
                36 sebanyak 35 unit.
            </p>

            <p>
                Proyek kedua 'Bauntung Permai II' berlokasi di Jl. Padang Anyar RT. 001 RW. 001 Desa
                Tungkaran Martapura Kabupaten Banjar dengan total lahan seluas 16.400 m2, dengan bangunan sebanyak 80 unit
                rumah dengan tipe 36. Proyek ketiga Griya Batuah yang berlokasi di Jl. Cindai Alus RT. 005 RW. 002
                Kecamatan Martapura Kabupaten Banjar dengan luas 16.763 m2 dan bangunan sebanyak 103 unit rumah tipe 36.
            </p>

            <p>
                Saat ini, PT. Citra Putri Mustika tengah memulai proyek ke empat Banjar Mas di Jl. Damai Indah RT. 015
                Desa Sungai Sipai Kecamatan Martapura Kabupaten Banjar dengan luas 3.339 m2 dengan bangunan sebanyak 18 unit
                rumah tipe 36. Saat ini PT. Citra Putri Mustika juga tengah membangun proyek baru 'Al Kautsar Residence'
                yang terletak di Jl Veteran RT. 037 RW. 013 Kelurahan Keraton Kecamatan Martapura Kota Kabupaten Banjar
                yang saat ini tengah dalam proses dengan luas 34.775,59 m2 dengan bangunan sebanyak 216 unit rumah tipe 36.
            </p>

            <p>
                Perusahaan berkomitmen dan berdedikasi untuk terus menjadi yang terbaik dalam mengembangkan hunian yang
                nyaman, asri dan aman, dan senantiasa berkontribusi dalam pengelolaan yang bertanggung jawab, memberikan
                pelayanan yang lebih baik bagi pembeli serta ramah lingkungan, dengan memberikan perumahan berupa kavling
                siap bangun. Adanya control bersama antara pihak developer dan pembeli pada saat proses pembangun
                berlangsung, memberikan jaminan kualitas dan model bangunan seperti yang di harapkan pembeli.
            </p>
        </div>
    </div>

    <div class="row w-100 p-5 mx-0">
        <div class="col-12 col-md-6 mb-3">
            <h4 class="text-center">LOKASI KANTOR</h4>
            <p>
                Kantor pemasan PT. Citra Putri Mustika berlokasi di Jalan Veteran Rt. 037 Rw. 013 Kelurahan Keraton
                Kecamatan Martapura Kota Kabupaten Banjar.
            </p>
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3982.706213386629!2d114.8415799!3d-3.4215646!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2de6813d8e9c6da5%3A0x6f21668d97b252af!2sAl%20Kautsar%20Residence!5e0!3m2!1sen!2sid!4v1686306562284!5m2!1sen!2sid"
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
