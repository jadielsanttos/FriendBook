
<div class="session-perfil">
    <h2>Editar Perfil</h2>
    <?php if(!empty($_SESSION['msg'])): ?>
        <div class="alert alert-success"><?php echo $_SESSION['msg']; ?></div>
    <?php endif; ?>

    <form method="POST" class="form-perfil">
        
        <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" value="<?php echo $info['nome']; ?>">
        </div>

        <div class="form-group">
            <label for="bio">Biografia:</label>
            <textarea name="bio" id="bio" cols="30" rows="5"><?php echo $info['bio']; ?></textarea>
        </div>

        <div class="form-group">
            <label for="senha">Senha:</label>
            <input type="password" name="senha" id="senha">
        </div>

        <div class="form-group" id="box-email">
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
        </div>

        <button type="submit" name="salvar">Salvar</button>
    </form>
</div>