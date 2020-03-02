<?php 
defined('BASEPATH') or exit('No direct script access allowed.');

class Currencies extends CI_Controller
{
    public function __construct()
    {
        parent::__construct(); 

        $this->load->model('systems/currencies_model');
    }

    /**
     * Get currencies options for select
     *
     * @return html
     */
    public function get_curr_options()
    {
        $curr_options = '';

        $result = $this->currencies_model->get_curr('Enabled');

        if($result['status'] == true)
        {   
            foreach($result['data'] as $row)
            {
                $curr_options .= '<option value="'.$row['curr_code'].'">'.$row['curr_code'].'</option>';
            }
        }
        else $curr_options .=  '<option value>'.$result['data'].'</option>';

        echo $curr_options; 
    }
}

?>