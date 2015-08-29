<?php // include_once 'include/leftMenu.php';    ?>
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
                    <td><a href="javascript:void(0);" class="change_status" title="<?= $val['attorney_status']=='active'?"Click to Inactive":"Click to Active";?>"
                           data-status="<?= $val['attorney_status']; ?>" data-id="<?= $val['attorney_id'] ?>"><?= ucfirst($val['attorney_status']); ?></a></td>
                    <td><a href="<?= DEFAULT_URL; ?>/admin/attorney/?view=<?= encode($val["attorney_id"]); ?>">View</a></td>
                    <td><a href="<?= DEFAULT_URL; ?>/admin/attorney/?edit=<?= encode($val["attorney_id"]); ?>">Edit</a></td>
                </tr>
                <?php
            }
        }
        ?>
    </tbody>
</table>
<link href="<?= DEFAULT_URL; ?>/admin/assets/css/tablecss1.css" rel="stylesheet" type="text/css">
<link href="<?= DEFAULT_URL; ?>/admin/assets/css/tablecss2.css" rel="stylesheet" type="text/css">
<script src="<?= DEFAULT_URL; ?>/admin/assets/js/tablejs1.js" type="text/javascript"></script>
<script src="<?= DEFAULT_URL; ?>/admin/assets/js/tablejs2.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#example1').dataTable(
                {
                    responsive: true,
                }
        );
        $("body").on("click", ".change_status", function() {
            var me = $(this);
            var attorney_id = me.attr('data-id');
            var status = me.attr('data-status');
            $.ajax({
                data: {'method': 'update_status', 'attorney_id': attorney_id, 'status': status},
                url: '<?= DEFAULT_URL ?>/admin/attorney/',
                type: "post",
                success: function(response) {
                    var data=response.split("|");
                    if (data[0] == 'success') {
                        HTML = '<h4>Call</h4>Successfully updated</div>';
                        me.attr("title",data[2]);
                        me.text(data[1]);
                        me.attr("data-status",data[3]);
                        $("#msgs").html(HTML);

                    } else {
                        HTML += '<h4>Something went wrong</h4>Please try agian</div>';
                        $("#msgs").html(HTML);
                    }
                    setTimeout(function() {
                        $("#msgs").html('');
                    }, 3000);
                }
            });
        });
    });
</script>
