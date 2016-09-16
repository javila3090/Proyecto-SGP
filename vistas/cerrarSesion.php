<?php
    /**
     * Sistema de gestión de personal
     * Version 1.0
     * @author Ing. Julio Avila
     */

    session_start();
    session_unset();
    $_SESSION = array();
    session_destroy();
    Header ("Location: ../index.php");
?>