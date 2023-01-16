<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Serial_number extends CI_Model
{

    function make_no_excul()   {    
        $this->db->select('RIGHT(excul.no_excul,5) as kode', FALSE);
        $this->db->order_by('no_excul','DESC');    
        $this->db->limit(1);     
        $query = $this->db->get('excul');      //cek dulu apakah ada sudah ada kode di tabel.    
        if($query->num_rows() <> 0){       
            //jika kode ternyata sudah ada.      
            $data = $query->row();      
            $kode = intval($data->kode) + 1;     
        } else{       
            //jika kode belum ada      
            $kode = 1;     
        }
        return $kode;  
     }

    function make_no_contest()   {    
        $this->db->select('RIGHT(contest.no_contest,4) as kode', FALSE);
        $this->db->order_by('no_contest','DESC');    
        $this->db->limit(1);     
        $query = $this->db->get('contest');      //cek dulu apakah ada sudah ada kode di tabel.    
        if($query->num_rows() <> 0){       
            //jika kode ternyata sudah ada.      
            $data = $query->row();      
            $kode = intval($data->kode) + 1;     
        } else{       
            //jika kode belum ada      
            $kode = 1;     
        }
        $kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT);    
        $kodejadi = "NC".$kodemax;     
        return $kodejadi;  
    }

    function buat_no_delegation()   {    
        $this->db->select('RIGHT(submission_delegation.no_delegation,5) as kode', FALSE);
        $this->db->order_by('no_delegation','DESC');    
        $this->db->limit(1);     
        $query = $this->db->get('submission_delegation');      //cek dulu apakah ada sudah ada kode di tabel.    
        if($query->num_rows() <> 0){       
            //jika kode ternyata sudah ada.      
            $data = $query->row();
            $kode = intval($data->kode) + 1;     
        } else{       
            //jika kode belum ada      
            $kode = 1;     
        }
        $kodemax = str_pad($kode, 5, "0", STR_PAD_LEFT);    
        $kodejadi = "NSB".$kodemax;     
        return $kodejadi;  
    }

    function make_id_unit()   {    
        $this->db->select('RIGHT(unit.id_unit,5) as kode', FALSE);
        $this->db->order_by('id_unit','DESC');    
        $this->db->limit(1);     
        $query = $this->db->get('unit');      //cek dulu apakah ada sudah ada kode di tabel.    
        if($query->num_rows() <> 0){       
            //jika kode ternyata sudah ada.      
            $data = $query->row();      
            $kode = intval($data->kode) + 1;     
        }else{       
            //jika kode belum ada      
            $kode = 1;     
        }
        return $kode;  
    }
    
    function make_id_hostel()   {    
        $this->db->select('RIGHT(hostel.id_hostel,5) as kode', FALSE);
        $this->db->order_by('id_hostel','DESC');    
        $this->db->limit(1);     
        $query = $this->db->get('hostel');      //cek dulu apakah ada sudah ada kode di tabel.    
        if($query->num_rows() <> 0){       
            //jika kode ternyata sudah ada.      
            $data = $query->row();      
            $kode = intval($data->kode) + 1;     
        }else{       
            //jika kode belum ada      
            $kode = 1;     
        }
        return $kode;  
    }

    function make_id_edu()   {    
        $this->db->select('RIGHT(educational.id_edu,5) as kode', FALSE);
        $this->db->order_by('id_edu','DESC');    
        $this->db->limit(1);
        $query = $this->db->get('educational');      //cek dulu apakah ada sudah ada kode di tabel.    
        if($query->num_rows() <> 0){       
            //jika kode ternyata sudah ada.      
            $data = $query->row();      
            $kode = intval($data->kode) + 1;     
        }else{       
            //jika kode belum ada      
            $kode = 1;     
        }
        return $kode;  
    }

    function make_id_companion()   {    
        $this->db->select('RIGHT(companion.id_companion,5) as kode', FALSE);
        $this->db->order_by('id_companion','DESC');    
        $this->db->limit(1);
        $query = $this->db->get('companion');      //cek dulu apakah ada sudah ada kode di tabel.    
        if($query->num_rows() <> 0){       
            //jika kode ternyata sudah ada.      
            $data = $query->row();      
            $kode = intval($data->kode) + 1;     
        }else{       
            //jika kode belum ada      
            $kode = 1;     
        }
        $kodemax = str_pad($kode, 5, "0", STR_PAD_LEFT);    
        $kodejadi = "ICN".$kodemax;     
        return $kodejadi;  
    }

}
