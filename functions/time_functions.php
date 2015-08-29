<?php

function _getDislpayDate($date, $format) {
    return date($format, strtotime($date));
}

function convert24Hrs($time) {
    //$time = str_replace(' ', '', strtoupper($time));
    // $time = str_replace(':AM', ' AM', $time);
    //$time = str_replace(':PM', ' PM', $time);

    return date("H:i:s", strtotime($time));
}

function convert12Hrs($time) {
    $time = strtoupper(date("h:i a", strtotime($time)));
    return $time;
}

function currentDate() {
    return date("Y-m-d H:i:s", strtotime('+1 hour'));
}

/////////////// Date Format in numeric /////////////////////
//function dateFormat($date, $time = null) {
//    $date = strtotime($date);
//    if ($time == 'false') {
//        $date = date("m-d-Y", $date);
//    } else {
//        $date = date("m-d-Y h:i A", $date);
//    }
//
//    return $date;
//}
/////////////// Date Format /////////////////////
function dateFormat($date, $format = "d-m-Y h:i A") {
    $date = strtotime($date);
    $date = date($format, $date);
    return $date;
}

/////////////// Date Format According to month name/////////////////////
function dateFormatMDY($date, $time = true) {
    $date = strtotime($date);
    if ($time == false) {
        $date = date("M d, Y", $date);
    } else {
        $date = date("M d, Y h:i A", $date);
    }

    return $date;
}

function daysRemaining($currentDate, $end, $out_in_array = false) {

    $intervalo = date_diff(date_create($currentDate), date_create($end));
    $out = $intervalo->format("Years:%Y,Months:%M,Days:%d,Hours:%H,Minutes:%i,Seconds:%s");
    if (!$out_in_array)
        return $out;
    $a_out = array();
    array_walk((explode(',', $out)), function($val, $key) use(&$a_out) {
        $v = explode(':', $val);
        $a_out[$v[0]] = $v[1];
    });
    return $a_out;
}

/**
 * 
 * @param type $first
 * @param type $last
 * @param type $step
 * @param type $format
 * @return type
 */
function dateRange($first, $last, $step = '+1 day', $format = 'd-m-Y') {
    $dates = array();
    $current = strtotime($first);
    $last = strtotime($last);

    while ($current <= $last) {
        $dates[] = date($format, $current);
        $current = strtotime($step, $current);
    }
    return $dates;
}

/**
 * function to get timezone
 */
function getTimeZoneByUserId($user_id) {
    load_class(array('users'));
    $obj_users = new users();
    $row = $obj_users->db->rawQuery("select t.abbrevation from users as u left join timezone as t on(u.time_zone=t.id) where u.user_id=$user_id");
    return $row[0]['abbrevation'];
}

/**
 * function to get timezone name
 */
function getTimeZoneNameByUserId($user_id) {
    load_class(array('users'));
    $obj_users = new users();
    $row = $obj_users->db->rawQuery("select t.name from users as u left join timezone as t on(u.time_zone=t.id) where u.user_id=$user_id");
    return $row[0]['name'];
}

/**
 * Convert a date(time) string to another format or timezone
 *
 * DateTime::createFromFormat requires PHP >= 5.3
 *
 * @param string $dt
 * @param string $tz1
 * @param string $df1
 * @param string $tz2
 * @param string $df2
 * @return string
 */
function date_convert($dt, $tz1, $df1, $tz2, $df2) {
    $res = '';
    if (!in_array($tz1, timezone_identifiers_list())) { // check source timezone
        trigger_error(__FUNCTION__ . ': Invalid source timezone ' . $tz1, E_USER_ERROR);
    } elseif (!in_array($tz2, timezone_identifiers_list())) { // check destination timezone
        trigger_error(__FUNCTION__ . ': Invalid destination timezone ' . $tz2, E_USER_ERROR);
    } else {
        // create DateTime object
        $d = DateTime::createFromFormat($df1, $dt, new DateTimeZone($tz1));
        // check source datetime
//        if ($d && DateTime::getLastErrors()["warning_count"] == 0 && DateTime::getLastErrors()["error_count"] == 0) {
//            // convert timezone
//            $d->setTimeZone(new DateTimeZone($tz2));
//            // convert dateformat
//            $res = $d->format($df2);
//        } else {
//            trigger_error(__FUNCTION__ . ': Invalid source datetime ' . $dt . ', ' . $df1, E_USER_ERROR);
//        }
    }
    return $res;
}
