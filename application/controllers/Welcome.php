<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
	public function index()
	{
		$this->load->model('contact');
        $data['contacts']=$this->contact->get_contact();

        $this->load->view('home', $data);
	}

	public function input_form(){
		$this->load->view('input_form');
	}

	public function edit_form($id){
		$contactDetail = $this->contact->get_contactDetail($id);
		// echo "<pre>";
		// print_r($contactDetail);
		// echo "</pre>";

		$data = array('contacts' => $contactDetail);
		$this->load->view('edit_form', $data);
	}
	public function add(){
        $name = $this->input->post('name');
        $phone = $this->input->post('phone');

        $data = array(
            'name' => $name,
            'phone' => $phone,
        );
        // echo "<pre>";
		// print_r($data);
		// echo "</pre>";
		$this->contact->input_data($data);
        redirect(base_url('Welcome'));
    }
	public function edit(){
		$id = $this->input->post('id');
		$name = $this->input->post('name');
        $phone = $this->input->post('phone');

        $data = array(
            'name' => $name,
            'phone' => $phone,
        );
		$this->contact->edit_data($data, $id);
        redirect(base_url());
	}
	public function delete($id){
		$this->contact->delete_data($id);
		redirect(base_url());
	}
}
