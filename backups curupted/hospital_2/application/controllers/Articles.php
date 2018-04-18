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

        $userId = $this->session->userdata('user_id');
        $userData = $this->model_users->fetchUserData($userId);
        $user = $userData['username'];
        $userLevel = $userData['level'];

    }
//    Add new post
    public function addArticle(){
        $validator = array('success'=>false, 'messages'=>array());

//        $fields    = $this->model_donors->getAllFields();

        $validate_data = array();

        if(isset($_POST['submit'])){

            $userId = $this->session->userdata('user_id');
            $userLevel = $this->session->userdata('user_level');
            $userData = $this->model_users->fetchUserData($userId);
            $user = $userData['username'];

            $last_id = $this->model_articles->addArticle($user,$userLevel);
//            echo "last id id :". $last_id;


            if(count($_FILES['image']['name']) > 0){

                for($i=0; $i<count($_FILES['image']['name']); $i++) {
                    //Get the temp file path
                    $tmpFilePath = $_FILES['image']['tmp_name'][$i];
                    $file_size   = $_FILES['image']['size'];
                    if (!file_exists('images/'.'articleID_'.$last_id)) {
                        mkdir('images/'.'articleID_'.$last_id, 0777, true);
                        }

                    //Make sure we have a filepath
                    if($tmpFilePath != ""){
                        $shortname = $_FILES['image']['name'][$i];
                        $filePath  = "images/" .'articleID_'.$last_id.'/'.$_FILES['image']['name'][$i];
                        $imgExt    = pathinfo($shortname, PATHINFO_EXTENSION);

                        if($imgExt == 'jpg' || $imgExt == 'png' || $imgExt == 'gif') {
                            if(move_uploaded_file($tmpFilePath, $filePath)) {
                             $this->model_articles->uploadImagePath($last_id,$filePath);
                            }
                        }

                    }

                }
            }


    }
        if($userLevel == 1){
            redirect('dashboardAdmin');
        }
        else{
            redirect('dashboard');
        }
    }


    public function addNewQuestionnaire(){
        $validator = array('success'=>false, 'messages'=>array(), 'res'=>"", 'last_id'=>"");

        $validate_data = array(
            array(
                'field' => 'qName',
                'label' => 'Questionaire Name',
                'rules' => 'required|min_length[3]|max_length[150]|xss_clean|trim'
            )
        );
        $this->form_validation->set_rules($validate_data);
        $this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');

        if($this->form_validation->run() === true){
            $last_id = $this->model_articles->newQuestionnaire();

            $validator['success'] = true;
            $validator['messages'] = 'Successfully started new Questionaire, Add questions and answers';
            $validator['quizeName']   = $this->input->post('qName');
            $validator['last_id'] = $last_id;
        }
        else{
            $validator['success'] = false;
            foreach ($_POST as $key=>$value){
                $validator['messages'][$key] = form_error($key);
            }
        }
        echo json_encode($validator);

    }

    public function addNewSubject(){
        $validator = array('success'=>false, 'messages'=>array(), 'res'=>"", 'last_id'=>"");

        $validate_data = array(
            array(
                'field' => 'subCode',
                'label' => 'Subject Code',
                'rules' => 'required|min_length[3]|max_length[50]|xss_clean|trim'
            ),
            array(
                'field' => 'subName',
                'label' => 'Subject Name',
                'rules' => 'required|min_length[3]|max_length[50]|xss_clean|trim'
            )
        );
        $this->form_validation->set_rules($validate_data);
        $this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');

        if($this->form_validation->run() === true){
            $last_id = $this->model_articles->newSubject();

            $validator['success'] = true;
            $validator['messages'] = 'Successfully added new subject';
            $validator['quizeName']   = $this->input->post('qName');
            $validator['last_id'] = $last_id;
        }
        else{
            $validator['success'] = false;
            foreach ($_POST as $key=>$value){
                $validator['messages'][$key] = form_error($key);
            }
        }
        echo json_encode($validator);

    }

    public function addQuestion(){
        $validator = array('success'=>false, 'messages'=>array(), 'res'=>"", 'quizeName'=>"");
        $last_q_id = "";
        $questionVali = false;
        $validate_data = array(
            array(
                'field' => 'question',
                'label' => 'Question',
                'rules' => 'required|min_length[1]|max_length[150]|xss_clean|trim'
            ),
            array(
                'field' => 'qa1',
                'label' => 'Answer 1',
                'rules' => 'required|min_length[1]|max_length[150]|xss_clean|trim'
            ),
            array(
                'field' => 'qa2',
                'label' => 'Answer 2',
                'rules' => 'required|min_length[1]|max_length[150]|xss_clean|trim'
            ),
            array(
                'field' => 'qa3',
                'label' => 'Answer 3',
                'rules' => 'required|min_length[1]|max_length[150]|xss_clean|trim'
            ),
            array(
                'field' => 'qa4',
                'label' => 'Answer 4',
                'rules' => 'required|min_length[1]|max_length[150]|xss_clean|trim'
            ),
            array(
                'field' => 'qa5',
                'label' => 'Answer 5',
                'rules' => 'min_length[1]|max_length[150]|xss_clean|trim'
            )
        );
        $this->form_validation->set_rules($validate_data);
        $this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');

        if($this->form_validation->run() === true){
            $last_q_id = $this->model_articles->newQuestion();
            $last_id = $this->input->post('last_id'); // this is questionaire id

            $questionaireName = $this->input->post('questionaireName');
            $questionVali = true;
            $validator['quizeName']   = $this->input->post('qName');
            $validator['last_q_id'] = $last_q_id;
            $validator['success'] = true;
            $validator['messages'] = 'Question number ';
            $validator['quizeName']   = $questionaireName;
            $validator['last_id'] = $last_id;
        }
        else{
            $validator['success'] = false;
            foreach ($_POST as $key=>$value){
                $validator['messages'][$key] = form_error($key);
            }
        }

//        $validate_data2 = array(
//            array(
//                'field' => 'qa1',
//                'label' => 'Answer 1',
//                'rules' => 'required|min_length[1]|max_length[150]|xss_clean|trim'
//            ),
//            array(
//                'field' => 'qa2',
//                'label' => 'Answer 2',
//                'rules' => 'required|min_length[1]|max_length[150]|xss_clean|trim'
//            ),
//            array(
//                'field' => 'qa3',
//                'label' => 'Answer 3',
//                'rules' => 'required|min_length[1]|max_length[150]|xss_clean|trim'
//            ),
//            array(
//                'field' => 'qa4',
//                'label' => 'Answer 4',
//                'rules' => 'required|min_length[1]|max_length[150]|xss_clean|trim'
//            ),
//            array(
//                'field' => 'qa5',
//                'label' => 'Answer 5',
//                'rules' => 'min_length[1]|max_length[150]|xss_clean|trim'
//            )
//
//        );
//march 5th 11.52pm
//         $this->form_validation->set_rules($validate_data2);
//         $this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');
         $a1 = $a2 = $a3 = $a4 = $a5 ='not';
         if(isset($_POST['a1'])){
             $a1 = "checked";
         }
         if(isset($_POST['a2'])){
             $a2 = "checked";
         }
         if(isset($_POST['a3'])){
             $a3 = "checked";
         }
         if(isset($_POST['a4'])){
             $a4 = "checked";
         }
         if(isset($_POST['a5'])){
             $a5 = "checked";
         }
         if($this->form_validation->run() === true){
             $answer1 = $this->input->post('qa1');
             $this->model_articles->newAnswer($last_q_id,$answer1,$a1);
             $answer2 = $this->input->post('qa2');
             $this->model_articles->newAnswer($last_q_id,$answer2,$a2);
             $answer3 = $this->input->post('qa3');
             $this->model_articles->newAnswer($last_q_id,$answer3,$a3);
             $answer4 = $this->input->post('qa4');
             $this->model_articles->newAnswer($last_q_id,$answer4,$a4);

             if($this->input->post('qa5')){
                 $answer5 = $this->input->post('qa5');
                 $this->model_articles->newAnswer($last_q_id,$answer5,$a5);
             }

             $mcqVali = true;
             $validator['quizeName']   = $this->input->post('qName');
//             $validator['last_id'] = $last_question_id;
         }
        echo json_encode($validator);
    }

    public function loadQuestions(){
        $validator = array('success'=>false, 'messages'=>array(), 'res'=>"", 'quizeName'=>"", 'result'=>"");
        $id  = $_POST['id'];
        $validator['result'] = $this->model_articles->loadQuestions($id);

        echo json_encode($validator);

    }

    public function getQuestionAnswers(){
        $validator = array('success'=>false, 'messages'=>array(), 'res'=>"", 'quizeName'=>"", 'result'=>"",'question'=>"",'answers'=>"");
        $id  = $_POST['id'];
        $validator['question'] = $this->model_articles->getQuestion($id);
        $validator['answers']  = $this->model_articles->getAnswers($id);

        echo json_encode($validator);

    }

    public function updateQuestion($aid){
        $validator = array('success'=>false, 'messages'=>array(), 'res'=>"", 'quizeName'=>"");
        $userId = $this->session->userdata('user_id');
        $userData = $this->model_users->fetchUserData($userId);
        $user = $userData['username'];
        $q_id = $this->input->post('questionID');


        $validate_data = array(
            array(
                'field' => 'question',
                'label' => 'Question',
                'rules' => 'required|min_length[1]|max_length[150]|xss_clean|trim'
            ),
            array(
                'field' => 'qa1',
                'label' => 'Answer 1',
                'rules' => 'required|min_length[1]|max_length[150]|xss_clean|trim'
            ),
            array(
                'field' => 'qa2',
                'label' => 'Answer 2',
                'rules' => 'required|min_length[1]|max_length[150]|xss_clean|trim'
            ),
            array(
                'field' => 'qa3',
                'label' => 'Answer 3',
                'rules' => 'required|min_length[1]|max_length[150]|xss_clean|trim'
            ),
            array(
                'field' => 'qa4',
                'label' => 'Answer 4',
                'rules' => 'required|min_length[1]|max_length[150]|xss_clean|trim'
            ),
            array(
                'field' => 'qa5',
                'label' => 'Answer 5',
                'rules' => 'min_length[1]|max_length[150]|xss_clean|trim'
            )
        );

        $this->form_validation->set_rules($validate_data);
        $this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');

        $ans = true;
        $aid1 = $this->input->post('aid1');
        $ans1 = $this->input->post('qa1');

        $aid2 = $this->input->post('aid2');
        $ans2 = $this->input->post('qa2');

        $aid3 = $this->input->post('aid3');
        $ans3 = $this->input->post('qa3');

        $aid4 = $this->input->post('aid4');
        $ans4 = $this->input->post('qa4');

        if(isset($_POST['aid5'])){
            $aid5 = $this->input->post('aid5');
            $ans5 = $this->input->post('qa5');
        }
        else{
            $aid5="";
            $ans5="";
        }
        $a1 = $a2 = $a3 = $a4 = $a5 =NULL;
        if(isset($_POST['a1'])){
            $a1 = "checked";
        }
        if(isset($_POST['a2'])){
            $a2 = "checked";
        }
        if(isset($_POST['a3'])){
            $a3 = "checked";
        }
        if(isset($_POST['a4'])){
            $a4 = "checked";
        }
        if(isset($_POST['a5'])){
            $a5 = "checked";
        }
        if($this->form_validation->run() === true){
            $this->model_articles->updateQuestion();
            $q = true;
            $this->model_articles->updateAnswer($aid1,$ans1,$a1);
            $this->model_articles->updateAnswer($aid2,$ans2,$a2);
            $this->model_articles->updateAnswer($aid3,$ans3,$a3);
            $this->model_articles->updateAnswer($aid4,$ans4,$a4);
            $this->model_articles->updateAnswer($aid5,$ans5,$a5);



        }
    }

    public function getSubject(){
        $id = $_POST['id'];
        $result = $this->model_clinics->viewSubject($id);
        echo json_encode($result);
//        redirect('editArticle');
    }










    public function updateArticle(){
        $redirectPage = $_POST['pageToRedirect'];
        if(isset($_POST['submit'])){
//            $redirectPage = $_POST['pageToRedirect'];
            $articleID   = $this->input->post('articleID');
            $userId = $this->session->userdata('user_id');


            $userData = $this->model_users->fetchUserData($userId);
            $user = $userData['username'];
            $userLevel = $userData['level'];

            $this->model_articles->updateArticle($user);



        }

        if(count($_FILES['image']['name']) > 0){
                for($i=0; $i<count($_FILES['image']['name']); $i++) {
                    //Get the temp file path
                    $tmpFilePath = $_FILES['image']['tmp_name'][$i];
                    $file_size   = $_FILES['image']['size'];

//                    crete folder if not exist
                    if (!file_exists('images/'.'articleID_'.$articleID)) {
                        mkdir('images/'.'articleID_'.$articleID, 0777, true);
                    }

                    //Make sure we have a filepath
                    if($tmpFilePath != ""){
                        $shortname = $_FILES['image']['name'][$i];
                        $filePath  = "images/" .'articleID_'.$articleID.'/'.$_FILES['image']['name'][$i];
                        $imgExt    = pathinfo($shortname, PATHINFO_EXTENSION);

                        if($imgExt == 'jpg' || $imgExt == 'png' || $imgExt == 'gif'){
                            if(move_uploaded_file($tmpFilePath, $filePath)) {
                             $this->model_articles->uploadImagePath($articleID,$filePath);
                            }
                        }

                    }

                }

        }
        $userId = $this->session->userdata('user_id');
        $userData = $this->model_users->fetchUserData($userId);
        $userLevel = $userData['level'];
        if($userLevel=="1" AND $redirectPage == "0"){
            redirect('dashboardAdmin');
        }
        else if($redirectPage == "1"){
            redirect('pendingPublish');
        }
        else if($userLevel == "0"){
            redirect('dashboard');
        }
    }



    public function getArticle(){
        $id = $_POST['id'];
        $result = $this->model_articles->getArticle($id);
//        $res = array("dog","cow","cat","mice","elephant");
        echo json_encode($result);
//        redirect('editArticle');
    }

    public function deleteImages(){
        $postID = $_POST['postID'];
        if($postID){
            $this->model_articles->deleteImagePaths($postID);


            $files = glob('images/articleID_'.$postID.'/*'); // get all file names
            foreach($files as $file){ // iterate files
              if(is_file($file))
                unlink($file); // delete file
            }

        }
        $userLevel = $this->session->userdata('user_level');
        if($userLevel == 1){
            redirect('dashboardAdmin');
        }
        else{
            redirect('dashboard');
        }
    }

    public function deleteArticle($postID,$redirectPage){

//        $postID = $_POST['postID'];
        if($postID){
            $this->model_articles->deleteImagePaths($postID);
            $this->model_articles->deleteArticle($postID);
            $files = glob('images/articleID_'.$postID.'/*'); // get all file names
            foreach($files as $file){ // iterate files
              if(is_file($file))
                unlink($file); // delete file
            }
        }
        $userLevel = $this->session->userdata('user_level');
        if($redirectPage == 0 AND $userLevel == 1){
            redirect('dashboardAdmin');
        }
        elseif($redirectPage==1 AND $userLevel==1){
            redirect('pendingPublish');
        }
        elseif($userLevel==0){
            redirect('dashboard');
        }
        echo json_encode(array('success'));

    }

    public function publishArticle($postID,$redirectPage){
//        $postID = $_POST['postID'];
        if($postID){
            $this->model_articles->publishArticle($postID);
        }
        $userLevel = $this->session->userdata('user_level');
        if($redirectPage == "0" AND $userLevel=="1"){
            redirect('dashboardAdmin');
        }
        elseif($redirectPage == "0" AND $userLevel=="0"){
            redirect('dashboard');
        }
        else if($redirectPage == "1" AND $userLevel=="1"){
            redirect('pendingPublish');
        }
    }

     public function getMOH(){
        $districtID = $_POST['district'];
        $result = $this->model_clinics->getMOH($districtID);
        echo json_encode($result);
    }

    public function getSubjects(){
        $LID = $_POST['courseLevel'];
        $result = $this->model_articles->getSubjectsByLevel($LID);
        echo json_encode($result);
    }

    public function addClinic(){
        if(isset($_POST['submit'])){

            $userId = $this->session->userdata('user_id');
            $userData = $this->model_users->fetchUserData($userId);
            $user = $userData['username'];
            $countMOH = count($_POST['myCheckbox']);
            $userLevel = $this->session->userdata('user_level');


            if($countMOH>0){
                for($i=0 ; $i<$countMOH ; $i++){
                    $MOHdata = $_POST['myCheckbox'][$i];
                    $newMOHdata = explode(",", $MOHdata);
                    $MOHname = $newMOHdata[0];
                    $MOHID = $newMOHdata[1];

                    $this->model_clinics->addClinic($user,$MOHname,$MOHID,$userLevel);
                }
            }
            else{
                 $this->model_clinics->addClinic($user,null,$userLevel);
            }
//            $last_id = cmodel_clinics->addClinic($user);
        }
        redirect('addClinic');
    }

    public function getClinic(){
        $id = $_POST['id'];
        $result = $this->model_clinics->viewClinic($id);
        echo json_encode($result);
//        redirect('editArticle');
    }

    public function updateClinic(){
        if(isset($_POST['submit'])){
            $userId   = $this->session->userdata('user_id');
            $userData = $this->model_users->fetchUserData($userId);
            $user = $userData['username'];
            $this->model_clinics->updateClinicModel($user);

            $redirectPage = $_POST['pageToRedirect'];

            if($redirectPage == "0"){
                redirect('viewClinics');
            }
            else if($redirectPage == "1"){
                redirect('pendingClinics');
            }
            else if($redirectPage == "2"){
                redirect('yourPendingClinics');
            }

        }
    }

    public function deleteClinic($clinicID,$redirectPage){

//        $postID = $_POST['postID'];
        if($clinicID){
            $this->model_clinics->deleteClinicModel($clinicID);
        }


        if($redirectPage == "0"){
            redirect('viewClinics');
        }
        else if($redirectPage == "1"){
            redirect('pendingClinics');
        }
        else if($redirectPage == "2"){
            redirect('yourPendingClinics');
        }

    }

     public function publishClinic($clinicID,$redirectPage){
        if($clinicID){
            $this->model_clinics->publishClinic($clinicID);
        }
        if($redirectPage == "0"){
            redirect('viewClinics');
        }
        else if($redirectPage == "1"){
            redirect('pendingClinics');
        }
    }












/*





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
 */

}
