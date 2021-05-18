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
            //'tags' => $this->input->post('tag['.$row->nom.']'),
            'tipus_recurs' => $tipus_recurs,
        );

        return $this->db->insert('practiques', $data);
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


    public function insert_practicaVideobd()
    {
        $this->load->helper('url');

        $tipus_recurs = 'video';
        $data = array(
            'titul' => $this->input->post('titolInfografia'),
            'descripcio' => $this->input->post('descripciocurtaInfografia'),
            'explicacio' => $this->input->post('descripciollargaInfografia'),
            'categoria' => $this->input->post('categoriaPractica'),
            'tipus_recurs' => $tipus_recurs,
        );

        return $this->db->insert('practiques', $data);
    }




    /* function mostrar_tag()
    {
        $query = $this->db->get('tags');
    }*/


}
