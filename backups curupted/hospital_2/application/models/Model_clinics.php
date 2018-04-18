<?php

    class Model_clinics extends CI_Model
    {
        function __construct() {
            parent::__construct();
        }
        
        public function getMOH($districtID=null){
            $sql     = "SELECT * FROM MOH WHERE districtID=?";
            $query   = $this->db->query($sql,array($districtID));
            $result  = $query->result_array();
            return $result;
        }
        
        public function addClinic($user,$MOH,$MOHID,$userLevel){
            $date = date('Y-m-d H:i:s');
            
            if($userLevel==1){
                $insert_data = array(
                    'publishedDate'=> $date,
                    'datetime'     => $this->input->post('date'),
                    'finishingTime'=> $this->input->post('dateFinish'),
                    'venueE'       => $this->input->post('venueE'), 
                    'venueS'       => $this->input->post('venueS'),                
                    'venueT'       => $this->input->post('venueT'), 
                    'contact'      => $this->input->post('contact'),                                                
                    'nameE'        => $this->input->post('clinicNameE'),
                    'nameS'        => $this->input->post('clinicNameS'),
                    'nameT'        => $this->input->post('clinicNameT'),
                    'category'     => $this->input->post('category'),
                    'descriptionE' => $this->input->post('descriptionE'),
                    'descriptionS' => $this->input->post('descriptionS'),
                    'descriptionT' => $this->input->post('descriptionT'),
                    'MOH'          => $MOH,
                    'MOHID'        => $MOHID,
                    'auther'       => $user,
                    'modified'     => '-',
                    'status'       => $this->input->post('status')

                );
            }
            
            else{
                $insert_data = array(
                    'publishedDate'=> $date,
                    'datetime'     => $this->input->post('date'),
                    'finishingTime'=> $this->input->post('dateFinish'),
                    'venueE'       => $this->input->post('venueE'), 
                    'venueS'       => $this->input->post('venueS'),                
                    'venueT'       => $this->input->post('venueT'), 
                    'contact'      => $this->input->post('contact'),                                                
                    'nameE'        => $this->input->post('clinicNameE'),
                    'nameS'        => $this->input->post('clinicNameS'),
                    'nameT'        => $this->input->post('clinicNameT'),
                    'category'     => $this->input->post('category'),
                    'descriptionE' => $this->input->post('descriptionE'),
                    'descriptionS' => $this->input->post('descriptionS'),
                    'descriptionT' => $this->input->post('descriptionT'),
                    'MOH'          => $MOH,
                    'MOHID'        => $MOHID,
                    'auther'       => $user,
                    'modified'     => '-',
                    'status'       => 0

                );
            }
            $this->db->insert('clinics',$insert_data);
        }
        
        public function getClinics(){
            $sql = "SELECT * FROM clinics ORDER BY publishedDate DESC";
            $query  = $this->db->query($sql);
            $result = $query->result();
            return $result;
        }
        
        public function viewClinic($id){
            $sql = "SELECT * FROM clinics WHERE clinicID=?";
            $query  = $this->db->query($sql,array($id));
            $result = $query->row_array();
            return $result;
        }
        
        public function updateClinicModel($user){
            $clinicID = $this->input->post('clinicID');
            $MOHdata  = $this->input->post('selectedMOH');
            $newMOHdata = explode(",", $MOHdata); 
            $MOHname = $newMOHdata[0];
            $MOHID = $newMOHdata[1];
            
            $update_data = array(
                'nameE'        => $this->input->post('nameE'),
                'nameS'        => $this->input->post('nameS'),
                'nameT'        => $this->input->post('nameT'),
                'datetime'     => $this->input->post('datetime'),
                'finishingTime'=> $this->input->post('dateFinish'),
                'venueE'       => $this->input->post('venueE'),
                'venueS'       => $this->input->post('venueS'),
                'venueT'       => $this->input->post('venueT'),                
                'contact'      => $this->input->post('contact'),
                'category'     => $this->input->post('category'),
                'MOH'          => $MOHname,
                'MOHID'        => $MOHID,
                'descriptionE' => $this->input->post('descriptionE'),
                'descriptionS' => $this->input->post('descriptionS'),
                'descriptionT' => $this->input->post('descriptionT'),
                'modified'     => $user,
                'status'       => $this->input->post('status')
            );
            $this->db->where('clinicID',$clinicID);
            $this->db->update('clinics',$update_data);
        }
        
        public function deleteClinicModel($clinicID){
            $sql = "DELETE FROM clinics WHERE clinicID=? ORDER BY publishedDate DESC";
            $this->db->query($sql,array($clinicID));
        }
        
        public function getPendingClinics($state){
            $sql    = "SELECT * FROM clinics WHERE status=?";
            $query  = $this->db->query($sql,array($state));
            $result = $query->result();
            return $result;
                    
        }
        
        public function publishClinic($clinicID){
            $updateData = array(
                'status'    => "1"
            );
            $this->db->where('clinicID',$clinicID);
            $this->db->update('clinics',$updateData); 
        }
        
        public function filterClinicsByUser($status,$user){
            $sql   = "SELECT * FROM clinics WHERE status = ? AND auther=? ORDER BY publishedDate DESC";
            $query = $this->db->query($sql,array($status,$user));
            $result = $query->result();
            return $result;
        }

    }    