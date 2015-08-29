<?php

/**
 * Load required classes
 */
load_class(array('login','admin'));
$login_obj = new login();
if (isset($_GET["logout"])) {
    admin::logout();
}
