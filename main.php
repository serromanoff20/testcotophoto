<?php namespace my;
header("Access-Control-Allow-Origin: *");

include 'db/Connect.php';

use db\Connect;
use Exception;
use PDO;

class Main
{
  public string $number_account;
  public string $address;

  public function invoice()
  {
    $resultJSON = '';
    $conn = new Connect();

    $this->number_account = $_GET['number'];
    $this->address = $_GET['address'];

    if (isset($this->number_account)) {
      $query = $conn->connection->prepare("
					SELECT    [fileNotice]
					FROM 	    [sn].[Notices]
					WHERE 	  [number] = :number
					AND 	    [address] = :address
					AND 	    [valid] = 1
			");
      $query->bindParam(':number', $this->number_account, PDO::PARAM_STR);
      $query->bindParam(':address', $this->address, PDO::PARAM_STR);

      if (!$query->execute()) {
        http_response_code(500);
        $Err = ['message' => Connect::ErrOnServ, 'code' => http_response_code(), 'type' => Connect::ERROR];

        $resultJSON = json_encode($Err, JSON_FORCE_OBJECT);
      } else {
        $query->setFetchMode(PDO::FETCH_ASSOC);
        $result = $query->fetchAll();
        $resultJSON = json_encode($result);

        //Checking: Does it match input number account input address
        if (($resultJSON)==='[]'){
          $resultJSON = $this->checkParams($this->number_account, $this->address);
        } else {
          header('Content-type: application/pdf');
          header('Content-Disposition: inline; filename = ' . time() . '.pdf');

          $resultJSON = $result[0]['fileNotice'];
        }
      }
    }
    return $resultJSON;
  }

  private function checkParams(string $number, string $address){
    $resultJSON = true;
    $conn = new Connect();

    $queryLocal = $conn->connection->prepare("
            SELECT 	address
            FROM 	  [sn].[Notices]
            WHERE 	[number] = :number
            AND 	  [valid] = 1
          ");
    $queryLocal->bindParam(':number', $number, PDO::PARAM_STR);
    $queryLocal->execute();
    $address_fr_query = $queryLocal->fetch(PDO::FETCH_ASSOC);

    if (!$address_fr_query) {
      http_response_code(401);
      $Err = ['message' => Connect::MassageAcc, 'code' => http_response_code(), 'type' => Connect::ERROR];

      $resultJSON = json_encode($Err, JSON_FORCE_OBJECT);
    } else if ($address_fr_query['address']!==$address) {
      http_response_code(401);
      $Err = ['message' => Connect::MassageAdr, 'code' => http_response_code(), 'type' => Connect::ERROR];

      $resultJSON = json_encode($Err, JSON_FORCE_OBJECT);
    }

    return $resultJSON;
  }
}
try {
  $main = new Main();
	echo $main->invoice();
  exit();
} catch (Exception $e) {
	echo $e->getMessage() . "\n";
  exit();
}
