<?php
class Tools_model extends CI_Model{   
    public function rulesprofiledit()
    {
        return [
            [
            'field' => 'nama_apotek',
            'label' => 'Nama Apotek',
            'rules' => 'required',
            ],
            [
            'field' => 'alamat',
            'label' => 'Alamat',
            'rules' => 'required',
            ], 
        ];
    } 
    public function updatedataprofile()
    {
        $post = $this->input->post();
        $this->nama_apotek = $post["nama_apotek"];
        $this->alamat = $post["alamat"];
        $this->footer_struk = $post["footer_struk"]; 
        
        if (!empty($_FILES["logo"]["name"])) {
            $this->logo = $this->_uploadLogo();
        }   
        return $this->db->update("profil_apotek", $this, array('id' => '1'));
    }
    private function _uploadLogo()
    {
        $post = $this->input->post();
        $config['upload_path']          = './assets/images/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['file_name']            = time();
        $config['overwrite']			= true;
        $config['max_size']             = 1024;  
        $this->load->library('upload', $config); 
        if ($this->upload->do_upload('logo')) {
            return $this->upload->data("file_name");
        } 
        return "logo.png";
    } 
    
	public function upload_file($nama_file){
		$this->load->library('upload');   
		$config['upload_path'] = './excel/';
		$config['allowed_types'] = 'xlsx';
		$config['file_name'] = $nama_file;
		$config['max_size']	= '2048';
		$config['overwrite'] = true; 
		$this->upload->initialize($config);  
		if($this->upload->do_upload('excelfile')){   
			return array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
		}else{ 
			return array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
		 }
    }
    public function input_semua($data){
		return $this->db->insert_batch('master_item', $data);
	}
}