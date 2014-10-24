<?php
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );

/**
 * User Profile Controller
 *
 * @uses ShopController
 * @package Shop
 * @version 0.1
 * @copyright 2013 Siteimage
 * @author <dev@imagecms.net>
 */
class Profileapi extends ShopController {
	protected $_userId = null;
	public function __construct() {
		parent::__construct ();
		
		if (! $this->dx_auth->is_logged_in ())
			redirect ( '/' );
		$this->_userId = $this->dx_auth->get_user_id ();
	}
	public function changeInfo() {
		$profile = SUserProfileQuery::create ()->filterById ( $this->_userId )->findOne ();
		
		$this->load->library ( 'form_validation' );
		$this->form_validation->set_error_delimiters ( FALSE, FALSE );
		
		$this->form_validation->set_rules ( 'name', '<b>' . lang ( 'Name' ) . '</b>', 'trim|required|xss_clean|min_length[4]' );
		$this->form_validation->set_rules ( 'email', '<b>' . lang ( 'Email' ) . '</b>', 'trim|required|xss_clean|valid_email' );
		$this->form_validation->set_rules ( 'address', '<b>' . lang ( 'Address' ) . '</b>', 'trim|required|xss_clean' );
		$this->form_validation->set_rules ( 'phone', '<b>' . lang ( 'Phone number' ) . '</b>', 'trim|required|xss_clean' );
		
		if ($this->form_validation->run ( $this ) == FALSE) {
			echo json_encode ( array (
					'msg' => validation_errors (),
					'validations' => array (
							'name' => form_error ( 'name' ),
							'email' => form_error ( 'email' ),
							'address' => form_error ( 'address' ),
							'phone' => form_error ( 'phone' ) 
					),
					'status' => false,
					'refresh' => $this->input->post ( 'refresh' ) ? $this->input->post ( 'refresh' ) : FALSE,
					'redirect' => $this->input->post ( 'redirect' ) ? $this->input->post ( 'redirect' ) : FALSE 
			) );
		} else {
			$profile->setName ( $this->input->post ( 'name' ) );
			$profile->setUserEmail ( $this->input->post ( 'email' ) );
			$profile->setAddress ( $this->input->post ( 'address' ) );
			$profile->setPhone ( $this->input->post ( 'phone' ) );
			
			$profile->save ();
			
			$this->db->where ( 'id', $this->_userId );
			$this->db->update ( 'users', array (
					'email' => $this->input->post ( 'email' ) 
			) );
			
			echo json_encode ( array (
					'msg' => lang ( 'User profile successfully changed' ),
					'status' => true,
					'refresh' => $this->input->post ( 'refresh' ) ? $this->input->post ( 'refresh' ) : FALSE,
					'redirect' => $this->input->post ( 'redirect' ) ? $this->input->post ( 'redirect' ) : FALSE 
			) );
		}
		// echo $errors;
		// redirect(shop_url('profile'));
	}
}

/* End of file profile.php */
