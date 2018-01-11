<?php
  include_once ('DB.class.php');
  $db = new DB($host='127.0.0.1', $username='root', $passwd='Liu19920201', $dbname='ceshi', $port='3306', $charset='utf-8');
  $result = $db->db_query();
  var_dump($result);



