<?php

require_once 'config/session.php';


if (isset($_SESSION['user'])) {
    unset($_SESSION['user']);

    $_SESSION['success_message'] = 'Vous avez été déconnecté';
}

header('Location: index.php');
