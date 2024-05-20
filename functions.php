<?php
define('MB',1048576);

function filterRequest($rquestname){
    
  return  htmlspecialchars(strip_tags($_POST[$rquestname]));
}

function imageUpload($imageRequest){
  global $msgError;
  $imagename = rand(1000,10000)  . $_FILES[$imageRequest]['name'];
  $imagetmp  = $_FILES[$imageRequest]['tmp_name'];
  $imagesize = $_FILES[$imageRequest]['size'];
  $allowExt  =array( "jpg" , "png" , "gif" , "mp3" ,"pdf") ;
  $strToArray = explode(".",$imagename);
  $ext        = end($strToArray);
  $ext        = strtolower($ext);

  if(!empty($imagename) && !in_array( $ext ,      $allowExt)){
    $msgError[] ="Ext";
  }

  if($imagesize > 2 * MB){
    $msgError[] ="Size";
  }

  if( empty($msgError)){
    move_uploaded_file($imagetmp ,"../upload/" . $imagename);
    return $imagename;
  }else{
    return "fails";
  }
}

function deleteFile($direction ,$imagename){
  if(file_exists($direction . "/" . $imagename)){
    unlink($direction . "/" . $imagename);
  }

}