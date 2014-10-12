<?php

// include '/home/koloda/sites/bigtrucksale/www/bigtracksale/application/modules/shop/models/build/classes/Shop/CustomFieldsQuery.php';
// use \CustomFieldsQuery;
class ShopAdminCustomfields extends ShopAdminController {
	public $defaultLanguage = null;
	public function __construct() {
		parent::__construct ();

		$this->defaultLanguage = getDefaultLanguage ();
	}

	/**
	 * Show list of avaliable custom fields
	 *
	 * @param type $offset
	 * @param type $orderField
	 * @param type $orderCriteria
	 */
	public function index($offset = 0, $orderField = '', $orderCriteria = '') {
		// echo get_class_methods(CustomFieldsQuery::create());
		$customFields = CustomFieldsQuery::create ()->orderByposition ()->find ();
		$customFieldsCount = $customFields->count ();

		$this->render ( 'list', array (
				'customFields' => $customFields,
				'customFieldsCount' => $customFieldsCount,
				'orderField' => $orderField,
				'locale' => $this->defaultLanguage ['identif']
		) );
	}

	/**
	 * Create custom field
	 */
	public function create() {
		if (! empty ( $_POST )) {
			$model = new CustomFields ();
			$this->form_validation->set_rules ( $model->rules () );
				
			if ($this->form_validation->run () == FALSE) {
				showMessage ( lang ( 'Error', 'admin' ), '', 'r' );
			} else {
				if ($this->input->post ( 'Entity' ) == 'user_order') {
					$_POST ['Entity'] = 'user';
					$this->saveModels ( $model );
					$model = new CustomFields ();
					$_POST ['Entity'] = 'order';
					$this->saveModels ( $model );
				} else {
					$this->saveModels ( $model );
				}
				showMessage ( lang ( 'An additional field is created', 'admin' ) );
				pjax ( '/admin/components/run/shop/customfields' );
			}
		} else
			$this->render ( 'create', array (
					'model' => $model
			) );
	}
	public function saveModels($model, $create = true) {
		$model->fromArray ( $_POST );

		if ($_POST ['is_required'])
			$model->setIsRequired ( true );
		else
			$model->setIsRequired ( false );

		if ($_POST ['is_active'])
			$model->setIsActive ( true );
		else
			$model->setIsActive ( false );

		if ($_POST ['is_private'])
			$model->setIsPrivate ( true );
		else
			$model->setIsPrivate ( false );

		if ($_POST ['multiple_select'] == 'on')
			$model->setOptions ( 'multiple' );

		if ($_POST ['validators'])
			$model->setValidators ( $_POST ['validators'] );

		if ($create) {
			$model->setfieldlabel ( $_POST ['fLabel'] );
			$model->setfielddescription ( $_POST ['description'] );
			if (! empty ( $_POST ['possible_values'] )) {
				$values = explode ( ',', $_POST ['possible_values'] );
				for($i = 0; $i < count ( $values ); $i ++)
					$values [$i] = trim ( $values [$i] );
				$model->setpossiblevalues ( serialize ( $values ) );
			}
		}

		$model->save ();
	}

