<?php namespace db;

use PDO;

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

class Connect{
  // Инициализация переменных для выявления ошибок
  const ERROR = 'Ошибка';
  const ErrOnServ = 'Возникли неполадки на сервере!';
  const MassageAcc = 'Неверно введён лицевой счёт!';
  const AccEmpty = 'Поле с лицевым счётом не заполнено!';
  const MassageAdr = 'Неверно выбран адрес!';

  public object $connection;
  public object $connectionRef;

  public function __construct(){
    // Подключение драйвера mysql и коннект с сервером через PDO
    $this->connection = new PDO('mysql:host=localhost;dbname=sarrc_test_db', 'pc', 'pc@1234');

    // Подключение драйвера sqlsrv и коннект с сервером через PDO
//    $this->connection = new PDO('sqlsrv:Server=ogkh.sarplat.local; Database=OnlineGKH', 'Service', 'f39J0Wnwg5Lr0kL0e07W');
  }

  public function connectReference(){
    // Подключение драйвера odbc и коннект с сервером через PDO
//    $this->connectionRef = new PDO('sqlsrv:Server=ogkh.sarplat.local; Database=sn_saratov', 'романов', 'романов123');


    // Подключение драйвера sqlsrv и коннект с сервером через PDO
    $this->connectionRef = new PDO('sqlsrv:Server=ogkh.sarplat.local; Database=sn_saratov', 'романов', 'романов123');
  }
}
