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

    public function get_fills($catid)
    {
        $data = array(
            'pare' => $catid
        );

        $query = $this->db->get_where('treecat', $data);

        return $query->result_array();
    }

    public function insert_practiquesVideo()
    {
        $this->load->helper('url');

        $tipus_recurs = 'video';
        $data = array(
            'titul' => $this->input->post('titolInfografia'),
            'descripcio' => $this->input->post('descripciocurtaInfografia'),
            'explicacio' => $this->input->post('descripciollargaInfografia'),
            'linkVideo' => $this->input->post('linckVideo'),
            'tipus_recurs' => $tipus_recurs,
        );

        return $this->db->insert('practiques', $data);
    }

    public function insert_practiquesImatge()
    {
        $this->load->helper('url');

        $tipus_recurs = 'imatge';
        $data = array(
            'titul' => $this->input->post('titolInfografia'),
            'descripcio' => $this->input->post('descripciocurtaInfografia'),
            'explicacio' => $this->input->post('descripciollargaInfografia'),
            'tipus_recurs' => $tipus_recurs,
        );

        return $this->db->insert('practiques', $data);
    }

    public function insert_tag()
    {
        $this->load->helper('url');
        $data = array(
            'nom' => $this->input->post('nomtag'),
        );
        return $this->db->insert('tags', $data);
    }

    public function mostrar_tag()
    {
        $query = $this->db->get('tags');
    }
}
