<?php
 
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

if (isset($_POST['checkbox1'])) 
{
echo exec('rm ./servdesk/firewall/inblock/'.$_POST["username"].' 2>&1');

$fp = fopen('./servdesk/firewall/inblock/'.$_POST["username"], "w");
fwrite($fp,$_POST["username"]."\n");
fwrite($fp,$_POST["dateat"]."\n");
fwrite($fp,$_POST["dateto"]."\n");
if(!isset($_POST["activeblock"]))
fwrite($fp,"off\n");
else
fwrite($fp,$_POST["activeblock"]."\n");
fclose($fp);

echo exec('sudo -u odity  scp -p ./servdesk/firewall/inblock/'.$_POST["username"].' odity@10.0.160.84:/opt/servdesk/firewall/inblock/'.$_POST["username"].' 2>&1');
echo exec('rm ./servdesk/firewall/inblock/'.$_POST["username"].' 2>&1');
}
if (isset($_POST['checkbox2'])) 
{
echo exec('rm ./servdesk1/firewall/inblock/'.$_POST["username"].' 2>&1');

$fp = fopen('./servdesk1/firewall/inblock/'.$_POST["username"], "w");
fwrite($fp,$_POST["username"]."\n");
fwrite($fp,$_POST["dateat"]."\n");
fwrite($fp,$_POST["dateto"]."\n");
if(!isset($_POST["activeblock"]))
fwrite($fp,"off\n");
else
fwrite($fp,$_POST["activeblock"]."\n");
fclose($fp);

echo exec('sudo -u odity scp ./servdesk1/firewall/inblock/'.$_POST["username"].' odity@10.0.160.84:/opt/servdesk1/firewall/inblock/'.$_POST["username"].' 2>&1');
echo exec('rm ./servdesk1/firewall/inblock/'.$_POST["username"].' 2>&1');
}

if (isset($_POST['checkbox3'])) 
{
echo exec('rm ./servdesk2/firewall/inblock/'.$_POST["username"].' 2>&1');

$fp = fopen('./servdesk2/firewall/inblock/'.$_POST["username"], "w");
fwrite($fp,$_POST["username"]."\n");
fwrite($fp,$_POST["dateat"]."\n");
fwrite($fp,$_POST["dateto"]."\n");
if(!isset($_POST["activeblock"]))
fwrite($fp,"off\n");
else
fwrite($fp,$_POST["activeblock"]."\n");
fclose($fp);

echo exec('sudo -u odity scp ./servdesk2/firewall/inblock/'.$_POST["username"].' odity@10.0.160.84:/opt/servdesk2/firewall/inblock/'.$_POST["username"].' 2>&1');
echo exec('rm ./servdesk2/firewall/inblock/'.$_POST["username"].' 2>&1');
}

 
?>

<a href="http://10.0.160.84/index.php"><button>Назад</button></a>
