<?php

/**
 * Load required classes
 */
load_class(array("attorney"));
$attorney_obj = new attorney();
//if (isset($_GET["zipcode"]) && !empty($_GET["zipcode"])) {
$radius = isset($_GET["radius"]) && !empty($_GET["radius"]) ? (int) $_GET["radius"] : 100;
$zipcode = isset($_GET["zipcode"]) && !empty($_GET["zipcode"]) ? $_GET["zipcode"] : '';
/**
 * get latitude logitude of zipcode
 */
$fields = '';
$having = '';
$order_by = '';
    if ($zipcode != '') {
    $data = getLntByZip($zipcode);
    if (!empty($data)) {
        $latitude = $data["lat"];
        $longitude = $data["lng"];
        /**
         * 
         * Calculate distance in miles
         */
        $fields .= " , ( 6371 * acos( cos( radians($latitude) ) * cos( radians(attorney_latitude ) )";
        $fields .= " * cos( radians(attorney_longitude ) - radians($longitude) ) + sin( radians($latitude) )";
        $fields .= " * sin( radians(attorney_latitude ) ) ) )* 0.621371192 AS distance";
        $having = " having '$radius' >= distance";
        $having .= " OR attorney_zipcode = '$zipcode'";
        $order_by = " order by distance ASC ";
    }
}
$query = "select * $fields from attorney_view_view where attorney_status ='active' and is_domestic='yes'  $having $order_by";
$domestic_data = $attorney_obj->db->rawQuery($query);
/**
 * International data
 */
$attorney_obj->db->where("is_domestic", "no");
$attorney_obj->db->where("attorney_status", 'active');
$international_data = $attorney_obj->db->get("attorney_view_view", null, '*');
//}