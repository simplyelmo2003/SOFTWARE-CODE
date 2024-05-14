<?php
    date_default_timezone_set("Singapore");
    $currenttime = date("H:i");
    $log_in = strtotime("15:36");
    $break_out = strtotime("15:37");
    $break_in = strtotime("15:38");
    $breakin_range = strtotime("15:39");
    $log_out = strtotime("15:40");

    $login_time = date("H:i", $log_in);
    $break_out_time = date("H:i", $break_out);
    $break_in_time = date("H:i", $break_in);
    $range = date("H:i", $breakin_range);
    $log_out_time = date("H:i", $log_out);

    if ($currenttime < $login_time || $currenttime < $break_out_time) {
        $button_name = "Log In";
    }
    elseif ($currenttime >= $break_out_time && $currenttime < $break_in_time) {
        $button_name = "Break Out";
    }
    elseif ($currenttime >= $break_in_time && $currenttime < $range) {
        $button_name = "Break In";
    }
    else {
        $button_name = "Log Out";
    }
?>
