<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginController extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
	}

	public function index()
	{
		$this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        
		$this->load->view('login');
	}

	public function login()
	{
		$userid = $this->input->post('userid');
		$password = $this->input->post('password');
		$this->load->model('mymodel');
		$result = $this->mymodel->get_entries($userid,$password);
		if (isset($result)) {
			$userdata = array(
				'userid' => $result->user_id,
				'password' => $result->password
			);
			
			$this->session->set_userdata($userdata);
			redirect('SiteController');
		}else{
			redirect();
		}
	}
}
