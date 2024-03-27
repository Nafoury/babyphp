<?php
function filterRequest($rquestname){
    
  return  htmlspecialchars(strip_tags($_POST[$rquestname]));
}