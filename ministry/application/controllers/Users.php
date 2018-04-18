<?php

class Users extends MY_Controller
{
    public function __construct() {
        parent::__construct();
        
        $this->load->library('form_validation');
        $this->load->helper('url');
        $this->load->helper('text');
        $this->load->helper('security');
        $this->load->model('model_users');
    }
    
//    User registration
    public function register(){
        $validator = array('success'=>false, 'messages'=>array());
        
        $validate_data = array(
            array(
                'field' => 'username',
                'label' => 'Username',
                'rules' => 'required|is_unique[users.username]|min_length[3]|max_length[20]|xss_clean|trim'
            ),
            array(
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'required|min_length[5]|max_length[20]|xss_clean|trim'
            ),
            array(
                'field' => 'passwordAgain',
                'label' => 'Re-Enter Password',
                'rules' => 'required|matches[password]|min_length[5]|max_length[20]|xss_clean|trim'
            ),
            array(
                'field' => 'fname',
                'label' => 'First Name',
                'rules' => 'required|min_length[1]|max_length[20]|xss_clean|trim'
            ),
            array(
                'field' => 'lname',
                'label' => 'Last Name',
                'rules' => 'required|min_length[1]|max_length[20]|xss_clean|trim'
            ),
            array(
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'required|valid_email'
            ),
            array(
                'field' => 'contact',
                'label' => 'Contact',
                'rules' => 'required|integer|min_length[10]|max_length[10]|xss_clean|trim'
            )
        );
        $this->form_validation->set_rules($validate_data);
        $this->form_validation->set_message('is_unique','The {field} already exists');
        $this->form_validation->set_message('integer','The {field} must be number');
        $this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');
        
        if($this->form_validation->run() === true){
            $this->model_users->register();
            
            $validator['success'] = true;
            $validator['messages'] = 'Successfully Registered, Wait for the account activation';
        }
        else{
            $validator['success'] = false;
            foreach ($_POST as $key=>$value){
                $validator['messages'][$key] = form_error($key);
            }
        }
        echo json_encode($validator);
    }
    
//    User login function
    public function login(){
        $validator = array('success'=>false, 'messages'=>array());
        
        $validate_data = array(
            array(
                'field' => 'username',
                'label' => 'Username',
                'rules' => 'required|callback_validate_username'
            ),
            array(
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'required'
            )
        );
        $this->form_validation->set_rules($validate_data);
        $this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');
        
        if($this->form_validation->run() === true){
            $login = $this->model_users->login();
            $user  = $this->model_users->getUserById($login);
            $level = $user['level'];
            
            if($login == "deact"){
                $validator['success'] = false; 
                $validator['messages'] = 'Your account has not been activated yet';
            }
            else{
            
                if($login){

                    $this->load->library('session');

                    $newdata = array(
                        'user_id'     => $login,
                        'user_level'  => $level,
                        'logged_in'   => TRUE
                    );

                    $this->session->set_userdata($newdata);

                    $validator['success'] = true;
                    // admin level
                    if($level == 1){
                        $validator['messages'] = 'index.php/dashboardAdmin';
                    }
                    else{
                        $validator['messages'] = 'index.php/dashboard';
                    }


                }
                else{
                    $validator['success'] = false;
                    $validator['messages'] = 'Incorrect username/ password combination';
                }
            }
        }
        else{
            $validator['success'] = false;
            foreach ($_POST as $key=>$value){
                $validator['messages'][$key] = form_error($key);
            }
        }
        echo json_encode($validator);
    }
    
    
    public function validate_username(){
        $username = $this->model_users->validate_username();
        if ($username == true){
            return true;
        }
        else{
            $this->form_validation->set_message('validate_username', 'The {field} does not exist');
            return false;
        }
    }
    
    public function logout(){
        $this->session->sess_destroy();
        header('location: ../../');
    }
    
