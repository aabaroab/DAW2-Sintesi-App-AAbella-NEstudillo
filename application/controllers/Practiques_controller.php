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

        }

        public function infografia()
        {
            $this->load->library('form_validation');
            $this->load->library('ion_auth');
    
            $data['title'] = 'Noticies';
            $data['autor'] = $this->config->item("copy");
            $data['user'] =  $this->ion_auth->user()->row();
    
    
            $username = $this->input->post('titolInfografia');
            $password = $this->input->post('descripciocurtaInfografia');
            $email = $this->input->post('descripciollargaInfografia');
            $additional_data = array(
                'first_name' => $this->input->post('NomUsuari'),
                'last_name' => $this->input->post('CognomsUsuari'),
                'phone' => $this->input->post('TelefonUsuari'),
            );
            $group = array($this->input->post('GrupUsuari'));
            //$group = array('2');
    
            $this->ion_auth->register($username, $password, $email, $additional_data, $group);
    
            $this->load->view('templates/header_profe', $data);
            $this->load->view('pages/infografia', $data);
            $this->load->view('templates/footer', $data);
        }
}
