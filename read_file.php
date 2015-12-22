<?php
$file = $_GET['param1'];
$fh = fopen ( "./servdesk/firewall/inblock/".$file , "r" ) ;

while (!feof($fh)) {
   $line[] = fgets($fh);

}
fclose($fh);

?>
<form method="post" action="send_ip.php">
 
 
    <p> IP address add:
    <input type="text" name="username" value="<?php echo $line[0]; ?>"  required></p>
    Data block at:
    <input type="datetime-local" name="dateat"  value="<?php echo rtrim($line[1]); ?>"required >
    Data block to:
    <input type="datetime-local" name="dateto"   value="<?php echo rtrim($line[2]); ?>"required >
    Active block:
    <input type="checkbox" name="activeblock" <?php if(rtrim($line[3]) == "on"){ echo "checked"; } ?>></p> 
   
    <p>Выбрать сервер:</p>
    <p><input type="checkbox" name="checkbox1" <?php echo "checked"; ?>>
    Сервер 1</p>
    <p><input type="checkbox" name="checkbox2" value="1">
    Сервер 2</p>
    <p><input type="checkbox" name="checkbox3" value="1">
    Сервер 3</p>
 
    <input type="submit"  value="ModifyIpBlock" >
</p>

</form>
