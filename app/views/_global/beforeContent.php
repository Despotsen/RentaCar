<!DOCTYPE html>
<html>
    <head>
        <title><?php echo @$DATA['seo_title']; ?></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="<?php echo Misc::link('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">
        <link href="<?php echo Misc::link('assets/css/style.css'); ?>" rel="stylesheet">
        <script>
        src="https://code.jquery.com/jquery-3.2.1.min.js"
        integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
        crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="container">
            <div class="header clearfix">
                <nav>                    
                    <?php if (Session::exists('user_id')): ?>
                        <?php include 'app/views/_global/menu-session.php'; ?>
                    <?php else: ?>
                        <?php include 'app/views/_global/menu-no-session.php'; ?>
                    <?php endif; ?>                    
                </nav>
                    <h3 class="text-muted">Rental Car Project</h3>
            </div>
            <div class="row marketing">
               
                