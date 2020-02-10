<?php
$corr_arr = array("<a>", "<div>","<p>", "</p>", "</div>", "</a>", "<span>","<p>", "</p>", "</span>","<p>", "</p>");
$incorr_arr = array("<a>", "<div>", "</a>","</div>");
$open_tags = [];
$close_tags = [];

//$r1 = '|<[^>]+>(.*)</[^>]+>|';
//$reg = "|<[^>]+>|";

function correctHTML(array $input){
    global $result;
    echo "result = ";
    var_dump($result);
    $remove_simbols = array("<", ">");
    $open_tag = $input[0];
    echo "open_tag = ".htmlspecialchars($open_tag)."</br>";
    $open_tag_value = str_replace($remove_simbols, "", $open_tag);
    echo "open_tag value = ".$open_tag_value."</br>";
    $reg = "#</$open_tag_value>#";
    echo "reg = ".htmlspecialchars($reg)."</br>";
    $preg_grep_array = preg_grep($reg, $input);
    if(!empty($preg_grep_array))
    {
        $key = key($preg_grep_array);
        $close_tag = $preg_grep_array[$key];
        echo " found closing tag for ".htmlspecialchars($open_tag)." ==> ".htmlspecialchars($close_tag)." at position ".$key."</br>";

        $inner_arr = array_slice($input, 1, $key - 1);
        if(empty($inner_arr))
        {
            echo "inner is empty</br>";
        }
        else{
            echo "</br> not empty inner array = ";
            foreach ($inner_arr as $item) {
                echo htmlspecialchars($item);
            }
            echo "</br>";
            correctHTML($inner_arr);
        }

        $outer_arr = array_slice($input, $key + 1, count($input) - 1);

        if(empty($outer_arr))
        {
            echo "outer is empty </br>";
        }
        else{
            echo "</br> not empty outter array = ";
            foreach ($outer_arr as $item) {
                echo htmlspecialchars($item);
            }
            echo "</br>";
            correctHTML($outer_arr);
        }

        if((empty($inner_arr))&&(empty($outer_arr))&&($result!==false)) {
           $result = true;
        }
    }
    else{
        $result = false;
    }

    return $result;
}
$res = correctHTML($corr_arr);
var_dump($res);
