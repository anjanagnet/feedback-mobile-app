<?php

    class Model_Users extends CI_Model
    {
        public function register(){
            $salt = $this->salt();
            
            $password = $this->makePassword($this->input->post('password'),$salt);
            
            $insert_data = array(
                'username' => $this->input->post('username'),
                'password' => $password,
                'salt'     => $salt,
                'fname'    => $this->input->post('fname'),
                'lname'    => $this->input->post('lname'),
                'email'    => $this->input->post('email'),
                'contact'  => $this->input->post('contact'),
                'level'    => 0,
                'active'   => 0
            );
            $this->db->insert('users',$insert_data);
        }

        public function registerStudent(){
            $salt = $this->salt();

            $password = $this->makePassword($this->input->post('password'),$salt);

            $insert_data = array(
                'NIC'      => $this->input->post('nic'),
                'password' => $password,
                'salt'     => $salt,
                'fname'    => $this->input->post('fname'),
                'mname'    => $this->input->post('mname'),
                'lname'    => $this->input->post('lname'),
                'DOB'      => $this->input->post('dob'),
                'gender'   => $this->input->post('gender'),
                'address1' => $this->input->post('address1'),
                'address2' => $this->input->post('address2'),
                'email'    => $this->input->post('email'),
                'telephoneHome'  => $this->input->post('telephone1'),
                'telephoneMobile'=> $this->input->post('telephone2'),
                'subjects' => $_POST['myCheckbox'],
                'active'   => 1
            );
            $this->db->insert('students',$insert_data);
        }
        
        public function salt(){
            return password_hash("rasmuslerdorf", PASSWORD_DEFAULT);
        }
        
        public function makePassword($password = null, $salt = null){
            if($password && $salt){
                return hash('sha256', $password.$salt);
            }
        }
        
        public function validate_username(){
            $username = $this->input->post('username');
            $sql = "SELECT * FROM users WHERE username = ?";
            $query = $this->db->query($sql, array($username));
            return($query->num_rows() == 1)? true: false;
            
        }
        
        public function fetchDataByUsername($username = null){
            if($username){
                $sql = "SELECT * FROM users WHERE username = ?";
                $query = $this->db->query($sql, array($username));
                $result = $query->row_array();
                return ($query->num_rows()==1) ? $result : false;
                return $result;
            }
        }

        public function login(){
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            
            $userData = $this->fetchDataByUsername($username);
           
            
            $checkActive = $userData['active'];
            if($checkActive == 1){
                if($userData){
                    $password = $this->makePassword($password, $userData['salt']);

                    $sql = "SELECT * FROM users WHERE username = ? AND password = ?";
                    $query = $this->db->query($sql, array($username, $password));
                    $result = $query->row_array();

                    return ($query-> num_rows() == 1) ? $result['id'] : false;
                }
                else{
                    return false;
                }
            }
            else{
                return("deact");
            }
        }
        
        public function fetchUserData($userId = null){
            if($userId){
                $sql = "SELECT * FROM users WHERE id = ?";
                $query = $this->db->query($sql, array($userId));
                $result = $query->row_array();
                
                return $result;
            }
        }
        
        public function usernameExists($userId = null){
            if($userId){
                $sql = "SELECT * FROM users WHERE username= ? AND id != ?";
                $query = $this->db->query($sql, array($this->input->post('username'),$userId));
                return ($query->num_rows() >= 1)? true : false;
            }
        }
        
        public function getUserById($userId = null){
            $sql = "SELECT * FROM users WHERE id = ?";
            $query = $this->db->query($sql, array($userId));
            return $query->row_array();
        }

        public function validCurrentPassword($userId = null){
            if($userId){
                
                $getUserById = $this->getUserById($userId);
                $salt = $getUserById['salt'];
                
                $currentPassword = $this->makePassword($this->input->post('currentpassword'),$salt);
                
                return ($currentPassword == $getUserById['password']) ? true : false;
                    
                
            }
        }
        
        public function update($userId){
            if($userId){
                $update_data = array(
//                    'username' => $this->input->post('username'),
                    'fname'    => $this->input->post('fname'), 
                    'lname'    => $this->input->post('lname'),
                    'email'    => $this->input->post('email'),
                    'contact'  => $this->input->post('contact')                   
                );
                $this->db->where('id',$userId);
                $query = $this->db->update('users',$update_data);
                
                return ($query === true) ? true : false;
            }
        }
        
        public function changePassword($userId){
            $salt = $this->salt();
            $password = $this->makePassword($this->input->post('newpassword'), $salt);
            
            $update_data = array(
                'password' => $password,
                'salt'    => $salt
            );
            $this->db->where('id', $userId);
            $query = $this->db->update('users',$update_data);
            return ($query === true) ? true : false;
        }
        
        public function acceptUser(){
            $sql = "SELECT * FROM users WHERE active=?";
            $query = $this->db->query($sql,array(0));
            $result = $query->result();
            return $result;
        }
        
        public function acceptEachUser($username = null){
            $this->db->where('username',$username);     
            $update_data = array(
                'active' => 1
            );
            $query = $this->db->update('users',$update_data);        
        }
        
        public function rejectEachUser($username = null){
            $this->db->where('username',$username);
            $this->db->delete('users');
        }
        
        public function getPendingDonors(){
             $sql = "SELECT * FROM donors WHERE status=?";
             $query = $this->db->query($sql,5);
             $result = $query->result();
             return $result;
         }
        
    }
    
      
   
