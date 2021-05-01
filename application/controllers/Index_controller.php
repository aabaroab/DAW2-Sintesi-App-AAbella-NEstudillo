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
        $data['autor'] = '&copy;2020. Noel Estudillo';
        $data['user'] =  $this->ion_auth->user()->row();

        //Si el usuari no esta registrat    
        $this->load->view('templates/header', $data);
        $this->load->view('pages/index', $data);
        $this->load->view('templates/footer', $data);

        //Else el usuari esta registrat 
        /*
          $this->load->view('templates/header_privat',$data);
        $this->load->view('pages/index',$data);
        $this->load->view('templates/footer',$data);
        */
    }

    public function indexprivat()
    {
        $this->load->library('ion_auth');

        $data['title'] = 'Noticies';
        $data['autor'] = '&copy;2020. Noel Estudillo';
        $data['user'] =  $this->ion_auth->user()->row();


        if ($this->ion_auth->logged_in()) {
            $group = 1;
            if (!$this->ion_auth->in_group($group)) {
            $this->load->view('templates/header_privat', $data);
            $this->load->view('pages/indexprivat', $data);
            $this->load->view('templates/footer', $data);
            }else{
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
        $data['autor'] = '&copy;2020. Noel Estudillo';
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
        $data['autor'] = '&copy;2020. Noel Estudillo';
        $group = 3;

        if ($this->ion_auth->logged_in()) {
            if (!$this->ion_auth->in_group($group)) {
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
        $data['autor'] = '&copy;2020. Noel Estudillo';

        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('ion_auth');

        $identity = $this->input->post('exampleInputEmail');
        $password = $this->input->post('exampleInputPassword');
        $verify = $this->ion_auth->login($identity, $password);
        if ($verify == true) {
            redirect(base_url('indexprivat'));
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
        $data['autor'] = '&copy;2020. Noel Estudillo';

        $username = $this->input->post('exampleInputUser');
        $password = $this->input->post('exampleInputPass');
        $email = $this->input->post('exampleInputEmail');

        $this->ion_auth->register($username, $password, $email);

        $this->load->view('pages/registra', $data);
    }

    //---------------------------------------------------------------------
    public function videos()
    {
        //$data['title'] = 'Noticies';
        //$data['autor'] = '&copy;2020. Noel Estudillo';
        $data['controller'] = $this;
        $data["cat"] = $this->index_model->get_fills(NULL);

        $this->load->view('templates/header', $data);
        $this->load->view('pages/videos', $data);
        $this->load->view('templates/footer', $data);
    }
    //-------------------------------------------------------------------------
    /*public function index ()
{
    $data['controller'] = $this; 
    $data["cat"] = $this->treecat_model->get_fills(NULL);

    $this->load->view('pages/index',$data);
}*/

    /**
     * mostrar_taula
     * $categories
     */
    public function mostrar_tree($categories)
    {
        //mostrar categoria
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


        //die('desloago');

        redirect(base_url('index'));
    }

    //--------------------------------------------------------------------------
    public function modificarUsuari()
    {
        $user = $this->ion_auth->user()->row();
        $id = $user->id;
        $data["info_user"] = $user;

        $this->load->view('pages/modificarUsuari', $data);

        $username = $this->input->post('exampleInputUser');
        $password = $this->input->post('exampleInputPass');
        $email = $this->input->post('exampleInputEmail');

        $data1 = array(
            'username' => $username,
            'email' => $email,
            'password' => $password,
        );

        $this->ion_auth->update($id, $data1);
    }

    //---------------------------------------------------------------------
    public function grocery()
    {
        $crud = new grocery_CRUD();

        $crud->set_subject('Users');
        $crud->set_theme('datatables');
        $crud->set_table('users');

        $data['title'] = 'Noticies';
        $data['autor'] = '&copy;2020. Noel Estudillo';

        $crud->columns('username', 'password', 'email');
        $crud->fields('username', 'password', 'email');

        $crud->unset_add();



        $output = $crud->render();

        $this->_example_output($output);
    }

    function _example_output($output = null)
    {
        $data['title'] = 'Noticies';
        $data['autor'] = '&copy;2020. Noel Estudillo';
        $data['user'] =  $this->ion_auth->user()->row();

        $this->load->view('templates/header_privat', $data);
        $this->load->view('pages/adminUsuaris', (array)$output);
        $this->load->view('templates/footer', $data);
    }
}
