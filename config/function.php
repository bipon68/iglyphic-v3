<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Packages\bikiran\ConvertString;
use Sourav\SelectQuery;

function assetsCss(string $template): string
{
    $cssLink = "";
    $assetConfigObj = xmlFileToObject("assets/config/$template.xml", "Asset config file not found.");

    foreach ($assetConfigObj->group ?: [] as $groupPath) {
        foreach ($groupPath->css ?: [] as $cssPath) {
            if (substr($cssPath, -4) == "rand") {
                $cssLink .= "\n<link href=\"$cssPath=" . rand(100000, 999999) . "\" rel=\"stylesheet\" type=\"text/css\"/>";
            } else {
                $cssLink .= "\n<link href=\"$cssPath\" rel=\"stylesheet\" type=\"text/css\"/>";
            }
        }
    }

    foreach ($assetConfigObj->styles->css ?: [] as $cssPath) {
        if (substr($cssPath, -4) == "rand") {
            $cssLink .= "\n<link href=\"$cssPath=" . rand(100000, 999999) . "\" rel=\"stylesheet\" type=\"text/css\"/>";
        } else {
            $cssLink .= "\n<link href=\"$cssPath\" rel=\"stylesheet\" type=\"text/css\"/>";
        }
    }

    return $cssLink;
}


function assetsJs(string $template): string
{
    $jsLink = "";
    $assetConfigObj = xmlFileToObject("assets/config/$template.xml", "Asset config file not found.");

    foreach ($assetConfigObj->group ?: [] as $groupPath) {
        foreach ($groupPath->js ?: [] as $jsPath) {
            if (substr($jsPath, -4) == "rand") {
                $jsLink .= "\n<script src=\"$jsPath=" . rand(100000, 999999) . "\" type=\"text/javascript\"></script>";
            } else {
                $jsLink .= "\n<script src=\"$jsPath\" type=\"text/javascript\"></script>";
            }
        }
    }

    foreach ($assetConfigObj->scripts->js ?: [] as $jsPath) {
        if (substr($jsPath, -4) == "rand") {
            $jsLink .= "\n<script src=\"$jsPath=" . rand(100000, 999999) . "\" type=\"text/javascript\"></script>";
        } else {
            $jsLink .= "\n<script src=\"$jsPath\" type=\"text/javascript\"></script>";
        }
    }


    return $jsLink;
}

function xmlFileToObject($fileLocation, $fileMissingMessage = null): \SimpleXMLElement
{
    if (is_file($fileLocation)) {
        $xmlMappingXml = file_get_contents($fileLocation);
        $xmlMappingObj = simplexml_load_string($xmlMappingXml);
    } else {
        if ($fileMissingMessage == null) {
            $xmlMappingObj = simplexml_load_string("<resource/>");
        } else {
            exit();
        }
    }

    return $xmlMappingObj;
}


function inSql(string $col, array $data_ar): string
{
    foreach ($data_ar as $key => $val) {
        $data_ar[$key] = $val;
    }

    if (empty($data_ar))
        $data_ar[] = 0;

    return "`$col` IN(" . implode(", ", $data_ar) . ")";
}

function likeSql(string $pattern, string $val): string
{
    return "'" . str_replace("{val}", substr($val, 1, -1), $pattern) . "'";
}


function getUserInfo(): array
{
    $id = Auth::id();

    //Collect User
    $select = new SelectQuery("users");
    $select->setQuery("select * from users where `id`=" . $id . "");
    $userAr = $select->getQueue();

    return [
        'id' => $userAr['id'],
        'name' => $userAr['name'],
        'email' => $userAr['email'],
    ];
}

function getTimeStamp(): int
{
    return Carbon::now()->getTimestamp();
}

function en2bn(string $in): string
{
    $ar1 = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'AM', 'PM', 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December', 'Saturday', 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday');
    $ar2 = array('০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯', 'এ. এম.', 'পি. এম.', 'জানুয়ারী', 'ফেব্রুয়ারী', 'মার্চ', 'এপ্রিল', 'মে', 'জুন', 'জুলাই', 'আগস্ট', 'সেপ্টেম্বর', 'অক্টোবর', 'নভেম্বর', 'ডিসেম্বর', 'শনিবার', 'রবিবার', 'সোমবার', 'মঙ্গলবার', 'বুধবার', 'বৃহস্পতিবার', 'শুক্রবার');
    return str_replace($ar1, $ar2, $in);
}

function num2words(int $number): string
{
    $hyphen = '-';
    $conjunction = ' and ';
    $separator = ', ';
    $negative = 'negative ';
    $decimal = ' point ';
    $dictionary = array(
        0 => 'zero',
        1 => 'one',
        2 => 'two',
        3 => 'three',
        4 => 'four',
        5 => 'five',
        6 => 'six',
        7 => 'seven',
        8 => 'eight',
        9 => 'nine',
        10 => 'ten',
        11 => 'eleven',
        12 => 'twelve',
        13 => 'thirteen',
        14 => 'fourteen',
        15 => 'fifteen',
        16 => 'sixteen',
        17 => 'seventeen',
        18 => 'eighteen',
        19 => 'nineteen',
        20 => 'twenty',
        30 => 'thirty',
        40 => 'fourty',
        50 => 'fifty',
        60 => 'sixty',
        70 => 'seventy',
        80 => 'eighty',
        90 => 'ninety',
        100 => 'hundred',
        1000 => 'thousand',
        1000000 => 'million',
        1000000000 => 'billion',
        1000000000000 => 'trillion',
        1000000000000000 => 'quadrillion',
        1000000000000000000 => 'quintillion'
    );

    if (!is_numeric($number)) {
        return false;
    }

    if (($number >= 0 && (int)$number < 0) || (int)$number < 0 - PHP_INT_MAX) {
        // overflow
        trigger_error(
            'convert_num2words only accepts numbers between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX,
            E_USER_WARNING
        );
        return false;
    }

    if ($number < 0) {
        return $negative . num2words(abs($number));
    }

    $string = null;
    $fraction = null;

    if (strpos($number, '.') !== false) {
        list($number, $fraction) = explode('.', $number);
    }

    switch (true) {
        case $number < 21:
            $string = $dictionary[$number];
            break;
        case $number < 100:
            $tens = ((int)($number / 10)) * 10;
            $units = $number % 10;
            $string = $dictionary[$tens];
            if ($units) {
                $string .= $hyphen . $dictionary[$units];
            }
            break;
        case $number < 1000:
            $hundreds = $number / 100;
            $remainder = $number % 100;
            $string = $dictionary[$hundreds] . ' ' . $dictionary[100];
            if ($remainder) {
                $string .= $conjunction . num2words($remainder);
            }
            break;
        default:
            $baseUnit = pow(1000, floor(log($number, 1000)));
            $numBaseUnits = (int)($number / $baseUnit);
            $remainder = $number % $baseUnit;
            $string = num2words($numBaseUnits) . ' ' . $dictionary[$baseUnit];
            if ($remainder) {
                $string .= $remainder < 100 ? $conjunction : $separator;
                $string .= num2words($remainder);
            }
            break;
    }

    if (null !== $fraction && is_numeric($fraction)) {
        $string .= $decimal;
        $words = array();
        foreach (str_split((string)$fraction) as $number) {
            $words[] = $dictionary[$number];
        }
        $string .= implode(' ', $words);
    }

    return $string;
}


