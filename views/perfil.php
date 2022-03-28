<h1>Editar Perfil</h1>

<form method="POST">
    
    <div class="form-group">
        <label for="nome">Nome:</label>
        <input type="text" class="form-control" name="nome" id="nome" value="<?php echo $info['nome']; ?>">
    </div>

    <div class="form-group">
        <label for="bio">Biografia:</label>
        <textarea name="bio" id="bio" cols="30" rows="5" class="form-control"><?php echo $info['bio']; ?></textarea>
    </div>

    <div class="form-group">
        <label for="senha">Senha:</label>
        <input type="password" class="form-control" name="senha" id="senha">
    </div>

    <div class="form-group">
        <strong>Email:<br></strong>
        <?php echo $info['email']; ?>
    </div>

    <div class="radio">
        <strong>Sexo:</strong><br>
        <?php
            if($info['sexo'] == 0) {
                echo 'Masculino';
            }else {
                echo 'Feminino';
            }
        ?>  
    </div><br>

    <button type="submit" class="btn btn-secondary">Salvar</button>
</form>