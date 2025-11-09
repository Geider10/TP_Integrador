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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/acercaDe.css">
    <title>Acerca de nosotros</title>
</head>

<body>
    <header class="header">
        <div class="logo">
            <h1>Mi Clínica</h1>
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
        En <strong>Mi Clínica</strong> nos dedicamos a ofrecer atención médica de calidad, priorizando el bienestar de nuestros pacientes.
        Contamos con un equipo de profesionales comprometidos con la salud, la prevención y el cuidado integral.
      </p>
      <p>
        Desde nuestros comienzos, buscamos crear un espacio donde cada persona se sienta escuchada y acompañada.
        Nuestro objetivo es brindar un servicio humano, eficiente y accesible para toda la comunidad.
      </p>
      <a href="../doctores/doctores.php" class="btn-about">Ver nuestros doctores</a>
    </div>

    <div class="about-image">
      <img src="../img/clinica_team.jpg" alt="Equipo médico">
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

</body>

</html>