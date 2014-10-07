<?php

/**
 * ShopAdminDiscounts
 * 
 * @uses ShopAdminController
 * @package 
 * @version $id$
 * @copyright 
 * @author <dev@imagecms.net>
 * @license 
 */
class ShopAdminComulativ extends ShopAdminController {
	public $dbName = 'shop_comulativ_discount';
	protected $perPage = 5;
	protected $ordersPerPage = 6;
	public function __construct() {
		parent::__construct ();
	}
	
	/**
	 * Display list of discounts
	 *
	 * @access public
	 */
	public function index() {
		$model = $this->db->get ( $this->dbName )->result_array ();
		
		$this->render ( 'list', array (
				'model' => $model 
		) );
	}
	
	/**
	 * Create new currency
	 *
	 * @access public
	 * @return void
	 */
	public function create() {
		if ($_POST) {
			$this->load->library ( 'form_validation' );
			$this->form_validation->set_rules ( 'discount', lang ( 'Discount', 'admin' ), 'required|numeric|max_length[3]' );
			$this->form_validation->set_rules ( 'total', lang ( 'The amount of', 'admin' ), 'required|numeric' );
			$this->form_validation->set_rules ( 'total_a', lang ( 'Amount before', 'admin' ), 'required|numeric' );
			$this->form_validation->set_rules ( 'description', lang ( 'Description', 'admin' ), 'required|trim' );
			
			if ($this->form_validation->run ( $this ) == FALSE) {
				
				showMessage ( validation_errors (), '', 'r' );
				exit ();
			} else {
				$date = date ( 'U' );
				$description = $this->input->post ( 'description' );
				$discount = $this->input->post ( 'discount' );
				$active = $this->input->post ( 'active' );
				$total = $this->input->post ( 'total' );
				$total_a = $this->input->post ( 'total_a' );
				
				$data = array (
						'description' => $description,
						'discount' => $discount,
						'active' => $active,
						'date' => $date,
						'total' => $total,
						'total_a' => $total_a 
				);
				
				$this->db->insert ( $this->dbName, $data );
				
				showMessage ( lang ( 'Discount created', 'admin' ) );
				
				$info = $this->db->get_where ( 'shop_comulativ_discount', array (
						'description' => $data ['description'] 
				) );
				$row = $info->row ();
				
				$action = $_POST ['action'];
				
				if ($action == 'new') {
					pjax ( '/admin/components/run/shop/comulativ/edit/' . $row->id );
				} else {
					pjax ( '/admin/components/run/shop/comulativ/index' );
				}
			}
		} else {
			$this->render ( 'create', array () );
		}
	}
	
