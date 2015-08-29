<?php

/**
 * Load required classes
 */
load_class(array('login', 'admin'));
$login_obj = new login();
if (isset($_GET["logout"])) {
    admin::logout();
}
if (isset($_POST["method"]) && $_POST["method"] == 'change_password') {

    $current_password = $_POST["current_password"];
    $new_password = $_POST["new_password"];
    $user_id = $_SESSION["admin_data"]["user_id"];
$data_array = array("password"=>$new_password,"modified"=>  currentDate(),);
    $login_obj->db->where("user_id", $user_id);
    $login_obj->db->where("password", $current_password);
    $row = $login_obj->db->get($login_obj->tableName, null, 'user_id');
    if ($row) {
        $login_obj->db->where("user_id", $user_id);
        $row = $login_obj->db->update($login_obj->tableName, $data_array);
        echo "success";
    } else {
        echo "invaild";
    }die;
}
