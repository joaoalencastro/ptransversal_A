<?php
  session_start();
  session_destroy();
  header("Location: ../usuarioVisitante/index.html");
?>
