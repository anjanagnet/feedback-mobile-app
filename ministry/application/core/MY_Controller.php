<?php

class MY_Controller extends CI_Controller
{
    public function __construct() {
        parent::__construct();
        
        $this->load->library('session');
    }
    
    public function loggedIn(){
        if($this->session->userdata('logged_in') === true){
            if($this->session->userdata('user_level') == 1){
                header('location: index.php/dashboardAdmin');
            }
            else{
                header('location: index.php/dashboard');
            }
        }
    }
    
    public function loggedRegisterIn(){
        if($this->session->userdata('logged_in') === true){
            header('location: dashboard');
        }
    }
    
    
    public function notLoggedIn(){
        if($this->session->userdata('logged_in') != true){
            header('location: ../');
        }
    }
    
    

    
    
    
}


























