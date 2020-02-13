<?php
$corr_arr = array("<a>", "<div>","<p>","</p>", "</div>","</a>", "<span>","<p>", "</p>", "</span>","<p>", "</p>");
$incorr_arr = array("<a>", "<div>", "</a>","</div>");
//$any_tag = "|<[^>]+>|";
//$any_tag_pair = '|<[^>]+>(.*)</[^>]+>|';

function correctHTML(array $input){
    global $result;

    $remove_symbol = array("<", ">");//to get "clear" str of tag w/o htmlspecialchars
    $open_tag = $input[0];//take opening tag
    $open_tag_value = str_replace($remove_symbol, "", $open_tag);//make open_tag w/o htmlspecialchars
    $reg = "#</$open_tag_value>#";//regexp for finding CORRECT closing tag
    $preg_grep_array = preg_grep($reg, $input);

    if(!empty($preg_grep_array))//if match with some values
    {
        $close_tag_key = key($preg_grep_array);//gets first of matched closing tags $close_tag = $preg_grep_array[$close_tag_key];
        $inner_arr = array_slice($input, 1, $close_tag_key - 1);//splitting input into inner and outer arrays
        $outer_arr = array_slice($input, $close_tag_key + 1, count($input) - 1);//by pos of closing tag of successful pared tags == close_tag_key

        if(!empty($inner_arr)) {
           correctHTML($inner_arr);
        }

        if(!empty($outer_arr)) {
            correctHTML($outer_arr);
        }

        if((empty($inner_arr))&&(empty($outer_arr))&&($result!==false)) {//if both parts of split input array are empty and was not a mistake on prev iterations
           $result = true;
        }
    }
    else{
        $result = false;
    }

    return $result;
}

echo correctHTML($corr_arr)? "Your HTML is correct" : "Your HTML is not correct";
