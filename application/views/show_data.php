<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php foreach ($css_files as $file): ?>
            <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
        <?php endforeach; ?>
        <?php foreach ($js_files as $file): ?>
            <script src="<?php echo $file; ?>"></script>
        <?php endforeach; ?>
    </head>
    <body>
        <div>
            <a href='<?php echo site_url('welcome/domain') ?>'>Domain</a> |
            <a href='<?php echo site_url('welcome/email') ?>'>Email</a> |
            <a href='<?php echo site_url('welcome/hosting') ?>'>Hosting</a> |
            <a href='<?php echo site_url('welcome/niche') ?>'>Niche</a> |
            <a href='<?php echo site_url('welcome/backlink') ?>'>Backlink</a> |
            <a href='<?php echo site_url('welcome/list_backlink') ?>'>Domain Backlink</a>   

        </div>
        <div style='height:20px;'></div>  
        <div>
            <?php echo $output; ?>
        </div>
    </body>
</html>