    public function update(){
        $validator = array('success'=>false, 'messages'=>array());
        
        $validate_data = array(
            array(
                'field' => 'fname',
                'label' => 'First Name',
                'rules' => 'required|min_length[1]|max_length[20]|xss_clean|trim'
            ),
            array(
                'field' => 'lname',
                'label' => 'Last Name',
                'rules' => 'required|min_length[1]|max_length[20]|xss_clean|trim'
            ),
            array(
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'required|valid_email'
            ),
            array(
                'field' => 'contact',
                'label' => 'Contact',
                'rules' => 'required|integer|min_length[10]|max_length[10]|xss_clean|trim'
            )
        );
        $this->form_validation->set_rules($validate_data);
        $this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');
        
        if($this->form_validation->run() === true){
            $this->load->library('session');
            $this->load->model('model_users');
            $userId = $this->session->userdata('user_id');
            $update = $this->model_users->update($userId);
            
            if($update){            
                $validator['success'] = true;
                $validator['messages'] = 'Successfully Updated';
                
            }
            else{
                $validator['success'] = false;
                $validator['messages'] = 'Incorrect username/ password combination';
            }
            
        }
        else{
            $validator['success'] = false;
            foreach ($_POST as $key=>$value){
                $validator['messages'][$key] = form_error($key);
            }
        }
        echo json_encode($validator);
    }
    
    public function username_exists(){
        $this->load->library('session');
        $userId = $this->session->userdata('user_id');
        $username_exists = $this->model_users->usernameExists($userId);
        
        if($username_exists === false){
            return true;
        }
        else{
            $this->form_validation->set_message('username_exists','The {field} value already exists');
            return false;
        }
    }
    
    public function changepassword(){
        $validator = array('success'=>false, 'messages'=>array());
        
        $validate_data = array(
            array(
                'field' => 'currentpassword',
                'label' => 'Current Password',
                'rules' => 'required|callback_validCurrentPassword|min_length[5]|max_length[20]|xss_clean|trim'
            ),
            array(
                'field' => 'newpassword',
                'label' => 'New Password',
                'rules' => 'required|min_length[5]|max_length[20]|xss_clean|trim'
            ),
            array(
                'field' => 'passwordagain',
                'label' => 'Re-enter Password',
                'rules' => 'required|matches[newpassword]|min_length[5]|max_length[20]|xss_clean|trim'
            )
        );
        $this->form_validation->set_rules($validate_data);
        $this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');
        
        if($this->form_validation->run() === true){
            $this->load->library('session');
            
            $userId = $this->session->userdata('user_id');
            $changepassword = $this->model_users->changePassword($userId);
            
            if($changepassword){            
                $validator['success'] = true;
                $validator['messages'] = 'Successfully Updated';
                
            }
//            else{
//                $validator['success'] = false;
//                $validator['messages'] = 'Incorrect username/ password combination';
//            }
            
        }
        else{
            $validator['success'] = false;
            foreach ($_POST as $key=>$value){
                $validator['messages'][$key] = form_error($key);
            }
        }
        echo json_encode($validator);
    }
    
    public function validCurrentPassword(){
        $this->load->library('session');
        $userId = $this->session->userdata('user_id');
        $password_exists = $this->model_users->validCurrentPassword($userId);
        
        if($password_exists === true){
            return true;
        }
        else{
            $this->form_validation->set_message('validCurrentPassword','The {field} value is invalid');
            return false;
        }
    }
    
//    accept function for user requests
    public function acceptUser($username = null){
        $validator = array('success'=>false, 'messages'=>array());
//        $this->model_users->acceptEachUser($username);
        if($username){                
                $validator['success'] = true;
                $validator['messages'] = 'Successfully Accepted';
                $this->model_users->acceptEachUser($username);
        }
        redirect('request');
       // echo json_encode($validator);
    }
    
//    reject function for user requests : All data of the user will be removed from the table
    public function rejectUser($username = null){
         $validator = array('success'=>false, 'messages'=>array());
      //  $this->model_users->rejectEachUser($username);
        if($username){                
                $validator['success'] = true;
                $validator['messages'] = 'Successfully Rejected';
                $this->model_users->rejectEachUser($username);
        }
        redirect('request');
        //echo json_encode($validator);
    }   
}





















