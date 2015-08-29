<?php


/**
 * load required class
 */
load_class(array("attorney",'admin'));
admin::isUserLogin();
$attorney_obj = new attorney();

if (isset($_POST["method"]) && $_POST["method"] == "attorney_form_method") {
    $address = $_POST["attorney_address"] . " " . $_POST["attorney_state"] . " " . $_POST["attorney_zipcode"] . " " . $_POST["attorney_zipcode"];
    $data = getLntByZip($address);
    $latitude = $data["lat"];
    $longitude = $data["lng"];
    $data_array = array(
        "attorney_name" => $_POST["attorney_name"],
        "attorney_address" => $_POST["attorney_address"],
        "attorney_country" => $_POST["attorney_country"],
        "attorney_state" => $_POST["attorney_state"],
        "attorney_city" => $_POST["attorney_city"],
        "attorney_zipcode" => $_POST["attorney_zipcode"],
        "attorney_website" => $_POST["attorney_website"],
        "attorney_phone_no" => $_POST["attorney_phone"],
        "is_domestic" => $_POST["is_domestic"],
        "attorney_status" => $_POST["attorney_status"],
        "attorney_latitude" => $latitude,
        "attorney_longitude" => $longitude,
        "attorney_description" => $_POST["attorney_description"],
        "created" => currentDate(),
    );
    $row = $attorney_obj->db->insert($attorney_obj->tableName, $data_array);
    if ($row)
        echo "success";
    else
        echo "failed";
    die;
}elseif (isset($_POST["method"]) && $_POST["method"] == "attorney_form_edit_method") {
    $address = $_POST["attorney_address"] . " " . $_POST["attorney_state"] . " " . $_POST["attorney_zipcode"] . " " . $_POST["attorney_zipcode"];
    $data = getLntByZip($address);
    $latitude = $data["lat"];
    $longitude = $data["lng"];
    $attorney_id = $_POST["attorney_id"];
    $data_array = array(
        "attorney_name" => $_POST["attorney_name"],
        "attorney_address" => $_POST["attorney_address"],
        "attorney_country" => $_POST["attorney_country"],
        "attorney_state" => $_POST["attorney_state"],
        "attorney_city" => $_POST["attorney_city"],
        "attorney_zipcode" => $_POST["attorney_zipcode"],
        "attorney_website" => $_POST["attorney_website"],
        "attorney_phone_no" => $_POST["attorney_phone"],
        "is_domestic" => $_POST["is_domestic"],
        "attorney_status" => $_POST["attorney_status"],
        "attorney_latitude" => $latitude,
        "attorney_longitude" => $longitude,
        "attorney_description" => $_POST["attorney_description"],
        "modified" => currentDate(),
    );
    $attorney_obj->db->where("attorney_id", $attorney_id);
    $row = $attorney_obj->db->update($attorney_obj->tableName, $data_array);
    if ($row)
        echo "success";
    else
        echo "failed";
    die;
} elseif (isset($_GET["edit"]) && !empty($_GET["edit"])) {
    $edit_id = decode($_GET["edit"]);
    /**
     * get particular attorney detail
     */
    $attorney_edit_data = $attorney_obj->GetAttorneyDetailById($edit_id);
} elseif (isset($_POST["method"]) && $_POST["method"] == 'update_status') {
    $status = $_POST["status"];
    $attorney_id = $_POST["attorney_id"];
    if ($status == 'active') {
        $title = "Click to Active";
        $link = "Inactive";
        $status = 'inactive';
    } else {
        $title = "Click to Inactive";
        $link = "Active";
        $status = 'yes';
    }
    $data_array = array(
        "attorney_status" => $status,
        "modified" => currentDate(),
    );
    $attorney_obj->db->where("attorney_id", $attorney_id);
    $row = $attorney_obj->db->update($attorney_obj->tableName, $data_array);
    if ($row) {
        echo 'success|' . $link . '|' . $title.'|'.$status;
    } else {
        echo "failed";
    }die;
} else {
    /**
     * get list of attorney
     */
    $attorney_data = $attorney_obj->GetAttorneyList();
}