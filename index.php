<?php
  include_once ('DB.class.php');
 $db = new DB();
 //$sql = "update lava_goods set goods_title='aaj' where goods_id = 1";
 // $sql = "insert into lava_goods (goods_title,goods_time,title_id)values('fff','121331616','2')";
 $sql = "delete from lava_goods where goods_id=1";
 $result = $db->db_delete($sql);
  var_dump($result);



