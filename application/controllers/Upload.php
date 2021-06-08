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
                $data['user'] =  $this->ion_auth->user()->row();

                $data['controller'] = $this;
                $data["cat"] = $this->index_model->get_fills(NULL);

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
                        echo '<option value=' . $cat['id'] . '>' . $cat['nom'] . '</option>';
                        $fills = $this->index_model->get_fills($cat['id']);
                        if (count($fills) > 0)
                                $this->mostrar_tree2($fills);
                }
        }

        public function do_upload()
        {

                $tope = count($_FILES);
                $pujats = 0;

                foreach ($_FILES as $nom => $fitxer) {
                        // echo "<h1>";
                        // print_r($fitxer);
                        // echo "</h1>";
                        echo $nom . "<br>"; // servira per saber si es adjunt o fitxer principal
                        if (isset($fitxer["name"]) && $fitxer["name"] != "") {
                                $pujats++;
                        }
                }

                echo "El formulari en conte: " . $tope . " i nomes han enviat: " . $pujats;
                die;




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


                $idPractica = $this->index_model->insert_practiquesImatge($usr->username);
                mkdir('../../../uploads/' . $idPractica, 0777);


                $config['upload_path']          = '../../../uploads/' . $idPractica;
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
                                //$prova = $this->upload->do_upload('file_name');
                                //print_r($prova);
                                //die;

                                foreach ($tags_enviats as &$valor) {
                                        $tagValue = $this->index_model->getTagId($valor);
                                        $tagId = $tagValue['id'];
                                        $datatag = array(
                                                'tag_id' => $tagId,
                                                'practica_id' => $idPractica,
                                        );
                                        $this->db->insert('tag_practica', $datatag);
                                }

                                //print_r($data1['upload_data']['file_name']);
                                //die;

                                //----------------------------------------------------------------------------
                                $data1 = array('upload_data' => $this->upload->data());
                                //die($data1['upload_data']['file_name']);
                                $nomficher = $data1['upload_data']['file_name'];
                                $datanomficher = array(
                                        'nom' => $nomficher,
                                        'id_practiques' => $idPractica,
                                );
                                $this->db->insert('nom_practiques', $datanomficher);
                                //----------------------------------------------------------------------------

                                if ($this->ion_auth->logged_in()) {
                                        $groupadmin = 'admin';
                                        $groupprofe = 'profesor';
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
                                $groupadmin = 'admin';
                                $groupprofe = 'profesor';
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


        public function indexVideo($idPractica)
        {
                $this->load->library('ion_auth');
                $data['controller'] = $this;
                $data["cat"] = $this->index_model->get_fills(NULL);
                $data['user'] =  $this->ion_auth->user()->row();

                if ($this->ion_auth->logged_in()) {
                        $groupadmin = 'admin';
                        $groupprofe = 'profesor';
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


                $idPractica = $this->index_model->insert_practicaVideobd($usr->username);
                mkdir('../../../uploads/' . $idPractica, 0777);

                $config['upload_path']          = '../../../uploads/' . $idPractica;
                $config['allowed_types']        = 'mp4';
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
                                if (is_array($tags_enviats)) :
                                        foreach ($tags_enviats as &$valor) {
                                                $tagValue = $this->index_model->getTagId($valor);
                                                $tagId = $tagValue['id'];
                                                $datatag = array(
                                                        'tag_id' => $tagId,
                                                        'practica_id' => $idPractica,
                                                );
                                                $this->db->insert('tag_practica', $datatag);
                                        }
                                endif;

                                //----------------------------------------------------------------------------
                                $data1 = array('upload_data' => $this->upload->data());
                                //die($data1['upload_data']['file_name']);
                                $nomficher = $data1['upload_data']['file_name'];
                                $datanomficher = array(
                                        'nom' => $nomficher,
                                        'id_practiques' => $idPractica,
                                );
                                $this->db->insert('nom_practiques', $datanomficher);
                                //----------------------------------------------------------------------------


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
        //---------------------------------------------------------------------------------------------

        public function veurecursos($slug = NULL)
        {
                $user = $this->ion_auth->user()->row();
                //$id = $user->id;
                $data["info_user"] = $user;
                $data['user'] =  $this->ion_auth->user()->row();
                //print_r('ljvsnlfv');
                //die;
                $data['news_item'] = $this->index_model->get_practiques($slug);
                //$data['title'] = $data['news_item'];


                if ($this->ion_auth->logged_in()) {

                        $groupadmin = 'admin';
                        $groupprofe = 'profesor';
                        $groupalumne = 'alumne';

                        if ($this->ion_auth->in_group($groupadmin)) {
                                $this->load->view('templates/header_privat', $data);
                                $this->load->view('pages/veurecursos', $data);
                                $this->load->view('templates/footer', $data);
                        } else if ($this->ion_auth->in_group($groupprofe)) {
                                $this->load->view('templates/header_profe', $data);
                                $this->load->view('pages/veurecursos', $data);
                                $this->load->view('templates/footer', $data);
                        } else if ($this->ion_auth->in_group($groupalumne)) {
                                $this->load->view('templates/header_alumne', $data);
                                $this->load->view('pages/veurecursos', $data);
                                $this->load->view('templates/footer', $data);
                        }
                }
        }



        public function practicaPissarra()
        {
                if (!$this->ion_auth->logged_in()) {
                        //cap a login
                        return;
                }



                $data['autor'] = $this->config->item("copy");
                $data['user'] =  $this->ion_auth->user()->row();
                $data['controller'] = $this;
                $data["cat"] = $this->index_model->get_fills(NULL);

                $usr = $this->ion_auth->user()->row();
                $data['user'] = $usr;



                $groupprofe = 'profesor';
                $groupadmin = 'admin';
                if ($this->ion_auth->in_group($groupprofe)) {
                        $this->load->view('templates/header_profe', $data);
                        $this->load->view('pages/practicaPissarra', $data);
                        $this->load->view('templates/footer', $data);
                } else   if ($this->ion_auth->in_group($groupadmin)) {
                        $this->load->view('templates/header_privat', $data);
                        $this->load->view('pages/practicaPissarra', $data);
                        $this->load->view('templates/footer', $data);
                }


                if (isset($_POST["imagenFinal"])) {

                        $idPractica = $this->index_model->insert_practicaPissarra($usr->username);

                        $base64 = $_POST["imagenFinal"];
                        $name = 'pissarra.png';

                        $datosBase64 = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $base64));

                        $path = '../../../uploads/' . $idPractica . '/';
                        mkdir($path, 0777);

                        $pathFile = $path . '/' . $name;

                        if (!file_put_contents($pathFile, $datosBase64)) {
                                echo "Error";
                        }
                        $tags_enviats = $this->input->post("tagsphp");
                        if (is_array($tags_enviats)) :
                                foreach ($tags_enviats as &$valor) {
                                        $tagValue = $this->index_model->getTagId($valor);
                                        $tagId = $tagValue['id'];
                                        $datatag = array(
                                                'tag_id' => $tagId,
                                                'practica_id' => $idPractica,
                                        );
                                        $this->db->insert('tag_practica', $datatag);
                                }
                        endif;


                        $nomficher = $name;
                        $datanomficher = array(
                                'nom' => $nomficher,
                                'id_practiques' => $idPractica,
                        );
                        $this->db->insert('nom_practiques', $datanomficher);
                }
        }


        //--------------------------------------------------------------------------------------------------
        // $route['plantillaimatge/(:any)'] = 'Upload/plantillaimatge/$1';
        public function plantillaimatge($slugid = NULL)
        {
                $user = $this->ion_auth->user()->row();
                //$id = $user->id;
                $data["info_user"] = $user;
                $data['user'] =  $this->ion_auth->user()->row();
                $usr = $this->ion_auth->user()->row();
                $data['user'] = $usr;

                $data['news_item'] = $this->index_model->get_practiques_plantillaimatge($slugid);
                $idfitxer2 = $data['news_item'][0]['id'];
                $data['nomfitxer'] = $this->index_model->getNomFitxer2($idfitxer2);
                $slugmostrartag = $data['news_item'][0]['id'];
                $data['nomtags'] = $this->index_model->get_practiques_mostrartags($slugmostrartag);

                if ($this->ion_auth->logged_in()) {

                        $groupadmin = 'admin';
                        $groupprofe = 'profesor';
                        $groupalumne = 'alumne';

                        $tipus_recurs = $data['news_item'][0]['tipus_recurs'];
                        $infografia = 'imatge';
                        $linkvideo = 'videorecurs';
                        $video = 'video';
                        $pissarra = 'pissarra';

                        if ($this->ion_auth->in_group($groupadmin)) {
                                if ($tipus_recurs == $infografia) {
                                        $this->load->view('templates/header_privat', $data);
                                        $this->load->view('pages/plantillaimatge', $data);
                                        $this->load->view('templates/footer', $data);
                                } else if ($tipus_recurs == $linkvideo) {
                                        $this->load->view('templates/header_privat', $data);
                                        $this->load->view('pages/plantillavideorecurs', $data);
                                        $this->load->view('templates/footer', $data);
                                } else if ($tipus_recurs == $video) {
                                        $this->load->view('templates/header_privat', $data);
                                        $this->load->view('pages/plantillavideo', $data);
                                        $this->load->view('templates/footer', $data);
                                } else if ($tipus_recurs == $pissarra) {
                                        $this->load->view('templates/header_privat', $data);
                                        $this->load->view('pages/plantillapisarra', $data);
                                        $this->load->view('templates/footer', $data);
                                }
                        } else if ($this->ion_auth->in_group($groupprofe)) {
                                if ($tipus_recurs == $infografia) {
                                        $this->load->view('templates/header_profe', $data);
                                        $this->load->view('pages/plantillaimatge', $data);
                                        $this->load->view('templates/footer', $data);
                                } else if ($tipus_recurs == $linkvideo) {
                                        $this->load->view('templates/header_profe', $data);
                                        $this->load->view('pages/plantillavideorecurs', $data);
                                        $this->load->view('templates/footer', $data);
                                } else if ($tipus_recurs == $video) {
                                        $this->load->view('templates/header_profe', $data);
                                        $this->load->view('pages/plantillavideo', $data);
                                        $this->load->view('templates/footer', $data);
                                } else if ($tipus_recurs == $pissarra) {
                                        $this->load->view('templates/header_profe', $data);
                                        $this->load->view('pages/plantillapisarra', $data);
                                        $this->load->view('templates/footer', $data);
                                }
                        } else if ($this->ion_auth->in_group($groupalumne)) {
                                if ($tipus_recurs == $infografia) {
                                        $this->load->view('templates/header_alumne', $data);
                                        $this->load->view('pages/plantillaimatge', $data);
                                        $this->load->view('templates/footer', $data);
                                } else if ($tipus_recurs == $linkvideo) {
                                        $this->load->view('templates/header_alumne', $data);
                                        $this->load->view('pages/plantillavideorecurs', $data);
                                        $this->load->view('templates/footer', $data);
                                } else if ($tipus_recurs == $video) {
                                        $this->load->view('templates/header_alumne', $data);
                                        $this->load->view('pages/plantillavideo', $data);
                                        $this->load->view('templates/footer', $data);
                                } else if ($tipus_recurs == $pissarra) {
                                        $this->load->view('templates/header_alumne', $data);
                                        $this->load->view('pages/plantillapisarra', $data);
                                        $this->load->view('templates/footer', $data);
                                }
                        }
                }
        }

        //---------------------------------------------------------------------------------
        public function download($idPractica, $idfitxer)
        {
                $this->load->helper('download');
                $nomfitxer = $this->index_model->getNomFitxer($idfitxer);
                //print_r($nomfitxer[0]['id']);
                //die;                
                $ruta = '../../../uploads/' . $idPractica . '/' . $nomfitxer[0]['nom'];
                force_download($ruta,  NULL);
        }

        //---------------------------------------------------------------------------------
        public function modificarPractica($slugmodificar = NULL)
        {

                $user = $this->ion_auth->user()->row();
                //$id = $user->id;
                $data["info_user"] = $user;
                $data['user'] =  $this->ion_auth->user()->row();

                if ($this->ion_auth->logged_in()) {

                        $data['practiques'] = $this->index_model->get_practiques_modificar($slugmodificar);
                        //print_r($data['practiques']);
                        //die;
                        $groupadmin = 'admin';
                        $groupprofe = 'profesor';

                        if ($this->ion_auth->in_group($groupadmin)) {
                                $this->load->view('templates/header_privat', $data);
                                $this->load->view('pages/modificarPractica', $data);
                                $this->load->view('templates/footer', $data);
                        } else if ($this->ion_auth->in_group($groupprofe)) {
                                $this->load->view('templates/header_profe', $data);
                                $this->load->view('pages/modificarPractica', $data);
                                $this->load->view('templates/footer', $data);
                        }
                }
        }
        //---------------------------------------------------------------------------------

        public function plantillamodificar($slugid = NULL)
        {
                $user = $this->ion_auth->user()->row();
                $id = $user->id;
                $data["info_user"] = $user;
                $data['user'] =  $this->ion_auth->user()->row();
                $usr = $this->ion_auth->user()->row();
                $data['user'] = $usr;

                $data['news_item'] = $this->index_model->get_practiques_plantillaimatge($slugid);
                $idfitxer2 = $data['news_item'][0]['id'];
                $data['nomfitxer'] = $this->index_model->getNomFitxer2($idfitxer2);
                $slugmostrartag = $data['news_item'][0]['id'];
                $data['nomtags'] = $this->index_model->get_practiques_mostrartags($slugmostrartag);

                //$data['provamostrartags'] = $this->index_model->prova_mostrar_tags();

                $data["totselstags"] = $this->index_model->prova_mostrar_tags();
                //print_r($data["totselstags"]);
                //die;


                // $os = $data["totselstags"];
                // if (in_array("gs", $os)) {
                //         echo "Existe Irix";
                // }
                // if (in_array("mac", $os)) {
                //         echo "Existe mac";
                // }





                if ($this->ion_auth->logged_in()) {

                        $groupadmin = 'admin';
                        $groupprofe = 'profesor';
                        $groupalumne = 'alumne';

                        $tipus_recurs = $data['news_item'][0]['tipus_recurs'];
                        $infografia = 'imatge';
                        $linkvideo = 'videorecurs';
                        $video = 'video';
                        $pissarra = 'pissarra';


                        //------------------------------------------------------------------------------------
                        if ($tipus_recurs == $infografia) {
                                $titul = $this->input->post('modificartitul');
                                $descripcio = $this->input->post('modificardescripcio');
                                $explicacio = $this->input->post('modificarexplicacio');
                                $datacontingut = array(
                                        'titul' => $titul,
                                        'descripcio' => $descripcio,
                                        'explicacio' => $explicacio,
                                );

                                $this->db->where('id', $slugid);
                                $this->db->update('practiques', $datacontingut);
                                //print_r($slugid);
                                //die;

                                $this->form_validation->set_rules('titul', 'descripcio ', 'explicacio');
                                if ($this->form_validation->run() === TRUE) {
                                        redirect(base_url('modificarPractica'));
                                }
                        }
                        //------------------------------------------------------------------------------------

                        //------------------------------------------------------------------------------------
                        else if ($tipus_recurs == $linkvideo) {
                                $titul = $this->input->post('modificartitul');
                                $descripcio = $this->input->post('modificardescripcio');
                                $explicacio = $this->input->post('modificarexplicacio');
                                $modificarlinkvideo = $this->input->post('modificarlink');
                                $datacontingut = array(
                                        'titul' => $titul,
                                        'descripcio' => $descripcio,
                                        'explicacio' => $explicacio,
                                        'material' => $modificarlinkvideo,
                                );

                                $this->db->where('id', $slugid);
                                $this->db->update('practiques', $datacontingut);
                                //print_r($slugid);
                                //die;

                                $this->form_validation->set_rules('titul', 'descripcio ', 'explicacio');
                                if ($this->form_validation->run() === TRUE) {
                                        redirect(base_url('modificarPractica'));
                                }
                        }
                        //------------------------------------------------------------------------------------

                        //------------------------------------------------------------------------------------
                        else if ($tipus_recurs == $pissarra) {
                                $titul = $this->input->post('modificartitul');
                                $descripcio = $this->input->post('modificardescripcio');
                                $explicacio = $this->input->post('modificarexplicacio');
                                $datacontingut = array(
                                        'titul' => $titul,
                                        'descripcio' => $descripcio,
                                        'explicacio' => $explicacio,
                                );

                                $this->db->where('id', $slugid);
                                $this->db->update('practiques', $datacontingut);
                                //print_r($slugid);
                                //die;

                                $this->form_validation->set_rules('titul', 'descripcio ', 'explicacio');
                                if ($this->form_validation->run() === TRUE) {
                                        redirect(base_url('modificarPractica'));
                                }
                        }
                        //------------------------------------------------------------------------------------

                        //------------------------------------------------------------------------------------
                        else if ($tipus_recurs == $video) {
                                $titul = $this->input->post('modificartitul');
                                $descripcio = $this->input->post('modificardescripcio');
                                $explicacio = $this->input->post('modificarexplicacio');
                                $datacontingut = array(
                                        'titul' => $titul,
                                        'descripcio' => $descripcio,
                                        'explicacio' => $explicacio,
                                );

                                $this->db->where('id', $slugid);
                                $this->db->update('practiques', $datacontingut);
                                //print_r($slugid);
                                //die;

                                $this->form_validation->set_rules('titul', 'descripcio ', 'explicacio');
                                if ($this->form_validation->run() === TRUE) {
                                        redirect(base_url('modificarPractica'));
                                }
                        }
                        //------------------------------------------------------------------------------------


                        if ($this->ion_auth->in_group($groupadmin)) {
                                if ($tipus_recurs == $infografia) {
                                        $this->load->view('templates/header_privat', $data);
                                        $this->load->view('pages/plantillamodificarimatge', $data);
                                        $this->load->view('templates/footer', $data);
                                } else if ($tipus_recurs == $linkvideo) {
                                        $this->load->view('templates/header_privat', $data);
                                        $this->load->view('pages/plantillavideorecurs', $data);
                                        $this->load->view('templates/footer', $data);
                                } else if ($tipus_recurs == $video) {
                                        $this->load->view('templates/header_privat', $data);
                                        $this->load->view('pages/plantillavideo', $data);
                                        $this->load->view('templates/footer', $data);
                                } else if ($tipus_recurs == $pissarra) {
                                        $this->load->view('templates/header_privat', $data);
                                        $this->load->view('pages/plantillapisarra', $data);
                                        $this->load->view('templates/footer', $data);
                                }
                        } else if ($this->ion_auth->in_group($groupprofe)) {
                                if ($tipus_recurs == $infografia) {
                                        $this->load->view('templates/header_profe', $data);
                                        $this->load->view('pages/plantillamodificarimatge', $data);
                                        $this->load->view('templates/footer', $data);
                                } else if ($tipus_recurs == $linkvideo) {
                                        $this->load->view('templates/header_profe', $data);
                                        $this->load->view('pages/plantillamodificarvideorecurs', $data);
                                        $this->load->view('templates/footer', $data);
                                } else if ($tipus_recurs == $video) {
                                        $this->load->view('templates/header_profe', $data);
                                        $this->load->view('pages/plantillamodificarfichervideo', $data);
                                        $this->load->view('templates/footer', $data);
                                } else if ($tipus_recurs == $pissarra) {
                                        $this->load->view('templates/header_profe', $data);
                                        $this->load->view('pages/plantillamodificarpissarra', $data);
                                        $this->load->view('templates/footer', $data);
                                }
                        } else if ($this->ion_auth->in_group($groupalumne)) {
                                if ($tipus_recurs == $infografia) {
                                        $this->load->view('templates/header_alumne', $data);
                                        $this->load->view('pages/plantillaimatge', $data);
                                        $this->load->view('templates/footer', $data);
                                } else if ($tipus_recurs == $linkvideo) {
                                        $this->load->view('templates/header_alumne', $data);
                                        $this->load->view('pages/plantillavideorecurs', $data);
                                        $this->load->view('templates/footer', $data);
                                } else if ($tipus_recurs == $video) {
                                        $this->load->view('templates/header_alumne', $data);
                                        $this->load->view('pages/plantillavideo', $data);
                                        $this->load->view('templates/footer', $data);
                                } else if ($tipus_recurs == $pissarra) {
                                        $this->load->view('templates/header_alumne', $data);
                                        $this->load->view('pages/plantillapisarra', $data);
                                        $this->load->view('templates/footer', $data);
                                }
                        }
                }
        }

        public function modificarplantilla($slugid = NULL)
        {

                $data['user'] =  $this->ion_auth->user()->row();
                $data['news_item'] = $this->index_model->get_practiques_plantillaimatge($slugid);

                $id = $data['news_item'];
                $titul = $this->input->post('titul');
                $descripcio = $this->input->post('descripciocurta');
                $explicacio = $this->input->post('descripciollarga');

                if ($this->ion_auth->logged_in($data['user']->username)) {
                        if ($titul == $titul || $titul != $titul) {
                                $data = array(
                                        'titul' => $titul,
                                        'descripcio' => $descripcio,
                                        'explicacio' => $explicacio,
                                );
                        }
                }

                $this->ion_auth->update($id, $data);
                if ($this->ion_auth->logged_in($data['user']->username)) {
                        if ($titul == $titul || $titul != $titul) {
                                redirect(base_url('modificarPractica'));
                        }
                }
        }
}
