<html>
    <head>
        <?php 
        include '../config.php';
        include '../interface/navbar.php' ?>
        <link href="<?= SITE_URL ?>/style/style.css" rel="stylesheet">
    </head>
    <body>
        <div class="movies-container"></div>
        <script type="text/javascript" src="<?= SITE_URL ?>/pages/topfilms.js"></script>
    </body>
</html>

<?php
    include '../interface/footer.php'
?>
