<?
$host= "localhost" ;
$userr="root";
$pwd= "1234" ;
$dbname="dbhelp";
$c = mysql_connect($host ,$userr ,$pwd) ;
mysql_query("SET NAMES tis620");
mysql_query("SET NAMES UTF8");
If (!$c)  {
          echo  "<h3> ERROR  :  �������ö�Դ��Ͱҹ��������</h3>" ;
          exit ();
}
?>
