<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Api
 *
 * @author U.L.T.R.O.N
 */
class Api extends CI_Controller {
    //put your code here
    var $client = '';
    
    public function __construct()
    {
            parent::__construct();
            
            $wsdl = 'http://182.255.0.173:8082/ws/live.php?wsdl';
            $this->client = new nusoap_client($wsdl, 'wsdl');
 
            
    }
    public function index(){
        $this->load->view('Api/index');
        
    }
    public function login(){

    }
    public function getToken()
    {
        if($this->input->post()){
            $proxy = $this->client->getProxy();
            
            if(get_cookie('token') == NULL){
                
                
                set_cookie('token','');

                $username = $_POST['username'];
                $password = $_POST['password'];

                $token = $proxy->getToken($username,$password);
                set_cookie('token',$token,36000);
                
                echo get_cookie('token');
            }
            else{
                //$data = $proxy->getExpired(get_cookie('token'));
                //var_dump($data);die;
                echo "token sudah ada, silahkan lanjutkan.";
            }
        }
    }
    
    public function kuliahMhs(){
        $this->load->view('Api/KuliahMhs');
    }
    
    public function kuliahMhsi(){
        $this->load->view('Api/UpdateKuliahMhsi');
    }
    
    public function ukuliahMhs(){
        $this->load->view('Api/UpdateKuliahMhs');
    }
    
    public function ukuliahMhsi(){
        $this->load->view('Api/UpdateKuliahMhsii');
    }
    
    public function usmt(){
        $this->load->view('Api/UpdateSmt');
    }
    
    public function getKuliahMhs(){
        
        if($this->input->post()){

            $proxy = $this->client->getProxy();  
            
            $token = get_cookie('token');
            $table = $_POST['table'];
            $filter = $_POST['filter'];
            $order = '';
            $limit = '';
            $offset = '';
            
            $data = $proxy->GetRecordset($token,$table,$filter,$order,$limit,$offset);
            
            var_dump($data);die;
            
            $data = $proxy->GetCountRecordset($token,$table,$filter);
            
            var_dump($data);die;
        }        
                  
 
    }
    
    public function updateKuliahMhs(){
        
        if($this->input->post()){

            $proxy = $this->client->getProxy();  
            
            $token = get_cookie('token');
            $table = $_POST['table'];
            $id_reg_pd = $_POST['id_reg_pd'];
            $sks_diakui = $_POST['sks_diakui'];

            $filter = "id_reg_pd = '".$_POST['id_reg_pd']."'";
            $order = '';
            $limit = '';
            $offset = '';
            
            $data = $proxy->GetRecordset($token,$table,$filter,$order,$limit,$offset);
            $records = array();
            
            foreach ($data['result'] as $row){
                $key = array('id_reg_pd' => $row['id_reg_pd']);
                $data = array('sks_diakui' => $_POST['sks_diakui']);
                $records[] = array('key'=>$key,'data'=>$data);
            }
            
            $result = array();
            foreach($records as $record){
                $result[] = $proxy->UpdateRecord($token,$table,  json_encode($record));
            }
            
            var_dump($result);die;
            
            $data = array(
                    'id_reg_pd' =>  $id_reg_pd, // '00507082-d441-41ac-badb-ec501435c0ab',
                    //'nipd' =>  'C2B001010         ',
                    //'id_pd' =>  'c5cbbde3-503c-4c74-b89a-1d26a4d0c211',
                    //'nm_pd' =>  'NONE',
                    //'tgl_lahir' =>  '1970-12-09',
                    //'id_sms' =>  'c552d0fa-ff82-484f-9e25-6477923455d1',
                    //'fk__sms' =>  'Ekonomi Pembangunan                                                             ',
                    //'id_sp' =>  '54d01bf3-8255-474b-b96d-4426135eed01',
                    //'fk__sp' =>  'Universitas Diponegoro',
                    //'tgl_masuk_sp' =>  '2001-01-09',
                    //'id_jns_daftar' =>  '1',
                    //'fk__jns_daftar' =>  'Peserta didik baru',
                    //'a_pernah_paud' =>  '0',
                    //'a_pernah_tk' =>  '0',
                    //'mulai_smt' =>  '20011',
                    'sks_diakui' =>  '0',
                    //'jalur_skripsi' =>  '0',
                    //'ipk' =>  '0',
                    );
            
            $data = json_encode($data);
            
            //echo $data;die;
            
            $data = $proxy->UpdateRecord($token,$table,$data);
            
            var_dump($data);die;
            
            $data = $proxy->GetCountRecordset($token,$table,$filter);
            
            var_dump($data);die;
        }        
                  
 
    }
    
