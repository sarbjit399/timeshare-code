<?php

/**
 * Require config  and other required files
 */
require_once '../conf/config.php';
include_once VAC_ROOT . 'admin/modules/attorney/attorney_code.php';
include_once VAC_ROOT . 'admin/include/header.php';
if(isset($_GET["add"])||isset($_GET["edit"])) 
    include_once VAC_ROOT . 'admin/modules/attorney/attorney_add_view.php';
else if(isset($_GET["view"]))
    include_once VAC_ROOT . 'admin/modules/attorney/attorney_detail_view.php';
else
    include_once VAC_ROOT . 'admin/modules/attorney/attorney_view.php';
include_once VAC_ROOT . 'admin/include/footer.php';
