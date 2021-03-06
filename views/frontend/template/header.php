<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.js"></script>
    <style type="text/css">
        body {
            background-color: #222222;
            text-align: left;
        }
        body > .grid {
            height: 100%;
        }
        .image {
            margin-top: -100px;
        }
        .column {
            max-width: 800px;
        }
        .ui.grid {
            margin-top : 20px;
        }
        a{
            color: black;
            cursor: pointer !important;
        }
        a:hover{
            color: black;
        }
        .hoverzoom:hover{
            transform: scale(1.05)
        }
        .comments{
            text-align: left !important;
            max-width : 100% !important;
        }
        textarea{
            height : 6em !important;
        }
    </style>
    <title><?= $title ?></title>
</head>
<body>

<div class="ui fixed inverted menu">
    <a href="/index.php?action=listPosts" class="active orange item">Accueil</a>
    <?php if (isset($username)){ ?>
    <?php } ?>
</div>
