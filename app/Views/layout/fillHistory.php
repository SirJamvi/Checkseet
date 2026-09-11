<?php
function fillHistory($element,$rangeMin,$rangeMax){
    if($element>=$rangeMin && $element<=$rangeMax){
        // return 1;
        return '<p class="mx-auto my-auto">'.$element.'</p>';
    }
    else{
        // return 2;
        return '<p class="mx-auto my-auto">'.$element.'</p>';
        // return '<p class="mx-auto my-auto" style="color:red">'.$element.'</p>';
    }
}
?>