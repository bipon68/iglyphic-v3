<?php

namespace Sourav;

class SelectOption
{
    public static function getOptionS($dataAr, $defaultVal = null)
    {
        $opAr = "";
        foreach ($dataAr as $key => $det_ar) {
            $opAr .= "<option value=\"$key\" " . ($defaultVal == $key ? "selected" : null) . ">$det_ar</option>";
        }
        return $opAr;
    }

    public static function getOptionM($dataAr, $showCol, $valueCol, $defaultVal = null)
    {
        $opAr = "";
        foreach ($dataAr as $det_ar) {
            $opAr .= "<option value=\"$det_ar[$valueCol]\" " . ($defaultVal == $det_ar[$valueCol] ? "selected" : null) . ">$det_ar[$showCol]</option>";
        }
        return $opAr;
    }
}
