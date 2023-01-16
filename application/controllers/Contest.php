<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Contest extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Contest_model');
        $this->load->model('Serial_number');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'contest/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'contest/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'contest/index.html';
            $config['first_url'] = base_url() . 'contest/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Contest_model->total_rows($q);
        $contest = $this->Contest_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'contest_data' => $contest,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'konten' => 'contest/contest_list',
            'judul' => 'Data Lomba',
        );
        $this->load->view('v_index', $data);
    }

    public function read($id) 
    {
        $row = $this->Contest_model->get_by_id($id);
        if ($row) {
            $data = array(
		'no_contest' => $row->no_contest,
		'name_contest' => $row->name_contest,
		'kind_contest' => $row->kind_contest,
		'quota_partisipant' => $row->quota_partisipant,
		'contest_level' => $row->contest_level,
        'institution' => $row->institution,
        'address' => $row->address,
        'contact_person' => $row->contact_person,
        'tlp_cp' => $row->tlp_cp,
        'time_contest' => $row->time_contest,
        'time_tm' => $row->time_tm,
        'place_contest' => $row->place_contest,
	    );
            $this->load->view('contest/contest_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('contest'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('contest/create_action'),
	        'no_contest' => $this->Serial_number->make_no_contest(),
	        'name_contest' => set_value('name_contest'),
	    'kind_contest' => set_value('kind_contest'),
	    'quota_partisipant' => set_value('quota_partisipant'),
        'contest_level' => set_value('contest_level'),
        'institution' => set_value('institution'),
        'address' => set_value('address'),
        'contact_person' => set_value('contact_person'),
        'tlp_cp' => set_value('tlp_cp'),
        'time_contest' => set_value('time_contest'),
        'time_tm' => set_value('time_tm'),
        'place_contest' => set_value('place_contest'),
        'konten' => 'contest/contest_form',
            'judul' => 'Data Lomba',
	);
        $this->load->view('v_index', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'no_contest' => $this->input->post('no_contest',TRUE),
		'name_contest' => $this->input->post('name_contest',TRUE),
		'kind_contest' => $this->input->post('kind_contest',TRUE),
		'quota_partisipant' => $this->input->post('quota_partisipant',TRUE),
        'contest_level' => $this->input->post('contest_level',TRUE),
        'institution' =>$this->input->post('institution', TRUE),
        'address' =>$this->input->post('address', TRUE),
        'contact_person' =>$this->input->post('contact_person', TRUE),
        'tlp_cp' =>$this->input->post('tlp_cp', TRUE),
        'time_contest' =>$this->input->post('time_contest', TRUE),
        'time_tm' =>$this->input->post('time_tm', TRUE),
        'place_contest' =>$this->input->post('place_contest', TRUE),
	    );

            $this->Contest_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('contest'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Contest_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('contest/update_action'),
		'no_contest' => set_value('no_contest', $row->no_contest),
		'name_contest' => set_value('name_contest', $row->name_contest),
		'kind_contest' => set_value('kind_contest', $row->kind_contest),
		'quota_partisipant' => set_value('quota_partisipant', $row->quota_partisipant),
        'contest_level' => set_value('contest_level', $row->contest_level),
        'institution' => set_value('institution', $row->institution),
        'address' => set_value('address', $row->address),
        'contact_person' => set_value('contact_person', $row->contact_person),
        'tlp_cp' => set_value('tlp_cp', $row->tlp_cp),
        'time_contest' => set_value('time_contest', $row->time_contest),
        'time_tm' => set_value('time_tm', $row->time_tm),
        'place_contest' => set_value('place_contest', $row->place_contest),
        'konten' => 'contest/contest_form',
            'judul' => 'Data Lomba',
	    );
            $this->load->view('v_index', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('contest'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('no_contest', TRUE));
        } else {
            $data = array(
        'name_contest' => $this->input->post('name_contest',TRUE),
        'kind_contest' => $this->input->post('kind_contest',TRUE),
        'quota_partisipant' => $this->input->post('quota_partisipant',TRUE),
        'contest_level' => $this->input->post('contest_level',TRUE),
        'institution' =>$this->input->post('institution', TRUE),
        'address' =>$this->input->post('address', TRUE),
        'contact_person' =>$this->input->post('contact_person', TRUE),
        'tlp_cp' =>$this->input->post('tlp_cp', TRUE),
        'time_contest' =>$this->input->post('time_contest', TRUE),
        'time_tm' =>$this->input->post('time_tm', TRUE),
        'place_contest' =>$this->input->post('place_contest', TRUE),
        );
            $this->Contest_model->update($this->input->post('no_contest', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('contest'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Contest_model->get_by_id($id);

        if ($row) {
            $this->Contest_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('contest'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('contest'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('name_contest', 'Nama Lomba', 'trim|required');
	$this->form_validation->set_rules('kind_contest', 'Jenis Lomba', 'trim|required');
	$this->form_validation->set_rules('quota_partisipant', 'Kuota Peserta', 'trim|required');
	$this->form_validation->set_rules('contest_level', 'Level Lomba', 'trim|required');
    $this->form_validation->set_rules('institution', 'Institusi', 'trim|required');
    $this->form_validation->set_rules('address', 'Alamat', 'trim|required');
    $this->form_validation->set_rules('contact_person', 'Kontak Person', 'trim|required');
    $this->form_validation->set_rules('tlp_cp', 'Nomor Telp', 'trim|required');
    $this->form_validation->set_rules('time_contest', 'Waktu Lomba', 'trim|required');
    $this->form_validation->set_rules('time_tm', 'Waktu TM', 'trim|required');
    $this->form_validation->set_rules('place_contest', 'Tempat Lomba', 'trim|required');
	$this->form_validation->set_rules('no_contest', 'No Lomba', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function contest_excel()
    {
        $data = $this->Contest_model->get_all();
        $objXLS   = new PHPExcel();
        $objSheet = $objXLS->setActiveSheetIndex(0);            

        $no = 1;
        $font = array('font' => array( 'bold' => true, 'color' => array(
            'rgb'  => 'FFFFFF')));
        $objXLS->setActiveSheetIndex(0);        
        $styleArray = array(
            'alignment' => array(
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
                'borders' => array(
                    'allborders' => array(
                        'style' => PHPExcel_Style_Border::BORDER_THIN,
                        'color' => array(
                            'rgb'  => 'FFFFFF' 
                        ),
                    ),
                ),
            ),
        );

        $borderStyle = array(
            'borders' => array(
                'allborders' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN,
                    'color' => array(
                        'rgb'  => 'FF0000' 
                    ),
                ),
            ),
        );

        $objSheet->setCellValue('A1', 'BUKU LOMBA');

        $cell  = 2;
        $objSheet->setCellValue('A'. $cell, 'No Lomba');
        $objSheet->setCellValue('B'. $cell, 'Nama Lomba');
        $objSheet->setCellValue('C'. $cell, 'Jenis Lomba');
        $objSheet->setCellValue('D'. $cell, 'Kuota Peserta');
        $objSheet->setCellValue('E'. $cell, 'Level Lomba');
        $objSheet->setCellValue('F'. $cell, 'Institusi');
        $objSheet->setCellValue('G'. $cell, 'Alamat');
        $objSheet->setCellValue('H'. $cell, 'Kontak Person');
        $objSheet->setCellValue('I'. $cell, 'Nomor Telp');
        $objSheet->setCellValue('J'. $cell, 'Waktu Lomba');
        $objSheet->setCellValue('K'. $cell, 'Waktu TM');
        $objSheet->setCellValue('L'. $cell, 'Tempat Lomba');

        $objXLS->getActiveSheet()
        ->getStyle('A' .  $cell . ':L' . $cell)
        ->applyFromArray($font);

        $objXLS->getActiveSheet()
        ->getStyle('A' .  $cell . ':L' . $cell)
        ->getFill()
        ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
        ->getStartColor()
        ->setRGB('000');
        $objXLS->getActiveSheet()->getStyle('A1')->getFont()->setBold( true );

        $cell++;
        $query = $this->db->query("SELECT * FROM contest")->result();
        $total = 0;
        foreach ($query as $r) {
            $objSheet->setCellValueExplicit('A'.$cell, $r->no_pegaduan, PHPExcel_Cell_DataType::TYPE_STRING);
            $objSheet->setCellValueExplicit('B'.$cell, $r->name_contest, PHPExcel_Cell_DataType::TYPE_STRING);
            $objSheet->setCellValueExplicit('C'.$cell, $r->kind_contest, PHPExcel_Cell_DataType::TYPE_STRING);
            $objSheet->setCellValueExplicit('D'.$cell, $r->quota_partisipant, PHPExcel_Cell_DataType::TYPE_STRING);
            $objSheet->setCellValueExplicit('E'.$cell, $r->contest_level, PHPExcel_Cell_DataType::TYPE_STRING);
            $objSheet->setCellValueExplicit('F'.$cell, $r->institution, PHPExcel_Cell_DataType::TYPE_STRING);
            $objSheet->setCellValueExplicit('G'.$cell, $r->address, PHPExcel_Cell_DataType::TYPE_STRING);
            $objSheet->setCellValueExplicit('H'.$cell, $r->contact_person, PHPExcel_Cell_DataType::TYPE_STRING);
            $objSheet->setCellValueExplicit('I'.$cell, $r->tlp_cp, PHPExcel_Cell_DataType::TYPE_STRING);
            $objSheet->setCellValueExplicit('J'.$cell, $r->time_contest, PHPExcel_Cell_DataType::TYPE_STRING);
            $objSheet->setCellValueExplicit('K'.$cell, $r->time_tm, PHPExcel_Cell_DataType::TYPE_STRING);
            $objSheet->setCellValueExplicit('L'.$cell, $r->place_contest, PHPExcel_Cell_DataType::TYPE_STRING);

            $cell++;
            $no++;
            $total += $rk->rencana_kegiatan_anggaran;
        }

        $objXLS->getActiveSheet()->getColumnDimension('A')->setWidth(10);
        $objXLS->getActiveSheet()->getColumnDimension('B')->setWidth(50);
        $objXLS->getActiveSheet()->getColumnDimension('C')->setWidth(15);
        $objXLS->getActiveSheet()->getColumnDimension('D')->setWidth(15);
        $objXLS->getActiveSheet()->getColumnDimension('E')->setWidth(30);
        $objXLS->getActiveSheet()->getColumnDimension('F')->setWidth(15);
        $objXLS->getActiveSheet()->getColumnDimension('G')->setWidth(15);
        $objXLS->getActiveSheet()->getColumnDimension('H')->setWidth(15);
        $objXLS->getActiveSheet()->getColumnDimension('I')->setWidth(15);
        $objXLS->getActiveSheet()->getColumnDimension('J')->setWidth(15);
        $objXLS->getActiveSheet()->getColumnDimension('J')->setWidth(15);
        $objXLS->getActiveSheet()->getColumnDimension('L')->setWidth(15);

        $font = array('font' => array( 'bold' => true, 'color' => array(
            'rgb'  => 'FFFFFF')));
        $objWriter = PHPExcel_IOFactory::createWriter($objXLS, 'Excel2007');

        header('Content-Type: application/vnd.ms-excel'); 
        header('Content-Disposition: attachment;filename="BUKU LOMBA ' . time() .'.xlsx"'); 
        header('Cache-Control: max-age=0'); 
        $objWriter->save('php://output'); 
        exit();     
    }

}

