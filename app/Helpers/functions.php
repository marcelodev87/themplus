<?php

namespace App\Helpers;

use DateTime;

function clearField(?string $param)
    {
        if(empty($param)){
            return '';
        }
        return str_replace(['.','-','/','(',')',' '], '', $param);
    }


    function convertStringToDate(?string $param)
    {
        if(empty($param)){
            return null;
        }
        list($day,$month,$year) = explode('/', $param);
        return (new DateTime($year . '-' . $month . '-' . $day))->format('Y-m-d');
    }
?>
