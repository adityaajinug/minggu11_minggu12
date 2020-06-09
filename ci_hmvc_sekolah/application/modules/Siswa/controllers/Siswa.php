<?php


class Siswa extends CI_Controller {
	public function __construct()
  {
    parent::__construct();
    $this->load->model('Model_siswa');
  }
	public function index()
	{
		$data['siswa'] = $this->Model_siswa->get_data()->result();
    $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $this->load->view('view_siswa', $data);
    $this->load->view('template/footer');
	}
	// public function add()
	// {
	// 	$nama = $this->input->post('nama');
	// 	$alamat = $this->input->post('alamat');
	// 	$logo = $this->input->post('logo');

	// 	$data = array(
	// 		'nama' => $nama,
	// 		'alamat' => $alamat,
	// 		'logo' => $logo
	// 		);
	// 	$this->Model_siswa->input_data($data,'sekolah');
	// 	redirect('siswa/index');
	// }
	public function add()
	{
		$config['upload_path']   = './assets/logo';
		$config['allowed_types'] = 'jpg|png|gif';
		$config['max_size']      = '2048000';
		$config['max_width']     = '1024';
		$config['max_height']    = '768';
		$config['file_name']     = url_title($this->input->post('logo'));
		$filename = $this->upload->file_name;
		$this->upload->initialize($config);
		$this->upload->do_upload('logo');
		$data = $this->upload->data();
		
		$data = array(
			'id'          => "",
			'nama'        => $this->input->post('nama'),
			'alamat'         => $this->input->post('alamat'),
			'logo'       => $data['file_name']
		);
		$this->db->insert('sekolah',$data);
		redirect('siswa/index');
	}	
	public function delete($id)
	{
		$where = array('id' => $id);
		$this->Model_siswa->delete_data($where,'sekolah');
		redirect('siswa/index');
	}
	public 	function edit($id)
	{
		$where = array('id' => $id);
		$data['siswa'] = $this->Model_siswa->edit_data($where,'sekolah')->result();
		$this->load->view('template/header');
    $this->load->view('template/sidebar');
    $this->load->view('view_edit', $data);
    $this->load->view('template/footer');
	}
	public function update()
	{
		$config['upload_path']   = './assets/logo';
		$config['allowed_types'] = 'jpg|png|gif';
		$config['max_size']      = '2048000';
		$config['max_width']     = '1024';
		$config['max_height']    = '768';
		$config['file_name']     = url_title($this->input->post('logo'));
		$filename = $this->upload->file_name;
		$this->upload->initialize($config);
		$this->upload->do_upload('logo');
		$data = $this->upload->data();

		$id = $this->input->post('id');
		$data = array(
			'nama'        => $this->input->post('nama'),
			'alamat'     => $this->input->post('alamat'),
			'logo'       => $data['file_name']
		);

		$this->db->where('id',$id); 
			$this->db->update('sekolah',$data); 
			redirect('siswa/index');

	}
	// public function pdf($id)
	// {
	// 	$this->load->library('dompdf_gen');
	// 	$where = array('id' => $id);
	// 	$data['siswa'] = $this->Model_siswa->pdf_data($where,'sekolah');
	// 	$this->load->view('pdf', $data);
	// 	$paper_size = 'A4';
	// 	$orientation = 'potrait';
	// 	$html = $this->get_output();
	// 	$this->dompdf->set_paper($paper_size,$orientation);
	// 	$this->dompdf->load_html($html);
	// 	$this->dompdf->render();
	// 	$this->dompdf->stream("siswa.pdf", array('Attachment =>0'));
	// }
	public function pdf($id_pdf)
	{
		$this->load->library('dompdf_gen');
		$data['siswa'] = $this->db->get_where('sekolah', ['id' => $id_pdf])->row();
		$this->load->view('pdf', $data);
		$paper_size = 'A4';
		$orientation = 'potrait';
		$html = $this->output->get_output();
		$this->dompdf->set_paper($paper_size,$orientation);
		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream("siswa.pdf", array('Attachment =>1'));
	}
	public function download($id_pdf)
	{
		$this->load->library('dompdf_gen');
		$data['siswa'] = $this->db->get_where('sekolah', ['id' => $id_pdf])->row();
		$this->load->view('download', $data);
		$paper_size = 'A4';
		$orientation = 'potrait';
		$html = $this->output->get_output();
		$this->dompdf->set_paper($paper_size,$orientation);
		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream("siswa.pdf", array('Attachment =>1'));
	}
}
