<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/style.css') ?>"/>
        <script src="<?php echo base_url('assets/bootstrap/css/bootstrap.min.js') ?>"></script>
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
        <div class="container">
            <h2>List Backlink</h2>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Name Backlink</th>
                        <th>Url Backlink</th>
                        <th>Type</th>
                        <th>Rating</th>
                        <th>Email Verification</th>
                        <th>Domain</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    print_r($domain_backlink);
                    foreach ($list_backlink as $backlink) {
                        ?>
                        <tr>
                            <td><?php echo $backlink->name; ?></td>
                            <td><?php echo $backlink->backlink; ?></td>
                            <td><?php echo $backlink->type; ?></td>
                            <td><?php echo $backlink->rating; ?></td>
                            <td><?php echo $backlink->email_verification; ?></td>
                            <td><?php
                                foreach ($list_domain as $domain) {
                                    ?>
                                    <div class="domain"
                                         <?php
                                         foreach ($domain_backlink as $db) {
                                             if ($db['domain'] == $domain->id && $db['backlink'] == $backlink->id) {
                                                 echo 'style="background: #B0BED9;"';
                                             }
                                         }
                                         ?>
                                         ><?php echo $domain->domain; ?></div> 
                                     <?php }
                                     ?></td>
                            <td>mary@example.com</td>
                        </tr>
                    <?php }
                    ?>
                </tbody>
            </table>
        </div>

    </body>
</html>