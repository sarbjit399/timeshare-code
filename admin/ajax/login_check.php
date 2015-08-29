<?php

include '../../conf/config.php';
/**
 * check for login
 */
if (isset($_POST["method"]) && $_POST["method"] == 'login_check') {
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);
    load_class(array('login'));
    $obj_login = new login();
    /**
     * check for user exists
     */
    $obj_login->db->where('username', $username);
    $obj_login->db->where('password', $password);
    $row = $obj_login->db->getOne($obj_login->tableName, null, '*');
    if ($row) {
        $_SESSION['is_login'] = TRUE;
        $_SESSION['admin_data'] = array(
            'user_id' => $row['user_id'],
            'user_type' => $row['user_type'],
        );
        unset($_SESSION['logoutSuccess']);
        echo 'success';
    } else {
        echo 'failed';
    }
    exit();
}
