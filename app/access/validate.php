<?php
 
include 'connect.php';
session_start();

if (empty($_POST['user_email'])) {
    header('location: login.php?login_error=Você precisa inserir um email.');
    
} elseif ((!mb_strpos($_POST['user_email'], '@')) || (!mb_strpos($_POST['user_email'], '.'))) {
    header('location: login.php?login_error=Seu email precisa ter @ e ponto.');

} elseif (empty($_POST['user_password'])){
    header('location: login.php?login_error=Você precisa inserir uma senha.');

}  else {
    
    $user_email = $_POST['user_email'];
    $user_email = trim($user_email);
    $user_email = preg_replace('/\'|\"/', '', $user_email); 
    
    $user_password = md5($_POST['user_password']);
    
    $sql = "SELECT * FROM `usuario` WHERE `email`='$user_email' AND `password`='$user_password'";
    $result = $conn->query($sql);
       
    if($result->num_rows == 1){   
        $user_info = $result->fetch_assoc();
        $_SESSION['logged'] = TRUE;
        $_SESSION['user_id'] = $user_info['id_usuario'];
        header('location: /susconnect/index.php');
    
    } else {
        header('location: login.php?login_error=Email e/ou senha não estão autorizados. Entre em contato com o administrador.');
    }
}

?>