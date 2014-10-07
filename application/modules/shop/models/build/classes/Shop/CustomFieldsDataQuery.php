<?php

/**
 * Skeleton subclass for performing query and update operations on the 'custom_fields_data' table.
 *
 * 
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.Shop
 */
class CustomFieldsDataQuery extends BaseCustomFieldsDataQuery {
	public function getCustomFieldsData($entity_id, $entity = 'user', $getPrivateData = true) {
		$names = CustomFieldsQuery::create ()->filterByIsActive ( true )->find ()->toArray ( $keyColumn = 'id' );
		
		$c = new Criteria ();
		$c->add ( CustomFieldsPeer::IS_ACTIVE, true );
		$c->add ( CustomFieldsPeer::ENTITY, $entity );
		if (! $getPrivateData)
			$c->add ( CustomFieldsPeer::IS_PRIVATE, false );
		$c->addJoin ( CustomFieldsPeer::ID, CustomFieldsDataPeer::FIELD_ID, Criteria::LEFT_JOIN );
		$c->add ( CustomFieldsDataPeer::ENTITY_ID, $entity_id );
		
		$fieldsData = CustomFieldsDataPeer::doSelect ( $c );
		
		$data = array ();
		
		foreach ( $fieldsData as $field )
			$data ['custom_field_' . $names [$field->field_id] ['name']] = $field->field_data;
		
		return $data;
	}
}

// CustomFieldsDataQuery
