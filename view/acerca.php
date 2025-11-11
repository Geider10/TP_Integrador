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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/acercaDe.css">
    <title>Acerca de nosotros</title>
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
            <a href="#">Acerca de Nosotros</a>
        </nav>
        <?php if (!$isLogedIn): ?>
        <div class="login-btn">
            <a href="userView/login.html">Ingresar</a>
        </div>
        <?php else: ?>
        <div class="perfil">
            <a href="./userView/profile.php">Perfil <?= $nameUser?></a>
        </div>
        <?php endif; ?>
    </header>


    <main class="about-us">
  <div class="about-container">
    <div class="about-text">
      <h2>👩‍⚕️ Acerca de Nosotros</h2>
      <p>
        En <strong>Clinca Central</strong> nos dedicamos a ofrecer atención médica de calidad, priorizando el bienestar de nuestros pacientes.
        Contamos con un equipo de profesionales comprometidos con la salud, la prevención y el cuidado integral.
      </p>
      <p>
        Desde nuestros comienzos, buscamos crear un espacio donde cada persona se sienta escuchada y acompañada.
        Nuestro objetivo es brindar un servicio humano, eficiente y accesible para toda la comunidad.
      </p>
    </div>

    <div class="about-image">
      <img src="./img/edificio1.jpg" alt="Equipo médico">
    </div>
  </div>

  <section class="valores">
    <div class="container text-center">
      <h3>Nuestros Valores</h3>
      <div class="grid-valores">
        <div class="valor-card">
          <h4>💙 Compromiso</h4>
          <p>Brindamos atención profesional y personalizada para cada paciente.</p>
        </div>
        <div class="valor-card">
          <h4>🤝 Empatía</h4>
          <p>Nos preocupamos por escuchar, comprender y acompañar en cada paso.</p>
        </div>
        <div class="valor-card">
          <h4>🏆 Excelencia</h4>
          <p>Nos capacitamos continuamente para ofrecer servicios de alta calidad.</p>
        </div>
      </div>
    </div>
  </section>
</main>

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

</body>

</html>