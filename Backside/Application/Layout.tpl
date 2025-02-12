<!DOCTYPE html>
<html lang="en">
    <head>

        <script><?php echo file_get_contents(dirname(__DIR__, 2) . '/Frontside/Library/Jquery.min.js'); ?></script>
        <script><?php echo file_get_contents(dirname(__DIR__, 2) . '/Frontside/Library/Underscore.min.js'); ?></script>
        <script><?php echo file_get_contents(dirname(__DIR__, 2) . '/vendor/technomage-liloi/rune-api/Client/API.js'); ?></script>

        <?php foreach($config['scripts'] as $value): ?>
            <script src="<?php echo $value; ?>"></script>
        <?php endforeach; ?>

        <title><?php echo $config['title']; ?></title>
    </head>
    <body>
        <!--<div id="head"></div>-->
        <div id="page">
            <script><?php echo $config['start']; ?></script>
        </div>
    </body>
</html>