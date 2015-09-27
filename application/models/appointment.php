<?php

class Appointment extends CI_Model {

	public function add($post) {
		$time = $post['date']." ".$post['time'];
		$date = getdate();
		$date = date('Y-m-d H:i', $date[0]);
		if ($date > $time) {
			return false;
		} else {
			$id = intval($this->session->userdata('user_id'));
			$query = 'INSERT INTO appointments (app_datetime, tasks, user_id, created_at, updated_at) VALUES (?, ?, ?, NOW(), NOW())';
			if ($this->db->query($query, array($time, $post['tasks'], $id))) {
				return true;
			} else {
				return false;
			}
		}
	}	

	public function get_appointments($id) {
		$query = "SELECT appointments.id as app_id, app_datetime, appointments.user_id, appointments.tasks  FROM appointments WHERE user_id = ?";
		$appointments = $this->db->query($query, $this->session->userdata('user_id'))->result_array();
		return $appointments;
	}

	public function get_appointment($id) {
		$query = "SELECT appointments.id as app_id, app_datetime, appointments.user_id, appointments.tasks FROM appointments  WHERE appointments.id = ?";
		return $this->db->query($query, array($id))->row_array();
	}

	public function delete($post) {
		$query = 'DELETE FROM appointments WHERE id = ?';
		$this->db->query($query, intval($post));
	}

	public function login($post) {
		if ($post) {
			$this->load->library('form_validation');
			$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
			$this->form_validation->set_rules('password', 'Password', 'required|trim|md5');
			if ($this->form_validation->run()) {
				$query = "SELECT email, id, password FROM users WHERE email = ? AND password = ?";
				$user = $this->db->query($query, array($post['email'], md5($post['password'])))->row_array();
			}
			if (empty($user)) {
				$this->session->set_flashdata('errors', 'Login failed');
				return false;
			} else {
				$this->session->set_userdata('user_id', $user['id']);
				$this->session->set_userdata('logged_in', true);
				return true;
			}
		}
	}

	public function register($post) {
		if ($post) {
			$this->load->library('form_validation');
			$this->form_validation->set_rules('name', 'Name', 'required|trim');
			$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
			$this->form_validation->set_rules('password', 'Password', 'required|trim|md5');
			$this->form_validation->set_rules('confirm_pw', 'Confirm PW', 'required|trim|md5|matches[password]');
			$this->form_validation->set_rules('dob', 'Date of Birth', 'required');
			if ($this->form_validation->run()) {
				$query = "SELECT email FROM users WHERE email = ?";
				$email = $this->db->query($query, array($post['email']))->row_array();
				if(!empty($email['email'])) {
					$this->session->set_flashdata('errors', 'User already exists!');
					return false;
				} else {
					$query = "INSERT INTO users (name, email, password, dob, created_at, updated_at) VALUES (?, ?, ?, ?, NOW(), NOW())";
					if ($this->db->query($query, array($post['name'], $post['email'], md5($post['password']), $post['dob']))) {
						$query = "SELECT id FROM users WHERE email = ?";
						$id = $this->db->query($query, array($post['email']))->row_array();
						$this->session->set_userdata('user_id', $id['id']);
						$this->session->set_userdata('logged_in', true);
						return true;
					}
				} } else {
					$this->session->set_flashdata('errors', validation_errors());
					return false;
				}

			
		} else {
			$this->session->set_flashdata('errors', 'Form empty');
			return false;
		}

	}

	public function get_userdata() {
		$query = "SELECT * FROM users WHERE id = ?";
		return $this->db->query($query, array(intval($this->session->userdata('user_id'))))->row_array();
	}

	public function edit($post) {
		$time = $post['date']." ".$post['time'];
		$date = getdate();
		$date = date('m/d/Y H:i:s', $date[0]);
		if ($date > $time) {
			$this->session->set_flashdata('errors', "Time Cannot Be Before Today's Date");
			return false;
		} else {
			$id = intval($this->session->userdata('user_id'));
			$query = "UPDATE appointments SET app_datetime = ?, tasks = ?, updated_at = NOW() WHERE appointments.id = ?";
			if ($this->db->query($query, array($time, $post['tasks'], $post['app_id']))) {
				return true;
			} else {
				$this->session->set_flashdata('errors', 'There was an error with the query');
			}
		}

	}

}

?>