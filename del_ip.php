  <?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
    $test = $_POST['param1'];
    foreach ($test as $t){
	echo $t;	
    	echo exec('sudo -u odity rm ./servdesk/firewall/inblock/'.$t.' 2>&1');
	echo exec('sudo -u odity ssh odity@10.0.160.84 "rm /opt/servdesk/firewall/inblock/'.$t.'" 2>&1');

    }
 ?>

<a href="http://10.0.160.84/index.php"><button>Назад</button></a>
