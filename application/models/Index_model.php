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
    //----------------------------------------------------------------------------
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
        return $this->db->insert('nom_practiques', $data);
    }

    //------------------------------------------------------------------------------
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


    public function insert_practicaPissarra($prop)
    {
        $this->load->helper('url');

        $tipus_recurs = 'pissarra';
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
    //----------------------------------------------------------------------------

    public function get_practiques($slug = FALSE)
    {
        $query = $this->db->get_where('practiques', array('categoria' => $slug));
        return $query->result_array();
    }


    //---------------------------------------------------------------------------

    public function get_practiques_plantillaimatge($slugid = FALSE)
    {
        // print_r($slugid);
        // die;
        $query = $this->db->get_where('practiques', array('id' => $slugid));
        return $query->result_array();
    }
    //-------------------------------------------------------------------------


    public function get_practiques_plantilla($slugplantilla = FALSE)
    {
        $query = $this->db->get_where('practiques', array('tipus_recurs' => $slugplantilla));
        return $query->result_array();
    }


    //-------------------------------------------------------------------------
    public function getNomFitxer($idfitxer = NULL)
    {
        $query = $this->db->get_where('nom_practiques', array('id' => $idfitxer));
        //$query = $this->db->query('SELECT id FROM nom_practiques');
        return $query->result_array();
    }
    //------------------------------------------------------------------------------------

    public function getNomFitxer2($idfitxer2)
    {
        //$query = $this->db->get_where('nom_practiques', array('id' => $idfitxer2));
        $query = $this->db->query('SELECT t.id FROM nom_practiques AS t WHERE t.id_practiques=' . $idfitxer2);
        //die($idfitxer2); 
        //die($this->db->last_query());
        //return $query->result();
        //return $query->result();
        return $query->result_array();
    }
    //----------------------------------------------------------------------------------------

    public function getNomFitxer3($idfitxer2)
    {
        $query = $this->db->get_where('nom_practiques', array('id' => $idfitxer2));
        //$query = $this->db->query('SELECT t.id FROM nom_practiques AS t WHERE t.id_practiques='. $idfitxer2 );
        //die($idfitxer2); 
        //die($this->db->last_query());
        //return $query->result();
        //return $query->result();
        return $query->result_array();
    }
    //----------------------------------------------------------------------------------------

    public function get_practiques_modificar($slugmodificar = FALSE)
    {
        // print_r($slugmodificar);
        // die;

        $query = $this->db->get('practiques');
        return $query->result_array();
        //$query = $this->db->get_where('practiques', array('id' => $slugmodificar));
        //return $query->result_array();
    }
    //-----------------------------------------------------------------------------------

    public function modificarpracticaimatge()
    {
        $this->load->helper('url');

        //$tipus_recurs = 'pissarra';
        $data = array(
            'titul' => $this->input->post('titul'),
            'descripcio' => $this->input->post('descripciocurta'),
            'explicacio' => $this->input->post('descripciollarga'),
        );


        $this->db->insert('practiques', $data);
        return $this->db->insert_id();
    }
    //-------------------------------------------------------------------------------------


    public function idpractica_nom_practiques($idpractiques_nom_practiques)
    {
        $query = $this->db->get_where('nom_practiques', array('id_practiques' => $idpractiques_nom_practiques));
        return $query->result();
    }
    //----------------------------------------------------------------------------------------

    public function prova_mostrar_tags()
    {
        //$query = $this->db->get('tags');
        $query = $this->db->query('SELECT nom FROM tags ');

        $tags = array();

        foreach ($query->result_array() as $row) {
            array_push($tags, $row['nom']);
        }


        return $tags;
    }

        //-------------------------------------------------------------------------

        public function get_practiques_mostrartags($slugmostrartag)
        {
            //$slugmostrartag='108';
            $query = $this->db->query('SELECT t.nom FROM tags AS t, tag_practica AS tp WHERE tp.practica_id=' . $slugmostrartag . ' AND t.id=tp.tag_id');
            return $query->result_array();
        }

//         public function get_practiques_mostrartags($slugmostrartag)
// {
//     //$slugmostrartag='108';
//     $query = $this->db->query('SELECT t.nom FROM tags AS t, tag_practica AS tp WHERE tp.practica_id=' . $slugmostrartag . ' AND t.id=tp.tag_id');
    
//     $tagsseleccionades = array();

//     foreach ($query->result_array() as $row) {
//         array_push($tagsseleccionades, $row['nom']);
//     }


//     return $tagsseleccionades;
// }
}


