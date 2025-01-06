<?php 
function createSlug($str, $max=50)
{
        $out = iconv('UTF-8', 'ASCII//TRANSLIT', $str);
        $out = substr(preg_replace("/[^-\/+|\w ]/", '', $out), 0, $max);
        $out = strtolower(trim($out, '-'));
        $out = preg_replace("/[\/_| -]+/", '-', $out);

        return $out;
}

function checkSlug($str)
{
        return preg_match ("/^[a-z0-9\-]*$/", $str);
}
?>