        public function updateKuliahMhsii(){
        
        if($this->input->post()){

            $proxy = $this->client->getProxy();  
            
            $token = get_cookie('token');
            $table = $_POST['table'];
            $id_reg_pd = $_POST['id_reg_pd'];
            $id_jns_daftar = $_POST['id_jns_daftar'];

            $filter = "id_reg_pd = '".$_POST['id_reg_pd']."'";
            $order = '';
            $limit = '';
            $offset = '';
            
            
            
            $data = $proxy->GetRecordset($token,$table,$filter,$order,$limit,$offset);
            
            
            $records = array();
            
            foreach ($data['result'] as $row){
                $key = array('id_reg_pd' => $row['id_reg_pd']);
                $data = array('id_jns_daftar' => $_POST['id_jns_daftar']);
                $records[] = array('key'=>$key,'data'=>$data);
            }
            
            $result = array();
            foreach($records as $record){
                $result[] = $proxy->UpdateRecord($token,$table,  json_encode($record));
            }
            
            var_dump($result);die;
            
            $data = array(
                    'id_reg_pd' =>  $id_reg_pd, // '00507082-d441-41ac-badb-ec501435c0ab',
                    //'nipd' =>  'C2B001010         ',
                    //'id_pd' =>  'c5cbbde3-503c-4c74-b89a-1d26a4d0c211',
                    //'nm_pd' =>  'NONE',
                    //'tgl_lahir' =>  '1970-12-09',
                    //'id_sms' =>  'c552d0fa-ff82-484f-9e25-6477923455d1',
                    //'fk__sms' =>  'Ekonomi Pembangunan                                                             ',
                    //'id_sp' =>  '54d01bf3-8255-474b-b96d-4426135eed01',
                    //'fk__sp' =>  'Universitas Diponegoro',
                    //'tgl_masuk_sp' =>  '2001-01-09',
                    //'id_jns_daftar' =>  '1',
                    //'fk__jns_daftar' =>  'Peserta didik baru',
                    //'a_pernah_paud' =>  '0',
                    //'a_pernah_tk' =>  '0',
                    //'mulai_smt' =>  '20011',
                    'sks_diakui' =>  '0',
                    //'jalur_skripsi' =>  '0',
                    //'ipk' =>  '0',
                    );
            
            $data = json_encode($data);
            
            //echo $data;die;
            
            $data = $proxy->UpdateRecord($token,$table,$data);
            
            var_dump($data);die;
            
            $data = $proxy->GetCountRecordset($token,$table,$filter);
            
            var_dump($data);die;
        }        
                  
 
    }
    
