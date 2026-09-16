@extends('layouts.app')

@section('title', 'Tentang Sugar Bloom')

@section('content')

@include('layouts.navbar')

<style>

/* =====================================================
   GLOBAL
===================================================== */

* {
    box-sizing: border-box;
}

body {
    margin: 0;
    min-height: 100vh;

    background:
        radial-gradient(
            circle at 12% 20%,
            rgba(255, 255, 255, 0.65),
            transparent 28%
        ),
        radial-gradient(
            circle at 90% 80%,
            rgba(255, 255, 255, 0.35),
            transparent 30%
        ),
        linear-gradient(
            135deg,
            #eaf5ff 0%,
            #dceeff 50%,
            #f2f9ff 100%
        ) !important;
}


/* =====================================================
   MAIN PAGE
===================================================== */

.sugar-page {
    width: 100%;
    max-width: 1060px;
    margin: 0 auto;
    padding: 24px 18px 35px;
}


/* =====================================================
   HEADER
===================================================== */

.sugar-header {
    text-align: center;
    margin-bottom: 26px;
}

.sugar-logo {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 9px;
    margin-bottom: 3px;
}

.sugar-logo-icon {
    width: 30px;
    height: 30px;

    display: flex;
    align-items: center;
    justify-content: center;

    flex-shrink: 0;

    background: #ffe0ea;
    border: 3px solid #ffffff;
    border-radius: 50%;

    font-size: 14px;

    box-shadow:
        0 4px 12px rgba(70, 125, 170, 0.15);
}

.sugar-title {
    margin: 0;

    color: #17669e;

    font-size: 27px;
    font-weight: 800;

    line-height: 1.2;
    letter-spacing: -0.4px;
}

.sugar-subtitle {
    margin: 4px 0 0;

    color: #7094af;

    font-size: 12px;
    line-height: 1.4;
}


/* =====================================================
   GENERAL CARD
===================================================== */

.sugar-card {
    background: rgba(255, 255, 255, 0.98);

    border: 1px solid #d8e8f6;
    border-radius: 11px;

    box-shadow:
        0 8px 22px rgba(55, 111, 157, 0.08);

    transition:
        transform 0.2s ease,
        box-shadow 0.2s ease;
}


/* =====================================================
   TOP GRID
===================================================== */

.top-grid {
    display: grid;
    grid-template-columns: 1.3fr 0.9fr;

    gap: 14px;
    margin-bottom: 14px;
}


/* =====================================================
   ABOUT STORE
===================================================== */

.about-card {
    min-height: 250px;

    padding: 20px 25px;

    display: flex;
    flex-direction: column;
    justify-content: center;
}


/* =====================================================
   DONUT
===================================================== */

.about-image {
    width: 100%;
    height: 78px;

    display: flex;
    align-items: center;
    justify-content: center;

    margin-bottom: 9px;
}

.donut-image {
    width: 70px;
    height: 70px;

    display: flex;
    align-items: center;
    justify-content: center;

    font-size: 57px;

    filter:
        drop-shadow(
            0 5px 5px rgba(70, 120, 160, 0.13)
        );
}


/* =====================================================
   CARD TITLE
===================================================== */

.card-title {
    margin-bottom: 11px;

    color: #17669e;

    font-size: 14px;
    font-weight: 800;

    line-height: 1.3;
}


/* =====================================================
   ABOUT TEXT
===================================================== */

.about-text {
    margin: 0 0 11px;

    color: #6485a0;

    font-size: 11px;
    line-height: 1.8;
}

.about-text:last-child {
    margin-bottom: 0;
}

.about-text strong {
    color: #2d6d9e;
}


/* =====================================================
   RIGHT SIDE
===================================================== */

.right-top {
    display: grid;

    grid-template-rows: 1fr 1fr;

    gap: 14px;
}


/* =====================================================
   SMALL CARD
===================================================== */

.small-card {
    padding: 17px 20px;
}


/* =====================================================
   LIST
===================================================== */

.product-list,
.advantage-list {
    list-style: none;

    padding: 0;
    margin: 0;
}

.product-list li,
.advantage-list li {
    margin-bottom: 8px;

    color: #6485a0;

    font-size: 11px;
    line-height: 1.5;
}

.product-list li:last-child,
.advantage-list li:last-child {
    margin-bottom: 0;
}


/* =====================================================
   BOTTOM CARD
===================================================== */

.bottom-card {
    display: grid;

    grid-template-columns: 260px 1fr;

    width: 100%;

    overflow: hidden;

    margin-bottom: 14px;
}


/* =====================================================
   PROFILE
===================================================== */

.profile-area {
    padding: 20px 21px;

    text-align: center;

    border-right: 1px solid #dfebf5;
}


