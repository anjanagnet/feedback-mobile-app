<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends MY_Controller {
    
    public function __construct() {
        parent::__construct();
        
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('model_articles');
        $this->load->model('model_users');
        $this->load->model('model_locations');
        $this->load->model('model_clinics');
    }

    public function view($page = 'index')
        {   
            $data['recentQuestionnaires']= $this->model_articles->loadQuestionnaires();
            $data['draftArticles']       = $this->model_articles->filterArticles(0);
            $data['draftClinics']        = $this->model_clinics->getPendingClinics(0);
            
            $userId = $this->session->userdata('user_id');
            $userData = $this->model_users->fetchUserData($userId);
            $user = $userData['username'];
            $data['draftArticlesByUser'] = $this->model_articles->filterArticlesByUser(0,$user);
            $data['draftClinicsByUser'] = $this->model_clinics->filterClinicsByUser(0,$user);

            $data['subjects'] = $this->model_articles->getSubjects(1);
            $data['subjects_all'] = $this->model_articles->getAllSubjects();
            $data['levels'] = $this->model_articles->getLevels(1);

            
            
            if ( ! file_exists(APPPATH.'views/'.$page.'.php'))
            {
                    // Whoops, we don't have a page for that!
                    show_404();
            }

            $data['title'] = ucfirst($page); // Capitalize the first letter
            
            if($page == 'index'){
                $this->loggedIn();
            }
            
//            register and donor registration shouldn't be blocked'
            elseif ($page == 'register') {
                $this->loggedRegisterIn();
            }
            
            else{
                $this->notLoggedIn();
                
                $this->load->library('session');
                
                $this->load->model('model_users');
//                $this->load->model('model_locations');
//                $this->load->model('model_donors');
                
                $data['userData']         = $this->model_users->fetchUserData($this->session->userdata('user_id'));
                $data['userReq']          = $this->model_users->acceptUser();
//                $data['donorReq']         = $this->model_users->getPendingDonors();
                $data['locationsDistrict']= $this->model_locations->getDistricts();
//                $data['locationsProvince']= $this->model_locations->getProvinces();
//                $data['donorDetails']     = $this->session->flashdata('item');
//                $data['donorDetailsNIC']     = $this->session->flashdata('detailsNIC');
                $data['allClinics'] = $this->model_clinics->getClinics();
                
            }
            
            $this->load->view($page, $data);

        }

}
