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
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function __construct(){
        parent::__construct();
        $this->load->model('webmodel');
		$this->load->library('form_validation');
    }
	
	public function index()
	{
		if(!$this->session->userdata('id')){
			$this->load->view('login');
		}
		else{
			$data['user'] = $this->webmodel->get_where_data('user',['id'=>$this->session->userdata('id')])->row_array();
			$data['pasien'] = count($this->webmodel->get_data('pasien'));
			$data['dokter'] = count($this->webmodel->get_data('dokter'));
			$data['periksa'] = count($this->webmodel->get_data('periksa'));
			$this->load->view('index',$data);
		}
	}

	// fungsi untuk mengarahkan ke tampilan login
	public function login_page(){
		if($this->session->userdata('id')){
			$this->load->view('welcome');
		}
		else{
			$this->load->view('login');
		}
	}

	// fungsi untuk mengarahkan ke tampilan daftar
	public function daftar_page(){
		if($this->session->userdata('id')){
			$this->load->view('welcome');
		}
		else{
			$this->load->view('daftar');
		}
	}

	// fungsi untuk mengarahkan ke tampilan data dokter
	public function data_dokter_page(){
		if($this->session->userdata('id')){
			$data['user'] = $this->webmodel->get_where_data('user',['id'=>$this->session->userdata('id')])->row_array();
			$data['dokter'] = $this->webmodel->get_data('dokter');
			$this->load->view('dokter',$data);
		}
		else{
			redirect('welcome');
		}
	}

	// fungsi untuk mengarahkan ke tampilan data pasien
	public function data_pasien_page(){
		if($this->session->userdata('id')){
			$data['user'] = $this->webmodel->get_where_data('user',['id'=>$this->session->userdata('id')])->row_array();
			$data['pasien'] = $this->webmodel->get_data('pasien');
			$this->load->view('pasien',$data);
		}
		else{
			redirect('welcome');
		}
	}

	// fungsi untuk mengarahkan ke tampilan data periksa
	public function data_periksa_page(){
		if($this->session->userdata('id')){
			$data['user'] = $this->webmodel->get_where_data('user',['id'=>$this->session->userdata('id')])->row_array();
			$data['periksa'] = $this->webmodel->get_data_periksa();
			$data['dokter'] = $this->webmodel->get_data('dokter');
			$data['pasien'] = $this->webmodel->get_data('pasien');
			$this->load->view('periksa',$data);
		}
		else{
			redirect('welcome');
		}
	}

	// fungsi untuk menangani proses daftar
	public function daftar_auth() {	
		// Aturan validasi
		$this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|alpha_numeric|is_unique[user.username]', [
			'required' => 'Username wajib diisi.',
			'min_length' => 'Username harus minimal 5 karakter.',
			'alpha_numeric' => 'Username hanya boleh mengandung huruf dan angka.',
			'is_unique' => 'Username sudah digunakan.'
		]);
		$this->form_validation->set_rules('pass', 'Password', 'required|min_length[8]', [
			'required' => 'Password wajib diisi.',
			'min_length' => 'Password harus minimal 8 karakter.'
		]);
		$this->form_validation->set_rules('konfpass', 'Konfirmasi Password', 'required|matches[pass]', [
			'required' => 'Konfirmasi Password wajib diisi.',
			'matches' => 'Konfirmasi password tidak cocok.'
		]);
	
		// Cek validasi
		if ($this->form_validation->run() == FALSE) {
			// Tampilkan form kembali dengan pesan error
			$this->load->view('daftar');
		} else {
			// Hash password dengan bcrypt
			$password = password_hash($this->input->post('pass'), PASSWORD_BCRYPT);
	
			// Data untuk disimpan
			$data = array(
				'username' => $this->input->post('username'),
				'password' => $password
			);
	
			// Simpan data ke database
			if ($this->webmodel->insert_data('user', $data)) {
				$this->session->set_flashdata('success', 'Berhasil mendaftar.');
				redirect('welcome/daftar_page');
			} else {
				$this->session->set_flashdata('error', 'Gagal menyimpan data, coba lagi.');
				redirect('welcome/daftar_page');
			}
		}
	}

	// fungsi untuk menangani proses login
	public function login_auth(){
		$this->form_validation->set_rules('username', 'Username', 'required', [
			'required' => 'Username wajib diisi.'
		]);
		$this->form_validation->set_rules('pass', 'Password', 'required', [
			'required' => 'Password wajib diisi.'
		]);
		$username = $this->input->post('username');
		$password = $this->input->post('pass');
		$user = $this->webmodel->get_where_data('user',['username'=>$username])->row_array();
		if($user){
			$pass_verify = password_verify($password,$user['password']);
			if($pass_verify){
				$data = [
					'id' => $user['id'],
					'username' => $user['username']
				];
				$this->session->set_userdata($data);
				redirect('welcome');
			}else{
				$this->session->set_flashdata('error', 'Password salah.');
				redirect('welcome');
			}
		}else{
			$this->session->set_flashdata('error', 'User tidak terdaftar.');
			redirect('welcome');
		}
	}

	// fungsi untuk menangani proses input data dokter
	public function proses_data_dokter() {

        $this->form_validation->set_rules('namaDokter', 'Nama Dokter', 'required',[
			'required' => 'Nama dokter wajib diisi.'
		]);
        $this->form_validation->set_rules('alamatDokter', 'Alamat Dokter', 'required',[
			'required' => 'Alamat dokter wajib diisi.'
		]);
        $this->form_validation->set_rules('nomorHP', 'No Handphone', 'required|numeric',[
			'required' => 'Nomor HP wajib diisi. Jika tidak ada, isi dengan nilai 0.'
		]);

        // Cek validasi
        if ($this->form_validation->run() == FALSE) {
            // Jika validasi gagal, kirimkan pesan error dalam format JSON
            $errors = array(
				'namaDokter' => strip_tags(form_error('namaDokter')),
				'alamatDokter' => strip_tags(form_error('alamatDokter')),
				'nomorHP' => strip_tags(form_error('nomorHP'))
			);
            echo json_encode(['status' => 'error', 'errors' => $errors]);
        } else {
            // Jika validasi berhasil, lakukan proses penyimpanan data
            $data = array(
                'nama' => $this->input->post('namaDokter'),
                'alamat' => $this->input->post('alamatDokter'),
                'no_hp' => $this->input->post('nomorHP')
			);

            // Simpan data ke database
            $this->webmodel->insert_data('dokter',$data);

            // Kirim respons sukses
            echo json_encode(['status' => 'success', 'message' => 'Data berhasil disimpan']);
        }
    }

	// fungsi untuk menangani proses input data pasien
	public function proses_data_pasien() {

        $this->form_validation->set_rules('namaPasien', 'Nama Pasien', 'required',[
			'required' => 'Nama pasien wajib diisi.'
		]);
        $this->form_validation->set_rules('alamatPasien', 'Alamat Pasien', 'required',[
			'required' => 'Alamat pasien wajib diisi.'
		]);
        $this->form_validation->set_rules('nomorHP', 'No Handphone', 'required|numeric',[
			'required' => 'Nomor HP wajib diisi. Jika tidak ada, isi dengan nilai 0.'
		]);

        // Cek validasi
        if ($this->form_validation->run() == FALSE) {
            // Jika validasi gagal, kirimkan pesan error dalam format JSON
            $errors = array(
				'namaPasien' => strip_tags(form_error('namaPasien')),
				'alamatPasien' => strip_tags(form_error('alamatPasien')),
				'nomorHP' => strip_tags(form_error('nomorHP'))
			);
            echo json_encode(['status' => 'error', 'errors' => $errors]);
        } else {
            // Jika validasi berhasil, lakukan proses penyimpanan data
            $data = array(
                'nama' => $this->input->post('namaPasien'),
                'alamat' => $this->input->post('alamatPasien'),
                'no_hp' => $this->input->post('nomorHP')
			);

            // Simpan data ke database
            $this->webmodel->insert_data('pasien',$data);

            // Kirim respons sukses
            echo json_encode(['status' => 'success', 'message' => 'Data berhasil disimpan']);
        }
    }

	// fungsi untuk menangani proses input data periksa
	public function proses_data_periksa() {

        $this->form_validation->set_rules('pasien', 'Dokter', 'required',[
			'required' => 'Pasien wajib diisi.'
		]);
        $this->form_validation->set_rules('dokter', 'Dokter', 'required',[
			'required' => 'Dokter wajib diisi.'
		]);
        $this->form_validation->set_rules('tgl', 'Tanggal Periksa', 'required',[
			'required' => 'Tanggal periksa wajib diisi.'
		]);
		$this->form_validation->set_rules('catatan', 'Catatan', 'required',[
			'required' => 'Catatan wajib diisi. Jika tidak ada, isi tanda -.'
		]);
		$this->form_validation->set_rules('obat', 'Obat', 'required',[
			'required' => 'Obat wajib diisi. Jika tidak ada, isi tanda -.'
		]);

        // Cek validasi
        if ($this->form_validation->run() == FALSE) {
            // Jika validasi gagal, kirimkan pesan error dalam format JSON
            $errors = array(
				'dokter' => strip_tags(form_error('dokter')),
				'pasien' => strip_tags(form_error('pasien')),
				'tgl' => strip_tags(form_error('tgl')),
				'catatan' => strip_tags(form_error('catatan')),
				'obat' => strip_tags(form_error('obat')),
			);
            echo json_encode(['status' => 'error', 'errors' => $errors]);
        } else {
            // Jika validasi berhasil, lakukan proses penyimpanan data
            $data = array(
                'id_dokter' => $this->input->post('dokter'),
                'id_pasien' => $this->input->post('pasien'),
                'tgl_periksa' => $this->input->post('tgl'),
                'catatan' => $this->input->post('catatan'),
                'obat' => $this->input->post('obat')
			);

            // Simpan data ke database
            $this->webmodel->insert_data('periksa',$data);

            // Kirim respons sukses
            echo json_encode(['status' => 'success', 'message' => 'Data berhasil disimpan']);
        }
    }

	// fungsi untuk menangani proses delete/menghapus data dokter
	public function delete_data_dokter(){
		$where = array(
			'id' => $this->input->post('id_dokter')
		);
		$this->webmodel->delete_data('dokter',$where);
		header('Content-Type: application/json');
		echo json_encode(['status' => 'success']);
	}

	// fungsi untuk menangani proses delete/menghapus data pasien
	public function delete_data_pasien(){
		$where = array(
			'id' => $this->input->post('id_pasien')
		);
		$this->webmodel->delete_data('pasien',$where);
		header('Content-Type: application/json');
		echo json_encode(['status' => 'success']);
	}

	// fungsi untuk menangani proses delete/menghapus data periksa
	public function delete_data_periksa(){
		$where = array(
			'id' => $this->input->post('id_periksa')
		);
		$this->webmodel->delete_data('periksa',$where);
		header('Content-Type: application/json');
		echo json_encode(['status' => 'success']);
	}

	// fungsi untuk mengambil data dokter berdasarkan id dari database
	public function get_data_dokter(){
		$id = $this->input->post('id_dokter');
		$data = $this->db->get_where('dokter', ['id' => $id])->row_array();
		echo json_encode($data);
	}

	// fungsi untuk mengambil data pasien berdasarkan id dari database
	public function get_data_pasien(){
		$id = $this->input->post('id_pasien');
		$data = $this->db->get_where('pasien', ['id' => $id])->row_array();
		echo json_encode($data);
	}

	
	// fungsi untuk mengambil data periksa berdasar id dari database
	public function get_data_periksa_spesifik() {
		$id = $this->input->post('id'); // ID untuk data periksa, jika diperlukan
	
		// Ambil data pasien dan dokter untuk dropdown
		$data['pasien'] = $this->db->get('pasien')->result_array();
		$data['dokter'] = $this->db->get('dokter')->result_array();
	
		// Jika ID dikirimkan, ambil juga data periksa berdasarkan ID
		if ($id) {
			$data['periksa'] = $this->db->get_where('periksa', ['id' => $id])->row_array();
		}
	
		// Kirim data dalam format JSON
		echo json_encode($data);
	}
	

	// fungsi untuk menangani proses update/mengubah data dokter
	public function proses_update_dokter() {

        $this->form_validation->set_rules('namaDokterUpdate', 'Nama Dokter', 'required',[
			'required' => 'Nama dokter wajib diisi.'
		]);
        $this->form_validation->set_rules('alamatDokterUpdate', 'Alamat Dokter', 'required',[
			'required' => 'Alamat dokter wajib diisi.'
		]);
        $this->form_validation->set_rules('nomorHPUpdate', 'No Handphone', 'required|numeric',[
			'required' => 'Nomor HP wajib diisi. Jika tidak ada, isi dengan nilai 0.'
		]);

        // Cek validasi
        if ($this->form_validation->run() == FALSE) {
            // Jika validasi gagal, kirimkan pesan error dalam format JSON
            $errors = array(
				'namaDokterUpdate' => strip_tags(form_error('namaDokterUpdate')),
				'alamatDokterUpdate' => strip_tags(form_error('alamatDokterUpdate')),
				'nomorHPUpdate' => strip_tags(form_error('nomorHPUpdate'))
			);
            echo json_encode(['status' => 'error', 'errors' => $errors]);
        } else {
            // Jika validasi berhasil, lakukan proses penyimpanan data
            $data = array(
                'nama' => $this->input->post('namaDokterUpdate'),
                'alamat' => $this->input->post('alamatDokterUpdate'),
                'no_hp' => $this->input->post('nomorHPUpdate')
			);

			$target = array(
				'id' => $this->input->post('id_dokter'),
			);

            // Simpan data ke database
            $this->webmodel->update_data('dokter',$data,$target);

            // Kirim respons sukses
            echo json_encode(['status' => 'success', 'message' => 'Data berhasil disimpan']);
        }
    }

	// fungsi untuk menangani proses update/mengubah data pasien
	public function proses_update_pasien() {

        $this->form_validation->set_rules('namaPasienUpdate', 'Nama Pasien', 'required',[
			'required' => 'Nama pasien wajib diisi.'
		]);
        $this->form_validation->set_rules('alamatPasienUpdate', 'Alamat Dokter', 'required',[
			'required' => 'Alamat pasien wajib diisi.'
		]);
        $this->form_validation->set_rules('nomorHPUpdate', 'No Handphone', 'required|numeric',[
			'required' => 'Nomor HP wajib diisi. Jika tidak ada, isi dengan nilai 0.'
		]);

        // Cek validasi
        if ($this->form_validation->run() == FALSE) {
            // Jika validasi gagal, kirimkan pesan error dalam format JSON
            $errors = array(
				'namaPasienUpdate' => strip_tags(form_error('namaPasienUpdate')),
				'alamatPasienUpdate' => strip_tags(form_error('alamatPasienUpdate')),
				'nomorHPUpdate' => strip_tags(form_error('nomorHPUpdate'))
			);
            echo json_encode(['status' => 'error', 'errors' => $errors]);
        } else {
            // Jika validasi berhasil, lakukan proses penyimpanan data
            $data = array(
                'nama' => $this->input->post('namaPasienUpdate'),
                'alamat' => $this->input->post('alamatPasienUpdate'),
                'no_hp' => $this->input->post('nomorHPUpdate')
			);

			$target = array(
				'id' => $this->input->post('id_pasien'),
			);

            // Simpan data ke database
            $this->webmodel->update_data('pasien',$data,$target);

            // Kirim respons sukses
            echo json_encode(['status' => 'success', 'message' => 'Data berhasil disimpan']);
        }
    }

	// fungsi untuk menangani proses update/mengubah data periksa
	public function proses_update_periksa() {

        $this->form_validation->set_rules('pasienUpdate', 'Nama Pasien', 'required',[
			'required' => 'Nama pasien wajib diisi.'
		]);
        $this->form_validation->set_rules('dokterUpdate', 'Nama Dokter', 'required',[
			'required' => 'Nama dokter wajib diisi.'
		]);
        $this->form_validation->set_rules('tanggalPeriksaUpdate', 'Tanggal Periksa', 'required',[
			'required' => 'Tanggal periksa wajib diisi.'
		]);
        $this->form_validation->set_rules('catatanUpdate', 'Catatan', 'required',[
			'required' => 'Catatan wajib diisi. Jika tidak ada, isi tanda -.'
		]);
        $this->form_validation->set_rules('obatUpdate', 'Obat', 'required',[
			'required' => 'Obat wajib diisi. Jika tidak ada, isi tanda -.'
		]);

        // Cek validasi
        if ($this->form_validation->run() == FALSE) {
            // Jika validasi gagal, kirimkan pesan error dalam format JSON
            $errors = array(
				'pasienUpdate' => strip_tags(form_error('pasienUpdate')),
				'dokterUpdate' => strip_tags(form_error('dokterUpdate')),
				'tanggalPeriksaUpdate' => strip_tags(form_error('tanggalPeriksaUpdate')),
				'catatanUpdate' => strip_tags(form_error('catatanUpdate')),
				'obatUpdate' => strip_tags(form_error('obatUpdate')),
			);
            echo json_encode(['status' => 'error', 'errors' => $errors]);
        } else {
            // Jika validasi berhasil, lakukan proses penyimpanan data
            $data = array(
                'id_dokter' => $this->input->post('dokterUpdate'),
                'id_pasien' => $this->input->post('pasienUpdate'),
                'tgl_periksa' => $this->input->post('tanggalPeriksaUpdate'),
                'catatan' => $this->input->post('catatanUpdate'),
                'obat' => $this->input->post('obatUpdate'),
			);

			$target = array(
				'id' => $this->input->post('id_periksa'),
			);

            // Simpan data ke database
            $this->webmodel->update_data('periksa',$data,$target);

            // Kirim respons sukses
            echo json_encode(['status' => 'success', 'message' => 'Data berhasil disimpan']);
        }
    }
	
	// fungsi untuk menghapus sesi user (log out) dari sistem
	public function logout(){
		$this->session->unset_userdata('id');
        $this->session->unset_userdata('username');
		redirect('welcome');
	}

}
