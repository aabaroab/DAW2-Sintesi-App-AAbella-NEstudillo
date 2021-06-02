<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class sintesis_api extends API_Controller { 

   public function __construct () 
   { 
      parent::__construct ();
   } 

   public function index_get ()
   {
      $this->load->model('practiques');

      $practiques=$this->practiques->get_practiques($slug);
      $this->response($practiques, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
   }
public function index_delete()
   {
      $this->load->model('practiques');

      $id= $this->delete('id',true); // true for XSS Clean

      $affected_rows= $this->practiques->drop_practiques($id);

      $message = [
           'id' => $id,
           'message' => 'Resource deleted'
       ];
       $this->set_response($message, REST_Controller::HTTP_OK); // CREATED (200) being the HTTP response code
   }
   public function index_options() {
      $this->output->set_header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
      $this->output->set_header("Access-Control-Allow-Methods: GET, DELETE, OPTIONS");
      $this->output->set_header("Access-Control-Allow-Origin: *");
     
      $this->response(null, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
   }

class practiques_api extends REST_Controller{
	public function __construct(){
		parent::__construct();

		$this->load->database();
		$this->load->model('practiques');
	}
	public function practiques_get(){
		$this->response($this->practiques->findAll());
	}
}
