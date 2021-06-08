<?php
class Grocery_controller extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('index_model');
        $this->load->helper('url_helper');
        $this->load->library('grocery_CRUD');
        $this->load->model('grocery_crud_model');
        $this->load->library('ion_auth');

        $this->load->database();
        $this->load->helper('url');
    }


    //---------------------------------------------------------------------
    public function grocery()
    {
        $crud = new grocery_CRUD();
        $data['title'] = 'Noticies';
        $data['autor'] = $this->config->item("copy");
        $data['user'] =  $this->ion_auth->user()->row();
        $data["grocery"] = true;

        if ($this->ion_auth->logged_in()) {
            $groupadmin = 'admin';
            if ($this->ion_auth->in_group($groupadmin)) {
                $crud->set_subject('Users');
                $crud->set_theme('datatables');
                $crud->set_table('users');

                $data['title'] = 'Noticies';
                $data['autor'] = $this->config->item("copy");

                $crud->columns('first_name', 'last_name', 'username', 'email', 'phone');
                //$crud->fields('username', 'password', 'email');
                $crud->fields('first_name', 'last_name', 'username', 'email', 'phone');

                $crud->unset_add();

                $output = $crud->render();

                $this->_example_output($output);
            } else {
                $this->load->view('pages/login', $data);
            }
        } else {
            $this->load->view('pages/login', $data);
        }
    }

    function _example_output($output = null)
    {
        $data['title'] = 'Noticies';
        $data['autor'] = $this->config->item("copy");
        $data['user'] =  $this->ion_auth->user()->row();
        $data["grocery"] = true;

        if ($this->ion_auth->logged_in()) {
            $groupadmin = 'admin';
            if ($this->ion_auth->in_group($groupadmin)) {
                $this->load->view('templates/header_privat', $data);
                $this->load->view('pages/adminUsuaris', (array)$output);
                $this->load->view('templates/footer', $data);
            } else {
                $this->load->view('pages/login', $data);
            }
        } else {
            $this->load->view('pages/login', $data);
        }
    }




    //----------------------------------------------------------------------------------------------

    public function groceryalumnes()
    {
        $crud = new grocery_CRUD();
        $data['title'] = 'Noticies';
        $data['autor'] = $this->config->item("copy");
        $data['user'] =  $this->ion_auth->user()->row();
        $data["grocery"] = true;

        if ($this->ion_auth->logged_in()) {
            $groupadmin = 'admin';
            if ($this->ion_auth->in_group($groupadmin)) {

                $crud->set_subject('Users');
                $crud->set_theme('datatables');
                $crud->set_table('users');

                $data['title'] = 'Noticies';
                $data['autor'] = $this->config->item("copy");

                $crud->columns('first_name', 'last_name', 'username', 'email', 'phone');
                //$crud->fields('username', 'password', 'email');
                $crud->fields('first_name', 'last_name', 'username', 'email', 'phone');

                $crud->unset_add();



                $output = $crud->render();

                $this->_example_outputalumnes($output);
            } else {
                $this->load->view('pages/login', $data);
            }
        } else {
            $this->load->view('pages/login', $data);
        }
    }

    function _example_outputalumnes($output = null)
    {
        $data['title'] = 'Noticies';
        $data['autor'] = $this->config->item("copy");
        $data['user'] =  $this->ion_auth->user()->row();

        if ($this->ion_auth->logged_in()) {
            $groupadmin = 'admin';
            if ($this->ion_auth->in_group($groupadmin)) {
                $this->load->view('templates/header_profe', $data);
                $this->load->view('pages/administraralumnes', (array)$output);
                $this->load->view('templates/footer', $data);
            } else {
                $this->load->view('pages/login', $data);
            }
        } else {
            $this->load->view('pages/login', $data);
        }
    }



    //----------------------------------------------------------------------------------------------

    public function groceryusuaris()
    {
        $crud = new grocery_CRUD();
        $data['title'] = 'Noticies';
        $data['autor'] = $this->config->item("copy");
        $data['user'] =  $this->ion_auth->user()->row();
        $data["grocery"] = true;

        if ($this->ion_auth->logged_in()) {
            $groupadmin = 'admin';
            if ($this->ion_auth->in_group($groupadmin)) {

                $crud->set_subject('Users goups');
                $crud->set_theme('datatables');
                $crud->set_table('users_groups');

                $crud->display_as('user_id', "Nom d'usuari");
                $crud->display_as('group_id', 'Rol');
                $crud->set_relation('user_id', 'users', 'username');
                $crud->field_type("user_id", 'readonly');
                $crud->set_relation('group_id', 'groups', 'description');

                $crud->unset_add();

                $data['title'] = 'Noticies';
                $data['autor'] = $this->config->item("copy");

                $output = $crud->render();

                $this->_example_output_grups($output);
            } else {
                $this->load->view('pages/login', $data);
            }
        } else {
            $this->load->view('pages/login', $data);
        }
    }

    function _example_output_grups($output = null)
    {
        $data['title'] = 'Noticies';
        $data['autor'] = $this->config->item("copy");
        $data['user'] =  $this->ion_auth->user()->row();
        $data["grocery"] = true;

        if ($this->ion_auth->logged_in()) {
            $groupadmin = 'admin';
            if ($this->ion_auth->in_group($groupadmin)) {
                $this->load->view('templates/header_privat', $data);
                $this->load->view('pages/adminUsuaris', (array)$output);
                $this->load->view('templates/footer', $data);
            } else {
                $this->load->view('pages/login', $data);
            }
        } else {
            $this->load->view('pages/login', $data);
        }
    }



    //---------------------------------------------------------------------
    public function groceryPractiques()
    {
        $crud = new grocery_CRUD();
        $usr = $this->ion_auth->user()->row();
        $data['user'] = $usr;

        if ($this->ion_auth->logged_in()) {
            $groupprofe = 'profesor';
            if ($this->ion_auth->in_group($groupprofe)) {

                $crud->where('profesor =', $usr->username);
                $crud->set_subject('practiques');
                $crud->set_theme('datatables');
                $crud->set_table('practiques');

                $data['title'] = 'Noticies';
                $data['autor'] = $this->config->item("copy");

                $crud->columns('titul', 'descripcio', 'categoria', 'acces', 'tipus_recurs', 'data_creacio', 'hora_creacio');
                $crud->fields('titul', 'descripcio', 'categoria', 'acces', 'tipus_recurs', 'data_creacio', 'hora_creacio');
                $crud->unset_add();
                $crud->unset_edit();
                $crud->callback_before_delete(array($this,'delete_file_before_delete2'));
                $output = $crud->render();
                
                $this->_example_outputpractiques($output);
            } else {
                $this->load->view('pages/login', $data);
            }
        } else {
            $this->load->view('pages/login', $data);
        }
    }

    public function delete_file_before_delete2($primary_key)
    {
        $query = $this->db->get_where('practiques', array('id' => $primary_key));
        $files= $query->result_array();
        //die($primary_key);
        foreach ($files as $file) {
            $ficher = realpath('../../../uploads/' . $primary_key . '/' . $file['nom']);
            unlink($ficher);
        }
    }

    function _example_outputpractiques($output = null)
    {
        $data['title'] = 'Gestionar Practiques';
        $data['autor'] = $this->config->item("copy");
        $data['user'] =  $this->ion_auth->user()->row();
        $data["grocery"] = true;


        if ($this->ion_auth->logged_in()) {
            $groupprofe = 'profesor';
            if ($this->ion_auth->in_group($groupprofe)) {
                $this->load->view('templates/header_profe', $data);
                $this->load->view('pages/administrarPractiques', (array)$output);
                $this->load->view('templates/footer', $data);
            } else {
                $this->load->view('pages/login', $data);
            }
        } else {
            $this->load->view('pages/login', $data);
        }
    }


    //-------------------------------------------------------------------------------

    public function groceryPractiques2()
    {
        $crud = new grocery_CRUD();
        $data['title'] = 'Gestionar Practiques';
        $data['autor'] = $this->config->item("copy");
        $data['user'] =  $this->ion_auth->user()->row();
        $data["grocery"] = true;
        if ($this->ion_auth->logged_in()) {
            $groupadmin = 'admin';
            if ($this->ion_auth->in_group($groupadmin)) {

                $crud->set_subject('practiques');
                $crud->set_theme('datatables');
                $crud->set_table('practiques');

                $data['title'] = 'Noticies';
                $data['autor'] = $this->config->item("copy");

                $crud->columns('titul', 'descripcio', 'explicacio', 'tipus_recurs', 'data_creacio', 'hora_creacio', 'profesor');
                $crud->fields('titul', 'descripcio', 'explicacio', 'tipus_recurs', 'data_creacio', 'hora_creacio', 'profesor');

                
                $crud->unset_add();
                $crud->unset_edit();
                
                $crud->callback_before_delete(array($this,'delete_file_before_delete'));

                $output = $crud->render();

                $this->_example_outputpractiques2($output);

                
            } else {
                $this->load->view('pages/login', $data);
            }
        } else {
            $this->load->view('pages/login', $data);
        }
    }

    public function delete_file_before_delete($primary_key)
{
    $query = $this->db->get_where('practiques', array('id' => $primary_key));
    $files= $query->result_array();
    die($primary_key);
    foreach ($files as $file) {
        $ficher = '../../../uploads/' . $primary_key . '/' . $file['nom'];
        unlink($ficher);
    }
}

    function _example_outputpractiques2($output = null)
    {
        $data['title'] = 'Gestionar Practiques';
        $data['autor'] = $this->config->item("copy");
        $data['user'] =  $this->ion_auth->user()->row();
        $data["grocery"] = true;


        if ($this->ion_auth->logged_in()) {
            $groupadmin = 'admin';

            if ($this->ion_auth->in_group($groupadmin)) {
                $this->load->view('templates/header_privat', $data);
                $this->load->view('pages/administrarPractiquesadmin', (array)$output);
                $this->load->view('templates/footer', $data);
            } else {
                $this->load->view('pages/login', $data);
            }
        } else {
            $this->load->view('pages/login', $data);
        }
    }

    //-------------------------------------------------------------------------------

    public function groceryTags()
    {
        $crud = new grocery_CRUD();
        $data['title'] = 'Gestionar Practiques';
        $data['autor'] = $this->config->item("copy");
        $data['user'] =  $this->ion_auth->user()->row();
        $data["grocery"] = true;
        if ($this->ion_auth->logged_in()) {
            $groupadmin = 'admin';
            if ($this->ion_auth->in_group($groupadmin)) {

                $crud->set_subject('tags');
                $crud->set_theme('datatables');
                $crud->set_table('tags');

                $data['title'] = 'Noticies';
                $data['autor'] = $this->config->item("copy");

                $crud->columns('nom');
                $crud->fields('nom');


                $output = $crud->render();

                $this->_example_outputtags($output);
            } else {
                $this->load->view('pages/login', $data);
            }
        } else {
            $this->load->view('pages/login', $data);
        }
    }

    function _example_outputtags($output = null)
    {
        $data['title'] = 'Gestionar Practiques';
        $data['autor'] = $this->config->item("copy");
        $data['user'] =  $this->ion_auth->user()->row();
        $data["grocery"] = true;


        if ($this->ion_auth->logged_in()) {
            $groupadmin = 'admin';

            if ($this->ion_auth->in_group($groupadmin)) {
                $this->load->view('templates/header_privat', $data);
                $this->load->view('pages/adminTags', (array)$output);
                $this->load->view('templates/footer', $data);
            } else {
                $this->load->view('pages/login', $data);
            }
        } else {
            $this->load->view('pages/login', $data);
        }
    }

    //-------------------------------------------------------------------------------

    public function groceryCursos()
    {
        $crud = new grocery_CRUD();

        $crud->set_subject('treecat');
        $crud->set_theme('datatables');
        $crud->set_table('treecat');

        $data['title'] = 'Noticies';
        $data['autor'] = $this->config->item("copy");

        $crud->columns('id', 'nom', 'pare');
        $crud->fields('id', 'nom', 'pare');
        $crud->field_type('id', 'hidden');




        $output = $crud->render();

        $this->_example_outputcursos($output);
    }

    function _example_outputcursos($output = null)
    {
        $data['title'] = 'Gestionar Practiques';
        $data['autor'] = $this->config->item("copy");
        $data['user'] =  $this->ion_auth->user()->row();
        $data["grocery"] = true;


        if ($this->ion_auth->logged_in()) {
            $groupadmin = 'admin';

            if ($this->ion_auth->in_group($groupadmin)) {
                $this->load->view('templates/header_privat', $data);
                $this->load->view('pages/administratCursos', (array)$output);
                $this->load->view('templates/footer', $data);
            } else {
                $this->load->view('pages/login', $data);
            }
        } else {
            $this->load->view('pages/login', $data);
        }
    }

    //-------------------------------------------------------------------------------

    public function groceryTagsprofe()
    {
        $crud = new grocery_CRUD();
        $data['title'] = 'Gestionar Practiques';
        $data['autor'] = $this->config->item("copy");
        $data['user'] =  $this->ion_auth->user()->row();
        $data["grocery"] = true;
        if ($this->ion_auth->logged_in()) {
            $groupadmin = 'admin';
            if ($this->ion_auth->in_group($groupadmin)) {

                $crud->set_subject('Tag Practiques');
                $crud->set_theme('datatables');
                $crud->set_table('tag_practica');

                $crud->display_as('tag_id', "Nom del tag");
                $crud->display_as('practica_id', 'Titol practica');
                $crud->set_relation('tag_id', 'tags', 'nom');
                //$crud->field_type("tag_id", 'readonly');
                $crud->set_relation('practica_id', 'practiques', 'titul');

                //$crud->unset_add();

                $data['title'] = 'Noticies';
                $data['autor'] = $this->config->item("copy");

                $output = $crud->render();

                $this->_example_output_tags($output);
            } else {
                $this->load->view('pages/login', $data);
            }
        } else {
            $this->load->view('pages/login', $data);
        }
    }

    function _example_output_tags($output = null)
    {
        $data['title'] = 'Noticies';
        $data['autor'] = $this->config->item("copy");
        $data['user'] =  $this->ion_auth->user()->row();
        $data["grocery"] = true;

        if ($this->ion_auth->logged_in()) {
            $groupadmin = 'admin';
            if ($this->ion_auth->in_group($groupadmin)) {
                $this->load->view('templates/header_privat', $data);
                $this->load->view('pages/adminUsuaris', (array)$output);
                $this->load->view('templates/footer', $data);
            } else {
                $this->load->view('pages/login', $data);
            }
        } else {
            $this->load->view('pages/login', $data);
        }
    }



    //---------------------------------------------------------------------
}
