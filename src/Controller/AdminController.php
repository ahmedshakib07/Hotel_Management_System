<?php

namespace App\Controller;

use Cake\ORM\TableRegistry;
use Cake\Datasource\ConnectionManager;

class AdminController extends AppController{
    public function login(){
        $connection = ConnectionManager::get('cakedb');
        $data = $connection->execute('select * from user')->fetchAll('assoc');
        $this->set(compact('data'));
    }

    public function dashboard(){
        session_start();
        $userData = $_SESSION['data'];
        $connection = ConnectionManager::get('cakedb');
        $data = count($connection->execute('select * from booking')->fetchAll('assoc'));
        $AvRoom = count($connection->execute('select * from booking where status=0')->fetchAll('assoc'));
        $BookedRoom = count($connection->execute('select * from booking where status=1')->fetchAll('assoc'));
        $this->set(compact('userData', 'data', 'AvRoom', 'BookedRoom'));
        
    }

    public function loginaction(){
        $email = $this->request->getdata('email');
        $password = $this->request->getdata('password');
        $connection = ConnectionManager::get('cakedb');

        if(!empty($email) && !empty($password)){
            $data = $connection->execute(
                'select * from user where email = "'.$email.'" '
            )->fetchAll('assoc');

            // Right mail and passsword.
            if(!empty($data)){
                if ($data[0]['password'] != ($password)){
                    return $this->redirect('/admin/login');
                }
                session_start(); 
                $_SESSION['data'] = $data;
                return $this->redirect('/admin/dashboard');
            }
            else{
                return $this->redirect('/admin/login');    
            }
        }else{
            exit('Invalid email or password..!');
        }
    }

    public function logout(){
        session_unset();
        session_destroy();
        return $this->redirect('/admin/login'); 
    }

    public function forgetpassword(){
    }

    public function Return_to_login(){   
    }

    public function booking(){
        $connection = ConnectionManager::get('cakedb');
        $data = $connection->execute('
            select booking.*,utility.uName from booking
            left join utility on booking.u_id = utility.id 
        ')->fetchAll('assoc');
        
        $this->set(compact('data'));
    }

    public function editBooking($id=null){
        
        $connection = ConnectionManager::get('cakedb');
        $data = $connection->execute('SELECT * FROM booking WHERE id = '.$id.'')->fetchAll('assoc');
        $data = $data[0];

        if ($this->request->is(['patch', 'post', 'put'])){

            $Check_In = $this->request->getData('checkIn');
            $Check_Out = $this->request->getData('checkOut');
            $Name = $this->request->getData('name');
            $Phone = $this->request->getData('phone');
            $Email = $this->request->getData('email');
            $Adult = $this->request->getData('adult');
            $Children = $this->request->getData('children');
            $Room_Type = $this->request->getData('roomType');
            $Status = $this->request->getData('status');
            
            $connection->execute('UPDATE booking SET checkIn ="'.$Check_In.'",checkOut = "'.$Check_Out.'",name = "'.$Name.'",
            phone = "'.$Phone.'", email = "'.$Email.'" , adult = "'.$Adult.'", children = "'.$Children.'", 
            roomType = "'.$Room_Type.'", status = "'.$Status.'" WHERE id = '.$id.'');
            
            $this->Flash->success('edit booking Successfully');
            return $this->redirect(['action'=>'booking']);
        }
        $this->set(compact('data'));

    }

    public function delete($id=null){
        $connection = ConnectionManager::get('cakedb');
        $connection->execute('DELETE FROM booking WHERE id = '.$id.'');
        return $this->redirect(['action' => 'booking']);
    }
    
    public function rooms(){
        $connection = ConnectionManager::get('cakedb');
        $data = $connection->execute('select * from rooms')->fetchAll('assoc');
        $this->set(compact('data'));
    }

    public function editRoom($id=null){
        
        $connection = ConnectionManager::get('cakedb');
        $data = $connection->execute('SELECT * FROM rooms WHERE id = '.$id.'')->fetchAll('assoc');
        $data = $data[0];

        if ($this->request->is(['patch', 'post', 'put'])){

            $Room_Type_ID = $this->request->getData('roomTypeId');
            $Room_No = $this->request->getData('roomNo');
            $Date = $this->request->getData('created_date');
            
            $connection->execute('UPDATE rooms SET roomTypeId = "'.$Room_Type_ID.'", roomNo = "'.$Room_No.'", modified_date = "'.$Date.'"
            WHERE id = '.$id.'');

            $this->Flash->success('Edit Rooms Successfully');
            return $this->redirect(['action'=>'rooms']);
        }
        $this->set(compact('data'));
    }

    public function deleteRoom($id=null){
        $connection = ConnectionManager::get('cakedb');
        $connection->execute('DELETE FROM rooms WHERE id = '.$id.'');
        return $this->redirect(['action' => 'rooms']);
    }

    public function addRoom(){
        $connection = ConnectionManager::get('cakedb');
        $data = $connection->execute('select * from rooms')->fetchAll('assoc');

        if(isset($_POST["submitBtn"])){ 
            $Room_Type_ID=$_POST["roomTypeId"];
            $Room_No=$_POST["roomNo"];
            

            if($connection->execute("INSERT INTO rooms (roomTypeId, roomNo)
            VALUES ('".$Room_Type_ID."', '".$Room_No."')")){
                echo "Record inserted successfully";
                return $this->redirect(['action'=>'rooms']);
            }
        }
        $this->set(compact('data'));
    }

    public function profile($id=null){
        
        $connection = ConnectionManager::get('cakedb');
        //dd($data);
        $data = $connection->execute('SELECT * FROM user WHERE id = '.$id.'')->fetchAll('assoc');
        $data = $data[0];
        
        if ($this->request->is(['patch', 'post', 'put'])){
            
            $Name = $this->request->getData('name');
            $Email = $this->request->getData('email');
            $Phone = $this->request->getData('phone');
            $Role = $this->request->getData('role');
            
            // $connection->execute('UPDATE user SET name = "'.$Name.'", email = "'.$Email.'", Phone = "'.$phone.'", role = "'.$Role.'"
            // WHERE id = '.$id.'');
            // dd($data);
            // $this->Flash->success('Profile Update Successfully');
            // return $this->redirect(['action'=>'profile']);
            // jibone Prochur prosrom korte hobe
        }
        
        $this->set(compact('data'));
    }

}