    public function updateSmt(){
        
        if($this->input->post()){

            $proxy = $this->client->getProxy();  
            
            $token = get_cookie('token');
            $table = $_POST['table'];
            $id_smt = $_POST['id_smt'];
            $a_periode_aktif = $_POST['a_periode_aktif'];

            $filter = "id_smt = '".$_POST['id_smt']."'";
            $order = '';
            $limit = '';
            $offset = '';
            
            $data = $proxy->GetRecordset($token,$table,$filter,$order,$limit,$offset);
            $records = array();
            
            //var_dump($data);die;
            
            foreach ($data['result'] as $row){
                $key = array('id_smt' => $row['id_smt']);
                $data = array('a_periode_aktif' => $_POST['a_periode_aktif']);
                $records[] = array('key'=>$key,'data'=>$data);
            }

            $result = array();
            
            foreach($records as $record){
                $result[] = $proxy->UpdateRecord($token,$table,  json_encode($record));
            }
            
            var_dump($result);die;
            
            $data = array(
                    'id_reg_pd' =>  $id_reg_pd, // '00507082-d441-41ac-badb-ec501435c0ab',
                    //'nipd' =>  'C2B001010         ',
                    //'id_pd' =>  'c5cbbde3-503c-4c74-b89a-1d26a4d0c211',
                    //'nm_pd' =>  'NONE',
                    //'tgl_lahir' =>  '1970-12-09',
                    //'id_sms' =>  'c552d0fa-ff82-484f-9e25-6477923455d1',
                    //'fk__sms' =>  'Ekonomi Pembangunan                                                             ',
                    //'id_sp' =>  '54d01bf3-8255-474b-b96d-4426135eed01',
                    //'fk__sp' =>  'Universitas Diponegoro',
                    //'tgl_masuk_sp' =>  '2001-01-09',
                    //'id_jns_daftar' =>  '1',
                    //'fk__jns_daftar' =>  'Peserta didik baru',
                    //'a_pernah_paud' =>  '0',
                    //'a_pernah_tk' =>  '0',
                    //'mulai_smt' =>  '20011',
                    'sks_diakui' =>  '0',
                    //'jalur_skripsi' =>  '0',
                    //'ipk' =>  '0',
                    );
            
            $data = json_encode($data);
            
            //echo $data;die;
            
            $data = $proxy->UpdateRecord($token,$table,$data);
            
            var_dump($data);die;
            
            $data = $proxy->GetCountRecordset($token,$table,$filter);
            
            var_dump($data);die;
        }        
                  
 
    }
    public function updateKuliahMsi(){
        
        if($this->input->post()){

            $proxy = $this->client->getProxy();  
            
            $token = get_cookie('token');
            $table = $_POST['table'];
            $id_smt = $_POST['id_smt'];
            $id_reg_pd = $_POST['id_reg_pd'];
            $ipk = $_POST['ipk'];

            $filter = "id_smt = '".$_POST['id_smt']."' AND id_reg_pd = '".$id_reg_pd."'";
            $order = '';
            $limit = '';
            $offset = '';
            
            $data = $proxy->GetRecordset($token,$table,$filter,$order,$limit,$offset);
            $records = array();
            
            //var_dump($data);die;
            
            foreach ($data['result'] as $row){
                $key = array('id_smt' => $row['id_smt'],'id_reg_pd' => $row['id_reg_pd']);
                $data = array('ipk' => $_POST['ipk']);
                $records[] = array('key'=>$key,'data'=>$data);
            }

            $result = array();
            
            foreach($records as $record){
                $result[] = $proxy->UpdateRecord($token,$table,json_encode($record));
            }
            
            var_dump($result);die;
            
            $data = array(
                    'id_reg_pd' =>  $id_reg_pd, // '00507082-d441-41ac-badb-ec501435c0ab',
                    //'nipd' =>  'C2B001010         ',
                    //'id_pd' =>  'c5cbbde3-503c-4c74-b89a-1d26a4d0c211',
                    //'nm_pd' =>  'NONE',
                    //'tgl_lahir' =>  '1970-12-09',
                    //'id_sms' =>  'c552d0fa-ff82-484f-9e25-6477923455d1',
                    //'fk__sms' =>  'Ekonomi Pembangunan                                                             ',
                    //'id_sp' =>  '54d01bf3-8255-474b-b96d-4426135eed01',
                    //'fk__sp' =>  'Universitas Diponegoro',
                    //'tgl_masuk_sp' =>  '2001-01-09',
                    //'id_jns_daftar' =>  '1',
                    //'fk__jns_daftar' =>  'Peserta didik baru',
                    //'a_pernah_paud' =>  '0',
                    //'a_pernah_tk' =>  '0',
                    //'mulai_smt' =>  '20011',
                    'sks_diakui' =>  '0',
                    //'jalur_skripsi' =>  '0',
                    //'ipk' =>  '0',
                    );
            
            $data = json_encode($data);
            
            //echo $data;die;
            
            $data = $proxy->UpdateRecord($token,$table,$data);
            
            var_dump($data);die;
            
            $data = $proxy->GetCountRecordset($token,$table,$filter);
            
            var_dump($data);die;
        }        
                  
 
    }
}
