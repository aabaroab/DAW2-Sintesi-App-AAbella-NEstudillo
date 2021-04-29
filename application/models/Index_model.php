<?php
class Index_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();

        $this->load->database();
    }


    public function get_login($slug = FALSE)
    {
        if ($slug === FALSE) {
            $query = $this->db->get('news');
            return $query->result_array();
        }

        $query = $this->db->get_where('news', array('slug' => $slug));
        return $query->row_array();
    }

    public function get_fills ($catid)
    {
        $data = array(
            'pare' => $catid
        );

        $query = $this->db->get_where('treecat', $data);
        
        return $query->result_array();
    }

    

}

