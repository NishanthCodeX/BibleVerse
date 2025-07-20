<?php

class Solution {

    /**
     * @param String[] $strs
     * @return String
     */
    function longestCommonPrefix($strs) {
        if (empty($strs)) return "";
        $ans = 0;
        if(is_array($strs) && count($strs)>0)
        {
            $s = $strs[0];
            if(count($strs)>1)
            {
                $i = 1;
                $match = true;
                while($i <= strlen($s) && $match == true) { 
                    $a = substr($s,0,$i);
                    for ($j=1; $j < count($strs); $j++) { 
                        if(!str_starts_with($strs[$j], $a)){
                            $match = false;
                            break; break;
                        }
                    }
                    $i++;
                }
                if($match == false) {
                    $ans = $i-2;
                } else {
                    return $s;
                }
                return substr($s,0,$ans);
            } else {
                return $s;
            }
        } 
    }
}

$strs = ["flower","flower","flower","flower"];
// $strs = ["flower","flow","flight"];

$solution = new Solution();
$result = $solution->longestCommonPrefix($strs);

if(is_array($result)){
    echo implode('<br>',$result);
    // print_r($result);
} else {
    var_dump($result);
}

?>
