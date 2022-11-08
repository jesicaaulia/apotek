<?php
class User_model extends CI_Model{    
    
    // datatable kategori start
    var $column_search_kategori = array('kategori_user'); 
    var $column_order_kategori = array(null, 'kategori_user');
    var $order_kategori = array('kategori_user' => 'DESC');
    private function _get_query_kategori()
    { 
        $get = $this->input->get();
        $this->db->from('kategori_user'); 
        $i = 0; 
        foreach ($this->column_search_kategori as $item)
        {
            if($get['search']['value'])
            { 
                if($i===0) 
                {
                    $this->db->group_start(); 
                    $this->db->like($item, $get['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $get['search']['value']);
                }
 
                if(count($this->column_search_kategori) - 1 == $i) 
                    $this->db->group_end(); 
            }
            $i++;
        } 
        if(isset($get['order'])) 
        {
            $this->db->order_by($this->column_order_kategori[$get['order']['0']['column']], $get['order']['0']['dir']);
        } 
        else if(isset($this->order_kategori))
        {
            $order = $this->order_kategori;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
 
    function get_kategori_datatable()
    {
        $get = $this->input->get();
        $this->_get_query_kategori();
        if($get['length'] != -1)
        $this->db->limit($get['length'], $get['start']);
        $query = $this->db->get();
        return $query->result();
    }
 
    function count_filtered_datatable_kategori()
    {
        $this->_get_query_kategori();
        $query = $this->db->get();
        return $query->num_rows();
    }
 
    public function count_all_datatable_kategori()
    {
        $this->db->from('kategori_user');
        return $this->db->count_all_results();
    } 
    //datatable kategori end

    
    public function ruleskategori()
    {
        return [
            [
            'field' => 'kategori_user',
            'label' => 'Kategori User',
            'rules' => 'is_unique[kategori_user.kategori_user]|required',
            ] 
        ];
    } 
    public function ruleskategoriedit()
    {
        return [
            [
            'field' => 'kategori_useredit',
            'label' => 'Kategori User',
            'rules' => 'required',
            ] 
        ];
    } 
    
    private function _cekberanda($idd,$kategori){    
         return $this->db->get_where('kategori_user_modul', array('modul' => $idd ,'kategori_user' => $kategori,'akses' => 'read'),1)->num_rows();  
    }
    function simpandatakategori(){   
        $post = $this->input->post();   
        $array = array(
            'kategori_user'=>$post["kategori_user"],  
            'beranda'=>$post["beranda"],   
        );  
        $this->db->insert("kategori_user", $array);  
        $insert_id = $this->db->insert_id();  
        
        $view = $this->input->post("view");    
        if(isset($view)) {
            for($i = 0; $i < count($view); $i++){     
                $lisview = array(
                    'kategori_user'=>$insert_id,  
                    'modul'=>$view[$i],   
                    'akses'=> 'read',   
                );   
                $this->db->insert("kategori_user_modul", $lisview);  
            }  
        }
        $tambah = $this->input->post("add");     
        if(isset($tambah)) {
            for($i = 0; $i < count($tambah); $i++){        
                if($this->_cekberanda($tambah[$i],$insert_id) < 1){
                    $beranda = array(
                        'kategori_user'=>$insert_id,  
                        'modul'=>$tambah[$i],   
                        'akses'=> 'read',   
                    );   
                    $this->db->insert("kategori_user_modul", $beranda);  
                }

                $listambah = array(
                    'kategori_user'=>$insert_id,  
                    'modul'=>$tambah[$i],   
                    'akses'=> 'add',   
                );   
                $this->db->insert("kategori_user_modul", $listambah);  
            }
        }

        $edit = $this->input->post("edit");     
        if(isset($edit)) {
            for($i = 0; $i < count($edit); $i++){         
                if($this->_cekberanda($edit[$i],$insert_id) < 1){
                    $beranda = array(
                        'kategori_user'=>$insert_id,  
                        'modul'=>$edit[$i],   
                        'akses'=> 'read',   
                    );   
                    $this->db->insert("kategori_user_modul", $beranda);  
                }
                $lisedit = array(
                    'kategori_user'=>$insert_id,  
                    'modul'=>$edit[$i],   
                    'akses'=> 'edit',   
                );   
                $this->db->insert("kategori_user_modul", $lisedit);  
            }
        }

        $delete = $this->input->post("delete");   
        if(isset($delete)) {  
            for($i = 0; $i < count($delete); $i++){         
                if($this->_cekberanda($delete[$i],$insert_id) < 1){
                    $beranda = array(
                        'kategori_user'=>$insert_id,  
                        'modul'=>$delete[$i],   
                        'akses'=> 'read',   
                    );   
                    $this->db->insert("kategori_user_modul", $beranda);  
                }
                $listdelete = array(
                    'kategori_user'=>$insert_id,  
                    'modul'=>$delete[$i],   
                    'akses'=> 'delete',   
                );   
                $this->db->insert("kategori_user_modul", $listdelete);  
            }
        } 
        return TRUE;
    }  

    
    public function hapusdatakategori()
    {
        $post = $this->input->post(); 
        $this->db->where('id', $post['idd']);
        return $this->db->delete('kategori_user');  
    } 
    
    public function get_akses($idd){ 
        $this->db->select("*");
        $this->db->where("kategori_user", $idd);
        $this->db->from("kategori_user_modul"); 
        return $this->db->get()->result();
    }
    
    function updatedatakategori(){   
        $post = $this->input->post();    
        $array = array(
            'kategori_user'=>$post["kategori_useredit"],  
            'beranda'=>$post["beranda"],   
        );   
        $this->db->update("kategori_user", $array, array('id' => $post['idd']));
        $insert_id = $post['idd'];    
        $this->db->where('kategori_user', $insert_id)->delete('kategori_user_modul');

        $view = $this->input->post("editview");    
        if(isset($view)) {
            for($i = 0; $i < count($view); $i++){     
                $lisview = array(
                    'kategori_user'=>$insert_id,  
                    'modul'=>$view[$i],   
                    'akses'=> 'read',   
                );   
                $this->db->insert("kategori_user_modul", $lisview);  
            }  
        }
        $tambah = $this->input->post("editadd");     
        if(isset($tambah)) {
            for($i = 0; $i < count($tambah); $i++){        
                if($this->_cekberanda($tambah[$i],$insert_id) < 1){
                    $beranda = array(
                        'kategori_user'=>$insert_id,  
                        'modul'=>$tambah[$i],   
                        'akses'=> 'read',   
                    );   
                    $this->db->insert("kategori_user_modul", $beranda);  
                }

                $listambah = array(
                    'kategori_user'=>$insert_id,  
                    'modul'=>$tambah[$i],   
                    'akses'=> 'add',   
                );   
                $this->db->insert("kategori_user_modul", $listambah);  
            }
        }

        $edit = $this->input->post("editedit");     
        if(isset($edit)) {
            for($i = 0; $i < count($edit); $i++){         
                if($this->_cekberanda($edit[$i],$insert_id) < 1){
                    $beranda = array(
                        'kategori_user'=>$insert_id,  
                        'modul'=>$edit[$i],   
                        'akses'=> 'read',   
                    );   
                    $this->db->insert("kategori_user_modul", $beranda);  
                }
                $lisedit = array(
                    'kategori_user'=>$insert_id,  
                    'modul'=>$edit[$i],   
                    'akses'=> 'edit',   
                );   
                $this->db->insert("kategori_user_modul", $lisedit);  
            }
        }

        $delete = $this->input->post("editdelete");   
        if(isset($delete)) {  
            for($i = 0; $i < count($delete); $i++){         
                if($this->_cekberanda($delete[$i],$insert_id) < 1){
                    $beranda = array(
                        'kategori_user'=>$insert_id,  
                        'modul'=>$delete[$i],   
                        'akses'=> 'read',   
                    );   
                    $this->db->insert("kategori_user_modul", $beranda);  
                }
                $listdelete = array(
                    'kategori_user'=>$insert_id,  
                    'modul'=>$delete[$i],   
                    'akses'=> 'delete',   
                );   
                $this->db->insert("kategori_user_modul", $listdelete);  
            }
        } 
        return TRUE;
    }  

    
    public function rulesuser()
    {
        return [
            [
            'field' => 'password',
            'label' => 'Password',
            'rules' => 'required',
            ],
            [
            'field' => 'password2',
            'label' => 'Password Konfirmasi',
            'rules' => 'trim|required|matches[password]'
            ] ,
            [
            'field' => 'username',
            'label' => 'username',
            'rules' => 'is_unique[master_admin.username]|required',
            ] ,
            [
            'field' => 'nama_admin',
            'label' => 'Nama admin',
            'rules' => 'required',
            ] ,
            [
            'field' => 'alamat',
            'label' => 'alamat',
            'rules' => 'required',
            ] ,
            [
            'field' => 'handphone',
            'label' => 'handphone',
            'rules' => 'required',
            ] ,
            [
            'field' => 'email',
            'label' => 'email',
            'rules' => 'required',
            ] 
        ];
    } 
    
    function simpandatauser(){   
        $post = $this->input->post();   
        $password= password_hash($post['password'], PASSWORD_BCRYPT);
        $array = array(
            'kategori'=>$post["kategori"], 
            'username'=>$post["username"], 
            'password'=>$password,  
            'nama_admin'=>$post["nama_admin"], 
            'jenis_kelamin'=>$post["jenis_kelamin"], 
            'alamat'=>$post["alamat"], 
            'telepon'=>$post["telepon"], 
            'handphone'=>$post["handphone"],    
            'email'=>$post["email"],   
            'aktif'=>$post["aktif"],     
        );
        return $this->db->insert("master_admin", $array);  
    }    
     
    public function rulesuseredit()
    {
        return [ 
            [
            'field' => 'password',
            'label' => 'Password',
            'rules' => 'trim'
            ] ,
            [
            'field' => 'password2',
            'label' => 'Password Konfirmasi',
            'rules' => 'trim|matches[password]'
            ] ,
            [
            'field' => 'username',
            'label' => 'username',
            'rules' => 'required',
            ] ,
            [
            'field' => 'nama_admin',
            'label' => 'Nama admin',
            'rules' => 'required',
            ] ,
            [
            'field' => 'alamat',
            'label' => 'alamat',
            'rules' => 'required',
            ] ,
            [
            'field' => 'handphone',
            'label' => 'handphone',
            'rules' => 'required',
            ] ,
            [
            'field' => 'email',
            'label' => 'email',
            'rules' => 'required',
            ] 
        ];
    } 
    
    public function updatedatauser()
    {
        $post = $this->input->post();
        $this->kategori = $post["kategori"];
        $this->username = $post["username"];
        $this->nama_admin = $post["nama_admin"];
        $this->jenis_kelamin = $post["jenis_kelamin"];
        $this->alamat = $post["alamat"]; 
        $this->telepon = $post["telepon"]; 
        $this->handphone = $post["handphone"];  
        $this->email = $post["email"];   
        $this->aktif = $post["aktif"];   
        if($post["password"] !=''){
            $this->password = password_hash($post['password'], PASSWORD_BCRYPT);
        } 
        return $this->db->update("master_admin", $this, array('id' => $post['idd']));
    }
    
    public function hapusdatauser()
    {
        $post = $this->input->post();  
        $this->db->where('id', $post['idd']);
        return $this->db->delete('master_admin');  
    } 
}