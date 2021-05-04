<!DOCTYPE html>

<html>

    <head>
        <meta charset="UTF-8">
        <title>Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="/susconnect/assets/css/style.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        
              
    </head>

    <body>
    <div class="row">
        <div class="col"></div>
        <div class="col login_form">
            <div class="center_div">
                <h5>Login</h5>
            </div>
            <form action="validate.php" method="POST">
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" name="user_email" class="form-control" required="required" placeholder="Informe o seu email">
                </div>
                <div class="form-group">
                    <label for="pwd">Senha:</label>
                    <input type="password" name="user_password" class="form-control" required="required" placeholder="Informe a sua senha">
                </div><br>
                <div class="center_div">
                    <button type="submit" class="btn btn-primary">Entrar</button>
                </div>            
            </form>

            <?php if (isset ($_GET['login_error'])){ ?>
            <p class="info_message"><?php echo $_GET['login_error']?></p>
            <?php } ?>
        </div>
        <div class="col"></div>
    </div>
    </body>
</html>