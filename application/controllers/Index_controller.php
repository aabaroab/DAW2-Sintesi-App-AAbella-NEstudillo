<?php
class Index_controller extends CI_Controller
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

    public function index()
    {
        $config['base_url'] = base_url('pages');

        $data['title'] = 'Noticies';
        $data['autor'] = $this->config->item("copy");
        // $data['autor'] = '&copy;2020. Noel Estudillo';
        $data['user'] =  $this->ion_auth->user()->row();

        $this->load->view('templates/header', $data);
        $this->load->view('pages/index', $data);
        $this->load->view('templates/footer', $data);
    }

    public function indexprivat()
    {
        $this->load->library('ion_auth');

        $data['title'] = 'Noticies';
        $data['autor'] = $this->config->item("copy");
        $data['user'] =  $this->ion_auth->user()->row();

        if ($this->ion_auth->logged_in()) {
            $groupadmin = 1;
            if ($this->ion_auth->in_group($groupadmin)) {
                $this->load->view('templates/header_privat', $data);
                $this->load->view('pages/indexprivat', $data);
                $this->load->view('templates/footer', $data);
            } else {
                $this->load->view('pages/login', $data);
            }
        } else {
            $this->load->view('pages/login', $data);
        }
    }

    public function indexprofe()
    {
        $this->load->library('ion_auth');

        $data['title'] = 'Noticies';
        $data['autor'] = $this->config->item("copy");
        $data['user'] =  $this->ion_auth->user()->row();

        if ($this->ion_auth->logged_in()) {
            $this->load->view('templates/header_profe', $data);
            $this->load->view('pages/indexprofe', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->load->view('pages/login', $data);
        }
    }

    public function indexalumne()
    {
        $this->load->library('ion_auth');

        $data['title'] = 'Noticies';
        $data['autor'] = $this->config->item("copy");
        $data['user'] =  $this->ion_auth->user()->row();

        if ($this->ion_auth->logged_in()) {
            $groupalumne = 3;
            if ($this->ion_auth->in_group($groupalumne)) {
                $this->load->view('templates/header_alumne', $data);
                $this->load->view('pages/indexalumne', $data);
                $this->load->view('templates/footer', $data);
            } else {
                $this->load->view('pages/login', $data);
            }
        } else {
            $this->load->view('pages/login', $data);
        }
    }
    //---------------------------------------------------------------------

    public function login()
    {
        $data['title'] = 'Noticies';
        $data['autor'] = $this->config->item("copy");

        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('ion_auth');

        $identity = $this->input->post('exampleInputEmail');
        $password = $this->input->post('exampleInputPassword');
        $verify = $this->ion_auth->login($identity, $password);
        
        if ($verify == true) {
            $groupadmin = 'admin';
            $groupprofe = 'profesor';
            $groupalumne = 'alumne';
            if ($this->ion_auth->in_group($groupadmin)) {
                redirect(base_url('indexprivat'));
            } else if ($this->ion_auth->in_group($groupprofe)) {
                redirect(base_url('indexprofe'));
            } else if ($this->ion_auth->in_group($groupalumne)) {
                redirect(base_url('indexalumne'));
            }
        } else {
            //$this->load->view('templates/header',$data);
            $this->load->view('pages/login', $data);
            //$this->load->view('templates/footer',$data);
        }
    }
    //---------------------------------------------------------------------
    public function registra()
    {
        $this->load->library('form_validation');
        $this->load->library('ion_auth');

        $data['title'] = 'Noticies';
        $data['autor'] = $this->config->item("copy");

        $username = $this->input->post('UsernameUsuari');
        $password = $this->input->post('PassUsuari');
        $email = $this->input->post('EmailUsuari');
        $additional_data = array(
            'first_name' => $this->input->post('NomUsuari'),
            'last_name' => $this->input->post('CognomsUsuari'),
            'phone' => $this->input->post('TelefonUsuari'),
        );

        $this->ion_auth->register($username, $password, $email, $additional_data);

        $this->load->view('pages/registra', $data);
    }

    //---------------------------------------------------------------------

    public function crearusuariadmin()
    {
        $this->load->library('form_validation');
        $this->load->library('ion_auth');

        $data['title'] = 'Noticies';
        $data['autor'] = $this->config->item("copy");
        $data['user'] =  $this->ion_auth->user()->row();


        $username = $this->input->post('UsernameUsuari');
        $password = $this->input->post('PassUsuari');
        $email = $this->input->post('EmailUsuari');
        $additional_data = array(
            'first_name' => $this->input->post('NomUsuari'),
            'last_name' => $this->input->post('CognomsUsuari'),
            'phone' => $this->input->post('TelefonUsuari'),
        );
        $group = array('2');

        $this->ion_auth->register($username, $password, $email, $additional_data, $group);

        $this->load->view('templates/header_privat', $data);
        $this->load->view('pages/crearusuariadmin', $data);
        $this->load->view('templates/footer', $data);
    }

    //---------------------------------------------------------------------

    public function videos()
    {

        //$data['title'] = 'Noticies';
        //$data['autor'] = '&copy;2020. Noel Estudillo';
        $data['controller'] = $this;
        $data["cat"] = $this->index_model->get_fills(NULL);
        $data['user'] =  $this->ion_auth->user()->row();


        //$this->load->view('templates/header_prova', $data);
        if ($this->ion_auth->logged_in()) {

            $groupadmin = 1;
            $groupprofe = 2;
            $groupalumne = 3;

            if ($this->ion_auth->in_group($groupadmin)) {
                $this->load->view('templates/header_privat', $data);
                $this->load->view('pages/videos', $data);
                $this->load->view('templates/footer', $data);
            } else if ($this->ion_auth->in_group($groupprofe)) {
                $this->load->view('templates/header_profe', $data);
                $this->load->view('pages/videos', $data);
                $this->load->view('templates/footer', $data);
            } else if ($this->ion_auth->in_group($groupalumne)) {
                $this->load->view('templates/header_alumne', $data);
                $this->load->view('pages/videos', $data);
                $this->load->view('templates/footer', $data);
            }
        } else {
            $this->load->view('templates/header', $data);
            $this->load->view('pages/videos', $data);
            $this->load->view('templates/footer', $data);
        }
    }
    //-------------------------------------------------------------------------
    public function mostrar_tree($categories)
    {

        echo "<ol>";

        foreach ($categories as $cat) {
            echo "<li>" . $cat['nom'] . "</li>";

            $fills = $this->index_model->get_fills($cat['id']);

            if (count($fills) > 0)
                $this->mostrar_tree($fills);
        }
        echo "</ol>";
    }
    //--------------------------------------------------------------------------

    public function logout()
    {

        $this->load->library('ion_auth');

        $this->ion_auth->logout();

        redirect(base_url('index'));
    }

    //--------------------------------------------------------------------------
    public function modificarUsuari()
    {
        $user = $this->ion_auth->user()->row();
        $id = $user->id;
        $data["info_user"] = $user;
        $data['user'] =  $this->ion_auth->user()->row();

        if ($this->ion_auth->logged_in()) {

            //$username = $data['user']->username;
            $username = $this->input->post('UsernameUsuari');
            $password = $this->input->post('PassUsuari');
            $email = $this->input->post('EmailUsuari');
            $data1 = array(
                'username' => $username,
                'email' => $email,
                'password' => $password,
                'first_name' => $this->input->post('NomUsuari'),
                'last_name' => $this->input->post('CognomsUsuari'),
                'phone' => $this->input->post('TelefonUsuari'),
            );
            //redirect(base_url('perfilusuari'));


            $this->ion_auth->update($id, $data1);

            $this->form_validation->set_rules('email', 'password ', 'first_name', 'last_name', 'phone');
            if ($this->form_validation->run() === TRUE) {
                redirect(base_url('perfilusuari'));
            }

            $groupadmin = 1;
            $groupprofe = 2;
            $groupalumne = 3;

            if ($this->ion_auth->in_group($groupadmin)) {
                $this->load->view('templates/header_privat', $data);
                $this->load->view('pages/modificarUsuari', $data);
                $this->load->view('templates/footer', $data);
            } else if ($this->ion_auth->in_group($groupprofe)) {
                $this->load->view('templates/header_profe', $data);
                $this->load->view('pages/modificarUsuari', $data);
                $this->load->view('templates/footer', $data);
            } else if ($this->ion_auth->in_group($groupalumne)) {
                $this->load->view('templates/header_alumne', $data);
                $this->load->view('pages/modificarUsuari', $data);
                $this->load->view('templates/footer', $data);
            }
        } else {
            $this->load->view('pages/login', $data);
        }
    }

    //---------------------------------------------------------------------

    public function perfilusuari()
    {
        $user = $this->ion_auth->user()->row();
        $id = $user->id;
        $data["info_user"] = $user;
        $data['user'] =  $this->ion_auth->user()->row();

        if ($this->ion_auth->logged_in()) {

            $groupadmin = 1;
            $groupprofe = 2;
            $groupalumne = 3;

            if ($this->ion_auth->in_group($groupadmin)) {
                $this->load->view('templates/header_privat', $data);
                $this->load->view('pages/perfilusuari', $data);
                $this->load->view('templates/footer', $data);
            } else if ($this->ion_auth->in_group($groupprofe)) {
                $this->load->view('templates/header_profe', $data);
                $this->load->view('pages/perfilusuari', $data);
                $this->load->view('templates/footer', $data);
            } else if ($this->ion_auth->in_group($groupalumne)) {
                $this->load->view('templates/header_alumne', $data);
                $this->load->view('pages/perfilusuari', $data);
                $this->load->view('templates/footer', $data);
            }
        } else {
            $this->load->view('pages/login', $data);
        }
    }

    //---------------------------------------------------------------------
    public function grocery()
    {
        $crud = new grocery_CRUD();

        $crud->set_subject('Users');
        $crud->set_theme('flexigrid');
        $crud->set_table('users');

        $data['title'] = 'Noticies';
        $data['autor'] = $this->config->item("copy");

        $crud->columns('first_name', 'last_name', 'username', 'email', 'phone');
        //$crud->fields('username', 'password', 'email');
        $crud->fields('first_name', 'last_name', 'username', 'email', 'phone');

        $crud->unset_add();



        $output = $crud->render();

        $this->_example_output($output);
    }

    function _example_output($output = null)
    {
        $data['title'] = 'Noticies';
        $data['autor'] = $this->config->item("copy");
        $data['user'] =  $this->ion_auth->user()->row();
        $data["grocery"] = true;


        $this->load->view('templates/header_privat', $data);
        $this->load->view('pages/adminUsuaris', (array)$output);
        $this->load->view('templates/footer', $data);
    }


    //-------------------------------------------------------------------------------

    public function canviarpassword()
    {
        $user = $this->ion_auth->user()->row();
        $id = $user->id;
        $data["info_user"] = $user;
        $data['user'] =  $this->ion_auth->user()->row();

        if ($this->ion_auth->logged_in()) {
            //$username = $data['user']->username;

            $passwordantic = $this->input->post('contraseñavella');
            $newpassword = $this->input->post('novacontraseña');
            $repeatpassword = $this->input->post('repetircontraseña');

            if ($this->ion_auth->logged_in($data['user']->username) && $newpassword == $repeatpassword) {
            $data1 = array(
                'password' => $newpassword,
            );
        }

            $this->ion_auth->update($id, $data1);
            if ($this->ion_auth->logged_in($data['user']->username) && $newpassword == $repeatpassword) {
                redirect(base_url('videos'));
            }
            
        }
    }

    public function mostrarcanviarpassword()
    {
        $user = $this->ion_auth->user()->row();
        $id = $user->id;
        $data["info_user"] = $user;
        $data['user'] =  $this->ion_auth->user()->row();

        if ($this->ion_auth->logged_in()) {

            $groupadmin = 1;
            $groupprofe = 2;
            $groupalumne = 3;

            if ($this->ion_auth->in_group($groupadmin)) {
                $this->load->view('templates/header_privat', $data);
                $this->load->view('pages/canviarpassword', $data);
                $this->load->view('templates/footer', $data);
            } else if ($this->ion_auth->in_group($groupprofe)) {
                $this->load->view('templates/header_profe', $data);
                $this->load->view('pages/canviarpassword', $data);
                $this->load->view('templates/footer', $data);
            } else if ($this->ion_auth->in_group($groupalumne)) {
                $this->load->view('templates/header_alumne', $data);
                $this->load->view('pages/canviarpassword', $data);
                $this->load->view('templates/footer', $data);
            }
        } else {
            $this->load->view('pages/login', $data);
        }
    }

    //----------------------------------------------------------------------------------------------

    public function groceryalumnes()
    {
        $crud = new grocery_CRUD();

        $crud->set_subject('Users');
        $crud->set_theme('flexigrid');
        $crud->set_table('users');

        $data['title'] = 'Noticies';
        $data['autor'] = $this->config->item("copy");

        $crud->columns('first_name', 'last_name', 'username', 'email', 'phone');
        //$crud->fields('username', 'password', 'email');
        $crud->fields('first_name', 'last_name', 'username', 'email', 'phone');

        $crud->unset_add();



        $output = $crud->render();

        $this->_example_outputalumnes($output);
    }

    function _example_outputalumnes($output = null)
    {
        $data['title'] = 'Noticies';
        $data['autor'] = $this->config->item("copy");
        $data['user'] =  $this->ion_auth->user()->row();


        $this->load->view('templates/header_profe', $data);
        $this->load->view('pages/administraralumnes', (array)$output);
        $this->load->view('templates/footer', $data);
    }

    //-------------------------------------------------------------------------------

    public function crearpractica()
    {
        $user = $this->ion_auth->user()->row();
        $id = $user->id;
        $data["info_user"] = $user;
        $data['user'] =  $this->ion_auth->user()->row();

        if ($this->ion_auth->logged_in()) {

            $groupprofe = 2;

            if ($this->ion_auth->in_group($groupprofe)) {
                $this->load->view('templates/header_privat', $data);
                $this->load->view('pages/crearpractica', $data);
                $this->load->view('templates/footer', $data);
            }
        } else {
            $this->load->view('pages/login', $data);
        }
    }


    //----------------------------------------------------------------------------------------------

    public function groceryusuaris()
    {
        $crud = new grocery_CRUD();

        /*$crud->set_subject('Users');
        $crud->set_theme('flexigrid');
        $crud->set_table('users');*/

        $data['title'] = 'Noticies';
        $data['autor'] = $this->config->item("copy");

        if ($this->ion_auth->logged_in()) {

            $crud->set_subject('users_groups');
            $crud->set_theme('flexigrid');
            $crud->set_table('users_groups');
            $crud->display_as('user_id', "Nom d'usuari");
            $crud->display_as('group_id', 'Rol');
            $crud->set_relation('user_id', 'users', 'username');
            $crud->field_type("user_id", 'readonly');
            $crud->set_relation('group_id', 'groups', 'description');

            $crud->unset_add();



            $output = $crud->render();

            $this->_example_outputusuaris($output);
        }
    }

    function _example_outputusuaris($output = null)
    {
        $data['title'] = 'Noticies';
        $data['autor'] = $this->config->item("copy");
        $data['user'] =  $this->ion_auth->user()->row();

        if ($this->ion_auth->logged_in()) {
            $groupadmin = 'admin';

            if ($this->ion_auth->in_group($groupadmin)) {
                $this->load->view('templates/header_privat', $data);
                $this->load->view('pages/admingroceryusuaris', (array)$output);
                $this->load->view('templates/footer', $data);
            }
        }
    }

    //-------------------------------------------------------------------------------

}
