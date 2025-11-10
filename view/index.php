<?php
session_start();
$isLogedIn = true;
$userRole = $isLogedIn ? $_SESSION['user_role'] : null;
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
      <h1>Clínica Central</h1>        
    </div>

    <nav class="nav-links">
      <a href="index.php">Inicio</a>
      <a href="turnView/Solicitar_turnos.php">Turnos</a>
      <a href="doctorView/doctores.php">Doctores</a>
      <?php if ($userRole == 1): ?>
        <a href="turnView/Listar_turnos.php">Gestionar</a>
      <?php endif; ?>
      <a href="acerca.php">Acerca de Nosotros</a>
    </nav>
    <?php if (!$isLogedIn): ?>
      <div class="login-btn">
      <a href="userView/login.html">Ingresar</a>
    </div>
    <?php else: ?>
      <div class="perfil"> 
        <a  href="./userView/profile.php">Perfil <?= $nameUser?></a>
      </div>
    <?php endif; ?>
  </header>
  
  <main>
    <section class="hero">
      <h1>Hospital Central</h1>
      <p>Atención médica de calidad para vos y tu familia. Podés solicitar turnos online de forma rápida y sencilla.</p>
      <a href="./turnView/Solicitar_turnos.php" class="btn">Solicitar turno</a>
    </section>

    <<section class="servicios">
  <h2>💙 Nuestros Servicios</h2>

  <div class="servicios-grid">
    <div class="servicio-card">
      <img src="img/consultas.jpg" alt="Consultas médicas">
      <h3>Consultas Médicas</h3>
      <p>Atención personalizada con los mejores especialistas en cada área.</p>
    </div>

    <div class="servicio-card">
      <img src="img/laboratorio1.jpg" alt="Estudios de laboratorio">
      <h3>Estudios de Laboratorio</h3>
      <p>Equipos de última tecnología para análisis clínicos rápidos y precisos.</p>
    </div>

    <div class="servicio-card">
      <img src="img/24horas.jpg" alt="Emergencias 24hs">
      <h3>Emergencias 24hs</h3>
      <p>Contamos con un servicio de urgencias disponible las 24 horas, todos los días.</p>
    </div>

    <div class="servicio-card">
      <img src="img/especialidades.jpg" alt="Especialidades médicas">
      <h3>Especialidades Médicas</h3>
      <p>Más de 15 especialidades con profesionales certificados y atención integral.</p>
    </div>
  </div>
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
    
       <section class="sedes">
  <h2>🚑 Consulta nuestras sedes</h2>

  <div class="grid-sedes">
    <div class="card-ubicacion">
      <img src="img/sede1.jpg" alt="Sede Central">
      <h3>Sede Central</h3>
      <p>📍 Av. San Martín 1234, Buenos Aires</p>
      <p>📞 (011) 4321-5678</p>
      <a href="https://maps.google.com" target="_blank" class="btn-mapa">Ver en mapa</a>
    </div>

    <div class="card-ubicacion">
      <img src="img/sede2.jpg" alt="Sede Norte">
      <h3>Sede Norte</h3>
      <p>📍 Calle Mitre 456, San Isidro</p>
      <p>📞 (011) 4789-1122</p>
      <a href="https://maps.google.com" target="_blank" class="btn-mapa">Ver en mapa</a>
    </div>

    <div class="card-ubicacion">
      <img src="img/sede3.jpg" alt="Sede Sur">
      <h3>Sede Sur</h3>
      <p>📍 Av. Rivadavia 987, Lomas de Zamora</p>
      <p>📞 (011) 4782-3344</p>
      <a href="https://maps.google.com" target="_blank" class="btn-mapa">Ver en mapa</a>
    </div>
  </div>
</section>

      
  <footer class="footer">
    <div class="footer-container">
      <div class="footer-info">
        <h3>Clínica Central</h3>
        <p>📍 Dirección: Av. Principal 123, Ciudad</p>
        <p>📞 Teléfono: (011) 1234-5678</p></p>
        <p>Email: contacto@saludtotal.com</p>
      </div>

      <div class="footer-links">
        <h4>Enlaces útiles</h4>
        <ul>
          <li><a href="index.php">Inicio</a></li>
          <li><a href="/turnView/Solicitar_turnos.php">Solicitar Turno</a></li>
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

  
    </body>
    </html>
</body>
</html>