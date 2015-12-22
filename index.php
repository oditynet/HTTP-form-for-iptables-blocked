<html>
    <head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">    
  </head>
    <body>

    <form method="post" action="send_ip.php">
 <div id="form">
    <p> IP address add:
    <input type="text" name="username" pattern="\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}" required></p>
    Data lock at:
    <input type="datetime-local" name="dateat" required >
    Data lock to:
    <input type="datetime-local" name="dateto" required >
    Active lock:
    <input type="checkbox" name="activeblock"></p> 
   
    <p>Выбрать сервер:</p>
    <p><input type="checkbox" name="checkbox1" value="1">
    Сервер 1</p>
    <p><input type="checkbox" name="checkbox2" value="1">
    Сервер 2</p>
    <p><input type="checkbox" name="checkbox3" value="1">
    Сервер 3</p>
 
    <input type="submit"  value="AddIpBlock" >
</p></div></form>
<?php

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
 
echo exec('sudo -u odity scp -pr odity@10.0.160.84:/opt/servdesk . 2>&1');
echo exec('sudo -u odity scp -pr odity@10.0.160.84:/opt/servdesk1 . 2>&1');
echo exec('sudo -u odity scp -pr odity@10.0.160.84:/opt/servdesk2 . 2>&1');

echo "   <TABLE BORDER>";
echo "     <TR>";
echo "    	<TH>Сервер   1</TH> <TH>Сервер   2</TH> <TH>Сервер   3</TH>";
echo "       </TR>";
echo "       <TR>";
echo "          <TD><form method='post' action='del_ip.php'>";
echo "          <select size='10' multiple='' id='file_data' name='param1[]'  required>";
$path = "./servdesk/firewall/inblock";
if ($handle = opendir($path)) {
    while (false !== ($entry = readdir($handle))) 
    {
      if ($entry == "." or $entry == "..")continue; 
      echo '<option value='.htmlspecialchars($entry).'>'.htmlspecialchars($entry).'</option>';
    }
}
echo "        </select></p>";
echo "<center><input type='submit' value='Delete'></centart>";
echo "</form></TD><TD><form method='post' action='del_ip1.php'>";
echo "       <select size='10' multiple='' id='file_data1' name='param2[]'  required>";
$path = "./servdesk1/firewall/inblock";
if ($handle = opendir($path)) {
    while (false !== ($entry = readdir($handle))) 
    {
      if ($entry == "." or $entry == "..")continue; 
      echo '<option value='.htmlspecialchars($entry).'>'.htmlspecialchars($entry).'</option>';
    }
}
echo "        </select></p>";
echo "<center> <input type='submit' value='Delete'></center>";
echo "</form></TD>";
echo "<TD><form method='post' action='del_ip2.php'>";
echo "       <select size='10' multiple='' id='file_data2' name='param3[]'  required>";
$path = "./servdesk2/firewall/inblock";
if ($handle = opendir($path)) {
    while (false !== ($entry = readdir($handle))) 
    {
      if ($entry == "." or $entry == "..")continue; 
      echo '<option value='.htmlspecialchars($entry).'>'.htmlspecialchars($entry).'</option>';
    }
}
echo "        </select></p>";
echo "<center> <input type='submit' value='Delete'></center>";
echo "</form></TD> </TR>";
echo "</TABLE> ";
	
?> 
<div id="debag">
<script src="jquery.min.js"></script>
<script>
$('#file_data').change(function() {
$.get(
  "read_file.php",
  {
    param1: $(this).find(":selected").text()
  },
  onAjaxSuccess
);
 
function onAjaxSuccess(data)
{
  // Здесь мы получаем данные, отправленные сервером и выводим их на экран.
  $('#form').html(data);
}

});

$('#file_data1').change(function() {
$.get(
  "read_file1.php",
  {
    param2: $(this).find(":selected").text()
  },
  onAjaxSuccess
);
 
function onAjaxSuccess(data)
{
  // Здесь мы получаем данные, отправленные сервером и выводим их на экран.
  $('#form').html(data);
}

});


$('#file_data2').change(function() {
$.get(
  "read_file2.php",
  {
    param3: $(this).find(":selected").text()
  },
  onAjaxSuccess
);
 
function onAjaxSuccess(data)
{
  // Здесь мы получаем данные, отправленные сервером и выводим их на экран.
  $('#form').html(data);
}

});
</script>
</body>
</html>
