<?php
$fileName = dirname(__FILE__) . '/' . $argv[1];
$keyName = $argv[2];

function searchValue($fileName, $keyName)
{
    $handle = fopen($fileName, "r");
    while (!feof($handle)) {
        $text = fgets($handle);
        mb_convert_encoding($text, 'utf-8');
        $array = explode('\x0A', $text);
        array_pop($array);
        foreach ($array as $key => $value) {
            $keyValue = explode('\t', $value);
            $arr[$keyValue[0]] = $keyValue[1];
        }
    }
    echo $arr[$keyName] ?? 'undef';
}

searchValue($fileName, $keyName);