/* =====================================================
   PROFILE IMAGE
===================================================== */

.profile-avatar {
    width: 84px;
    height: 84px;

    margin: 0 auto 10px;

    overflow: hidden;

    border-radius: 50%;

    background: #e2effd;

    border: 4px solid #ffffff;

    box-shadow:
        0 6px 18px rgba(66, 129, 178, 0.17);
}

.profile-avatar img {
    display: block;

    width: 100%;
    height: 100%;

    object-fit: cover;
    object-position: center;
}


/* =====================================================
   PROFILE NAME
===================================================== */

.profile-name {
    margin: 0;

    color: #17669e;

    font-size: 15px;
    font-weight: 800;

    line-height: 1.3;
}


/* =====================================================
   PROFILE ROLE
===================================================== */

.profile-role {
    margin: 4px 0 10px;

    color: #7896ac;

    font-size: 10px;
}


/* =====================================================
   INSTAGRAM
===================================================== */

.instagram-link {
    display: inline-flex;

    align-items: center;
    justify-content: center;

    padding: 6px 12px;

    border-radius: 20px;

    background: #deefff;

    color: #4187c2;

    font-size: 9px;
    font-weight: 700;

    text-decoration: none;

    transition: 0.2s ease;
}

.instagram-link:hover {
    background: #cfe6fa;
    color: #17669e;

    transform: translateY(-1px);
}


/* =====================================================
   PROFILE DESCRIPTION
===================================================== */

.profile-description {
    margin: 12px 0 0;

    padding: 11px 5px 0;

    border-top: 1px solid #e2edf6;

    color: #7492a8;

    font-size: 9px;
    line-height: 1.7;
}

.profile-description strong {
    color: #326d9d;
}


/* =====================================================
   DEVELOPER AREA
===================================================== */

.developer-area {
    padding: 13px 14px;
}


/* =====================================================
   INFORMATION BOX
===================================================== */

.info-box {
    padding: 13px 14px;

    margin-bottom: 9px;

    background: #ffffff;

    border: 1px solid #dbeaf6;
    border-radius: 8px;
}

.info-box:last-child {
    margin-bottom: 0;
}


/* =====================================================
   INFORMATION TITLE
===================================================== */

.info-title {
    margin-bottom: 9px;

    color: #17669e;

    font-size: 12px;
    font-weight: 800;

    line-height: 1.3;
}


/* =====================================================
   INFORMATION ROW
===================================================== */

.info-row {
    margin-bottom: 5px;

    color: #6687a2;

    font-size: 9px;
    line-height: 1.5;
}

.info-row:last-child {
    margin-bottom: 0;
}

.info-row span {
    color: #7b98ad;
}

.info-row strong {
    color: #326e9e;
}


/* =====================================================
   TABLET
===================================================== */

@media (max-width: 900px) {

    .sugar-page {
        max-width: 850px;

        padding-left: 20px;
        padding-right: 20px;
    }

    .top-grid {
        grid-template-columns: 1fr;
    }

    .right-top {
        grid-template-columns: 1fr 1fr;
        grid-template-rows: auto;
    }
}


/* =====================================================
   MOBILE
===================================================== */

@media (max-width: 650px) {

    .sugar-page {
        padding: 18px 12px 30px;
    }

    /* Header */

    .sugar-title {
        font-size: 22px;
    }

    .sugar-subtitle {
        font-size: 11px;
    }

    /* Top */

    .top-grid {
        grid-template-columns: 1fr;
        gap: 12px;
    }

    /* Right */

    .right-top {
        grid-template-columns: 1fr;
        gap: 12px;
    }

    /* About */

    .about-card {
        min-height: auto;
        padding: 20px;
    }

    /* Bottom */

    .bottom-card {
        grid-template-columns: 1fr;
        margin-bottom: 12px;
    }

    /* Profile */

    .profile-area {
        padding: 20px;

        border-right: 0;
        border-bottom: 1px solid #dfebf5;
    }

    /* Developer */

    .developer-area {
        padding: 12px;
    }
}


/* =====================================================
   VERY SMALL MOBILE
===================================================== */

@media (max-width: 400px) {

    .sugar-title {
        font-size: 20px;
    }

    .sugar-logo-icon {
        width: 27px;
        height: 27px;

        font-size: 12px;
    }

    .card-title {
        font-size: 13px;
    }

    .about-text {
        font-size: 10px;
    }
}

</style>


{{-- =====================================================
     MAIN
===================================================== --}}

