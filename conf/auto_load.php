<?php

function load_class($classes = array()) {
    foreach ($classes as $className) {
        $className = strtolower($className);
        $fileName = VAC_ROOT . "classes/class." . $className . ".php";
        if (file_exists($fileName)) {
            require_once ($fileName);
        } else {
            die('Unable to load class <b>' . $className . '</b>');
        }
    }
}

function load_helper($helperName) {
    $helperName = strtolower($helperName);
    $fileName = VAC_ROOT . "helper/" . $helperName . ".php";
    if (file_exists($fileName)) {
        include_once($fileName);
    } else {
        die('Unable to load helper <b>' . $helperName . '</b>');
    }
}

function load_library($libraryName) {
    $libraryName = strtolower($libraryName);
    $fileName = VAC_ROOT . "library/" . $libraryName . ".php";
    if (file_exists($fileName)) {
        include_once($fileName);
    } else {
        die('Unable to load library <b>' . $libraryName . '</b>');
    }
}

#--- Load Constants ----#
include_once (VAC_ROOT . 'constants/constant.php');
#--- Load function files ----#
include_once (VAC_ROOT . 'functions/functions.php');
include_once (VAC_ROOT . 'functions/time_functions.php');
#include_once ('functions/time_functions.php');
