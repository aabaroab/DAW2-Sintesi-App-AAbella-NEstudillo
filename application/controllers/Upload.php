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

                $data['controller'] = $this;
                $data["cat"] = $this->index_model->get_fills(NULL);

                //$this->load->view('tree/index', $data);

                // $this->load->view('templates/header_profe', $data);
                // $this->load->view('pages/upload_form', array('error' => ' '));
                // $this->load->view('templates/footer', $data);

                if ($this->ion_auth->logged_in()) {

                        $groupadmin = 'admin';
                        $groupprofe = 'profesor';
                        if ($this->ion_auth->in_group($groupadmin)) {
                                $this->load->view('templates/header_privat', $data);
                                $this->load->view('pages/upload_form', array('error' => ' '));
                                $this->load->view('templates/footer', $data);
                        } else if ($this->ion_auth->in_group($groupprofe)) {
                                $this->load->view('templates/header_profe', $data);
                                $this->load->view('pages/upload_form', array('error' => ' '));
                                $this->load->view('templates/footer', $data);
                        }
                }
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

                $usr = $this->ion_auth->user()->row();
                $data['user'] = $usr;
                $data["cat"] = $this->index_model->get_fills(NULL);


                $this->form_validation->set_rules('titolInfografia', 'titolInfografia', 'required');

                $usr = $this->ion_auth->user()->row();
                $data['user'] = $usr;

                $data['controller'] = $this;
                $data["cat"] = $this->index_model->get_fills(NULL);


                $config['upload_path']          = './uploads/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['encrypt_name']        = true;
                $this->load->library('upload', $config);


                $usr = $this->ion_auth->user()->row();
                $data['user'] = $usr;

                $data['controller'] = $this;
                $data["cat"] = $this->index_model->get_fills(NULL);

                if ($this->form_validation->run()) {
                        $this->upload->initialize($config);

                        $tags_enviats = $this->input->post("tagsphp");

                        if (!$this->upload->do_upload('userfile')) {
                                $error = array('error' => $this->upload->display_errors());
                                // $this->load->view('templates/header_profe', $data);
                                // $this->load->view('pages/upload_form', $error);
                                // $this->load->view('templates/footer', $data);
                                if ($this->ion_auth->logged_in()) {

                                        $groupadmin = 'admin';
                                        $groupprofe = 'profesor';
                                        if ($this->ion_auth->in_group($groupadmin)) {
                                                $this->load->view('templates/header_privat', $data);
                                                $this->load->view('pages/upload_form', $error);
                                                $this->load->view('templates/footer', $data);
                                        } else if ($this->ion_auth->in_group($groupprofe)) {
                                                $this->load->view('templates/header_profe', $data);
                                                $this->load->view('pages/upload_form', $error);
                                                $this->load->view('templates/footer', $data);
                                        }
                                }
                        } else {
                                $idPractica = $this->index_model->insert_practiquesImatge($usr->username);
                                foreach ($tags_enviats as &$valor) {
                                        $tagValue = $this->index_model->getTagId($valor);
                                        $tagId = $tagValue['id'];

                                        $datatag = array(
                                                'tag_id' => $tagId,
                                                'practica_id' => $idPractica,
                                        );

                                        $this->db->insert('tag_practica', $datatag);
                                }
                                $data1 = array('upload_data' => $this->upload->data());
                                //die($data['upload_data']['file_name']);
                                // $this->load->view('templates/header_profe', $data);
                                // $this->load->view('pages/upload_success', $data1);
                                // $this->load->view('templates/footer', $data);
                                if ($this->ion_auth->logged_in()) {
                                        $groupadmin = 1;
                                        $groupprofe = 2;
                                        if ($this->ion_auth->in_group($groupadmin)) {
                                                $this->load->view('templates/header_privat', $data);
                                                $this->load->view('pages/upload_success', $data1);
                                                $this->load->view('templates/footer', $data);
                                        } else if ($this->ion_auth->in_group($groupprofe)) {
                                                $this->load->view('templates/header_profe', $data);
                                                $this->load->view('pages/upload_success', $data1);
                                                $this->load->view('templates/footer', $data);
                                        }
                                }
                        }
                } else {
                        if ($this->ion_auth->logged_in()) {

                                $groupadmin = 'admin';
                                $groupprofe = 'profesor';
                                if ($this->ion_auth->in_group($groupadmin)) {
                                        $this->load->view('templates/header_privat', $data);
                                        $this->load->view('pages/upload_form', $data);
                                        $this->load->view('templates/footer', $data);
                                } else if ($this->ion_auth->in_group($groupprofe)) {
                                        $this->load->view('templates/header_profe', $data);
                                        $this->load->view('pages/upload_form', $data);
                                        $this->load->view('templates/footer', $data);
                                }
                        }
                }
        }

        public function crearVideorecurs()
        {
                $this->load->model('index_model');
                $this->load->library('form_validation');
                $this->load->library('ion_auth');

                $this->form_validation->set_rules('titolInfografia', 'titolInfografia', 'required');


                $usr = $this->ion_auth->user()->row();
                $data['user'] = $usr;

                $data['controller'] = $this;
                $data["cat"] = $this->index_model->get_fills(NULL);

                if ($this->form_validation->run()) {
                        $tags_enviats = $this->input->post("tagsphp");


                        $idPractica = $this->index_model->insert_practiquesVideo($usr->username);
                        foreach ($tags_enviats as &$valor) {
                                $tagValue = $this->index_model->getTagId($valor);
                                $tagId = $tagValue['id'];
                                $datatag = array(
                                        'tag_id' => $tagId,
                                        'practica_id' => $idPractica,
                                );
                                $this->db->insert('tag_practica', $datatag);
                        }
                        redirect(base_url('crearpractica'));
                } else {
                        if ($this->ion_auth->logged_in()) {
                                $groupadmin = 1;
                                $groupprofe = 2;
                                if ($this->ion_auth->in_group($groupadmin)) {
                                        $this->load->view('templates/header_privat', $data);
                                        $this->load->view('pages/practicaVideo', $data);
                                        $this->load->view('templates/footer', $data);
                                } else if ($this->ion_auth->in_group($groupprofe)) {
                                        $this->load->view('templates/header_profe', $data);
                                        $this->load->view('pages/practicaVideo', $data);
                                        $this->load->view('templates/footer', $data);
                                }
                        }
                }
        }


        public function indexVideo()
        {
                $this->load->library('ion_auth');
                $data['controller'] = $this;
                $data["cat"] = $this->index_model->get_fills(NULL);
                //$data['autor'] = $this->config->item("copy");
                $data['user'] =  $this->ion_auth->user()->row();

                // $this->load->view('templates/header_profe', $data);
                // $this->load->view('pages/archiuVideo', array('error' => ' '));
                // $this->load->view('templates/footer', $data);

                if ($this->ion_auth->logged_in()) {
                        $groupadmin = 1;
                        $groupprofe = 2;
                        if ($this->ion_auth->in_group($groupadmin)) {
                                $this->load->view('templates/header_privat', $data);
                                $this->load->view('pages/archiuVideo', array('error' => ' '));
                                $this->load->view('templates/footer', $data);
                        } else if ($this->ion_auth->in_group($groupprofe)) {
                                $this->load->view('templates/header_profe', $data);
                                $this->load->view('pages/archiuVideo', array('error' => ' '));
                                $this->load->view('templates/footer', $data);
                        }
                }
        }

        public function do_upload_video()
        {
                $this->load->model('index_model');
                $this->load->library('form_validation');
                $this->load->library('ion_auth');

                $usr = $this->ion_auth->user()->row();
                $data['user'] = $usr;
                $data["cat"] = $this->index_model->get_fills(NULL);


                $this->form_validation->set_rules('titolInfografia', 'titolInfografia', 'required');


                $config['upload_path']          = './uploads/';
                $config['allowed_types']        = 'mp4|avi|mkv|flv|mov';
                $config['encrypt_name']        = true;
                $this->load->library('upload', $config);


                $usr = $this->ion_auth->user()->row();
                $data['user'] = $usr;

                $data['controller'] = $this;
                $data["cat"] = $this->index_model->get_fills(NULL);

                if ($this->form_validation->run()) {
                        $this->upload->initialize($config);

                        $tags_enviats = $this->input->post("tagsphp");

                        if (!$this->upload->do_upload('videofile')) {
                                $error = array('error' => $this->upload->display_errors());
                                if ($this->ion_auth->logged_in()) {
                                        $groupadmin = 'admin';
                                        $groupprofe = 'profesor';
                                        if ($this->ion_auth->in_group($groupadmin)) {
                                                $this->load->view('templates/header_privat', $data);
                                                $this->load->view('pages/archiuVideo', $error);
                                                $this->load->view('templates/footer', $data);
                                        } else if ($this->ion_auth->in_group($groupprofe)) {
                                                $this->load->view('templates/header_profe', $data);
                                                $this->load->view('pages/archiuVideo', $error);
                                                $this->load->view('templates/footer', $data);
                                        }
                                }
                        } else {
                                $idPractica = $this->index_model->insert_practicaVideobd($usr->username);
                                foreach ($tags_enviats as &$valor) {
                                        $tagValue = $this->index_model->getTagId($valor);
                                        $tagId = $tagValue['id'];
                                        $datatag = array(
                                                'tag_id' => $tagId,
                                                'practica_id' => $idPractica,
                                        );
                                        $this->db->insert('tag_practica', $datatag);
                                }
                                $data1 = array('upload_data' => $this->upload->data());
                                $this->load->view('templates/header_profe', $data);
                                $this->load->view('pages/upload_success', $data1);
                                $this->load->view('templates/footer', $data);
                        }
                } else {
                        if ($this->ion_auth->logged_in()) {
                                $groupadmin = 'admin';
                                $groupprofe = 'profesor';
                                if ($this->ion_auth->in_group($groupadmin)) {
                                        $this->load->view('templates/header_privat', $data);
                                        $this->load->view('pages/archiuVideo', $data);
                                        $this->load->view('templates/footer', $data);
                                } else if ($this->ion_auth->in_group($groupprofe)) {
                                        $this->load->view('templates/header_profe', $data);
                                        $this->load->view('pages/archiuVideo', $data);
                                        $this->load->view('templates/footer', $data);
                                }
                        }
                }
        }
}
