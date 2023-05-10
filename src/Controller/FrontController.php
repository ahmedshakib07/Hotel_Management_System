<?php

namespace App\Controller;

use Cake\ORM\TableRegistry;
use Cake\Datasource\ConnectionManager;

class FrontController extends AppController{
    public function home(){

        $connection = ConnectionManager::get('cakedb');
        $data = $connection->execute('select * from booking')->fetchAll('assoc');

        //CHECKING SUBMIT BUTTON PRESS or NOT.
        if(isset($_POST["submitBtn"])){
            $Check_In=$_POST["checkIn"];
            $Check_Out=$_POST["checkOut"];
            $Name=$_POST["name"];
            $Phone=$_POST["phone"];
            $Email=$_POST["email"];
            $Adult=$_POST["adult"];
            $Children=$_POST["children"];
            $Room_Type=$_POST["roomType"];
            $Status=0;

            $uName=$_POST["u_id"];
            
            
            //INSERT QUERY
            if($connection->execute("INSERT INTO booking (checkIn, checkOut, name, phone, email, adult, children, roomType, u_id, status)
                VALUES ('".$Check_In."', '".$Check_Out."', '".$Name."', '".$Phone."', '".$Email."', '".$Adult."', '".$Children."',
                 '".$Room_Type."', '".$uName."', '".$Status."')")){
                echo "Record inserted successfully";
                // dd($data);
                return $this->redirect(['action'=>'home']);
            };

            $this->set(compact('data'));
        }

    }

}