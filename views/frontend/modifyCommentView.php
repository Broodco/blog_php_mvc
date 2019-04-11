<?php
    $title = 'Modifier un commentaire';
?>
<?php
    ob_start();
?>
<div class="ui aligned center aligned grid">
    <div class="column">
        <h1 class="ui orange image header">
        <div class="content">
            Commentaire à modifier
        </div>
        </h1>
        <div class="ui orange segment ">
            <h2 class="ui left floated header">
                <?= $commentToEdit['author'] ?>
            </h2>
            <h5 class="ui right floated header">
                <?= $commentToEdit['date_comment'] ?>
            </h5>
            <div class="ui clearing divider"></div>
            <p><?= $commentToEdit['comment'] ?></p>
        </div>
        <div class="ui comments white segment fluid">
            <form method="post" action="index.php?action=updateComment&entryID=<?= $commentToEdit['id_entry'] ?>&commentID=<?= $commentToEdit['id'] ?>" class="ui reply form">
                <div class="field">
                    <input type="text" name="updateComment_author" placeholder="Pseudo">
                </div>
                <div class="field">
                    <textarea rows="2" name="updateComment_content" placeholder="Votre commentaire"></textarea>
                </div>
                <button class="ui submit labeled icon orange button" type="submit" >
                    <i class="edit icon"></i> 
                    Update Comment
                </button>
            </form>
        </div>
    </div>
</div>
<?php
    $content = ob_get_clean();
    require 'template/template.php';
?>
