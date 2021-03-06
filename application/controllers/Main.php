<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends MX_Controller
{	
	function __construct()
	{
		parent::__construct(); 
		$this->load->library('auth/ion_auth');
		$this->load->model('main_model');
		$this->load->library('cart');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');


		
	}

 	function _render_page($view, $data1=null)
 	{
 	$pass = null;
	$this->load->view('header', $pass);
	$this->load->view($view, $data1);
	$this->load->view('footer', $pass);
	}

	function index()
	{	
		
			
		
		$this->_render_page('index');
	}
	function dashboard()
	{
		if($this->ion_auth->in_group(3))
		{

			redirect('/mod','refresh');
		}

		if($this->ion_auth->in_group(2))
		{
			redirect('/user','refresh');
		}
	}
	
}