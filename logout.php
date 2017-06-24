<?php
session_start();
session_destroy();
header('Location: http://localhost/techstore/gentelella-master/production/login.php');
?>