<?php 
/**
 * Bill of Materials 
 *
 * @package 	Codeigniter
 * @subpackage  Controller
 * @author 		MD TARIQUE ANWER | mtarique@outlook.com
 * @copyright 	Copyright (c) 2019, Rituraj Textile & General Industries. (https://rituraj.com/)
 */
defined('BASEPATH') or exit('No direct script access allowed.');

class Bom extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->helper('auth_helper');

		$this->load->model(array('items/materials_model', 'items/products_model', 'items/bom_model')); 
	}

	/**
	 * View bill of materials page default method 
	 *
	 * @return void
	 */
	public function index()
	{
		$page['title']       = "Bill of Materials"; 
		$page['description'] = "Manage product's bill of materials or recipes."; 
		$page['prod_id']	 = $this->input->get('prodid'); 
		$page['prod_name']	 = $this->input->get('prodname'); 
		$page['bom_table']   = $this->get_bom_table($this->input->get('prodid')); 

		$this->load->view('items/bom_view', $page); 
    }

	/**
	 * Get material options for select or datalist
	 *
	 * @return void
	 */
    public function get_matl_options_by_search()
    {
        $keyword = $this->input->get('keyword'); 

        $result = $this->materials_model->get_matl_by_search($keyword); 

        $matl_options = '';

        if(!empty($result))
        {
            foreach($result as $row)
            {    
				$matl_desc = $row['matl_id'].'-'.$row['matl_name'].'-'.$row['matl_color']; 

                $matl_options .=  '<option value="'.$row['matl_id'].'" matl-desc="'.$matl_desc.'">'.$matl_desc.'</option>';
			}	
        }
		
		echo $matl_options; 
	}

	/**
	 * Get material name by id
	 *
	 * @return void
	 */
	public function get_matl_desc_by_id()
	{
		$matl_id = $this->input->get('matlid'); 

		$result = $this->materials_model->get_matl_by_id($matl_id); 
		
		if($result['status'] == true) 
		{
			echo $result['data'][0]['matl_name']." - ".$result['data'][0]['matl_color'];
		}
		else echo null; 
	}

	/**
	 * Add bill of material
	 *
	 * @return void
	 */
	public function add_bom()
	{
		// Form validation rules
		$this->form_validation->set_rules('txtProdId', 'Product Id', 'required'); 
		$this->form_validation->set_rules('txtMatlId', 'Material Id', 'required');
		$this->form_validation->set_rules('txtMatlName', 'Material Name', 'required');
		$this->form_validation->set_rules('txtMatlQty', 'Material Quantity', 'required');
		$this->form_validation->set_rules('txtMatlQtyUom', 'Material Quantity UOM', 'required');

		// Validate user inputs
		if($this->form_validation->run() == true)
		{
			$bom_data['prod_id']      = $this->input->post('txtProdId');
			$bom_data['matl_id']      = $this->input->post('txtMatlId'); 
			$bom_data['matl_qty']     = $this->input->post('txtMatlQty'); 
			$bom_data['matl_qty_uom'] = $this->input->post('txtMatlQtyUom');  

			$result = $this->bom_model->insert_bom($bom_data); 

			if($result['status'] == true)
			{	
				$html = '
					<tr class="table-success">
						<td class="align-middle text-center">'.$bom_data['matl_id'].'</td>
						<td class="align-middle text-nowrap text-left w-75">'.$this->input->post('txtMatlName').'</td>
						<td class="align-middle text-right">'.$bom_data['matl_qty'].'</td>
						<td class="align-middle text-left">'.$bom_data['matl_qty_uom'].'</td>
						<td class="align-middle text-center">
							<a href="" class="" title="Delete material for this poduct">
								<i class="las la-trash la-lg text-danger"></i>
							</a>
						</td>
					</tr>
				';

				$json_data['status'] = 'success'; 
				$json_data['title'] = "Added!"; 
				$json_data['data'] = $html; 
			}
			else {
				$html = '
					<tr class="table-danger">
						<td class="align-middle text-center" colspan="4">
							'.$result['data'].'
						</td>
					</tr>
				';

				$json_data['status'] = 'error'; 
				$json_data['title']  = 'Oops!';
				$json_data['data']   = $result['data'];
			}
		}
		else {
			$json_data['status'] = 'error'; 
			$json_data['title']  = 'Oops!';
			$json_data['data']   = validation_errors();
		}

		echo json_encode($json_data); 
	}

	/**
	 * Get bill of materials table rows
	 *
	 * @param [type] $prod_id
	 * @return void
	 */
	public function get_bom_table($prod_id)
	{	
		$html = '';

		$result = $this->bom_model->get_bom($prod_id); 

		if(!empty($result))
		{
			foreach($result as $row)
			{
				$html .= '
					<tr>
						<td class="align-middle text-center">'.$row->matl_id.'</td>
						<td class="align-middle text-nowrap text-left w-75">'.$row->matl_name.' - '.$row->matl_color.'</td>
						<td class="align-middle text-right">'.$row->matl_qty.'</td>
						<td class="align-middle text-left">'.$row->matl_qty_uom.'</td>
						<td class="align-middle text-center">
							<a href="#" class="text-decoration-none lnk-del-bom" data-toggle="tooltip" data-placement="bottom" data-html="false" title="Delete material" prod-id="'.$row->prod_id.'" matl-id="'.$row->matl_id.'">
								<i class="las la-trash la-lg text-danger"></i>
							</a>
						</td>
					</tr>
				';
			}
		}
		else {
			$html .= '
				<tr>
					<td class="align-middle text-nowrap font-weight-bold text-center w-100" colspan="4">Please add a material!</td>
				</tr>
			';
		}

		return $html;
	}

	/**
	 * Delete bill of material
	 *
	 * @return void
	 */
	public function delete_bom()
	{
		$prod_id = $this->input->get('prodid'); 
		$matl_id = $this->input->get('matlid'); 

		// Call model for query to delete notification 
		$result = $this->bom_model->delete_bom($prod_id, $matl_id);

		// Query response 
		if($result['status'] == true) 
		{
			$json_data = array(
				'status' => 'success', 
				'title'  => 'Deleted!', 
				'data'   => $result['data']
			);
		}
		else {
			$json_data = array(
				'status' => 'error', 
				'title'  => 'Oops!', 
				'data'   => $result['data']
			);
		}

		// Send json encoded response
		echo json_encode($json_data);
	}
}