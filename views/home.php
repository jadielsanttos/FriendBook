<div class="row">
    <div class="col-sm-8">
        <div class="post-area">
            <h4>No que você está pensando?</h4>
            <form method="POST" enctype="multipart/form-data">
                <textarea class="post-text" id="post" name="post" cols="30" rows="5" placeholder="Começar a escrever..."></textarea>
                <input type="file" name="foto">
                <input type="submit" name="enviar" value="Publicar" class="enviar-post">
            </form>
        </div>

        <div class="feed">
            <?php
            foreach($feed as $postItem) {
                $this->loadView('post_item', $postItem);
            }
            ?>
            
        </div>

    </div>
    <div class="col-sm-4">
        <div class="widget">
           <h4 class="h4-amigos">Total de amigos <i class="fa-solid fa-handshake"></i></h4>
           <strong><?php echo $total_amigos; ?> amigo<?php echo ($total_amigos == '1'?'':'s'); ?></strong>
        </div>

        <?php if(count($solicitacoes) > 0): ?>
        <div class="widget" id="widget-single">
           <h4 class="h4-solicitacoes">Solicitações de amizades</h4>
           <?php foreach($solicitacoes as $pessoas): ?>
                <div class="solicitacao-item">
                    <strong><?php echo $pessoas['nome']; ?></strong>
                    <button class="btn btn-solicitacoes float-end" onclick="aceitarFriend('<?php echo $pessoas['id']; ?>', this)"><i class="fa-solid fa-check"></i></button>
                </div>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>


        <?php if(count($sugestoes) > 0): ?>
        <div class="widget">
            <h4 class="h4-sugestoes">Sugestões de amizades</h4>
            <?php foreach($sugestoes as $pessoas): ?>
                <div class="sugestao-item">
                    <strong><?php echo $pessoas['nome']; ?></strong>
                    <button class="btn btn-solicitacoes float-end" onclick="addFriend('<?php echo $pessoas['id']; ?>', this)"><i class="fa-solid fa-user-plus"></i></button>
                </div>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
    </div>
</div>
