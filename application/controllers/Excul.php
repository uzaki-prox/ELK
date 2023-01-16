<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Excul extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Excul_model');
        $this->load->model('Serial_number');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'excul/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'excul/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'excul/index.html';
            $config['first_url'] = base_url() . 'excul/index.html';
        }

        $config['per_page'] = 20;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Excul_model->total_rows($q);
        $excul = $this->Excul_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'excul_data' => $excul,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'konten' => 'excul/excul_list',
            'judul' => 'Ekstrakulikuler',
        );
        $this->load->view('v_index', $data);
    }

    public function read($id) 
    {
        $row = $this->Excul_model->get_by_id($id);
        if ($row) {
            $data = array(
		    'no_excul' => $row->no_excul,
            'name_excul' => $row->name_excul,
		    'choach' => $row->choach,
		    'descript' => $row->descript,
	        );
            $this->load->view('excul/excul_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('excul'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('excul/create_action'),
	        'no_excul' => $this->Serial_number->make_no_excul(),
            'name_excul' => set_value('name_excul'),
	        'choach' => set_value('choach'),
	        'descript' => set_value('descript'),
            'konten' => 'excul/excul_form',
            'judul' => 'Ekstrakulikuler',
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
                'no_excul' => $this->input->post('no_excul',TRUE),
                'name_excul' => $this->input->post('name_excul',TRUE),
		    'choach' => $this->input->post('choach',TRUE),
		    'descript' => $this->input->post('descript',TRUE),
	        );
            $this->Excul_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('excul'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Excul_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Edit',
                'action' => site_url('excul/update_action'),
		        'no_excul' => set_value('no_excul', $row->no_excul),
                'name_excul' => set_value('name_excul', $row->name_excul),
		        'choach' => set_value('choach', $row->choach),
		        'descript' => set_value('descript', $row->descript),
                'konten' => 'excul/excul_form',
                'judul' => 'Ekstrakulikuler',
	        );
            $this->load->view('v_index', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('excul'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('no_excul', TRUE));
        } else {
            $data = array(
                'no_excul' => $this->input->post('no_excul',TRUE),
                'name_excul' => $this->input->post('name_excul',TRUE),
		        'choach' => $this->input->post('choach',TRUE),
		        'descript' => $this->input->post('descript',TRUE),
	        );

            $this->Excul_model->update($this->input->post('no_excul', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('excul'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Excul_model->get_by_id($id);

        if ($row) {
            $this->Excul_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('excul'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('excul'));
        }
    }

    public function _rules() 
    {
        $this->form_validation->set_rules('name_excul', 'name_excul', 'trim|required');
	    $this->form_validation->set_rules('choach', 'choach', 'trim|required');
	    $this->form_validation->set_rules('descript', 'descript', 'trim|required');
	    $this->form_validation->set_rules('no_excul', 'no_excul', 'trim');
	    $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excul_excel(){

        $data = $this->Excul_model->get_all();
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
                        'rgb'  => '0000FF' 
                    ),
                ),
            ),
        );

        $objSheet->setCellValue('A1', 'LIST EKSKUL');

        $cell  = 2;
        $objSheet->setCellValue('A'. $cell,  'No Ekskul');
        $objSheet->setCellValue('B'. $cell, 'Nama Ekstrakulikuler');
        $objSheet->setCellValue('C'. $cell, 'Pembimbing');
        $objSheet->setCellValue('D'. $cell, 'Keterangan');

        $objXLS->getActiveSheet()
        ->getStyle('A' .  $cell . ':D' . $cell)
        ->applyFromArray($font);

        $objXLS->getActiveSheet()
        ->getStyle('A' .  $cell . ':D' . $cell)
        ->getFill()
        ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
        ->getStartColor()
        ->setRGB('000');
        $objXLS->getActiveSheet()->getStyle('A1')->getFont()->setBold( true );

        $cell++;
        $query = $this->db->query("SELECT * FROM excul")->result();
        $total = 0;
        foreach ($query as $r) {
            $objSheet->setCellValueExplicit('A'.$cell, $r->no_excul, PHPExcel_Cell_DataType::TYPE_STRING);
            $objSheet->setCellValueExplicit('B'.$cell, $r->name_excul, PHPExcel_Cell_DataType::TYPE_STRING);
            $objSheet->setCellValueExplicit('C'.$cell, $r->choach, PHPExcel_Cell_DataType::TYPE_STRING);
            $objSheet->setCellValueExplicit('D'.$cell, $r->descript, PHPExcel_Cell_DataType::TYPE_STRING);

            $cell++;
            $no++;
        }

        $objXLS->getActiveSheet()->getColumnDimension('A')->setWidth(10);
        $objXLS->getActiveSheet()->getColumnDimension('B')->setWidth(50);
        $objXLS->getActiveSheet()->getColumnDimension('C')->setWidth(15);
        $objXLS->getActiveSheet()->getColumnDimension('D')->setWidth(15);

        $font = array('font' => array( 'bold' => true, 'color' => array(

            'rgb'  => 'FFFFFF')));
        $objWriter = PHPExcel_IOFactory::createWriter($objXLS, 'Excel2007');

        header('Content-Type: application/vnd.ms-excel'); 
        header('Content-Disposition: attachment;filename="LIST EKSKUL ' . time() .'.xlsx"'); 
        header('Cache-Control: max-age=0'); 
        $objWriter->save('php://output'); 
        exit();
    }

}
