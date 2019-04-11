<?php
    $title = 'Erreur';
?>
<?php
    ob_start();
?>
<div class="ui aligned center aligned grid">
    <div class="column">
        <h2 class="ui orange image header">
            <div class="content">
                Zut...Une erreur sauvage apparait !
            </div>
        </h2>
        <div class="ui orange segment">
            <h2 class="ui centered header">
                Que s'est-il passé?
            </h2>
            <div class="ui clearing divider"></div>
            <p><?= $errorMessage ?></p>
            <div class="ui button hoverzoom" tabindex="0">
                <a href="/index.php" class="ui button">
                    <i class="home icon"></i> Retour à l'accueil
                </a>
            </div>
        </div>
    </div>
</div>
<?php
    $content = ob_get_clean();
    require './views/frontend/template/template.php';
?>