<?php

class Articles extends MY_Controller
{
    public function __construct() {
        parent::__construct();
        
        $this->load->library('form_validation');
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('model_articles');
        $this->load->model('model_users');
        $this->load->model('model_clinics');

    }
    
    public function getMOH(){
        $districtID = $_POST['district'];
        $result = $this->model_clinics->getMOH($districtID);
        echo json_encode($result);
    }
    
}    
