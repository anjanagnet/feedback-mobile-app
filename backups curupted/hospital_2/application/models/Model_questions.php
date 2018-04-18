<?php

/**
 * Created by PhpStorm.
 * User: anjana
 * Date: 6/26/17
 * Time: 5:00 PM
 */
class Model_questions extends CI_Model
{
    function __construct() {
        parent::__construct();
    }

    public function getQuestion($id=null){

        $sql    = "SELECT * FROM Questions WHERE questionID = ?";
        $query  = $this->db->query($sql,array($id));
        $result = $query->row_array();
        return $result;
    }

    public function newSubject(){
        $date = date('Y-m-d H:i:s');
        $userId = $this->session->userdata('user_id');
//            $userLevel = $this->session->userdata('user_level');
        $userData = $this->model_users->fetchUserData($userId);
        $user = $userData['username'];
        $insert_data = array(
            'createDate'    => $date,
            'SubjectCode'   => $this->input->post('subCode'),
            'SubjectName'   => $this->input->post('subName'),
            'Level'         => $this->input->post('level'),
            'createUser'    => $user,
            'Active'        => $this->input->post('status')
        );

        $this->db->insert('subjects',$insert_data);
        return $insert_id = $this->db->insert_id();
    }

    public function newQuestion(){
        $insert_data = array(
            'questionaireID'    => $this->input->post('last_id'),
            'question' => $this->input->post('question')
        );

        $this->db->insert('Questions',$insert_data);
        return $last_question_id = $this->db->insert_id();

    }

    public function updateQuestion(){
        $update_data = array(
            'question' => $this->input->post('question')
        );

        $questionID = $this->input->post('questionID');

        $this->db->where('questionID',$questionID);
        $this->db->update('Questions',$update_data);
    }

    public function newAnswer($last_q_id,$answer,$correct){
        $insert_data = array(
            'QID'    => $last_q_id,
            'Answer' => $answer,
            'correct'=> $correct
        );

        $this->db->insert('answers',$insert_data);
//            return $last_answer_id = $this->db->insert_id();

    }

    public function updateAnswer($answerid,$answer,$correct){
//            $questionID = $this->input->post('questionID');
        $update_data = array(
            'Answer' => $answer,
            'correct'=> $correct
        );

        $this->db->where('AID',$answerid);
        $this->db->update('answers',$update_data);

    }


    public function addQuestion($user,$userLevel,$hospital){
        $date = date('Y-m-d H:i:s');

        if($userLevel==1){

            $insert_data = array(
                'create_date'           => $date,
                'question_name_english' => $this->input->post('questionE'),
                'question_name_sinhala' => $this->input->post('questionS'),
                'question_name_tamil'   => $this->input->post('questionT'),
                'hospital_id'           => $hospital,
                'create_user'           => $user,
                'active'                => $this->input->post('active')
            );
        }
        else{
            $insert_data = array(
                'create_date'           => $date,
                'question_name_english' => $this->input->post('questionE'),
                'question_name_sinhala' => $this->input->post('questionS'),
                'question_name_tamil'   => $this->input->post('questionT'),
                'hospital_id'           => $hospital,
                'create_user'           => $user,
                'active'                => false
            );
        }

        $this->db->insert('Questions',$insert_data);
        return $insert_id = $this->db->insert_id();

    }
    public function updateArticle($user){
        $articleID   = $this->input->post('articleID');
        $video = $_POST['video'];
        if($video){
            $newVideo = str_replace("watch?v=","embed/",$video);
        }
        else{
            $newVideo = NULL;
        }
        $update_data = array(
            'date'         => $this->input->post('datetime'),
            'title'        => $this->input->post('title'),
            'titleS'       => $this->input->post('titleS'),
            'titleT'       => $this->input->post('titleT'),
            'category'     => $this->input->post('category'),
            'video'        => $newVideo ,
            'description'  => $this->input->post('description'),
            'descriptionS' => $this->input->post('descriptionS'),
            'descriptionT' => $this->input->post('descriptionT'),
            'modified'     => $user,
            'status'       => $this->input->post('status')
        );
        $this->db->where('postID',$articleID);
        $this->db->update('articles',$update_data);
    }

    public function uploadImagePath($postID=null, $path=null){
        $insert_data = array(
            'postID'       => $postID,
            'path'         => $path
        );
        $this->db->insert('image_paths',$insert_data);
    }
    /*
            public function loadArticlesInitial(){

                $sql = "SELECT A.* , GROUP_CONCAT(P.path) AS path FROM articles A LEFT JOIN image_paths P ON A.postID = P.postID GROUP BY A.postID ORDER BY A.date DESC ";

    //            $sql = "SELECT A.postID,A.date,A.title,A.category,A.video,A.description,A.auther,A.modified,A.status,P.path from articles A, image_paths P where A.status=? LEFT JOIN image_paths P ON A.postID = P.postID GROUP BY A.postID ORDER BY A.date DESC ";

    //            $sql = "SELECT  a.`postID`, GROUP_CONCAT(p.`path`) AS path, a.`date`, a.`title`, a.`titleS`,a.`titleT`, a.`category`, a.`video`, a.`description`, a.`descriptionS`, a.`descriptionT`, a.`auther`, a.`modified` FROM `articles` a LEFT JOIN `image_paths` p ON p.`postID` = a.`postID` WHERE a.`status` = 'publish' GROUP BY a.`postID` order by a.`date` DESC";


                $s='draft';
                $query  = $this->db->query($sql);
                $result = $query->result();

                return $result;
            }
    */
    public function loadQuestionnaires(){
        $sql = "SELECT * FROM QuestionSeries ORDER BY qID DESC";
        $query  = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }

    public function getSubjects($status){
        $sql = "SELECT * FROM subjects WHERE Active=".$status;
        $query  = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }

    public function getSubjectsByLevel($level){
        $sql = "SELECT * FROM subjects WHERE level=".$level;
        $query  = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }

    public function getLevels($status){
        $sql = "SELECT * FROM subject_levels WHERE status=".$status;
        $query  = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }

    public function getAllSubjects(){
        $sql = "SELECT * FROM subjects";
        $query  = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }

    public function loadQuestions($qid){
        $sql = "SELECT * FROM Questions WHERE questionaireID=".$qid;
        $query  = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }

    public function getAnswers($qid){
        $sql = "SELECT * FROM answers WHERE QID=".$qid;
        $query  = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }

    public function viewSubject($id){
        $sql = "SELECT * FROM subjects WHERE SID=".$id;
        $query  = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }

    public function deleteImagePaths($pathID){

        $sql = "DELETE FROM image_paths WHERE postID=?";
        $this->db->query($sql, array($pathID));
    }

    public function deleteArticle($postID){
        $sql = "DELETE FROM articles WHERE postID=?";
        $this->db->query($sql,array($postID));
    }

    public function filterArticles($status){
        $sql   = "SELECT * FROM articles WHERE status =".$status;
        $query = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }

    public function filterArticlesByUser($status,$user){
        $sql   = "SELECT * FROM articles WHERE status = ? AND auther=? ORDER BY date DESC";
        $query = $this->db->query($sql,array($status,$user));
        $result = $query->result();
        return $result;
    }

    public function publishArticle($postID){
        $updateData = array(
            'status'    => "1"
        );
        $this->db->where('postID',$postID);
        $this->db->update('articles',$updateData);
    }
}
