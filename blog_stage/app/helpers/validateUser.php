<?php 

    function validateUser($user)
    {
        
        $errors = array();
    if (empty($user['username'])) {
        array_push($errors,'Votre pseudo est requis !');
    }
    if(empty($user['email'])){
        array_push($errors,'Votre Ema@il est requis !');
    }
    if(empty($user['password'])){
        array_push($errors,'Mot de passe est requis !');
    }
    if($user['passwordConf'] !== $user['password'])  {
        array_push($errors,'Mot de passe non correspondants !');
    }

    $existingUser = selectOne('users', ['email' => $user['email']]);
    if ($existingUser) {
        if (isset($user['update-user']) && $existingUser['id'] != $user['id']) {
            array_push($errors, 'Email already exists');
        }

        if (isset($user['create-admin'])) {
            array_push($errors, 'Email already exists');
        }
    }

    return $errors;
    }


    function validateLogin($user)
    {
        
        $errors = array();
    if (empty($user['username'])) {
        array_push($errors,'Votre pseudo est requis !');
    }
    if(empty($user['password'])){
        array_push($errors,'Mot de passe est requis !');
    }
  

    return $errors;
    }

?>