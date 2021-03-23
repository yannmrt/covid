<?php

try{

$db = new PDO("mysql:host=mysql-yannmartin.alwaysdata.net;dbname=yannmartin_covid;", "229066", "yann1234");

}catch(Exeption$e){
echo $e->getMessage();
}