	/**
	 * Edit discount
	 *
	 * @param
	 *        	$id
	 */
	public function edit($id = null) {
		$model = $this->db->get_where ( $this->dbName, array (
				'id' => $id 
		) )->result_array ();
		
		$query = $this->db->query ( "SELECT total, total_a FROM shop_comulativ_discount WHERE id = $id" );
		$row = $query->row_array ();
		
		$queryDC = $this->db->query ( 'SELECT id, username, phone, address, email, created FROM users WHERE amout >= ' . $row ['total'] . ' AND amout < ' . $row ['total_a'] );
		$rowDC = $queryDC->result_array ();
		
		if ($_POST) {
			$this->load->library ( 'form_validation' );
			$this->form_validation->set_rules ( 'discount', lang ( 'Discount', 'admin' ), 'required|trim|max_length[3]' );
			$this->form_validation->set_rules ( 'total', lang ( 'The amount of', 'admin' ), 'required|trim|numeric' );
			$this->form_validation->set_rules ( 'description', lang ( 'Description', 'admin' ), 'required|trim' );
			$this->form_validation->set_rules ( 'total_a', lang ( 'Amount before', 'admin' ), 'required|trim|numeric' );
			
			if ($this->form_validation->run ( $this ) == FALSE) {
				
				showMessage ( validation_errors (), '', 'r' );
			} else {
				$date = date ( 'U' );
				$description = $this->input->post ( 'description' );
				$discount = $this->input->post ( 'discount' );
				$active = $this->input->post ( 'active' );
				$total = $this->input->post ( 'total' );
				$total_a = $this->input->post ( 'total_a' );
				
				$data = array (
						'description' => $description,
						'discount' => $discount,
						'active' => $active,
						'date' => $date,
						'total' => $total,
						'total_a' => $total_a 
				);
				
				$this->db->where ( 'id', $id );
				$this->db->update ( $this->dbName, $data );
				
				showMessage ( lang ( 'Discount updated', 'admin' ) );
				
				$action = $_POST ['action'];
				
				if ($action == 'edit') {
					pjax ( '/admin/components/run/shop/comulativ/edit/' . $id );
				} else {
					pjax ( '/admin/components/run/shop/comulativ/index' );
				}
			}
		} else {
			
			$totalUsers = count ( $rowDC );
			if ($totalUsers > $this->perPage) {
				$this->load->library ( 'Pagination' );
				
				$config ['base_url'] = site_url ( 'admin/components/run/shop//comulativ/edit/' . $id );
				$config ['total_rows'] = $totalUsers;
				$config ['per_page'] = $this->perPage;
				$config ['uri_segment'] = $this->uri->total_segments ();
				
				$config ['separate_controls'] = true;
				$config ['full_tag_open'] = '<div class="pagination pull-left"><ul>';
				$config ['full_tag_close'] = '</ul></div>';
				$config ['controls_tag_open'] = '<div class="pagination pull-right"><ul>';
				$config ['controls_tag_close'] = '</ul></div>';
				$config ['next_link'] = lang ( 'Next', 'admin' ) . '&nbsp;&gt;';
				$config ['prev_link'] = '&lt;&nbsp;' . lang ( 'Prev', 'admin' );
				$config ['cur_tag_open'] = '<li class="btn-primary active"><span>';
				$config ['cur_tag_close'] = '</span></li>';
				$config ['prev_tag_open'] = '<li>';
				$config ['prev_tag_close'] = '</li>';
				$config ['next_tag_open'] = '<li>';
				$config ['next_tag_close'] = '</li>';
				$config ['num_tag_close'] = '</li>';
				$config ['num_tag_open'] = '<li>';
				$config ['num_tag_close'] = '</li>';
				
				$this->pagination->num_links = 5;
				$this->pagination->initialize ( $config );
				$this->template->assign ( 'paginator', $this->pagination->create_links_ajax () );
			}
			$this->render ( 'edit', array (
					'model' => $model,
					'rowDC' => $rowDC 
			) );
		}
	}
	public function allUsers() {
		$model = $this->db->query ( 'SELECT  id, username, email, created, amout, discount FROM users' );
		$users = $model->result_array ();
		
		$this->render ( 'allusers', array (
				'users' => $users 
		) );
	}
	public function user($id = Null) {
		$model = $this->db->query ( 'SELECT id, username, email, amout, discount FROM users WHERE id =' . $id );
		$user = $model->result_array ();
		
		if ($_POST) {
			$this->load->library ( 'form_validation' );
			$this->form_validation->set_rules ( 'discount', lang ( 'Discount', 'admin' ), 'numeric|max_length[3]' );
			
			if ($this->form_validation->run ( $this ) == FALSE) {
				
				showMessage ( validation_errors (), '', 'r' );
			} else {
				
				$discount_user_profile = $this->input->post ( 'discount' );
				
				$data = array (
						'discount' => $discount_user_profile 
				);
				
				$this->db->where ( 'id', $id );
				$this->db->update ( 'users', $data );
				
				showMessage ( lang ( 'Deposit rates', 'admin' ) . ' <b>' . $user ['0'] ['username'] . '</b> ' . lang ( 'refreshed successfully', 'admin' ) );
				
				$action = $_POST ['action'];
				if ($action == 'edit') {
					pjax ( '/admin/components/run/shop/comulativ/user/' . $id );
				} else {
					pjax ( '/admin/components/run/shop/comulativ/allusers' );
				}
			}
		} else {
			$this->render ( 'user', array (
					'user' => $user 
			) );
		}
	}
	
	/**
	 * Delete warehouse
	 *
	 * @return void
	 */
	public function deleteAll() {
		if (empty ( $_POST ['ids'] )) {
			showMessage ( lang ( 'No data transmitted', 'admin' ), '', 'r' );
			exit ();
		}
		if (sizeof ( $_POST ['ids'] > 0 )) {
			$model = ShopComulativQuery::create ()->findPks ( $_POST ['ids'] );
			
			if (! empty ( $model )) {
				foreach ( $model as $order ) {
					$order->delete ();
				}
				
				showMessage ( lang ( 'Cumulative discount removed', 'admin' ) );
			}
		}
	}
	function change_comulativ_dis_status($id) {
		$model = ShopComulativQuery::create ()->findPk ( $id );
		if ($model->getActive ())
			$model->setActive ( '0' );
		else
			$model->setActive ( '1' );
		$model->save ();
	}
}
