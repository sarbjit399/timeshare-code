<?php

class admin extends model {

    public static function isUserLogin($return_url = '') {
        if (!admin::checkUserSession()) {
            $_SESSION['session_expire'] = "Your session has expired, please login again.";

            header('Location:' . DEFAULT_URL . 'admin/login/?action=logout');
            exit;
        }
    }

    /**
     * Returns the true if user is logged in else false
     * 
     * @return boolean
     */
    public static function checkUserSession() {
        if (!isset($_SESSION['is_login']) || !isset($_SESSION['admin_data'])) {
            return false;
        } else {
            return true;
        }
    }

    public function logout() {
        unset($_SESSION["admin_data"]);
        header('Location:' . DEFAULT_URL . '/admin/login/');
    }

}
