<?php
class Donors extends MY_Controller
{
    public function __construct() {
        parent::__construct();
        
        $this->load->library('form_validation');
        $this->load->model('model_locations');
//        $this->load->model('model_donors');
        $this->load->model('model_users');
        $this->load->helper('url');
        $this->load->library('session');
    }
//    Register a new student
    public function registerStudent(){
        $validator = array('success'=>false, 'messages'=>array());

        $validate_data = array(
            array(
                'field' => 'nic',
                'label' => 'National Identity Card Number',
                'rules' => 'required'
            ),
            array(
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'required|min_length[5]|max_length[20]|xss_clean|trim'
            ),
            array(
                'field' => 'rePassword',
                'label' => 'Re-Enter Password',
                'rules' => 'required|matches[password]|min_length[5]|max_length[20]|xss_clean|trim'
            ),
            array(
                'field' => 'fname',
                'label' => 'First Name',
                'rules' => 'required'
            ),
            array(
                'field' => 'mname',
                'label' => 'Middle Name',
                'rules' => ''
            ),
            array(
                'field' => 'lname',
                'label' => 'Last Name',
                'rules' => ''
            ),
            array(
                'field' => 'dob',
                'label' => 'Date of Birth',
                'rules' => ''
            ),
            array(
                'field' => 'gender',
                'label' => 'Gender',
                'rules' => ''
            ),
            array(
                'field' => 'address1',
                'label' => 'Address Line 1',
                'rules' => ''
            ),
            array(
                'field' => 'address2',
                'label' => 'Address Line 2',
                'rules' => ''
            ),
            array(
                'field' => 'email',
                'label' => 'Email',
                'rules' => ''
            ),
            array(
                'field' => 'telephone1',
                'label' => 'Telephone Home',
                'rules' => 'integer'
            ),
            array(
                'field' => 'telephone2',
                'label' => 'Telephone Mobile',
                'rules' => 'required|integer'
            ),
        );
                

        $this->form_validation->set_rules($validate_data);
     //   $this->form_validation->set_message('is_unique','The {field} already exists');
        $this->form_validation->set_message('integer','The {field} must be number');
        $this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');
        
        if($this->form_validation->run() === true){
            $this->model_users->registerStudent();
            
            $validator['success'] = true;
            $validator['messages'] = 'Successfully Registered the Student';
        }
        else{
            $validator['success'] = false;
            foreach ($_POST as $key=>$value){
                $validator['messages'][$key] = form_error($key);
            }
        }
        echo json_encode($validator);
    }
//    Donor search By name
    public function searchByName(){

        $errors = array();
        $data   = array();
        
//        $fname=$this->input->post('fname');
//        $lname=$this->input->post('lname');
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        
//        call appropriate model function according to user input
        if($fname and $lname){
            $data['donorNames']=$this->model_donors->searchName($fname,$lname);
        }
        elseif($fname and $lname==null){
            $data['donorNames']=$this->model_donors->searchFirstName($fname);
        }
        elseif($lname and $fname==null){
            $data['donorNames']=$this->model_donors->searchSecondName($lname);
        }
        elseif ($fname==null AND $lname==null) {
            //$errors['noData'] = 'At least one field is required';
            $data['donorNames'] = "Please Enter at least one Name";
        }
        
        echo json_encode($data['donorNames']);

    }
//    Serach donor by NIC
    public function searchByNIC(){
        $nic = $_POST['nic'];
        
        $errors = array();
        $data   = array();
        
        if($nic){
            $dataNIC=$this->model_donors->getDonorByNIC($nic);
            
            echo json_encode($dataNIC);
        }
    }
    
//    Search donor by availability
    public function searchByAvailability(){
        $status = $_POST['status'];
        
        if($status>=0){
            $dataAvailability = $this->model_donors->searchAvailability($status);
            
            echo json_encode($dataAvailability);
        }
    }
    
//    Search donor by district
    public function searchByDistrict(){
        $district = $_POST['division'];
        
        if($district){
            $dataDistrict = $this->model_donors->searchDistrict($district);
            
            echo json_encode($dataDistrict);
        }
    }
    
//    Search donor by donorID
    public function searchByID(){
        $id = $_POST['id'];
        if($id){
            $dataID = $this->model_donors->searchID($id);
            echo json_encode($dataID);
        }

    }

//    Search donor with advanced options
    public function searchAdvanced(){
        $fname = $_POST['fname'];
        $district = $_POST['division'];
        $status = $_POST['status'];

        if($fname){
            $data['donorNames']=$this->model_donors->searchAdvanced($fname,$district,$status);    
        }
        else{
            $data['donorNames']=$this->model_donors->searchAdvancedWithouName($district,$status);    
        }
        echo json_encode($data['donorNames']);

    }
    
//    update status of the donor
    public function updateStatus(){
        $id = $_GET['getID'];
        $status = $_GET['status'];
//        echo $id;
//        echo $status;
        $this->model_donors->updateDonorStatus($id,$status);
        redirect('searchDonor');

    }
    
//    Accept donor request
    public function acceptDonor($id = null){
//        $validator = array('success'=>false, 'messages'=>array());
//        $this->model_users->acceptEachUser($username);
        if($id){                
                $this->model_donors->updateDonorStatus($id,1);
        }
        redirect('donorRequests');
       // echo json_encode($validator);
    }
    
//    update onor details
    public function updateDonor(){
        $id = $_POST['id'];

        $this->model_donors->updateDonor($id);
        echo json_encode($id);
        redirect('editDonor');
    }
    
