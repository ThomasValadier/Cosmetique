<?php
class uploadFile
{
    function upload($tmp_name, $name)
    {
        move_uploaded_file($tmp_name,'../assets/images/upload/'.$name);
    }
}
