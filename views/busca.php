<h2 class="h2-busca">Resultado da busca</h2>

<?php foreach($resultado as $pessoas): ?>
    <div class="sugestao-item" id="item-busca">
        <strong><?php echo $pessoas['nome']; ?></strong>
        <button class="btn btn-sugestoes float-end" onclick="addFriend('<?php echo $pessoas['id']; ?>', this)"><i class="fa-solid fa-user-plus"></i></button>
    </div>
<?php endforeach; ?>


