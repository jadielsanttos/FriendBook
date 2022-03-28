<div class="row">
    <div class="col-sm-8">
        <div class="post-area">
            <h4>No que você está pensando?</h4>
            <form method="POST" enctype="multipart/form-data">
                <textarea class="form-control" id="post" name="post" cols="30" rows="5"></textarea>
                <input type="file" name="foto"><br>
                <input type="submit" name="enviar" value="Enviar" class="btn btn-secondary">
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
        <?php if(count($solicitacoes) > 0): ?>
        <div class="widget" id="widget-single">
           <h4>Solicitações de amizades</h4>
           <?php foreach($solicitacoes as $pessoas): ?>
                <div class="solicitacao-item">
                    <strong><?php echo $pessoas['nome']; ?></strong>
                    <button class="btn btn-success float-end" onclick="aceitarFriend('<?php echo $pessoas['id']; ?>', this)"><i class="fa-solid fa-check"></i></button>
                </div>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>

        <div class="widget">
           <h4>Total de amigos</h4>
           <?php echo $total_amigos; ?> amigo<?php echo ($total_amigos == '1'?'':'s'); ?>
        </div>

        <?php if(count($sugestoes) > 0): ?>
        <div class="widget">
            <h4>Sugestões de amizades</h4>
            <?php foreach($sugestoes as $pessoas): ?>
                <div class="sugestao-item">
                    <strong><?php echo $pessoas['nome']; ?></strong>
                    <button class="btn btn-primary float-end" onclick="addFriend('<?php echo $pessoas['id']; ?>', this)"><i class="fa-solid fa-plus"></i></button>
                </div>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
    </div>
</div>
