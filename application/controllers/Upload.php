<?php

class Upload extends CI_Controller
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

                $this->load->helper(array('form', 'url'));
                $data['user'] =  $this->ion_auth->user()->row();
        }

        public function index()
        {
                $this->load->library('ion_auth');
                //$data['autor'] = $this->config->item("copy");
                $data['user'] =  $this->ion_auth->user()->row();

                //$data['controller'] = $this;
                //$data["cat"] = $this->treecat_model->get_fills(NULL);

                //$this->load->view('tree/index', $data);

                $this->load->view('templates/header_profe', $data);
                $this->load->view('pages/upload_form', array('error' => ' '));
                $this->load->view('templates/footer', $data);
        }

        public function mostrar_tree2($categories)
        {

                foreach ($categories as $cat) {
                        echo "<option>" . $cat['nom'] . "</option>";

                        $fills = $this->index_model->get_fills($cat['id']);

                        if (count($fills) > 0)
                                $this->mostrar_tree2($fills);
                }
        }

        public function do_upload()
        {
                $this->load->model('index_model');
                $this->load->library('form_validation');
                $this->load->library('ion_auth');
                $usr= $this->ion_auth->user()->row();
                $data['user'] = $usr;
                $data["cat"] = $this->index_model->get_fills(NULL);


                $config['upload_path']          = './uploads/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['encrypt_name']        = true;
                // $config['max_size']             = 10000;
                // $config['max_width']            = 10240;
                // $config['max_height']           = 7680;



                $this->load->library('upload', $config);

                $this->upload->initialize($config);

                /*$data['ficher'] = array(
                        'nom_img' => $data['upload_data']['file_name'],
                );*/

                //$this->db->insert('practiques', $data['ficher']);

                if (!$this->upload->do_upload('userfile')) {
                        $error = array('error' => $this->upload->display_errors());
                        $this->load->view('templates/header_profe', $data);
                        $this->load->view('pages/upload_form', $error);
                        $this->load->view('templates/footer', $data);
                } else {
                        $this->index_model->insert_practiquesImatge($usr->username);
                        $data1 = array('upload_data' => $this->upload->data());
                        //die($data['upload_data']['file_name']);
                        $this->load->view('templates/header_profe', $data);
                        $this->load->view('pages/upload_success', $data1);
                        $this->load->view('templates/footer', $data);
                }
        }

        public function crearVideorecurs()
        {

                $this->load->model('index_model');
                $this->load->library('form_validation');
                $this->load->library('ion_auth');
                //$data['autor'] = $this->config->item("copy");

                $usr= $this->ion_auth->user()->row();
                $data['user'] = $usr;

                $data['controller'] = $this;
                $data["cat"] = $this->index_model->get_fills(NULL);

                echo"<h1>video recurs</h1>";
                $tags_enviats=$this->input->post("tagsphp");

                print_r($tags_enviats);
                die;



                $this->index_model->insert_practiquesVideo($usr->username);

                $this->load->view('templates/header_profe', $data);
                $this->load->view('pages/practicaVideo', $data);
                $this->load->view('templates/footer', $data);
        }


        public function indexVideo()
        {
                $this->load->library('ion_auth');
                $data['controller'] = $this;
                $data["cat"] = $this->index_model->get_fills(NULL);
                //$data['autor'] = $this->config->item("copy");
                $data['user'] =  $this->ion_auth->user()->row();

                $this->load->view('templates/header_profe', $data);
                $this->load->view('pages/archiuVideo', array('error' => ' '));
                $this->load->view('templates/footer', $data);
        }

        public function do_upload_video()
        {
                $this->load->model('index_model');
                $this->load->library('form_validation');
                $this->load->library('ion_auth');
                $data['user'] =  $this->ion_auth->user()->row();

                $config['upload_path']          = './uploads/';
                $config['allowed_types']        = 'mp4|AVI|MKV|FLV|MOV';
                // $config['max_size']             = 10000;
                // $config['max_width']            = 10240;
                // $config['max_height']           = 7680;



                $this->load->library('upload', $config);

                $this->upload->initialize($config);

                /*$data['ficher'] = array(
                        'nom_img' => $data['upload_data']['file_name'],
                );*/

                //$this->db->insert('practiques', $data['ficher']);

                if (!$this->upload->do_upload('videofile')) {
                        $error = array('error' => $this->upload->display_errors());
                        $this->load->view('templates/header_profe', $data);
                        $this->load->view('pages/archiuVideo', $error);
                        $this->load->view('templates/footer', $data);
                } else {
                        $this->index_model->insert_practicaVideobd();
                        $data1 = array('upload_data' => $this->upload->data());
                        //die($data['upload_data']['file_name']);
                        $this->load->view('templates/header_profe', $data);
                        $this->load->view('pages/upload_success', $data1);
                        $this->load->view('templates/footer', $data);
                }
        }



}
