<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Utama</title>
    <!-- Load Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>

<body>
    <div class="container-fluid">
        <header>
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
                <a class="navbar-brand" href="#">
                    <img src="{{asset('images/logo.png')}}" alt="Logo" style="max-height: 50px;">
                    <span class="text-dark">SMKN 1 CIPANAS</span>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        {{-- <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>  --}}
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('http://127.0.0.1:8000') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#about">Profil Sekolah</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#guru">Profil Guru</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#berita">Berita</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#fasilitas">Fasilitas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Tracking Alumni</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>

                    </ul>

                </div>
            </nav>

            <!-- Navbar -->

            <!-- Background image -->
            <div class="position-relative">
                <img src="https://foto.data.kemdikbud.go.id/getImage/20252398/11.jpg" class="w-100"
                    style="height: 100vh; margin-top: 58px;" alt="Background Image">
                <div class="position-absolute top-0 start-0 w-100 h-100" style="background-color: rgba(0, 0, 0, 0.6);">
                    <div class="d-flex justify-content-center align-items-center h-100">
                        <div class="text-white text-center">
                            <h1 class="mb-3">SMK Negeri 1 Cipanas</h1>
                            <h4 class="mb-3">Growth With Us</h4>
                            <a class="btn btn-outline-light btn-lg" href="#about" role="button">Lets Journey</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Background image -->
        </header>

        {{-- tentang section --}}


        <section id="about" class="about section-padding" data-aos="fade-up" data-aos-duration="2000">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 mb-3 col-md-12 col-12">
                        <div class="about-img rounded overflow-hidden shadow">
                            <img src="https://foto.data.kemdikbud.go.id/getImage/20252398/11.jpg" alt=""
                                class="img-fluid">
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-12 col-12 ps-lg-5 mt-md-5">
                        <div class="about-text">
                            <h2>Tentang Sekolah<br></h2>

                            <div class="visi">
                                <h5>Visi</h5>
                                <p>{{$profileSchool->visi}}</p>
                            </div>
                            <div class="visi">
                                <h5>Misi</h5>
                                <p>{{$profileSchool->misi}}</p>
                            </div>
                            <div class="visi">
                                <h5>Sejarah</h5>
                                <p>{{$profileSchool->sejarah}}</p>
                            </div>
                            <div class="visi">
                                <h5>Ekstrakulikuler</h5>
                                <p>{{$profileSchool->ekstrakulikuler}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Guru -->
        <!-- Carousel wrapper -->
        <section id="guru" class="pt-5" style="background-color:#f2f5f3" data-aos="fade-up">
            <h2 class="text-center mb-5">Profile Guru<h2>
                    <div id="carouselExample" class="carousel slide text-center carousel-dark" data-mdb-ride="carousel">
                        <div class="carousel-inner">
                            @foreach ($teachers as $teacher)
                            <div class="{{$loop->index == 0 ? 'carousel-item active' : 'carousel-item'}}">
                                <!--AVATAR DISINI  -->
                                <img class="rounded-avatar shadow-1-strong mb-4 rounded"
                                    src="{{ asset('storage/photo_guru/' . $teacher->photo) }}" style="width: 350px"
                                    alt="avatar" />
                                <div class="row d-flex justify-content-center">
                                    <div class="col-lg-8">
                                        <h5 class="mb-3">{{$teacher->name}}</h5>
                                        <p>{{$teacher->mata_pelajaran}}</p>
                                        <p class="text-muted fs-4 fs-md-6 px-2 px-md-0">
                                            <i class="fas fa-quote-left pe-2"></i>
                                            {{$teacher->pengalaman}}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
        </section>

        <!-- Carousel wrapper -->
        <!-- End Guru -->
        <!-- Fasilitas -->
        <section id="fasilitas" class="fasilitas section-padding" data-aos="fade-up">
            <div class="container">
                <h2>Fasilitas</h2>
                <div id="" class="">
                    <div class="">
                        <div class="">
                            <div class="row">
                                @foreach ($facilities as $facilitie)
                                <div class="col-md-6 col-lg-4 mb-3">
                                    <div class="card shadow">
                                        <img src="{{ asset('storage/photo_fasilitas/' . $facilitie->photo) }}"
                                            class="card-img-top" alt="Profil Guru 1">
                                        <div class="card-body">
                                            <h5 class="card-title">{{$facilitie->nama}}</h5>
                                            <p class="card-text">{{$facilitie->deskripsi}}</p>
                                        </div>
                                    </div>
                                </div>
                                @endforeach

                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </section>
        <!-- End Of Fasilitas -->
        <!-- Berita -->
        <section id="berita" class="beritas section-padding" style="background-color:#f2f5f3" data-aos="fade-up"
            data-aos-duration="2000">
            <h2 class="text-center py-5">Berita Disini</h2>
            <div class="container">
                @foreach ($news as $new)
                <div class="row gx-5">
                    <div class="col-md-6 mb-4">
                        <div class="bg-image hover-overlay ripple shadow-2-strong rounded-5"
                            data-mdb-ripple-color="light">
                            <img src="{{ asset('storage/photo_berita/' . $new->photo) }}" style="height: 500px"
                                class="img-fluid shadow" />
                            <a href="#!">
                                <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                            </a>
                        </div>
                    </div>

                    <div class="col-md-6 mb-4">
                        <span class="badge bg-danger px-2 py-1 shadow-1-strong mb-3">News of the day</span>
                        <h4><strong>{{$new->judul}}</strong></h4>
                        <p class="text-muted">
                            {{$new->isi_berita}}
                        </p>
                        <span class="badge bg-warning">{{$new->created_at}}</span>
                        <!-- <button type="button" class="btn btn-warning">Read more</button> -->
                    </div>
                </div>

                @endforeach

            </div>

        </section>
        <!-- End Berita -->


        {{-- footer --}}
        <footer class="bg-dark text-center text-white">
            <!-- Grid container -->
            <div class="container p-4 pb-0">
                <!-- Section: Social media -->
                <section class="mb-4">
                    <!-- Facebook -->
                    <a class="btn btn-outline-light btn-floating m-1 rounded-circle" href="#!" role="button"><i
                            class="fab fa-facebook-f"></i></a>

                    <!-- Twitter -->
                    <a class="btn btn-outline-light btn-floating m-1 rounded-circle" href="#!" role="button"><i
                            class="fab fa-twitter"></i></a>

                    <!-- Google -->
                    <a class="btn btn-outline-light btn-floating m-1 rounded-circle" href="#!" role="button"><i
                            class="fab fa-google"></i></a>

                    <!-- Instagram -->
                    <a class="btn btn-outline-light btn-floating m-1 rounded-circle" href="#!" role="button"><i
                            class="fab fa-instagram"></i></a>




                </section>
                <!-- Section: Social media -->
            </div>
            <!-- Grid container -->

            <!-- Copyright -->
            <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
                © 2023 Copyright:
                <a class="text-white" href="#">SMK Negeri 1 Cipanas</a>
            </div>
            <!-- Copyright -->
        </footer>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var navLinks = document.querySelectorAll(".nav-link");

            navLinks.forEach(function (link) {
                link.addEventListener("click", function () {
                    navLinks.forEach(function (navLink) {
                        navLink.classList.remove("active");
                    });
                    this.classList.add("active");
                });
            });
        });

    </script>

</body>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
</script>
<!-- Load Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"
    integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous">
</script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init();

</script>

</html>
