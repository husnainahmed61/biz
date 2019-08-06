<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class MY_Form_validation extends CI_Form_validation
{
  function run($module = '', $group = ''){
  (is_object($module)) AND $this->CI = &$module;
  return parent::run($group);
  }

// call back validation function to do
  public function validate_feestypename()
  {
    $this->CI =& get_instance();
    $this->CI->load->model('model_feestype');
    $validate = $this->CI->model_feestype->validate_feestypename();
    if($validate === true) {
           $this->CI->form_validation->set_message->set_message('validate_feestypename', 'The {field} already exists');
      return false;           
    }
    else {
      return true;
    }
  }
}