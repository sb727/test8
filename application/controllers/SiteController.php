<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SiteController extends CI_Controller {

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
		$this->load->model('mymodel');
		$description = $this->input->post('description');
		$id = $this->input->get('id');
		$ajax = $this->input->get('ajax');
		if (isset($ajax) && $ajax)  {
			$hotels = $this->mymodel->get_book($this->input->post('description'));
			$data['hotels'] = $hotels;
			$this->load->view('viewbook',$data);
		}else{
			if(isset($id)) {
				$hotel = $this->mymodel->disp_hotel($this->input->get('id'));
				$data['hotel'] = $hotel;
				$this->load->view('onehotel',$data);
			}else{
				$this->load->view('header');
				if(!isset($description))
				{
					$hotels = $this->mymodel->get_hotellist();
					$data['hotels'] = $hotels;
					$this->load->view('hotellist',$data);

				}else {
					$hotels = $this->mymodel->get_book($this->input->post('description'));
					$data['hotels'] = $hotels;
					$this->load->view('viewbook',$data);
				}
				$this->load->view('footer');
			}
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('LoginController');
	}
}