    public function fieldControl(){
        

        
        if(isset($_POST['nic'])){
            $this->model_donors->updateFormField('nic','checked');
        }
        else{
            $this->model_donors->updateFormField('nic','NULL');
        }
        if(isset($_POST['fname'])){
            $this->model_donors->updateFormField('fname','checked');
        }
        else{
            $this->model_donors->updateFormField('fname','NULL');            
        }
        if(isset($_POST['mname'])){
            $this->model_donors->updateFormField('mname','checked');
        }
        else{
            $this->model_donors->updateFormField('mname','NULL');            
        }
        if(isset($_POST['lname'])){
            $this->model_donors->updateFormField('lname','checked');
        }
        else{
            $this->model_donors->updateFormField('lname','NULL');            
        }
        if(isset($_POST['dob'])){
            $this->model_donors->updateFormField('dob','checked');
        }
        else{
            $this->model_donors->updateFormField('dob','NULL');            
        }
        if(isset($_POST['gender'])){
            $this->model_donors->updateFormField('gender','checked');
        }
        else{
            $this->model_donors->updateFormField('gender','NULL');            
        }
        if(isset($_POST['address1'])){
            $this->model_donors->updateFormField('address1','checked');
        }
        else{
            $this->model_donors->updateFormField('address1','NULL');            
        }
        if(isset($_POST['address2'])){
            $this->model_donors->updateFormField('address2','checked');
        }
        else{
            $this->model_donors->updateFormField('address2','NULL');            
        }
        if(isset($_POST['city'])){
            $this->model_donors->updateFormField('city','checked');
        }
        else{
            $this->model_donors->updateFormField('city','NULL');            
        }
        if(isset($_POST['email'])){
            $this->model_donors->updateFormField('email','checked');
        }
        else{
            $this->model_donors->updateFormField('email','NULL');            
        }
        if(isset($_POST['telephone1'])){
            $this->model_donors->updateFormField('telephone1','checked');
        }
        else{
            $this->model_donors->updateFormField('telephone1','NULL');            
        }
        if(isset($_POST['telephone2'])){
            $this->model_donors->updateFormField('telephone2','checked');
        }
        else{
            $this->model_donors->updateFormField('telephone2','NULL');            
        }
        if(isset($_POST['gramasevakadevision'])){
            $this->model_donors->updateFormField('gramasevakadevision','checked');
        }
        else{
            $this->model_donors->updateFormField('gramasevakadevision','NULL');            
        }
        if(isset($_POST['gramasevakanumber'])){
            $this->model_donors->updateFormField('gramasevakanumber','checked');
        }
        else{
            $this->model_donors->updateFormField('gramasevakanumber','NULL');            
        }
        if(isset($_POST['divisional'])){
            $this->model_donors->updateFormField('divisional','checked');
        }
        else{
            $this->model_donors->updateFormField('divisional','NULL');            
        }
        if(isset($_POST['division'])){
            $this->model_donors->updateFormField('division','checked');
        }
        else{
            $this->model_donors->updateFormField('division','NULL');            
        }
        if(isset($_POST['province'])){
            $this->model_donors->updateFormField('province','checked');
        }
        else{
            $this->model_donors->updateFormField('province','NULL');            
        }
        if(isset($_POST['cr_fname'])){
            $this->model_donors->updateFormField('cr_fname','checked');
        }
        else{
            $this->model_donors->updateFormField('cr_fname','NULL');            
        }
        if(isset($_POST['cr_lname'])){
            $this->model_donors->updateFormField('cr_lname','checked');
        }
        else{
            $this->model_donors->updateFormField('cr_lname','NULL');            
        }
        if(isset($_POST['cr_address1'])){
            $this->model_donors->updateFormField('cr_address1','checked');
        }
        else{
            $this->model_donors->updateFormField('cr_address1','NULL');            
        }
        if(isset($_POST['cr_address2'])){
            $this->model_donors->updateFormField('cr_address2','checked');
        }
        else{
            $this->model_donors->updateFormField('cr_address2','NULL');            
        }
        if(isset($_POST['cr_city'])){
            $this->model_donors->updateFormField('cr_city','checked');
        }
        else{
            $this->model_donors->updateFormField('cr_city','NULL');            
        }
        if(isset($_POST['cr_nic'])){
            $this->model_donors->updateFormField('cr_nic','checked');
        }
        else{
            $this->model_donors->updateFormField('cr_nic','NULL');            
        }
        if(isset($_POST['cr_relationship'])){
            $this->model_donors->updateFormField('cr_relationship','checked');
        }
        else{
            $this->model_donors->updateFormField('cr_relationship','NULL');            
        }
        if(isset($_POST['cr_telephone1'])){
            $this->model_donors->updateFormField('cr_telephone1','checked');
        }
        else{
            $this->model_donors->updateFormField('cr_telephone1','NULL');            
        }
        if(isset($_POST['cr_telephone2'])){
            $this->model_donors->updateFormField('cr_telephone2','checked');
        }
        else{
            $this->model_donors->updateFormField('cr_telephone2','NULL');            
        }
        
        
        redirect('customize');
    }
}

