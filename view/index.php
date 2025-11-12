<?php
session_start();
$isLogedIn = true;
if (!isset($_SESSION["user_id"])) {
    $isLogedIn = false;
}
$userRole = $isLogedIn ? $_SESSION['user_role'] : null;
$nameUser = $isLogedIn ? $_SESSION["user_name"] : null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style/index.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <link
  rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
/>
  <title>Clínica Central</title>
</head>
<body>
  <header class="header">
    <div class="logo">
      <h1>Clínica Central</h1>        
    </div>

    <nav class="nav-links">
      <a href="#">Inicio</a>
      <a href="turnView/Solicitar_turnos.php">Turnos</a>
      <a href="doctorView/doctores.php">Doctores</a>
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
      <p> En Clínica Central, gestionamos cada consulta y turno con tecnología moderna, atención humana y eficiencia.</p>
    </section>

  <section class="servicios">
  <h2>Nuestros Servicios</h2>

  <div class="servicios-grid">
    <div class="servicio-card">
      <div class="card-icon">
        <i class="fa-solid fa-house-chimney-medical"></i>
      </div>
      <h3>Consultas Médicas</h3>
      <p>Atención personalizada con los mejores especialistas en cada área.</p>
    </div>

    <div class="servicio-card">
      <div class="card-icon">
        <i class="fa-solid fa-desktop"></i>
      </div>
      <h3>Estudios de Laboratorio</h3>
      <p>Equipos de última tecnología para análisis clínicos rápidos y precisos.</p>
    </div>

    <div class="servicio-card">
      <div class="card-icon">
         <i class="fa-solid fa-truck-medical"></i>
      </div>
      <h3>Emergencias 24hs</h3>
      <p>Contamos con un servicio de urgencias disponible las 24 horas, todos los días.</p>
    </div>

    <div class="servicio-card">
      <div class="card-icon">
        <i class="fa-solid fa-stethoscope"></i>
      </div>
      <h3>Especialidades Médicas</h3>
      <p>Más de 15 especialidades con profesionales certificados y atención integral.</p>
    </div>
    <div class="servicio-card">
      <div class="card-icon">
       <i class="fa-solid fa-receipt"></i>
      </div>
      <h3>Receta Digital</h3>
      <p>Recibe una receta de tu doctor por Whatsapp o email.</p>
    </div>
    <div class="servicio-card">
      <div class="card-icon">
      <i class="fa-solid fa-mobile-screen-button"></i>
      </div>
      <h3>Turnos Online</h3>
      <p>Solicita un turno por la web de forma rápida y segura.</p>
  </div>
</section>

<section class="stats-section">
  <h2 class="stats-title">SOMOS LÍDERES EN GESTIÓN CLÍNICA</h2>
  
  <div class="stats-grid">
    <div class="stat-card">
      <h3>+2.000</h3>
      <p>Profesionales confían en nosotros</p>
    </div>

    <div class="stat-card">
      <h3>+14.000</h3>
      <p>Turnos médicos procesados por año</p>
    </div>

    <div class="stat-card">
      <h3>+10.000</h3>
      <p>Historias clínicas registradas</p>
    </div>
  </div>
</section>

  <section class="sedes">
  <h2>Consulta nuestras sedes</h2>

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
        <p>📍 Dirección: Pichincha 1890, CABA</p>
        <p>📞 Teléfono: 11 2233-4455</p></p>
        <p>Email: contacto@clinicacentral.com</p>
      </div>

      <div class="footer-links">
        <h4>Enlaces útiles</h4>
        <ul>
          <li><a href="index.php">Inicio</a></li>
          <li><a href="./turnView/Solicitar_turnos.php">Turnos</a></li>
          <li><a href="./doctorView/doctores.php">Doctores</a></li>
          <li><a href="./acerca.php">Acerca de Nosotros</a></li>
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