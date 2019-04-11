<?php
    $title = 'Commentaires';
?>
<?php
    ob_start();
?>
<div class="ui aligned center aligned grid">
    <div class="column">
        <h1 class="ui orange image header">
        <div class="content">
            Billet
        </div>
        </h1>
        <div class="ui orange segment ">
            <h2 class="ui left floated header">
                <?= $fetched_entryLine['title'] ?>
            </h2>
            <h5 class="ui right floated header">
                <?= $fetched_entryLine['date_post'] ?>
            </h5>
            <div class="ui clearing divider"></div>
            <p><?= $fetched_entryLine['content'] ?></p>
        </div>
        <div class="ui comments white segment fluid">
            <h3 class="ui dividing header">Commentaires</h3>
            <?php
            while($commentLine = $commentsTable->fetch()){
            ?>
            <div class="left floated comment">
                <div class="content">
                    <span class="author">
                        <?= $commentLine['author'] ?>
                    </span>
                    <div class="metadata">
                        <span class="date"><?= $commentLine['date_comment'] ?></span>
                    </div>
                    <span>
                        <a href="/index.php?action=showComment&commentID=<?= $commentLine['id'] ?>">
                            <button class="ui compact right floated labeled icon button">
                                <i class="edit icon"></i>
                                Editer
                            </button>
                        </a>
                    </span>
                    <div class="text">
                        <?= $commentLine['comment'] ?>
                    </div>
                    <div class="ui clearing divider"></div>
                </div>
            </div>
            <?php
            }
            $commentsTable->closeCursor();
            ?>
            <form method="post" action="index.php?action=addComment&id=<?= $entryID ?>" class="ui reply form">
                <div class="field">
                    <input type="text" name="newComment_author" placeholder="Pseudo">
                </div>
                <div class="field">
                    <textarea rows="2" name="newComment_content" placeholder="Votre commentaire"></textarea>
                </div>
                <button class="ui submit labeled icon orange button" type="submit" >
                    <i class="edit icon"></i> 
                    Add Comment
                </button>
            </form>
            <?php
                if (isset($_GET['error']))
                {
            ?>
                    <div class="ui negative message">
                        Error during operation
                    </div>
            <?php
                }
            ?>
        </div>
    </div>
</div>
<?php
    $content = ob_get_clean();
    require 'template/template.php';
?>
