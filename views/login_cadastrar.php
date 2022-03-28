<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/login.css">
    <title>Document</title>
</head>
<body>

    <section>
        <div class="container">
            <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4">
            <a href="<?php echo BASE_URL; ?>" id="link-logo">Friendbook</a>

        
            <div class="col-md-3 text-end">
                <a href="<?php echo BASE_URL; ?>login/entrar" class="btn btn-outline-primary">Entrar</a>
                <a href="<?php echo BASE_URL; ?>login/cadastrar" class="btn btn-primary">Cadastrar</a>
            </div>
            </header>
        </div>
    </section>

    <div class="container">
        <h1>Cadastrar</h1>

        <?php if(!empty($erro)) :?>
            <div class="alert alert-danger"><?php echo $erro; ?></div>
        <?php endif; ?>

        <form method="POST">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" name="email" id="email">
            </div>

            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" class="form-control" name="nome" id="nome">
            </div>

            <div class="form-group">
                <label for="senha">Senha:</label>
                <input type="password" class="form-control" name="senha" id="senha">
            </div>

            <div class="radio">
                Sexo:<br>
                <label><input type="radio" name="sexo" id="sexo" value="0" checked> Masculino</label><br>
                <label><input type="radio" name="sexo" id="sexo" value="1"> Feminino</label>
            </div><br>

            <button type="submit" class="btn btn-secondary">Cadastrar</button>
        </form>


    </div>

     

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> 
</body>
</html>