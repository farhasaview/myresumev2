    <?php

    defined('BASEPATH') or exit('No direct script access allowed');

    /**
    * Controller Admin
    *
    * Controller Admin ini berfungsi untuk memanajemen content yang akan dilihat oleh public
    *
    * @package     Controller
    * @subpackage  Admin
    * @category    Class
    * @author      Natanael Febi Aris Rinaldi
    * @version     2.1.1
    */

    class Admin extends CI_Controller {

        public function __construct() {
        parent::__construct();

        $this->isLogin();
        $this->clearCache();

            $this->load->model('ModelAdmin');
            $this->load->model('ModelPublik');
        }
        private function isLogin() {
        $isLogin = $this->session->userdata('nu_asup');
        if ($isLogin != 'admin') {
        redirect(base_url('login'));
        }
    }

    private function clearCache() {
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
        $this->output->set_header("Pragma: no-cache");
        $this->output->set_header("Access-Control-Allow-Origin: *");
    }

        public function index()
        {
            $data['content']='admin/template/wilujeung';
            $this->load->view('admin/template/body', $data);
        }

    public function all() {
        $data['all']=$this->ModelAdmin->all();
        $data['content']='admin/atur_admin/list';
        $this->load->view('admin/template/body', $data);
    }

        public function add()
        {
            $data['admin'] = array(
            'id_admin' => '',
            'username' => '',
            'password' => ''
            );
        $data['title'] = "Add Admin";
            $data['content']='admin/atur_admin/form';
            $this->load->view('admin/template/body', $data);
        }

        public function edit($id){
        $admin = $this->ModelAdmin->find($id);
        $data['admin'] = array(
        'id_admin' => $admin->id_admin,
        'username' => $admin->username,
        'password' => $admin->password
        );
        $data['title'] = "Edit admin";
        $data['content'] = 'admin/atur_admin/form';
        $this->load->view('admin/template/body', $data);
        }

        public function save() {
        $param = $this->input->post();
        if ($param['id_admin'] == "") {
        $result = $this->ModelAdmin->add($param);
        } else {
        $result = $this->ModelAdmin->edit($param);
        }
        $this->session->set_flashdata('pangbeja', '<div class="alert alert-success alert-dismissible">
                                    Saved Admin Successfully
                                    </div>');
        redirect(base_url('admin/all'));
    }

    public function delete($id) {
        $this->ModelAdmin->delete($id);
        $this->session->set_flashdata('pangbeja', '<div class="alert alert-info alert-dismissible">
                                    Deleted Admin Successfully
                                    </div>');
        redirect($_SERVER['HTTP_REFERER'],'refresh');
    }
    ##########################################################################################################
    
    public function allContent() {
        $data['isi']=$this->ModelPublik->content();
        $data['content']='admin/atur_content/list';
        $this->load->view('admin/template/body', $data);
    }

    public function editIsi($nmKolomYgInginDicari, $valueKeyword) {
        $data['d'] = $nmKolomYgInginDicari;
        $data['isi'] = $this->ModelAdmin->findIsi("tbl_content","id_content",$valueKeyword);
        $data['title'] = "Edit $nmKolomYgInginDicari";
        $data['content']='admin/atur_content/formEditContent';
        $this->load->view('admin/template/body', $data);
    }

    public function aksiEditIsi($d, $id) {
        // var_dump($d);die;
        date_default_timezone_set('Asia/Jakarta');
        $formatTgl = date('d-m-Y');
        $formatJam = date('H-i-s');
        if ($d == "logo" || $d == "img_bg_paralax" || $d == "foto_profil" || $d == "img_bg_contact") {
        $data = ["$d" => $this->uploadkeun( $d, "images", date($formatTgl) . "ISI" . date($formatJam) )];
        } else if ($d == "file_cv"){
        $data = ["$d" => $this->uploadkeun( $d, "documents", date($formatTgl) . "CV" . date($formatJam) )];
        } else {
        $data = ["$d" => $this->input->post('content')];
        }
        // echo "<pre>";
        // print_r($data);
        $this->ModelAdmin->updateData("tbl_content", $data, "id_content", $id);
        $this->session->set_flashdata('pangbeja', '<div class="alert alert-success alert-dismissible">
                                    Updated Content Successfully
                                    </div>');
        redirect(base_url('admin/allContent'));
    }

    public function uploadkeun($fileApa, $folder, $ngaranFileDirobahJadi) {
        $config['upload_path'] = './penyimpanan_file/' . $folder . '/';
        $config['allowed_types'] = 'jpg|jpeg|png|pdf';
        $config['max_size'] = '10024'; //10 MB
        $new_name = $ngaranFileDirobahJadi;
        $config['file_name'] = $new_name;
        $this->load->library('upload', $config);
        
        // menginisialisasi
        $this->upload->initialize($config);
        
        if (!$this->upload->do_upload("content")) {
        return array('error' => $this->upload->display_errors());
        } else {
        if ($fileApa == "logo" || $fileApa == "img_bg_paralax" || $fileApa == "foto_profil" || $fileApa == "img_bg_contact" || $fileApa == "capturePortfolio") {
        $gbr = $this->upload->data();
        //Compress Image
        $config['image_library']='gd2';
        $config['source_image']=$config['upload_path'].$gbr['file_name'];
        $config['create_thumb']= FALSE;
        $config['maintain_ratio']= FALSE;
        $config['quality']= '50%';
        if ($fileApa == "logo") {
            $config['width']= 200;
            $config['height']= 28;
        }
        if ($fileApa == "img_bg_paralax") {
            $config['width']= 1600;
            $config['height']= 626;
        }
        if ($fileApa == "foto_profil") {
            $config['width']= 512;
            $config['height']= 512;
        }
        if ($fileApa == "img_bg_contact") {
            $config['width']= 1280;
            $config['height']= 680;
        }
        if ($fileApa == "capturePortfolio") {
            $config['width']= 800;
            $config['height']= 482;
        }
        $config['new_image']= $config['upload_path'].$gbr['file_name'];
        $this->load->library('image_lib', $config);
        $this->image_lib->resize();
        return $gbr['file_name'];
        } if ($fileApa == "file_cv") { return $this->upload->data('file_name'); }
        }
    }

    public function setAktif($kolomYgAkanDiubah, $nilai, $id) {
        $data = [
            "$kolomYgAkanDiubah" => $nilai
        ];
        $this->ModelAdmin->updateData("tbl_content", $data, "id_content", $id);
        $this->session->set_flashdata('pangbeja', '<div class="alert alert-success alert-dismissible">
                                    Updated Content Successfully
                                    </div>');
        redirect(base_url('admin/allContent'));
    }

    public function setNonaktif($kolomYgAkanDiubah, $nilaiAsal, $nilaiTambah, $id) {
        $data = [
            "$kolomYgAkanDiubah" => $nilaiAsal.'_'.$nilaiTambah
        ];
        $this->ModelAdmin->updateData("tbl_content", $data, "id_content", $id);
        $this->session->set_flashdata('pangbeja', '<div class="alert alert-success alert-dismissible">
                                    Updated Content Successfully
                                    </div>');
        redirect(base_url('admin/allContent'));
    }

    ########################################################################################################  
    public function allFollowMe() {
        $data['all']=$this->ModelPublik->allFollowMe();
        $data['content']='admin/atur_sosmed/list';
        $this->load->view('admin/template/body', $data);
    }

    public function addSosmed() {
        $id_sosmed = $this->input->post('id_sosmed');
        $url_sosmed = $this->input->post('url_sosmed');
        $nama_sosmed = $this->input->post('nama_sosmed');
        $icon_sosmed = $this->input->post('icon_sosmed');
        $data = [
            'id_sosmed' => $id_sosmed,
            'url_sosmed' => $url_sosmed,
            'nama_sosmed' => $nama_sosmed,
            'icon_sosmed' => $icon_sosmed
        ];
        if (!empty($_POST)) {
        $this->ModelAdmin->insertData("tbl_follow_me", $data);
        $this->session->set_flashdata('pangbeja', '<div class="alert alert-success alert-dismissible">
                                    Added Social Media Successfully
                                    </div>');
        redirect(base_url('admin/allFollowMe'));
        }
        if(empty($_POST)){
        $data['title'] = "Add Social Media";
        $data['content']='admin/atur_sosmed/form_add';
        $this->load->view('admin/template/body', $data);
        }
    }

    public function editSosmed($id) {
        $data['sosmed'] = $this->ModelAdmin->findData("tbl_follow_me", "id_sosmed", $id);
        $data['title'] = "Edit Social Media";
        $data['content']='admin/atur_sosmed/form_edit';
        $this->load->view('admin/template/body', $data);
    }

    public function aksiEditSosmed($id) {
        $url_sosmed = $this->input->post('url_sosmed');
        $nama_sosmed = $this->input->post('nama_sosmed');
        $icon_sosmed = $this->input->post('icon_sosmed');
        $data = [
            'url_sosmed' => $url_sosmed,
            'nama_sosmed' => $nama_sosmed,
            'icon_sosmed' => $icon_sosmed
        ];
        $this->ModelAdmin->updateData("tbl_follow_me", $data, "id_sosmed", $id);
        $this->session->set_flashdata('pangbeja', '<div class="alert alert-success alert-dismissible">
                                    Updated Social Media Successfully
                                    </div>');
        redirect(base_url('admin/allFollowMe'));
    }

    public function deleteSosmed($id) {
        $this->ModelAdmin->deleteData("tbl_follow_me", "id_sosmed", $id);
        $this->session->set_flashdata('pangbeja', '<div class="alert alert-info alert-dismissible">
                                    Deleted Social Media Successfully
                                    </div>');
        redirect($_SERVER['HTTP_REFERER'],'refresh');
    }
    ##########################################################################################################
    public function allSkill() {
        $data['all']=$this->ModelPublik->allSkill();
        $data['content']='admin/atur_skill/list';
        $this->load->view('admin/template/body', $data);
    }

    public function editSkill($id) {
        $data['skill'] = $this->ModelAdmin->findData("tbl_skill", "id_skill", $id);
        $data['title'] = "Edit Skill Information";
        $data['content']='admin/atur_skill/form_edit';
        $this->load->view('admin/template/body', $data);
    }

    public function addSkill() {
        $id_skill = $this->input->post('id_skill');
        $nama_skill = $this->input->post('nama_skill');
        $persen_skill = $this->input->post('persen_skill');
        $data = [
            'id_skill' => $id_skill,
            'nama_skill' => $nama_skill,
            'persen_skill' => $persen_skill
        ];
        if (!empty($_POST)) {
        $this->ModelAdmin->insertData("tbl_skill", $data);
        $this->session->set_flashdata('pangbeja', '<div class="alert alert-success alert-dismissible">
                                    Added Skill Successfully
                                    </div>');
        redirect(base_url('admin/allSkill'));
        }
        if(empty($_POST)){
        $data['title'] = "Add Skill";
        $data['content']='admin/atur_skill/form_add';
        $this->load->view('admin/template/body', $data);
        }
    }

    public function aksiEditSkill($id) {
        $nama_skill = $this->input->post('nama_skill');
        $persen_skill = $this->input->post('persen_skill');
        $data = [
            'nama_skill' => $nama_skill,
            'persen_skill' => $persen_skill
        ];
        $this->ModelAdmin->updateData("tbl_skill", $data, "id_skill", $id);
        $this->session->set_flashdata('pangbeja', '<div class="alert alert-success alert-dismissible">
                                    Updated Skill Successfully
                                    </div>');
        redirect(base_url('admin/allSkill'));
    }

    public function deleteSkill($id) {
        $this->ModelAdmin->deleteData("tbl_skill", "id_skill", $id);
        $this->session->set_flashdata('pangbeja', '<div class="alert alert-info alert-dismissible">
                                    Deleted Skill Media Successfully
                                    </div>');
        redirect($_SERVER['HTTP_REFERER'],'refresh');
    }
    ########################################################################################################
    public function allPortfolio() {
        $data['all']=$this->ModelAdmin->allPortfolio();
        $data['content']='admin/atur_portfolio/list';
        $this->load->view('admin/template/body', $data);
    }

    public function addPortfolio() {
        $id_portfolio = $this->input->post('id_portfolio');
        $capture = $this->uploadkeun("capturePortfolio", "images", date("d-m-Y")."PRTFL".time());
        $nama_portfolio = $this->input->post('nama_portfolio');
        $url_portfolio = $this->input->post('url_portfolio');
        $status = 1;
        $data = [
            'id_portfolio' => $id_portfolio,
            'capture' => $capture,
            'nama_portfolio' => $nama_portfolio,
            'url_portfolio' => $url_portfolio,
            'status' => $status
        ];
        if (!empty($_POST)) {
        $this->ModelAdmin->insertData("tbl_portfolio", $data);
        $this->session->set_flashdata('pangbeja', '<div class="alert alert-success alert-dismissible">
                                    Added Portfolio Successfully
                                    </div>');
        redirect(base_url('admin/allPortfolio'));
        }
        if(empty($_POST)){
        $data['title'] = "Add Portfolio";
        $data['content']='admin/atur_portfolio/form_add';
        $this->load->view('admin/template/body', $data);
        }
    }

    public function editPortfolio($id) {
        $data['portfolio'] = $this->ModelAdmin->findData("tbl_portfolio", "id_portfolio", $id);
        $data['title'] = "Edit Portfolio";
        $data['content']='admin/atur_portfolio/form_edit';
        $this->load->view('admin/template/body', $data);
    }

    public function aksiEditPortfolio($id) {
        $capture = $this->uploadkeun("capturePortfolio", "images", date("d-m-Y")."PRTFL".time());
        $nama_portfolio = $this->input->post('nama_portfolio');
        $url_portfolio = $this->input->post('url_portfolio');
        if(trim($capture) == ""){
        $data = [
            'nama_portfolio' => $nama_portfolio,
            'url_portfolio' => $url_portfolio
        ];
        }else{
        $data = [
            'capture' => $capture,
            'nama_portfolio' => $nama_portfolio,
            'url_portfolio' => $url_portfolio
        ];
        }
        $this->ModelAdmin->updateData("tbl_portfolio", $data, "id_portfolio", $id);
        $this->session->set_flashdata('pangbeja', '<div class="alert alert-success alert-dismissible">
                                    Updated Portfolio Successfully
                                    </div>');
        redirect(base_url('admin/allPortfolio'));
    }

    public function deletePortfolio($id) {
        $this->ModelAdmin->deleteData("tbl_portfolio", "id_portfolio", $id);
        $this->session->set_flashdata('pangbeja', '<div class="alert alert-info alert-dismissible">
                                    Deleted Portfolio Successfully
                                    </div>');
        redirect($_SERVER['HTTP_REFERER'],'refresh');
    }

    public function setStatus($nilai, $id) {
        $data = [
            'status' => $nilai
        ];
        $this->ModelAdmin->updateData("tbl_portfolio", $data, "id_portfolio", $id);
        $this->session->set_flashdata('pangbeja', '<div class="alert alert-success alert-dismissible">
                                    Updated Portfolio Successfully
                                    </div>');
        redirect(base_url('admin/allPortfolio'));
    }
    ########################################################################################################
    public function allWorkExperience() {
        $data['all']=$this->ModelPublik->allWorkExperience();
        $data['content']='admin/atur_work_experience/list';
        $this->load->view('admin/template/body', $data);
    }

    public function addWorkExperience() {
        $id_work_experience = $this->input->post('id_work_experience');
        $tgl_awal_kerja = $this->input->post('tgl_awal_kerja');
        $tgl_akhir_kerja = $this->input->post('tgl_akhir_kerja');
        $nama_perusahaan = $this->input->post('nama_perusahaan');
        $jabatan = $this->input->post('jabatan');
        $informasi_pekerjaan = $this->input->post('informasi_pekerjaan');
        $data = [
            'id_work_experience' => $id_work_experience,
            'tgl_awal_kerja' => $tgl_awal_kerja,
            'tgl_akhir_kerja' => $tgl_akhir_kerja,
            'nama_perusahaan' => $nama_perusahaan,
            'jabatan' => $jabatan,
            'informasi_pekerjaan' => $informasi_pekerjaan
        ];
        if (!empty($_POST)) {
        $this->ModelAdmin->insertData("tbl_work_experience", $data);
        $this->session->set_flashdata('pangbeja', '<div class="alert alert-success alert-dismissible">
                                    Added Work Experience Successfully
                                    </div>');
        redirect(base_url('admin/allWorkExperience'));
        }
        if(empty($_POST)){
        $data['title'] = "Add Work Experience";
        $data['content']='admin/atur_work_experience/form_add';
        $this->load->view('admin/template/body', $data);
        }
    }

    public function editWorkExperience($id) {
        $data['workExperience'] = $this->ModelAdmin->findData("tbl_work_experience", "id_work_experience", $id);
        $data['title'] = "Edit Work Experience";
        $data['content']='admin/atur_work_experience/form_edit';
        $this->load->view('admin/template/body', $data);
    }

    public function aksiEditWorkExperience($id) {
        $tgl_awal_kerja = $this->input->post('tgl_awal_kerja');
        $tgl_akhir_kerja = $this->input->post('tgl_akhir_kerja');
        $nama_perusahaan = $this->input->post('nama_perusahaan');
        $jabatan = $this->input->post('jabatan');
        $informasi_pekerjaan = $this->input->post('informasi_pekerjaan');
        $data = [
            'tgl_awal_kerja' => $tgl_awal_kerja,
            'tgl_akhir_kerja' => $tgl_akhir_kerja,
            'nama_perusahaan' => $nama_perusahaan,
            'jabatan' => $jabatan,
            'informasi_pekerjaan' => $informasi_pekerjaan
        ];
        $this->ModelAdmin->updateData("tbl_work_experience", $data, "id_work_experience", $id);
        $this->session->set_flashdata('pangbeja', '<div class="alert alert-success alert-dismissible">
                                    Updated Work Experience Successfully
                                    </div>');
        redirect(base_url('admin/allWorkExperience'));
    }

    public function deleteWorkExperience($id) {
        $this->ModelAdmin->deleteData("tbl_work_experience", "id_work_experience", $id);
        $this->session->set_flashdata('pangbeja', '<div class="alert alert-info alert-dismissible">
                                    Deleted Work Experience Successfully
                                    </div>');
        redirect($_SERVER['HTTP_REFERER'],'refresh');
    }

    ########################################################################################################
    public function allEducation() {
        $data['all']=$this->ModelPublik->allEducation();
        $data['content']='admin/atur_education/list';
        $this->load->view('admin/template/body', $data);
    }

    public function addEducation() {
        $id_education = $this->input->post('id_education');
        $tahun_masuk = $this->input->post('tahun_masuk');
        $tahun_lulus = $this->input->post('tahun_lulus');
        $tingkat_education = $this->input->post('tingkat_education');
        $degree = $this->input->post('degree');
        $jurusan = $this->input->post('jurusan');
        $nama_instansi = $this->input->post('nama_instansi');
        $informasi_education = $this->input->post('informasi_education');
        $data = [
            'id_education' => $id_education,
            'tahun_masuk' => $tahun_masuk,
            'tahun_lulus' => $tahun_lulus,
            'tingkat_education' => $tingkat_education,
            'degree' => $degree,
            'jurusan' => $jurusan,
            'nama_instansi' => $nama_instansi,
            'informasi_education' => $informasi_education
        ];
        if (!empty($_POST)) {
        $this->ModelAdmin->insertData("tbl_education", $data);
        $this->session->set_flashdata('pangbeja', '<div class="alert alert-success alert-dismissible">
                                    Added Education Successfully
                                    </div>');
        redirect(base_url('admin/allEducation'));
        }
        if(empty($_POST)){
        $data['title'] = "Add Education";
        $data['content']='admin/atur_education/form_add';
        $this->load->view('admin/template/body', $data);
        }
    }

    public function editEducation($id) {
        $data['education'] = $this->ModelAdmin->findData("tbl_education", "id_education", $id);
        $data['title'] = "Edit Education";
        $data['content']='admin/atur_education/form_edit';
        $this->load->view('admin/template/body', $data);
    }

    public function aksiEditEducation($id) {
        $tahun_masuk = $this->input->post('tahun_masuk');
        $tahun_lulus = $this->input->post('tahun_lulus');
        $tingkat_education = $this->input->post('tingkat_education');
        $degree = $this->input->post('degree');
        $jurusan = $this->input->post('jurusan');
        $nama_instansi = $this->input->post('nama_instansi');
        $informasi_education = $this->input->post('informasi_education');
        $data = [
            'tahun_masuk' => $tahun_masuk,
            'tahun_lulus' => $tahun_lulus,
            'tingkat_education' => $tingkat_education,
            'degree' => $degree,
            'jurusan' => $jurusan,
            'nama_instansi' => $nama_instansi,
            'informasi_education' => $informasi_education
        ];
        $this->ModelAdmin->updateData("tbl_education", $data, "id_education", $id);
        $this->session->set_flashdata('pangbeja', '<div class="alert alert-success alert-dismissible">
                                    Updated Education Successfully
                                    </div>');
        redirect(base_url('admin/allEducation'));
    }

    public function deleteEducation($id) {
        $this->ModelAdmin->deleteData("tbl_education", "id_education", $id);
        $this->session->set_flashdata('pangbeja', '<div class="alert alert-info alert-dismissible">
                                    Deleted Education Successfully
                                    </div>');
        redirect($_SERVER['HTTP_REFERER'],'refresh');
    }
    ########################################################################################################

    // Maintenance Mode
    public function maintenanceMode() {
        $data['all']=$this->ModelAdmin->maintenanceMode();
        $data['content']='admin/atur_maintenance_mode';
        $this->load->view('admin/template/body', $data);
    }

    public function setStatusMaintenanceMode($nilai, $id) {
        $data = [
            'status' => $nilai
        ];
        $this->ModelAdmin->updateData("maintenance_mode", $data, "id_maintenance_mode", $id);
        $this->session->set_flashdata('pangbeja', '<div class="alert alert-success alert-dismissible">
                                    Maintenance Mode Successfully Updated
                                    </div>');
        redirect(base_url('admin/maintenanceMode'));
    }
	
	public function setMessageMaintenanceMode($nilai, $id) {
		//var_dump($nilai);die;
		$decrypted_nilai = decrypt_url($nilai);
		//var_dump($decrypted_nilai);die;
        $data = [
            'maintenance_message' => $decrypted_nilai
        ];
        $this->ModelAdmin->updateData("maintenance_mode", $data, "id_maintenance_mode", $id);
        $this->session->set_flashdata('pangbeja', '<div class="alert alert-success alert-dismissible">
                                    Maintenance Mode Successfully Updated
                                    </div>');
		redirect(base_url('admin/maintenanceMode'));
    }
    ########################################################################################################

}