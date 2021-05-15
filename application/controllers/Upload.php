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
        }

        public function index()
        {
                $this->load->library('ion_auth');
                //$data['autor'] = $this->config->item("copy");
                $data['user'] =  $this->ion_auth->user()->row();

                $this->load->view('templates/header_profe', $data);
                $this->load->view('pages/upload_form', array('error' => ' '));
                $this->load->view('templates/footer', $data);
        }

        public function do_upload()
        {
                $this->load->library('form_validation');
                $this->load->library('ion_auth');
                $data['user'] =  $this->ion_auth->user()->row();

                $config['upload_path']          = './uploads/';
                $config['allowed_types']        = 'gif|jpg|png';
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
                        $this->index_model->insert_practiquesImatge();
                        //$data = array('upload_data' => $this->upload->data());
                        //die($data['upload_data']['file_name']);
                        $this->load->view('templates/header_profe', $data);
                        $this->load->view('pages/upload_success', $data);
                        $this->load->view('templates/footer', $data);
                }
        }

        public function crearVideorecurs()
        {

                $this->load->model('index_model');
                $this->load->library('form_validation');
                $this->load->library('ion_auth');
                //$data['autor'] = $this->config->item("copy");
                $data['user'] =  $this->ion_auth->user()->row();

                $this->index_model->insert_practiquesVideo();

                $this->load->view('templates/header_profe', $data);
                $this->load->view('pages/practicaVideo', $data);
                $this->load->view('templates/footer', $data);
        }

}
