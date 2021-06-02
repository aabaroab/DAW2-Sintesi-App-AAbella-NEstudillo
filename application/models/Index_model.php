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
            $query = $this->db->get('practiques');
            return $query->result_array();
        }

        $query = $this->db->get_where('practiques', array('slug' => $slug));
        return $query->row_array();
    }
//-----------------------------------------------------------------
    public function get_fills($catid)
    {
        $data = array(
            'pare' => $catid
        );

        $query = $this->db->get_where('treecat', $data);

        return $query->result_array();
    }
//-----------------------------------------------------------------

    public function getTagId($tagName)
    {
        $data = array(
            'nom' => $tagName
        );

        $query = $this->db->get_where('tags', $data);

        return $query->row_array();
    }
//-----------------------------------------------------------------

    public function insert_practiquesVideo($prop)
    {
        $this->load->helper('url');

        $tipus_recurs = 'videorecurs';
        
        $data = array(
            'titul' => $this->input->post('titolInfografia'),
            'descripcio' => $this->input->post('descripciocurtaInfografia'),
            'explicacio' => $this->input->post('descripciollargaInfografia'),
            'material' => $this->input->post('linckVideo'),
            'categoria' => $this->input->post('categoriaPractica'),
            'profesor' => $prop,
            'tipus_recurs' => $tipus_recurs,
            'acces' => $this->input->post('acces'),
            'categoria' => $this->input->post('curs'),
        );

        $this->db->insert('practiques', $data);
        return $this->db->insert_id();
    }

    public function insert_practiquesImatge($prop)
    {
        $this->load->helper('url');

        $tipus_recurs = 'imatge';
        $data = array(
            'titul' => $this->input->post('titolInfografia'),
            'descripcio' => $this->input->post('descripciocurtaInfografia'),
            'explicacio' => $this->input->post('descripciollargaInfografia'),
            'material' => $this->input->post('userfile'),
            'categoria' => $this->input->post('categoriaPractica'),
            'profesor' => $prop,
            'tipus_recurs' => $tipus_recurs,
            'acces' => $this->input->post('acces'),
            'categoria' => $this->input->post('curs'),
            'codiinvitacio' => $this->input->post('acsescodi'),
        );

        $this->db->insert('practiques', $data);
        return $this->db->insert_id();
    }

    public function insert_tag()
    {
        $this->load->helper('url');
        $data = array(
            'nom' => $this->input->post('nomtag'),
        );
        return $this->db->insert('tags', $data);
    }


    public function insert_practicaVideobd($prop)
    {
        $this->load->helper('url');

        $tipus_recurs = 'video';
        $data = array(
            'titul' => $this->input->post('titolInfografia'),
            'descripcio' => $this->input->post('descripciocurtaInfografia'),
            'explicacio' => $this->input->post('descripciollargaInfografia'),
            'material' => $this->input->post('videofile'),
            //'categoria' => $this->input->post('categoriaPractica'),
            'profesor' => $prop,
            'tipus_recurs' => $tipus_recurs,
            'acces' => $this->input->post('acces'),
            'categoria' => $this->input->post('curs'),
            'codiinvitacio' => $this->input->post('acsescodi'),
        );

        
        $this->db->insert('practiques', $data);
        return $this->db->insert_id();
    }


}
