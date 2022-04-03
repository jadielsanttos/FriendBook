<div class="post-item">
    <div class="postItem-info">
        <strong><?php echo $nome; ?></strong><span> Fez uma publicação...</span>
        <p>Publicado em <?php echo date('d/m/Y H:i:s', strtotime($data_criacao)); ?></p>
        <hr>
    </div>

    <div class="postItem-texto">
        <p><?php echo $texto; ?></p>
    </div>

    <?php if($tipo == 'foto'): ?>
        <img src="<?php echo BASE_URL; ?>assets/images/posts/<?php echo $url; ?>" width="100%">
    <?php endif; ?>

    <div class="postItem-botoes">
        <button class="btn-like" data-id="<?php echo $id; ?>" data-likes="<?php echo $likes; ?>" data-liked="<?php echo $liked; ?>" onclick="curtir(this)">(<?php echo $likes; ?>) <?php echo($liked == '0'?'Curtir':'Descurtir'); ?></button>
        <button class="btn-comment" onclick="displayComentario(this)">Comentar</button><br><br>

        <div class="postItem-comentario">
            <input type="text" class="postItem-txt" placeholder="Inserir comentário..."><br>
            <button class="btn-enviar-comentario" data-id="<?php echo $id; ?>" onclick="comentar(this)">Enviar</button>
        </div>
    </div>
    
    
    <?php if($comentarios != null): ?>
    <div class="area-comentarios">
        <h5>Comentários:</h5>
        <ul>
            <?php foreach($comentarios as $comentario): ?>
                <li>
                    <strong><?php echo $comentario['nome']; ?></strong><br>
                    <span><?php echo date('d/m/Y H:i:s', strtotime($comentario['data_criacao'])); ?></span><br>
                    <?php echo $comentario['texto']; ?>
                </li> 
            <?php endforeach; ?>
        </ul>
    </div>
    <?php endif; ?>
</div>