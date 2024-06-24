<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Historial - V-DEV</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

</head>

<body>

 <!-- ======= Header ======= -->
 <header id="header" class="fixed-top  header-transparent ">
    <div class="container d-flex align-items-center justify-content-between">

      <div class="logo">
        <!--<h1><a href="index.html">bolChain</a></h1>-->
        <!-- Uncomment below if you prefer to use an image logo -->
        <a href="/"><img src="{{ asset('assets/img/logo.png') }}" alt="" class="img-fluid"></a>
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Inicio</a></li>
          <li><a class="nav-link scrollto" href="#gallery">Galería</a></li>
          <li><a class="nav-link scrollto" href="#pricing">Licencias</a></li>

    
          <li><a class="nav-link scrollto" href="#contact">Contacto</a></li>
          <li><a class="nav-link scrollto" href="/info">¿Quiénes somos?</a></li>
          <li><a class="getstarted scrollto" href="#footer">Historial</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <main id="main">

    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
      <div class="container">
        <div class="d-flex justify-content-between align-items-center">
          <h2>Llave: {{ $address }}</h2>
          <ol>
            <li><a href="index.html">Inicio</a></li>
            <li>Transacciones</li>
          </ol>
        </div>
      </div>
    </section><!-- End Breadcrumbs Section -->

    <!-- ======= Inner Page Section ======= -->
    <section class="inner-page">
        <div class="container">

            <!-- Tabla de transacciones -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead class="table-dark">
                                <tr>
                                    <!--<th>Hash</th>-->
                                    <th>Fecha</th>
                                    <th>Bloque</th>
                                    <th>Origen</th>
                                    <th>Destino</th>
                                    <th>Monto (ETH)</th>
                                    
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transactions as $tx)
                                <tr>
                                    <!--<td>{{ $tx['hash'] }}</td>-->
                                    <td>{{ \Carbon\Carbon::createFromTimestamp($tx['timeStamp'])->toDateTimeString() }}</td>
                                    <td>{{ $tx['blockNumber'] }}</td>

                                    <td>{{ $tx['from'] }}</td>
                                    <td>{{ $tx['to'] }}</td>
                                    <td>{{ rtrim(rtrim(bcdiv($tx['value'], '1000000000000000000', 18), '0'), '.') }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- End Inner Page Section -->

  </main><!-- End #main -->

 <!-- ======= Footer ======= -->
 <footer id="footer">
  
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>bolChain</h3>
            <p>
              Av. Busch Nº1221 <br>
              Santa Cruz, Santa Cruz de la Sierra<br>
              Bolivia <br><br>
              <strong>Celular:</strong> +591 71111111<br>
              <strong>Correo:</strong> info@bolChain.com<br>
            </p>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Enlaces</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Inicio</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Historial</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">¿Quiénes somos?</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Terminos y condiciones</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Politicas de privacidad</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Nuestros servicios</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Desarrollo Web</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Desarrollo Móvil</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Redes sociales</h4>
            <div class="social-links mt-3">
                <a href="https://wa.me/59171661288" class="twitter"><i class="bx bxl-whatsapp"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-gmail"></i></a>
                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div>
          </div>

        </div>
      </div>
    </div>

    <div class="container py-4">
      <div class="copyright">
        &copy; Copyright <strong><span>bolChain</span></strong>. Todos los derechos reservados
      </div>

    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="  {{ asset('assets/js/main.js') }}"></script>
  


  
  
  
  



</body>

</html>
