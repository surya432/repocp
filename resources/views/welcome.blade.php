<!DOCTYPE html>
<html lang="en">
<?php

use App\Http\Controllers\WebsiteController; ?>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="{!!WebsiteController::getMeta('siteDescription2',$Setting)!!}">
    <meta name="author" content="{!!WebsiteController::getMeta('siteName',$Setting)!!}">
    <meta name="keywords" content="{!!WebsiteController::getMeta('Keyword1',$Setting)!!}">
    <link href="{{url('/')}}" rel="canonical">

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <meta name="robots" content="index, follow">
    <title>{{WebsiteController::getMeta('siteName',$Setting)}} - {{WebsiteController::getMeta('Keyword1',$Setting)}}
    </title>
    <link href="https://stream.ksplayer.com/templates/jwplayer/skin/asset/css/kunamthemes.css" rel="stylesheet">
    <script type="text/javascript" src="https://ssl.p.jwpcdn.com/player/v/8.6.2/jwplayer.js"></script>
    <script type="text/javascript">
        jwplayer.key = "cLGMn8T20tGvW+0eXPhq4NNmLB57TrscPjd1IyJF84o=";
    </script>
    <style type="text/css" media="screen">
        #apicodes-player {
            width: 100% !important;
            height: 100% !important;
            overflow: hidden;
            background-color: #000
        }
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.2/axios.min.js" integrity="sha256-T/f7Sju1ZfNNfBh7skWn0idlCBcI3RwdLSS4/I7NQKQ=" crossorigin="anonymous"></script>
    <link rel="icon" type="image/png" href="img/logo.png" />

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="js/pace.js"></script>

    <link href="css/pace.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <!-- <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'> -->

    <!-- Custom styles for this template -->
    <link href="css/agency.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand js-scroll-trigger brand-pack" href="#page-top">
                <div class="logo"><img src="img/logo.png"></div>
                <div class="brand">{{WebsiteController::getMeta('siteName',$Setting)}} </div>
            </a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="#produk">Produk</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="#tentang">Tentang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="#mitra">Mitra</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="#ijin">Perijinan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="#portfolio">Dokumentasi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="#kontak">Kontak Kami</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Header -->
    <header class="masthead">
        <div class="container">
            <div class="intro-text">
                <div class="intro-lead-in text-uppercase">{{WebsiteController::getMeta('siteName',$Setting)}} </div>
                <div class="intro-heading text-uppercase">{{WebsiteController::getMeta('siteDescription1',$Setting)}}
                </div>
                <div class="intro-lead-in">{!! WebsiteController::getMeta('siteDescription2',$Setting)!!}</div>
                <a class="btn btn-yellow js-scroll-trigger" href="https://api.whatsapp.com/send?phone={{ WebsiteController::getMeta('phoneWA',$Setting) }}&text=%20Hallo%20ingin%20menggunakan%20jasa%20anda%20untuk%20membuat">Hubungi
                    Kami</a>
            </div>
        </div>
    </header>
    <!-- Dokumentasi -->
    <section class="page-section" id="portfolio">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading text-uppercase">Dokumentasi</h2>
                    <h3 class="section-subheading text-muted">Kegiatan Kami</h3>
                </div>
            </div>

            <div class="row">
                @if(!is_null($dokumentasi))
                @foreach($dokumentasi as $a =>$b)
                <div class="col-md-4 col-sm-6 portfolio-item cursor btn-action" data-link="{{route('modalDokumentasi',$b['id'])}}">
                    <div class="box-portfolio">
                        <a class="portfolio-link">
                            <div class="portfolio-hover">
                                <div class="portfolio-hover-content">
                                    Lihat Detail
                                </div>
                            </div>
                            <img class="img-fluid" src="{{url('/images/'.$b['images']) }}" alt="{{$b['title']}}">
                        </a>
                        <div class="portfolio-caption">
                            <h4>{{$b['title']}}
                                <h4>
                                    <p class="">{{$b['deskripsi']}}</p>
                        </div>
                    </div>
                </div>
                @endforeach
                @endif


            </div>
        </div>
    </section>

    
    <!-- Perijinan -->
    <section class="bg-light page-section" id="ijin">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading text-uppercase">Perijinan</h2>
                    <h3 class="section-subheading text-muted">Berbagai perijinan perusahaan kami yang sudah terdaftar</h3>
                </div>
            </div>
            <div class="row text-center ijin-anm">
                @if(!is_null($perijinan))
                @foreach($perijinan as $a =>$b)
                <div class="col-md-4">
                    <div class="ijin-box">
                        <img src="img/ijin/ijin.png" alt="">
                        <h4 class="ijin-heading">{!!$b['nama']!!}</h4>
                        <p>( {!!$b['kepanjangan']!!} )</p>
                        <p>No. : {!!$b['nomor']!!}</p>
                    </div>
                </div>
                @endforeach
                @endif

            </div>
    </section>

    <!-- Team -->
    <section class="page-section" id="mitra">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading text-uppercase">Mitra Kerja Kami</h2>
                    <h3 class="section-subheading text-muted">Berikut Mitra Kerja Terbaik</h3>
                </div>
            </div>
            <div class="row">
                @if(!is_null($mitra))
                @foreach($mitra as $a =>$b)
                <div class="col-sm-4 margin-auto">
                    <div class="team-member">
                        <img class="mx-auto" src="{{ url('/images/'.$b['images']) }}" alt="{{ $b['nama'] }}">
                        <h4>{{ $b['nama'] }}</h4>
                        <p class="text-muted"></p>
                    </div>
                </div>
                @endforeach
                @endif
                <!-- <div class="col-sm-4 margin-auto">
                    <div class="team-member">
                        <img class="mx-auto" src="img/mitra/4.png" alt="">
                        <h4>PT. Molten Alumunium Producer Indonesia</h4>
                        <p class="text-muted"></p>
                    </div>
                </div> -->
            </div>
    </section>

    <!-- Services -->
    <section class="bg-light page-section" id="produk">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading text-uppercase">Produk</h2>
                    <h3 class="section-subheading text-muted">Berbagai produk yang kami tawarkan</h3>
                </div>
            </div>
            <div class="row text-center product-anm">
                @if(!is_null($product))
                @foreach($product as $a =>$b)
                <div class="col-md-4 linkproduk" data-toggle="modal" href="#dokumentasi{{$b['id']}}">
                    <span class="fa-stack fa-4x">
                        <img class="rounded-circle img-product" src="{!!url('images/'.$b['images'])!!}" alt="">
                    </span>
                    <br />
                    <h4 class="service-heading">{!!$b['nama']!!}</h4>
                    <p>{!!$b['deskripsi']!!}</p>
                </div>
                @endforeach
                @endif

            </div>
            <!-- <div class="row">
                <div class="col-lg-8 mx-auto text-center">
                    <a class="btn btn-blue js-scroll-trigger"
                        href="https://api.whatsapp.com/send?phone={{WebsiteController::getMeta('phoneWA',$Setting)}}&text=%20Hallo%20ingin%20menggunakan%20jasa%20anda%20untuk%20membuat">Lihat
                        Detail</a>
                </div>
            </div> -->
        </div>
    </section>

    <!-- About -->
    <section class="page-section" id="tentang">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading text-uppercase">Tentang Kami</h2>
                    <h3 class="section-subheading text-muted">Perjalanan Perusahaan Kami</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <ul class="timeline">
                        @for($i =0;$i < count($about);$i++) @if(($i/2)==1 || $i==0) <li class="timeline-inverted">@else
                            <li>@endif
                                <div class="timeline-image">
                                    <img class="rounded-circle img-fluid" src="{!!url('images/'.$about[$i]['images'])!!}" alt="">
                                </div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <h4>Tahun {{$about[$i]['year']}}</h4>
                                        <h4 class="subheading">{{$about[$i]['title']}}</h4>
                                    </div>
                                    <div class="timeline-body">
                                        <p class="text-muted">{{$about[$i]['deskripsi']}}</p>
                                    </div>
                                </div>
                            </li>
                            @endfor

                            <li class="timeline-inverted add-li">
                                <div class="btn-blue fit-con">
                                    <a href="https://api.whatsapp.com/send?phone={{WebsiteController::getMeta('phoneWA',$Setting)}}&text=%20Hallo%20ingin%20menggunakan%20jasa%20anda%20untuk%20membuat">
                                        Be Part Of Our Story!
                                    </a>
                                </div>
                            </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact -->
    <section class="page-section" id="kontak">
        <div class="container">
            <div class="row ">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading text-uppercase kontak">Kontak Kami</h2>
                    <h3 class="section-subheading kontak">Beritahu kami jika Anda memiliki pertanyaan atau komentar</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <form id="contactForm" name="sentMessage" novalidate="novalidate">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <img class="logo-footer" src="img/Logo.png" alt="">
                                    <p class="footer-head">{{WebsiteController::getMeta('siteName',$Setting)}}</p>
                                    <p class="text-white">
                                        {!! WebsiteController::getMeta('address',$Setting) !!}<br />
                                        {!! WebsiteController::getMeta('phone',$Setting) !!}
                                    </p>
                                    <ul class="list-inline social-buttons">
                                        <li class="list-inline-item">
                                            <a href="https://api.whatsapp.com/send?phone={{WebsiteController::getMeta('phoneWA',$Setting)}}&text=%20Hallo%20" target="_blank">
                                                <i class="fab fa-whatsapp"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="https://facebook.com/{!! WebsiteController::getMeta('facebook',$Setting) !!}" target="_blank">
                                                <i class="fab fa-facebook-f"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="https://twitter.com/{!! WebsiteController::getMeta('twitter',$Setting) !!}" target="_blank">
                                                <i class="fab fa-twitter"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="https://instagram.com/{!! WebsiteController::getMeta('instagram',$Setting) !!}" target="_blank">
                                                <i class="fab fa-instagram"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3955.402339757391!2d112.31869704994291!3d-7.531020376389407!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7814b2baa352af%3A0xfe6d5e9f02b5e529!2sAfanLogamLestari!5e0!3m2!1sen!2sid!4v1582383311713!5m2!1sen!2sid" width="100%" height="350px" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-lg-12 text-center">
                                <div id="success"></div>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-4">
                    <span class="copyright">Copyright &copy; {!! WebsiteController::getMeta('siteName',$Setting) !!}
                        <?php echo date("Y") ?></span>
                </div>
                <div class="col-md-4">
                </div>
                <div class="col-md-4">
                    <ul class="list-inline quicklinks">
                        <li class="list-inline-item">
                            <a href="#">Privacy Policy</a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#">Terms of Use</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <!-- Portfolio Modals -->
    @foreach( $product as $a=>$b )
    <!-- Modal 1 -->
    <div class="portfolio-modal modal fade" id="dokumentasi{{$b["id"]}}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-dismiss="modal">
                    <div class="lr">
                        <div class="rl"></div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 mx-auto">
                            <div class="modal-body">
                                <!-- Project Details Go Here -->
                                <h2 class="text-uppercase">{{$b['nama']}}</h2>
                                <p class="item-intro text-muted">{{$b['deskripsi']}}</p>
                                @if(!empty($b['imagesproduct']))
                                <img class="img-fluid d-block mx-auto" src="{!!url('images/'.$b['imagesproduct'])!!}" alt="{{$b['nama']}}">
                                @endif
                                <p>
                                    {!! $b['keterangan'] !!}
                                </p>
                                <a class="btn btn-blue js-scroll-trigger" href="https://api.whatsapp.com/send?phone={{WebsiteController::getMeta('phoneWA',$Setting)}}&text=%20Hallo%20ingin%20menggunakan%20jasa%20anda%20untuk%20membuat">Tertarik</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach

    <div id="myModal" tabindex="-1" role="dialog" class="modal-dokumentasi">

    </div>
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Contact form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/agency.min.js"></script>
    <script type="text/javascript">
        $('body').on('click', '.btn-action', function(elemen) {
            elemen.preventDefault();
            showModal($(this))
            // openModal()
        });
        var slideIndex = 1;

        function showModal(el) {
            var urls = el.attr('data-link'),
                title = el.attr('title');
            $('.modal-title').text(title);
            axios({
                url: urls,
                credentials: true,
                method: "GET",
            }).then(response => {
                // // console.log(response);
                $('.modal-dokumentasi').html(response.data)
                // // initElem();
                showSlides(1);
                openModal();
                $('.modal-dokumentasi').modal('show');
            }).catch(error => {
                console.log(error);
            });
        }

        function openModal() {
            document.getElementById("myModal").style.display = "block";
        }

        function closeModal() {
            document.getElementById("myModal").style.display = "none";
            $('#myModal').modal('hide');

        }


        function plusSlides(n) {
            showSlides(slideIndex += n);
        }

        function currentSlide(n) {
            showSlides(slideIndex = n);
        }

        function showSlides(n) {
            try {
                var i;
                var slides = document.getElementsByClassName("mySlides");

                var dots = document.getElementsByClassName("demo");
                var captionText = document.getElementById("caption");
                if (n > slides.length) {
                    slideIndex = 1
                }
                if (n < 1) {
                    slideIndex = slides.length
                }
                for (i = 0; i < slides.length; i++) {
                    slides[i].style.display = "none";
                }
                for (i = 0; i < dots.length; i++) {
                    dots[i].className = dots[i].className.replace(" active", "");
                }
                slides[slideIndex - 1].style.display = "block";
                dots[slideIndex - 1].className += " active";
                captionText.innerHTML = dots[slideIndex - 1].alt;
            } catch (error) {

            }
        }

        function addClassImg() {
            $("modal-body p img").addClass("img-fluid d-block mx-auto");

        }
    </script>

</body>

</html>