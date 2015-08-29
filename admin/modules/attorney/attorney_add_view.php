<div id="msgs"></div>
<form action="javascript:void(0);" method="post" id="attorney_form" name="attorney_form">
    <table><tr><td><label>Company Name</label></td><td>
                <input type="text" name="attorney_name" value="<?= isset($attorney_edit_data) ? $attorney_edit_data["attorney_name"] : ''; ?>" /></td></tr>
        <tr><td><label>Address</label></td><td>
                <input type="text" name="attorney_address" value="<?= isset($attorney_edit_data) ? $attorney_edit_data["attorney_address"] : ''; ?>" /></td></tr>
        <tr><td><label>Country</label></td><td>
                <input type="text" name="attorney_country" value="<?= isset($attorney_edit_data) ? $attorney_edit_data["attorney_country"] : ''; ?>" /></td></tr>
        <tr><td><label>State</label></td><td>
                <input type="text" name="attorney_state" value="<?= isset($attorney_edit_data) ? $attorney_edit_data["attorney_state"] : ''; ?>" /></td></tr>
        <tr><td><label>City</label></td><td>
                <input type="text" name="attorney_city" value="<?= isset($attorney_edit_data) ? $attorney_edit_data["attorney_city"] : ''; ?>"/></td></tr>
        <tr><td><label>Website</label></td><td>
                <input type="text" name="attorney_website" value="<?= isset($attorney_edit_data) ? $attorney_edit_data["attorney_website"] : ''; ?>"/></td></tr>
        <tr><td><label>Phone no.</label></td><td>
                <input type="text" name="attorney_phone" value="<?= isset($attorney_edit_data) ? $attorney_edit_data["attorney_phone_no"] : ''; ?>" /></td></tr>
        <tr><td><label>Zipcode</label></td><td>
                <input type="text" name="attorney_zipcode" value="<?= isset($attorney_edit_data) ? $attorney_edit_data["attorney_zipcode"] : ''; ?>" /></td></tr>
        <tr><td><label>Description</label></td><td>
                <textarea name="attorney_description" ><?= isset($attorney_edit_data) ? $attorney_edit_data["attorney_description"] : ''; ?></textarea></td></tr>
        <tr><td><label>Is Domestic</label></td><td>
                <select name="is_domestic" >
                    <option  value="yes" <?= isset($attorney_edit_data) && $attorney_edit_data["is_domestic"] == 'yes' ? "selected" : ''; ?> >Yes</option>
                    <option value="no"  <?= isset($attorney_edit_data) && $attorney_edit_data["is_domestic"] == 'no' ? "selected" : ''; ?>>No</option>
                </select>

            </td></tr>
        <tr><td><label>Status</label></td><td>
                <select name="attorney_status" >
                    <option  value="active"  <?= isset($attorney_edit_data) && $attorney_edit_data["attorney_status"] == 'active' ? "selected" : ''; ?>>Active</option>
                    <option value="inactive" <?= isset($attorney_edit_data) && $attorney_edit_data["attorney_status"] == 'inactive' ? "selected" : ''; ?>>Inactive</option>
                </select>
                <?php if (isset($attorney_edit_data)) { ?>
                    <input type="hidden" name="attorney" value="<?= $attorney_edit_data["attorney_id"]; ?>"/>
                <?php } ?>
                <input type="hidden" name="method" value="<?= isset($attorney_edit_data) ? "attorney_form_edit_method" : "attorney_form_method"; ?>"/>
            </td></tr>
        <tr><td></td><td><input type="submit" id="attorney_form_btn" /></td></tr>
    </table>
</form>
<!--validate login form-->
<script>
    $(document).ready(function() {
        /**
         * validate form
         */
        $("body").on("click", "#attorney_form_btn", function() {
            $("#attorney_form").validate({
                rules: {
                    attorney_name: {
                        required: true
                    },
                    attorney_address: {
                        required: true
                    },
                    attorney_country: {
                        required: true
                    },
                    attorney_state: {
                        required: true
                    },
                    attorney_city: {
                        required: true
                    },
                    attorney_website: {
                        required: true
                    },
                    attorney_phone: {
                        required: true,
                        number: true,
                        maxlength: 15,
                        minlength: 10
                    },
                    attorney_description: {
                        required: true
                    },
                    attorney_zipcode: {
                        required: true
                    },
                    is_domestic: {
                        required: true
                    },
                    attorney_status: {
                        required: true
                    },
                },
                messages: {
                    attorney_name: {
                        required: "Please enter company name"
                    },
                    attorney_address: {
                        required: "Please enter address"
                    },
                    attorney_country: {
                        required: "Please select country"
                    },
                    attorney_state: {
                        required: "Please enter state"
                    },
                    attorney_city: {
                        required: "Please enter city"
                    },
                    attorney_website: {
                        required: "Please enter website url"
                    },
                    attorney_phone: {
                        required: "Please enter phone number",
                        number: "Please enter vaild phone number",
                        maxlength: "Please enter vaild phone number",
                        minlength: "Please enter vaild phone number"
                    },
                    attorney_description: {
                        required: "Please enter description"
                    },
                    attorney_zipcode: {
                        required: "Please enter zipcode"
                    },
                    attorney_status: {
                        required: "Please select status"
                    }, },
                submitHandler: function(form) {
                    var dataString = $("#attorney_form").serialize();
                    $.ajax({
                        data: dataString,
                        url: '<?= DEFAULT_URL; ?>/admin/attorney/',
                        type: "post",
                        success: function(data) {
                            if (data == 'success') {
                                $("#msgs").html('<p style="color:green;">Successfully saved.</p>');
                                setTimeout(function() {
                                    window.location.href = '<?= DEFAULT_URL; ?>/admin/attorney/';
                                }, 3000);
                            } else {
                                $("#msgs").html('<p style="color:red;">Something went wrong.Please try agian.</p>');
                            }
                        }
                    });
                }


            });

        });

    });</script>