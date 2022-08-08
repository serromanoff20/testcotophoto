<?php namespace my\test;

use db\Connect;


class Test
{
  public static function testFunc()
  {
      $connect = new Connect();
      $rows = $connect->connection->query('select * from prod');

      foreach ($rows as $row){
          print_r($row);
      }

//    return array('Index first element input param'=>$res1, 'Index first element equal input param'=>$res2,'resultBool'=>$res);
  }
}

try {
  Test::testFunc();
  exit();
} catch(Exception $e) {
  echo $e->getMessage();
  exit();
}
