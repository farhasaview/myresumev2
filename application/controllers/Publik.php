<?php

defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Controller Publik
 *
 * Controller ini berfungsi untuk content atau isi untuk dilihat oleh publik
 *
 * @package     Controller
 * @subpackage  Publik
 * @category    Class
 * @author      Natanael Febi Aris Rinaldi
 * @version     2.1.1
 */

class Publik extends CI_Controller {

	public function __construct() {
		parent::__construct();
        $this->load->model('ModelPublik');
    }

	public function index() {
        $data['maintenanceModePublic'] = $this->ModelPublik->maintenanceModePublic();
		foreach ($data['maintenanceModePublic'] as $dataMaintenanceMode) {
			if ($dataMaintenanceMode['status'] != 0 ) {
				//show_404();
				//echo "<center><b><h1>We apologize, we are currently in maintenance mode. We'll be back soon for you guys</h1></b></center>";
				echo "<center><b><h1>".$dataMaintenanceMode['maintenance_message']."</h1></b></center>";
			}
			else {
				$data['content'] = $this->ModelPublik->content();
				$data['allFollowMe'] = $this->ModelPublik->allFollowMe();
				$data['allSkill'] = $this->ModelPublik->allSkill();
				$data['allPortfolio'] = $this->ModelPublik->allPortfolio();
				$data['allWorkExperience'] = $this->ModelPublik->allWorkExperience();
				$data['allEducation'] = $this->ModelPublik->allEducation();
				$this->load->view('publik/publik', $data);
			}
		}
	}

    /*function untuk download file yang dienkripsi*/
    public function downloadFile($folder,$namaFile)
    {
		$data['maintenanceModePublic'] = $this->ModelPublik->maintenanceModePublic();
		foreach ($data['maintenanceModePublic'] as $dataMaintenanceMode) {
			if ($dataMaintenanceMode['status'] != 0 ) {
				//show_404();
				//echo "<center><b><h1>We apologize, we are currently in maintenance mode. We'll be back soon for you guys</h1></b></center>";
				echo "<center><b><h1>".$dataMaintenanceMode['maintenance_message']."</h1></b></center>";
			} else {
				$folder = decrypt_url($folder);
				$namaFile = decrypt_url($namaFile);
				// Jika filenya ada di server maka download jika tidak ada maka munculkan flashdata pemberitahuan bahwa filenya tidak ada
				if (file_exists(FCPATH . "./penyimpanan_file/".$folder."/".$namaFile))
				{
					$this->load->helper('download');
					force_download(FCPATH . "./penyimpanan_file/".$folder."/".$namaFile, null);
				} else {
					redirect(base_url('/'),'refresh');
				}
			}
		}
    }
    /*end of function untuk download file yang dienkripsi*/
    
}
