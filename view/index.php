<?php
session_start();
$isLogedIn = true;
if (!isset($_SESSION["user_id"])) {
    $isLogedIn = false;
}
$nameUser = $isLogedIn ? $_SESSION["user_name"] : null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style/index.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

  <title>Hospital Central</title>
</head>
<body>
  <header class="header">
    <div class="logo">
      <h1>Mi Clínica</h1>        
    </div>

    <nav class="nav-links">
      <a href="#">Inicio</a>
      <a href="#">Turnos</a>
      <a href="doctorView/doctores.php">Doctores</a>
      <a href="#">Gestionar</a>
      <a href="#">Acerca de Nosotros</a>
    </nav>
    <?php if (!$isLogedIn): ?>
      <div class="login-btn">
      <a href="userView/login.html">Ingresar</a>
    </div>
    <?php else: ?>
      <div> 
        <a href="./userView/profile.php">Perfil <?= $nameUser?></a>
      </div>
    <?php endif; ?>
  </header>
  
  <main>
    <section class="hero">
      <h1>Hospital Central</h1>
      <p>Atención médica de calidad para vos y tu familia. Podés solicitar turnos online de forma rápida y sencilla.</p>
      <a href="#turnos" class="btn">Solicitar turno</a>
    </section>

    <section class="servicios">
      <h2>Nuestros Servicios</h2>
      <ul>
        <li>✔️ Consultas médicas</li>
        <li>✔️ Estudios de laboratorio</li>
        <li>✔️ Emergencias 24hs</li>
        <li>✔️ Especialidades médicas</li>
      </ul>
    </section>

    <!-- Médicos destacados -->
    <section class="medicos">
      <h2>Médicos destacados</h2>
      <div class="cards">
        <article class="card">
          <h3>Dra. Ana Pérez</h3>
          <p>Cardióloga</p>
        </article>
        <article class="card">
          <h3>Dr. Juan López</h3>
          <p>Pediatra</p>
        </article>
        <article class="card">
          <h3>Dra. María Gómez</h3>
          <p>Dermatóloga</p>
        </article>
      </div>
    </section>
    <!--Carrusel-->
    <div id="multiCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
       <div class="carousel-inner">
         <div class="carousel-item active">
           <div class="d-flex justify-content-center">
             <img src="img/imagen1.png" class="carousel-img" alt="Imagen 1">
             <img src="img/imagen2.png" class="carousel-img" alt="Imagen 2">
             <img src="img/imagen3.png" class="carousel-img" alt="Imagen 3">
             <img src="img/imagen4.png" class="carousel-img" alt="Imagen 4">
             <img src="img/imagen5.png" class="carousel-img" alt="Imagen 5">
           </div>
         </div>
         <div class="carousel-item">
           <div class="d-flex justify-content-center">
             <img src="img/imagen6.png" class="carousel-img" alt="Imagen 6">
             <img src="img/imagen7.png" class="carousel-img" alt="Imagen 7">
             <img src="img/imagen8.png" class="carousel-img" alt="Imagen 8">
             <img src="img/imagen9.png" class="carousel-img" alt="Imagen 9">
             <img src="img/imagen10.png" class="carousel-img" alt="Imagen 10">
           </div>
         </div>
       </div>
    <!-- Contacto -->
    <section class="contacto">
      <h2>Contacto</h2>
      <p>📍 Dirección: Av. Principal 123, Ciudad</p>
      <p>📞 Teléfono: (011) 1234-5678</p>
      <p>✉️ Email: info@hospitalcentral.com</p>
    </section>
  </main>
      
  <footer class="footer">
    <div class="footer-container">
      <div class="footer-info">
        <h3>Clínica Central</h3>
        <p>Av. San Martín 1234, Buenos Aires</p>
        <p>Tel: (011) 4567-8900</p>
        <p>Email: contacto@saludtotal.com</p>
      </div>

      <div class="footer-links">
        <h4>Enlaces útiles</h4>
        <ul>
          <li><a href="#">Inicio</a></li>
          <li><a href="#">Solicitar Turno</a></li>
          <li><a href="#">Contacto</a></li>
          <li><a href="#">Nosotros</a></li>
        </ul>
      </div>

      <div class="footer-social">
        <h4>Seguinos</h4>
        <a href="#"><img src="img/facebook.svg" alt="Facebook"></a>
        <a href="#"><img src="img/instagram.svg" alt="Instagram"></a>
        <a href="#"><img src="img/twitterx.svg" alt="Twitter"></a>
      </div>
    </div>

    <div class="footer-bottom">
      <p>© 2025 Hospital Central — Todos los derechos reservados</p>
    </div>
  </footer>

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  
    </body>
    </html>
</body>
</html>