<?php

$var = "arbitrary";

?>

<form method = "post" action="<?=$_SERVER['PHP_SELF']?>">

    
    <input type = "submit" name = "<?php echo $var ?>" />

</form>

<?php

if (isset($_POST[$var]))
{
    echo $_POST[$var];
}

?>