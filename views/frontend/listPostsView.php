<?php
    $title = 'Accueil';
?>
<?php
    ob_start();
?>
<div class="ui aligned center aligned grid">
    <div class="column">
        <h2 class="ui orange image header">
        <div class="content">
            Bienvenue sur mon blog les copains
        </div>
        </h2>
        <?php
            while($entry = $entriesTable->fetch()){
                $fetched_totalComments = $commentManager->getTotalComments($entry)->fetch();
        ?>
            <div class="ui orange segment">
                <h2 class="ui left floated header">
                    <?= $entry['title'] ?>
                </h2>
                <h5 class="ui right floated header">
                    <?= $entry['date_post'] ?>
                </h5>
                <div class="ui clearing divider"></div>
                <p><?= $entry['content'] ?></p>
                <div class="ui left labeled button hoverzoom" tabindex="0">
                    <a href="/index.php?action=post&id=<?= (int)$entry['id'] ?>" class="ui basic right pointing label">
                        <?= $fetched_totalComments['total'] ?>
                    </a>
                    <a href="/index.php?action=post&id=<?= (int)$entry['id'] ?>" class="ui button">
                        <i class="comment icon"></i> Commentaires
                    </a>
                </div>
            </div>
        <?php
            }
            $commentManager->getTotalComments($entry)->closeCursor();
            $entriesTable->closeCursor();
        ?>
    </div>
</div>
<?php
    $content = ob_get_clean();
    require './views/frontend/template/template.php';
?>