<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/style.css') ?>"/>
    </head>
    <body>
        <div>
            <a href='<?php echo site_url('welcome/domain') ?>'>Domain</a> |
            <a href='<?php echo site_url('welcome/email') ?>'>Email</a> |
            <a href='<?php echo site_url('welcome/hosting') ?>'>Hosting</a> |
            <a href='<?php echo site_url('welcome/niche') ?>'>Niche</a> |
            <a href='<?php echo site_url('welcome/backlink') ?>'>Backlink</a> |
            <a href='<?php echo site_url('welcome/list_backlink') ?>'>List Backlink</a> |  
            <a href='<?php echo site_url('login/logout') ?>'>Logout</a>   
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
                    foreach ($list_backlink as $backlink) {
                        ?>
                        <tr class="backlink">
                            <td class="domain_name"><?php echo $backlink->name; ?></td>
                            <td><?php echo $backlink->backlink; ?></td>
                            <td><?php echo $backlink->type; ?></td>
                            <td><?php echo $backlink->rating; ?></td>
                            <td><?php echo $backlink->email_verification; ?></td>
                            <td id="<?php echo $backlink->id; ?>"><?php
                                foreach ($list_domain as $domain) {
                                    $bl = "bl";
                                    ?>

                                    <?php
                                    foreach ($domain_backlink as $db) {
                                        if ($db['domain'] == $domain->id && $db['backlink'] == $backlink->id) {
                                            $bl = "backlinked";
                                        }
                                        ?>

                                    <?php }
                                    ?>
                                    <div class="domain <?php echo $bl ?>" id="<?php echo $domain->id; ?>"  ><?php
                                        echo $domain->domain;
                                        ?>
                                    </div> 
                                <?php }
                                ?></td>
                            <td>
                                <a href="<?php echo base_url().'index.php/welcome/backlink/read/'.$backlink->id; ?>">View</a>
                            </td>
                        </tr>
                    <?php }
                    ?>
                </tbody>
            </table>
        </div>
        <div id="domain_modal" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Add Backlink to Domain</h4>
                    </div>
                    <form id="form_add_backlink">
                        <div class="modal-body"> 
                            <div class="form-group">
                                <label for="email">Domain:</label>
                                <input type="text" class="form-control domain_tampil" disabled="disabled">
                                <input type="hidden" name="domain" id="domain"/>
                            </div>
                            <div class="form-group">
                                <label for="email">Backlink:</label>
                                <input type="text" class="form-control backlink_tampil" disabled="disabled">
                                <input type="hidden" name="backlink" id="backlink"/>
                            </div>
                            <div class="form-group">
                                <label for="email">Url:</label>
                                <input type="text" class="form-control" id="url" name="url">
                            </div>
                            <div class="form-group">
                                <label for="sel1">Email:</label>
                                <select class="form-control" name="email">
                                    <?php foreach ($list_email as $email) { ?>
                                        <option value="<?php echo $email->id; ?>"><?php echo $email->email; ?></option>
                                    <?php }
                                    ?>
                                </select>
                            </div> 
                            <div class="form-group">
                                <label for="email">Username:</label>
                                <input type="text" class="form-control" id="username" name="username">
                            </div>
                            <div class="form-group">
                                <label for="email">Password:</label>
                                <input type="text" class="form-control" id="pasword" name="password">
                            </div>
                            <div class="form-group">
                                <label for="email">indexed:</label>
                                <select class="form-control" name="indexed">
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="email">keyword:</label>
                                <input type="text" class="form-control" id="keyword" name="keyword">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-default submit_backlink">Submit</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>

        <div id="banklinked_modal" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Domain Backlink Info</h4>
                    </div>
                    <div class="modal-body" id="modal_body_backlinked">
                        <ul>
                            <li class="list-group-item">Domain : asd.com</li>
                            <li class="list-group-item">Backlink: asdf</li>
                            <li class="list-group-item">url: asdf</li>
                            <li class="list-group-item">email: asdf</li>
                            <li class="list-group-item">username: adfsd</li>
                            <li class="list-group-item">password: asdf</li>
                            <li class="list-group-item list-group-item-success">indexed: yes</li>
                            <li class="list-group-item">Keyword: asdf</li>
                        </ul>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>

    </body>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/grocery_crud/js/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        $('.bl').click(function () {
            var domainid = $(this).attr('id');
            var backlinkid = $(this).parent('td').attr('id');
            $('.domain_tampil').val($(this).html());
            $('.backlink_tampil').val($(this).parent('td').siblings('.domain_name').html());
//            alert(backlinkid);
            $('#domain').val(domainid);
            $('#backlink').val(backlinkid);
            $('#domain_modal').modal('show');
        });
        $('.backlinked').click(function () {
            var backlinkedid = $(this).attr('id');
            $.ajax({
                url: '<?php echo site_url('welcome/detail_backlinked') ?>',
                data: 'backlinkedid=' + backlinkedid,
                type: 'POST',
                success: function (msg) {
                    $('#modal_body_backlinked').html();
                }
            });
            $('#banklinked_modal').modal('show');
        });
        $('#form_add_backlink').on('submit', function (e) {
            e.preventDefault();
            var data_backlink = $(this).serialize();
            $.ajax({
                url: '<?php echo site_url('welcome/domain_backlink_insert') ?>',
                data: data_backlink,
                type: 'POST',
                success: function (msg) {
                    $('#domain_modal').modal('hide');
                    $('.bl#' + $('#domain').val()).css('background', '#B0BED9');

                }
            });
        });
    </script>
</html>