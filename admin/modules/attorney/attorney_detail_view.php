<?php // include_once 'include/leftMenu.php';   ?>
<div id="msgs"></div>
<a href="<?= DEFAULT_URL ?>/admin/attorney/?add">Add New Record </a>
<table id="example1" class="display responsive nowrap" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>Company Name</th>
            <th>Address</th>
            <th>City</th>
            <th>State</th>
            <th>Country</th>
            <th>Phone no</th>
            <th>Zipcode</th>
            <th>Website</th>
            <th>Status</th>
            <th>View</th>
            <th>Edit</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if (count($attorney_data) > 0) {
            foreach ($attorney_data as $key => $val) {
                ?>
                <tr>
                    <td><?= $val['attorney_name']; ?></td>
                    <td><?= $val['attorney_address']; ?></td>
                    <td><?= $val['attorney_city']; ?></td>
                    <td><?= $val['attorney_state']; ?></td>
                    <td><?= $val['attorney_country']; ?></td>
                    <td><?= $val['attorney_phone_no']; ?></td>
                    <td><?= $val['attorney_zipcode']; ?></td>
                    <td><?= $val['attorney_website']; ?></td>
                    <td><a href="javascript:void(0);" data-id="<?= $val['attorney_id'] ?>"><?= ucfirst($val['attorney_status']); ?></a></td>
                    <td><a href="<?= DEFAULT_URL; ?>/admin/attorney/?view=<?= encode($val["attorney_id"]); ?>">View</a></td>
                    <td><a href="<?= DEFAULT_URL; ?>/admin/attorney/?edit=<?= encode($val["attorney_id"]); ?>">Edit</a></td>
                </tr>
                <?php
            }
        }
        ?>
    </tbody>
</table>
<link href="<?= DEFAULT_URL; ?>/assets/css/tablecss1.css" rel="stylesheet" type="text/css">
<link href="<?= DEFAULT_URL; ?>/assets/css/tablecss2.css" rel="stylesheet" type="text/css">
<script src="<?= DEFAULT_URL; ?>/assets/js/tablejs1.js" type="text/javascript"></script>
<script src="<?= DEFAULT_URL; ?>/assets/js/tablejs2.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#example1').dataTable(
                {
                    responsive: true,
                }
        );
        $("body").on("click", ".delete_call_detail", function() {
            var me = $(this);
            var id = me.attr('data-id');
            $.ajax({
                data: {'method': 'delete_telephonic_calls', 'id': id},
                url: DEFAULT_URL + '/telephonic_calls/',
                type: "post",
                success: function(data) {
                    if (data == 'success') {
                        var HTML = '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>';
                        HTML += '<h4>Call</h4>detail successfully deleted</div>';
                        $("#msgs").html(HTML);
                        me.parent().parent().remove();
                        setTimeout(function() {
                            // window.location.href = DEFAULT_URL + '/dashboard/';
                        }, 3000);
                    } else {
                        var HTML = '<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button>';
                        HTML += '<h4>Something went wrong</h4>Please try agian</div>';
                        $("#msgs").html(HTML);
                    }
                }
            });
        });
    });
</script>
