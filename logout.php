<?php
    session_start();
    session_destroy();
    header("Location: umum/index.php")
?>