<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_admin');
		$this->load->model('M_module');
		$this->load->model('M_module_detail');

		if (!$this->session->userdata('username')) {
			redirect('Auth');
		}
	}

	private function menus()
	{
		$data['get_module_role'] = $this->M_admin->get_module_role();
		$data['get_module_permission'] = $this->M_admin->get_module_permission();
		$data['get_module'] = $this->M_admin->get_module();

		return $data;
	}

	public function index()
	{
		$this->load->view('header', $this->menus());
		$this->load->view('content/admin');
		$this->load->view('footer');
	}

	public function get_data_users()
	{
		$list = $this->M_admin->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $field) {
			$no++;

			$aks = '<button class="btn btn-xs btn-danger" id="del_users" data-id="' . $field->id . '" 
			        data-toggle="tooltip" data-placement="top" title="detail" onClick="return false" style="padding-right:8px;">
			        Hapus</button>';

			$row = array();
			$row[] = $no;
			$row[] = $field->nama;
			$row[] = $field->username;
			$row[] = $field->id_module_role;
			$row[] = $aks;

			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->M_admin->count_all(),
			"recordsFiltered" => $this->M_admin->count_filtered(),
			"data" => $data,
		);
		//output dalam format JSON
		echo json_encode($output);
	}

	public function Assign_menu()
	{
		$this->load->view('header', $this->menus());
		$this->load->view('content/assign_menu');
		$this->load->view('footer');
	}

	public function get_module()
	{
		$list = $this->M_module->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $field) {
			$no++;

			$aks = '<button class="btn btn-xs btn-info" id="detail_module" name="edit_spp"
			  data-id="' . $field->id . '" 
			        data-toggle="tooltip" data-placement="top" title="detail" onClick="return false" style="padding-right:8px;">
			        detail</button>
					<button class="btn btn-xs btn-warning" id="edit_produk" name="edit_spp"
			  data-id="' . $field->id . '" 
			        data-toggle="tooltip" data-placement="top" title="detail" onClick="return false" style="padding-right:8px;">
			        Edit</button>
			        <button class="btn btn-danger btn-xs" id="del_module" name="del_module"
			        data-id="' . $field->id . '"
			        data-toggle="tooltip" data-placement="top" title="Pilih" style="padding-right:8px;">
			  hapus
			        </button>';

			$row = array();
			$row[] = $no;
			$row[] = $field->name;
			$row[] = $field->controller;
			$row[] = $field->position;
			$row[] = $field->have_child;
			$row[] = $field->parent;
			$row[] = $aks;

			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->M_module->count_all(),
			"recordsFiltered" => $this->M_module->count_filtered(),
			"data" => $data,
		);
		//output dalam format JSON
		echo json_encode($output);
	}

	public function simpan_newModule()
	{
		$data = [
			'name' => $this->input->post('name'),
			'controller' => $this->input->post('controller'),
			'position' => $this->input->post('position'),
			'have_child' => $this->input->post('have_child'),
			'parent' => $this->input->post('parent'),
			'created_by' => 1,
			'created_at' => date('Y-m-d H:i:s')
		];
		$result = $this->db->insert('module', $data);

		echo json_encode($result);
	}

	public function simpan_newModulePermission()
	{
		$data = [
			'id_module_role' => $this->input->post('module_role'),
			'id_module' => $this->input->post('module')
		];
		$result = $this->db->insert('module_permission', $data);

		echo json_encode($result);
	}

	// public function update_dataproduk()
	// {
	// 	$data_save['kode_barang'] = $this->input->post('kode_barang');
	// 	$data_save['nama_barang'] = $this->input->post('nama_barang');
	// 	$data_save['kode_ukuran'] = $this->input->post('kode_ukuran');
	// 	$data_save['kode_warna'] = $this->input->post('kode_warna');
	// 	$data_save['harga'] = $this->input->post('harga');
	// 	$data_save['harga_dasar'] = $this->input->post('harga_dasar');

	// 	$update_dataproduk = $this->M_admin->update_dataproduk($data_save);

	// 	echo json_encode($update_dataproduk);
	// }

	public function del_users()
	{
		$id = $this->input->post('id');

		$return = $this->M_admin->del_datausers($id);

		echo json_encode($return);
	}

	public function del_module()
	{
		$id = $this->input->post('id');

		$return = $this->M_module->del_module($id);

		echo json_encode($return);
	}

	public function get_detail_module()
	{
		$id = $this->input->post('id');

		$list = $this->M_module_detail->get_datatables($id);
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $field) {
			$no++;

			$aks = '<button class="btn btn-xs btn-warning" id="edit_produk" name="edit_spp"
			  data-id="' . $field->id . '" 
			        data-toggle="tooltip" data-placement="top" title="detail" onClick="return false" style="padding-right:8px;">
			        Edit</button>
			        <button class="btn btn-danger btn-xs" id="del_module" name="del_module"
			        data-id="' . $field->id . '"
			        data-toggle="tooltip" data-placement="top" title="Pilih" style="padding-right:8px;">
			  hapus
			        </button>';

			$row = array();
			$row[] = $no;
			$row[] = $field->id_module_role;
			$row[] = $field->id_module;
			$row[] = $aks;

			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->M_module_detail->count_all($id),
			"recordsFiltered" => $this->M_module_detail->count_filtered($id),
			"data" => $data,
		);
		//output dalam format JSON
		echo json_encode($output);
	}

	public function AboutUs()
	{
		$this->load->view('header', $this->menus());
		$this->load->view('content/about_us');
		$this->load->view('footer');
	}
}
