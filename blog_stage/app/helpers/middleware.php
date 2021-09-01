<?php


function usersOnly($redirect = '/index.php')
{
    if (empty($_SESSION['id'])) {
        $_SESSION['message'] = 'Veuilliez vous connecter';
        $_SESSION['type'] = 'error';
        header('location: ' . BASE_URL . $redirect);
        exit(0);
    }
}

function adminOnly($redirect = '/index.php')
{
    if (empty($_SESSION['id']) || empty($_SESSION['admin'])) {
        $_SESSION['message'] = 'Accès interdit a cette page';
        $_SESSION['type'] = 'error';
        header('location: ' . BASE_URL . $redirect);
        exit(0);
    }
}

function invitesOnly($redirect = '/index.php')
{
    if (isset($_SESSION['id'])) {
        header('location: ' . BASE_URL . $redirect);
        exit(0);
    }    
}