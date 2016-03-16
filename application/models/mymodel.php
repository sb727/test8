<?php

class mymodel extends CI_Model {

         public function __construct()
        {
                parent::__construct();
                $this->load->database();
        }

        public function get_entries($userid,$password)
        {

                $query = $this->db->query('SELECT * FROM user where user_id="'.$userid.'" and password="'.$password.'"');
                return $query->row();
        }

        public function get_hotellist()
        {
                $query = $this->db->query('SELECT * FROM hotel');
                $hotels = $query->result_array();
                return $hotels;
        }

        public function get_book($description)
        {
                 $query = $this->db->query('SELECT * from hotel where description like "%'.$description.'%"');
                 $hotels = $query->result_array();
                return $hotels;
        }

        public function disp_hotel($id)
        {
                $query = $this->db->query('SELECT * from hotel where id = '.$id);
                return $query->row();
        }
}
?>