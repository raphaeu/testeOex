<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="Agenda online">
        <meta name="author" content="Rafael aguiar">

        <title>Igenda</title>

        <!-- Bootstrap core CSS -->
        <link href="/public/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="/public/css/main.css" rel="stylesheet">
        <script src="/public/js/utils.js"></script>

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>

    <body>
        <?php include(ROOT_VIEW . '/layout/navbar.php'); ?>
    
        <div class="container">
            <?php if (isset($danger)) { ?>
            <div class="alert alert-danger" role="alert">
                <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                <strong><?=$danger?></strong><hr>
                <ul>
                    <?php foreach($erros as $erro) { ?>
                    <li><?=$erro?></li>
                    <?php } ?>
                </ul>
                    </div>
            <?php } ?>
            <?php if (isset($success)) { ?>
                <div class="alert alert-success" role="alert"><?=$success?></div>
            <?php } ?>

