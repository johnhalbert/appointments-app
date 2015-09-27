<?php

	class Appointments extends CI_Controller {

		public function __construct() {
			parent::__construct();
			$this->load->model('Appointment');
		}

		public function index() {
			$this->load->view('main');
		}

		public function show_appointments() {
			if ($this->session->userdata('logged_in')) {
				$user = $this->Appointment->get_userdata();
				$appointments = $this->Appointment->get_appointments($this->session->userdata('user_id'));
				$this->load->view('appointments', array('appointments' => $appointments, 'user' => $user));
			} else {
				redirect(base_url());
			}
		}

		public function add() {
			if ($this->Appointment->add($this->input->post())) {
				redirect(base_url().'appointments');
			} else {
				$this->session->set_flashdata('errors', "Time Cannot Be Before Today's Date");
				redirect(base_url().'appointments');
			}
		}

		public function register() {
			if ($this->Appointment->register($this->input->post())) {
				redirect(base_url().'appointments');
			} else {
				redirect(base_url());
			}
		}

		public function login() {
			if ($this->Appointment->login($this->input->post())) {
				redirect(base_url().'appointments');
			} else {
				redirect(base_url());
			}
		}

		public function logout() {
			session_destroy();
			redirect(base_url());
		}

		public function delete($id) {
			if ($this->session->userdata('logged_in')) {
				$this->Appointment->delete($id);
				redirect(base_url().'appointments');
			} else {
				redirect(base_url());
			}
		}

		public function edit($id) {
			if ($this->session->userdata('logged_in')) {
				$user = $this->Appointment->get_userdata();
				$appointments = $this->Appointment->get_appointments($this->session->userdata('user_id'));
				$edit = $this->Appointment->get_appointment($id);
				$this->load->view('edit', array('appointments' => $appointments, 'user' => $user, 'edit' => $edit));
			} else {
				redirect(base_url());
			}
		}

		public function appointment_edit() {
			if ($this->Appointment->edit($this->input->post())) {
				redirect(base_url().'appointments');
			} else {
				echo "Something went wrong";
				die();
			}
		}


	}


?>