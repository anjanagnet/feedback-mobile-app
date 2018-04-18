<?php 
    class Model_Locations extends CI_Model{
        public function __construct() {
            parent::__construct();
        }
        
        public function getDistricts(){
            $sql = "SELECT id,districtName FROM districts";
            $query = $this->db->query($sql);
            return $query->result();     
        }
        
        public function getProvinces(){
            $sql = "SELECT provinceName FROM province";
            $query = $this->db->query($sql);
            return $query->result();     
        }
        
        
    }