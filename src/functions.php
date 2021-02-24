<?php
if (!function_exists('upperCaseSplit')) {
    function upperCaseSplit(string $des, string $delimiter = ' ')
    {
        $strArr = preg_split('/(?=[A-Z])/', $des);
        if (count($strArr) <= 1) {
            return $des;
        }
        return strtolower(implode($delimiter, $strArr));
    }
}
