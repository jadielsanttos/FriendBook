<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&family=Montserrat:wght@300;400;600;700&family=Poppins:wght@300;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/login.css">
    <title>FriendBook - Entrar</title>
</head>
<body id="body-forms">

    <section>
        <div class="container">
            <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4">
            <a href="<?php echo BASE_URL; ?>" id="link-logo">Friendbook</a>
        
            <div class="col-md-3 text-end">
                <div class="menu-opener" id="menu-opener">
                    <i class="fa-solid fa-bars" onclick="abrirMenu()"></i>
                </div>

                <div class="menu" id="menu">
                    <a href="<?php echo BASE_URL; ?>login/entrar" class="btn-entrar">entrar</a>
                    <a href="<?php echo BASE_URL; ?>login/cadastrar" class="btn-cadastrar">cadastrar</a>
                </div>
            </div>

            <div class="menu-mobile" id="menu-mobile">
                <ul>
                    <li><a href="<?php echo BASE_URL; ?>login/entrar" class="btn-entrar">entrar</a></li>
                    <li><a href="<?php echo BASE_URL; ?>login/cadastrar" class="btn-cadastrar">cadastrar</a></li>
                </ul>
            </div>
            </header>
        </div>
    </section>

    <div class="container" id="container-login-entrar">
        <h1>Login</h1>

        <?php if(!empty($erro)): ?>
            <div class="alert alert-danger"><?php echo $erro; ?></div>
        <?php endif; ?>

        <form method="POST">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" placeholder="exemplo@gmail.com" required>
            </div>

            <div class="form-group">
                <label for="senha">Senha:</label>
                <input type="password" name="senha" id="senha" placeholder="Digite sua senha..." required>
            </div>

            <button type="submit" class="btn-logar">entrar</button>
        </form>
    </div>

    <script src="<?php echo BASE_URL; ?>assets/js/script.js"></script>
    <script src="https://kit.fontawesome.com/e3dc242dae.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> 
</body>
</html>