<div class="sugar-page">

    {{-- =================================================
         HEADER
    ================================================== --}}

    <div class="sugar-header">

        <div class="sugar-logo">

            <h1 class="sugar-title">
                Tentang Sugar Bloom
            </h1>

        </div>

        <p class="sugar-subtitle">
            Toko Donat dan Informasi Profile Pengembang
        </p>

    </div>


    {{-- =================================================
         TOP CONTENT
    ================================================== --}}

    <div class="top-grid">

        {{-- =============================================
             TENTANG TOKO
        ============================================== --}}

        <div class="sugar-card about-card">

            <div class="card-title">
                Toko Sugar Bloom
            </div>

            <p class="about-text">
                Sugar Bloom adalah toko donat yang menghadirkan berbagai
                pilihan donat dengan rasa yang lezat, tekstur yang lembut,
                dan tampilan yang menarik. Kami menyediakan beragam varian
                donat yang cocok dinikmati sebagai camilan maupun teman
                bersantai.
            </p>

            <p class="about-text">
                Sugar Bloom hadir untuk memberikan pengalaman menikmati donat
                yang manis, nikmat, dan menyenangkan dengan pilihan rasa yang
                beragam untuk setiap selera.
            </p>

        </div>


        {{-- =============================================
             RIGHT SIDE
        ============================================== --}}

        <div class="right-top">

            {{-- =========================================
                 PRODUK KAMI
            ========================================== --}}

            <div class="sugar-card small-card">

                <div class="card-title">
                    Produk Kami
                </div>

                <ul class="product-list">

                    <li>
                        Fresh Bloom (Minuman Tidak Manis)
                    </li>

                    <li>
                        Sugar Rush (Minuman Manis)
                    </li>

                    <li>
                        Donut Bloom (Donat dengan Beragam Rasa)
                    </li>

                </ul>

            </div>


            {{-- =========================================
                 KEUNGGULAN
            ========================================== --}}

            <div class="sugar-card small-card">

                <div class="card-title">
                    Keunggulan
                </div>

                <ul class="advantage-list">

                    <li>
                        Fresh
                    </li>

                    <li>
                        Beragam rasa
                    </li>

                    <li>
                        Tampilan menarik
                    </li>

                </ul>

            </div>

        </div>

    </div>


    {{-- =================================================
         PROFILE + DEVELOPER
    ================================================== --}}

    <div class="sugar-card bottom-card">

        {{-- =============================================
             PROFILE
        ============================================== --}}

        <div class="profile-area">

            <div class="profile-avatar">

                <img
                    src="{{ asset('images/profile.jpg') }}"
                    alt="Foto Siti Nafisah Al Azizah"
                >

            </div>

            <h2 class="profile-name">
                Siti Nafisah Al Azizah
            </h2>

            <p class="profile-role">
                Pengembang Aplikasi
            </p>

            <a
                href="https://www.instagram.com/stnfshalazizahh/"
                target="_blank"
                rel="noopener noreferrer"
                class="instagram-link"
            >
                @stnfshalazizahh
            </a>

            <p class="profile-description">
                Saya merupakan pengembang dari aplikasi
                <strong>Sugar Bloom</strong>.
                Aplikasi ini dibuat sebagai project untuk membantu
                proses pengelolaan produk dan transaksi penjualan.
            </p>

        </div>


        {{-- =============================================
             DEVELOPER INFORMATION
        ============================================== --}}

        <div class="developer-area">

            {{-- =========================================
                 INFORMASI PENGEMBANG
            ========================================== --}}

            <div class="info-box">

                <div class="info-title">
                    Informasi Pengembang
                </div>

                <div class="info-row">

                    <span>
                        Nama:
                    </span>

                    <br>

                    <strong>
                        Siti Nafisah Al Azizah
                    </strong>

                </div>

                <div class="info-row">

                    <span>
                        Bidang:
                    </span>

                    <br>

                    <strong>
                        Pengembangan Website
                    </strong>

                </div>

                <div class="info-row">

                    <span>
                        Project:
                    </span>

                    <br>

                    <strong>
                        Sugar Bloom - POS
                    </strong>

                </div>

            </div>


            {{-- =========================================
                 TEKNOLOGI
            ========================================== --}}

            <div class="info-box">

                <div class="info-title">
                    Teknologi yang Digunakan
                </div>

                <div class="info-row">

                    <strong>
                        Bahasa Pemrograman:
                    </strong>

                    PHP, JavaScript

                </div>

                <div class="info-row">

                    <strong>
                        Framework:
                    </strong>

                    Laravel

                </div>

                <div class="info-row">

                    <strong>
                        Frontend:
                    </strong>

                    HTML, CSS, Bootstrap

                </div>

                <div class="info-row">

                    <strong>
                        Database:
                    </strong>

                    MySQL

                </div>

                <div class="info-row">

                    <strong>
                        Tools:
                    </strong>

                    Visual Studio Code, Git

                </div>

            </div>

        </div>

    </div>

</div>

@endsection