	/**
	 * Edit custom field
	 *
	 * @param integer $customfieldId
	 *        	Id of custom field to edit
	 */
	public function edit($customfieldId = null, $locale = 'ru') {
		$model = CustomFieldsQuery::create ()->findPk ( ( int ) $customfieldId );

		if ($model === null)
			$this->error404 ( lang ( 'Field not found', 'admin' ) );

		$name = $model->getname ();
		if (! empty ( $_POST )) {
			if ($model->getname () != $this->input->post ( 'name' ))
				$this->form_validation->set_rules ( $model->rules () );
			else
				$this->form_validation->set_rules ( 'fLabel', 'Label', 'required' );
				
			if ($this->form_validation->run () == FALSE)
				showMessage ( validation_errors (), '', 'r' );
			else {

				$this->saveModels ( $model, false );

				$model_locale = CustomFieldsI18nQuery::create ()->filterByLocale ( $locale )->filterById ( $model->getId () )->findOne ();

				$this->update_i18n ( $model_locale, $model, $locale );

				if ($model->getEntity () == 'user' or $model->getEntity () == 'order') {
					$model_conect = CustomFieldsQuery::create ()->filterByname ( $name );
					if ($model->getEntity () == 'user')
						$model_conect = $model_conect->filterByEntity ( 'order' );
					else
						$model_conect = $model_conect->filterByEntity ( 'user' );
						
					$model_conect = $model_conect->findOne ();
					if ($model_conect) {
						$model_conect->setname ( $model->getname () );
						$model_conect->save ();

						$model_locale_conect = CustomFieldsI18nQuery::create ()->filterByLocale ( $locale )->filterById ( $model_conect->getId () )->findOne ();

						$this->update_i18n ( $model_locale_conect, $model_conect, $locale );
					}
				}

				showMessage ( lang ( 'Changes have been saved', 'admin' ) );

				$action = $_POST ['action'];

				if ($action == 'edit') {
					pjax ( '/admin/components/run/shop/customfields/edit/' . $customfieldId );
				} else {
					pjax ( '/admin/components/run/shop/customfields' );
				}
			}
		} else {
			$this->render ( 'edit', array (
					'locale' => $locale,
					'languages' => $this->db->get ( 'languages' )->result_array (),
					'model' => $model
			) );
		}
	}
	public function update_i18n($model_locale, $model_withid, $locale) {
		if (! empty ( $_POST ['possible_values'] )) {
			$values = explode ( ',', $_POST ['possible_values'] );
			for($i = 0; $i < count ( $values ); $i ++)
				$values [$i] = trim ( $values [$i] );
		}

		if ($model_locale) {
			$model_locale->setfielddescription ( $_POST ['description'] );
			$model_locale->setfieldlabel ( $_POST ['fLabel'] );
			$model_locale->setpossiblevalues ( serialize ( $values ) );
			$model_locale->save ();
		} else {
			$model_locale = new CustomFieldsI18n ();
			$model_locale->setfieldlabel ( $_POST ['fLabel'] );
			$model_locale->setfielddescription ( $_POST ['description'] );
			$model_locale->setpossiblevalues ( serialize ( $values ) );
			$model_locale->setId ( $model_withid->getId () );
			$model_locale->setLocale ( $locale );
			$model_locale->save ();
		}
	}

	/**
	 * delete set of custom fields
	 */
	public function deleteAll() {
		if (empty ( $_POST ['ids'] )) {
			showMessage ( lang ( 'No data transmitted', 'admin' ), '', 'r' );
			exit ();
		}
		if (sizeof ( $_POST ['ids'] > 0 )) {
			$model = CustomFieldsQuery::create ()->findPks ( $_POST ['ids'] );
				
			if (! empty ( $model )) {
				foreach ( $model as $order ) {
						
					$order->delete ();
				}

				showMessage ( lang ( 'Field is removed', 'admin' ) );
			}
		}
	}
	function change_status_activ($id) {
		$model = CustomFieldsQuery::create ()->findPk ( $id );
		if ($model->getIsActive ())
			$model->setIsActive ( '0' );
		else
			$model->setIsActive ( '1' );
		$model->save ();
	}
	function change_status_private($id) {
		$model = CustomFieldsQuery::create ()->findPk ( $id );
		if ($model->getIsPrivate ())
			$model->setIsPrivate ( '0' );
		else
			$model->setIsPrivate ( '1' );
		$model->save ();
	}
	function change_status_required($id) {
		$model = CustomFieldsQuery::create ()->findPk ( $id );
		if ($model->getIsRequired ())
			$model->setIsRequired ( '0' );
		else
			$model->setIsRequired ( '1' );
		$model->save ();
	}
	public function save_positions() {
		if (! $this->input->post ( 'positions' ))
			return false;
		$updates = array ();
		foreach ( $this->input->post ( 'positions' ) as $key => $id )
			$updates [] = array (
					'id' => $id,
					'position' => $key
			);
		$this->db->update_batch ( 'custom_fields', $updates, 'id' );
		showMessage ( 'Positions saved' );
	}
}