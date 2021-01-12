<?php
include("User.php");
namespace raquelgonzalezrodriguez\APILaSalle;

class APIUser {

    public function getAll(){
    $user = new User();
    $users = array();
    $users['register'] = array();
    if(isset($_GET["domain"]))$result = $user->selectFiltered("clientEmail like '%".$_GET["domain"]."'");
    elseif (isset($_GET["date"]))$result = $user->selectFiltered("date between '".$_GET["date"]."'and '".date("Y-m-d")."'");
    else $result = $user->selectAll();

    if($result->rowCount()){
        while($row = $result->fetch(PDO::FETCH_ASSOC)){
            $register = array(
                'clientID' => $row['clientID'],
                'clientEmail' => $row['clientEmail'],
                'date' => $row['date'],
                'orderQty' => $row['orderQty'],
            );
            array_push($users['register'], $register);
        }

        http_response_code(200);
        echo json_encode($users);
    }else{
        http_response_code(404);
        echo json_encode(array('message' => 'Página no encontrada'));

        }
    }
}
$APIUser = new APIUser();
$APIUser->getAll();

?>