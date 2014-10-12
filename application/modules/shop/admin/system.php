<?php

/**
 * ShopCore class file
 *
 * @package Shop
 * @copyright 2010 Siteimage
 * @author <dev@imagecms.net>
 */
use ImportCSV\ImportBootstrap as Import;
class ShopAdminSystem extends ShopAdminController {

	/**
	 * Fields in export that are marked by default
	 *
	 * @var array
	 */
	private $checkedFields = array (
			'name',
			'url',
			'prc',
			'var'
	);
	private $languages = null;
	private $uploadDir = './application/backups/';
	private $csvFileName = 'product_csv_1.csv';
	private $uplaodedFileInfo = array ();
	public function __construct() {
		parent::__construct ();
		$this->languages = $this->db->get ( 'languages' )->result ();
		$this->load->helper ( 'file' );
		ini_set ( 'max_execution_time', 9000000 );
		set_time_limit ( 9000000 );
	}

	/**
	 * Import products from CSV file
	 *
	 * @return void
	 */
	public function import() {
		if (count ( $_FILES ))
			$this->saveCSVFile ();
		if (count ( $_POST ['attributes'] ) && $_POST ['csvfile']) {
			$importSettings = $this->cache->fetch ( 'ImportExportCache' );
			if (empty ( $importSettings ) || $importSettings ['withBackup'] != $this->input->post ( 'withBackup' ))
				$this->cache->store ( 'ImportExportCache', array (
						'withBackup' => $this->input->post ( 'withBackup' )
				), '25920000' );
			$result = Import::create ()->withBackup ()->startProcess ()->resultAsString ();
			echo (json_encode ( $result ));
		} else {
			if (! $_FILES) {

				$customFields = SPropertiesQuery::create ()->orderByPosition ()->find ();
				$cFieldsTemp = $customFields->toArray ();
				$cFields = array ();
				foreach ( $cFieldsTemp as $f )
					$cFields [] = $f ['CsvName'];

				$importSettings = $this->cache->fetch ( 'ImportExportCache' );
				$this->template->assign ( 'withBackup', $importSettings ['withBackup'] );
				$this->configureImportProcess ();
				$this->template->registerJsFile ( 'application/modules/shop/admin/templates/system/importExportAdmin.js', 'after' );
				$this->render ( 'import', array (
						'customFields' => SPropertiesQuery::create ()->orderByPosition ()->find (),
						'languages' => $this->languages,
						'cFields' => $cFields,
						'currencies' => SCurrenciesQuery::create ()->orderByIsDefault ()->find (),
						'attributes' => ImportCSV\BaseImport::create ()->makeAttributesList ()->possibleAttributes,
						'checkedFields' => $this->checkedFields
				) );
			}
		}

		$this->cache->delete_all ();

		if ($_POST ['withResize']) {
			$result [content] = explode ( '/', trim ( $result ['content'] [0] ) );
			\MediaManager\Image::create ()->resizeById ( $result ['content'] )->resizeByIdAdditional ( $result ['content'], TRUE );
		}

		if ($_POST ['withCurUpdate'])
			\ShopCore::app ()->SCurrencyHelper->checkPrices ();
	}
	public function getCategoryProperties() {
		$cats = $_POST ['selectedCats'];
		if (count ( $cats ) > 0) {
			$properties = SPropertiesQuery::create ()->join ( 'ShopProductPropertiesCategories' )->where ( 'ShopProductPropertiesCategories.CategoryId IN ?', $cats )->joinWithI18n ()->distinct ()->orderByPosition ()->find ();
		} else {
			$properties = SPropertiesQuery::create ()->joinWithI18n ()->orderByPosition ()->find ();
		}

		$result = '';
		foreach ( $properties as $p ) {
			$result .= '<div class="serverResponse">
			<span class="frame_label no_connection eattrcol">
			<span class="niceCheck b_n">
			<input type="checkbox" value="1" class="eattr" name="attribute[' . $p->getCsvName () . ']" />
			</span>
			' . $p->getName () . '
			</span>
			</div>';
		}
		if (empty ( $result ))
			$result = '<p class="serverResponse">' . lang ( 'Could not find any properties', 'admin' ) . '</p>';

		echo $result;
		return;
	}
	public function export() {
		$export = new ShopExportDataBase ( array (
				'attributes' => $_POST ['attribute'],
				'attributesCF' => $_POST ['cf'],
				'import_type' => trim ( $_POST ['import_type'] ),
				'delimiter' => trim ( $_POST ['delimiter'] ),
				'enclosure' => trim ( $_POST ['enclosure'] ),
				'encoding' => trim ( $_POST ['encoding'] ),
				'currency' => trim ( $_POST ['currency'] ),
				'languages' => trim ( $_POST ['language'] ),
				'selectedCats' => $_POST ['selectedCats']
		) );

		$export->getDataArray ();
		if ($export->hasErrors () == FALSE) {
			if (! $this->input->is_ajax_request ()) {
				// if the request is from Ajax, then start file download
				if (trim ( $_POST ['formed_file_type'] ) != "0") {
					// was already been formed - just start downloading
					$this->downloadFile ( $_POST ['formed_file_type'] );
					return;
				}

				// file forming
				$this->createFile ( $_POST ['type'], $export );
				// then start downloading
				$this->downloadFile ( $_POST ['type'] );
				return;
			}
				
			// ajax request - only forming and output file type
			if (FALSE !== $this->createFile ( $_POST ['type'], $export )) {
				echo $_POST ['type'];
				return;
			}
				
			echo "Error";
		} else {
			echo $this->processErrors ( $export->getErrors () );
		}
	}

	/**
	 * Start file downloading
	 *
	 * @param string $type
	 *        	file type csv|xls|xlsx
	 */
	protected function downloadFile($type = 'csv') {
		if (! in_array ( $type, array (
				'csv',
				'xls',
				'xlsx'
		) ))
			return;

		$file = 'products.' . $type;
		$path = $this->uploadDir . $file;
		if (file_exists ( $path )) {
			$this->load->helper ( 'download' );
			$data = file_get_contents ( $path );
			if ($type == 'csv') {
				// for some reason downloaded file has text/x-c++ mime-type
				header ( 'Content-type: text/csv' );
			}
			force_download ( $file, $data );
		}
	}

	/**
	 * File creating
	 *
	 * @param string $type
	 *        	file type
	 * @param ShopExportDataBase $export
	 * @return string file name
	 */
	protected function createFile($type, $export) {
		switch ($type) {
			case "xls" :
				return $export->saveToExcelFile ( $this->uploadDir, "Excel5" );
				break;
			case "xlsx" :
				return $export->saveToExcelFile ( $this->uploadDir, "Excel2007" );
				break;
			default : // csv
				return $export->saveToCsvFile ( $this->uploadDir );
		}
	}

	/**
	 */
	private function saveCSVFile() {
		$this->takeFileName ();

		$this->load->library ( 'upload', array (
				'max_size' => '10240',
				'overwrite' => true,
				'upload_path' => $this->uploadDir,
				'allowed_types' => 'csv|xls|xlsx'
		) );

		if ($this->upload->do_upload ( 'userfile' )) {
			$data = $this->upload->data ();
			if (($data ['file_ext'] === '.xls') || ($data ['file_ext'] === '.xlsx')) {
				$this->convertXLStoCSV ( $data ['full_path'] );
				unlink ( './application/backups/' . $data ['client_name'] );
			} else {
				rename ( './application/backups/' . $data ['client_name'], './application/backups/' . $this->csvFileName );
			}
				
			$this->configureImportProcess ();
		} else
			echo json_encode ( array (
					'error' => $this->upload->display_errors ()
			) );
	}
	private function convertXLStoCSV($excel_file = '') {
		include './application/modules/shop/classes/PHPExcel.php';
		include './application/modules/shop/classes/PHPExcel/IOFactory.php';
		include './application/modules/shop/classes/PHPExcel/Writer/Excel2007.php';
		$objReader = PHPExcel_IOFactory::createReaderForFile ( $excel_file );
		$objReader->setReadDataOnly ( true );
		$objPHPExcel = $objReader->load ( $excel_file );
		$sheetData = $objPHPExcel->getActiveSheet ()->toArray ( null, true, true, true );

		foreach ( $sheetData as $i ) {
			foreach ( $i as $j ) {
				$toPrint .= '"' . str_replace ( '"', '""', $j ) . '";';
			}
			$toPrint .= PHP_EOL;
		}
		$filename = $this->csvFileName;
		fopen ( './application/backups/' . $filename, 'w+' );
		if (is_writable ( './application/backups/' . $filename )) {
			if (! $handle = fopen ( './application/backups/' . $filename, 'w+' )) {
				echo json_encode ( array (
						'error' => \ImportCSV\Factor::ErrorFolderPermission
				) );
				exit ();
			}
				
			write_file ( './application/backups/' . $filename, $toPrint );
				
			fclose ( $handle );
		} else {
			showMessage ( lang ( "The file {$filename} is not writable", 'admin' ) );
		}
	}
	private function configureImportProcess($vector = true) {
		if (file_exists ( $this->uploadDir . $this->csvFileName )) {
			$file = fopen ( $this->uploadDir . $this->csvFileName, 'r' );
			$row = array_diff ( fgetcsv ( $file, 10000, ";", '"' ), array (
					null
			) );
			fclose ( $file );
			$this->getFilesInfo ();
			foreach ( $this->uplaodedFileInfo as $file )
				$uploadedFiles [str_replace ( '.', '', $file ['name'] )] = date ( 'd.m.y H:i', $file ['date'] );
			if ($vector && $this->input->is_ajax_request () && $_FILES)
				echo json_encode ( array (
						'success' => true,
						'row' => $row,
						'attributes' => \ImportCSV\BaseImport::create ()->attributes,
						'filesInfo' => $uploadedFiles
				) );
			else
				$this->template->add_array ( array (
						'rows' => $row,
						'attributes' => \ImportCSV\BaseImport::create ()->makeAttributesList ()->possibleAttributes,
						'filesInfo' => $uploadedFiles
				) );
		}
	}
	private function takeFileName() {
		$fileNumber = (in_array ( $_POST ['csvfile'], array (
				1,
				2,
				3
		) )) ? intval ( $_POST ['csvfile'] ) : 1;
		$this->csvFileName = "product_csv_$fileNumber.csv";
	}
	public function getAttributes() {
		$this->takeFileName ();
		$this->configureImportProcess ( false );
		$this->render ( 'import_attributes' );
	}
	private function getFilesInfo($dir = null) {
		$dir = ($dir == null) ? $this->uploadDir : $dir;
		foreach ( get_filenames ( $dir ) as $file ) {
			if (strpos ( $file, 'roduct_csv_' )) {
				$this->uplaodedFileInfo [] = get_file_info ( $this->uploadDir . $file );
			}
		}
	}

	/**
	 */
	public function exportUsers() {
		if (empty ( $_POST ['export'] )) {
				
			showMessage ( lang ( 'You do not choose', 'admin' ), '', 'r' );
			exit ();
		}
		if ($_POST ['export'] == 'csv') {
			$this->load->helper ( 'download' );
			$model = SUserProfileQuery::create ()->find ();
				
			$fp = fopen ( './uploads/exportUsers.csv', 'w' );
			if ($fp === false) {

				redirect ( '/admin/components/run/shop/users/index#export' );
			}
				
			foreach ( $model as $u ) {
				fwrite ( $fp, "\"" . $u->getUserEmail () . "\",\"" . $u->getName () . "\"\n" );
			}
			fseek ( $fp, 0 );
				
			fclose ( $fp );
				
			$data = file_get_contents ( "./uploads/exportUsers.csv" );
			$name = 'exportUsers.csv';
				
			force_download ( $name, $data );
		} elseif ($_POST ['export'] == 'monkey') {
				
			$settings = &ShopCore::app ()->SSettings;
			$model = SUserProfileQuery::create ()->find ();
				
			if ($settings->adminMessageMonkey && $settings->adminMessageMonkeylist) {
				$config = array (
						'apikey' => $settings->adminMessageMonkey,
						'secure' => FALSE
				);

				$this->load->library ( 'MCAPI', $config, 'mail_chimp' );

				foreach ( $model as $u ) {
						
					$this->mail_chimp->listSubscribe ( $settings->adminMessageMonkeylist, $u->getUserEmail () );
				}
				pjax ( '/admin/components/run/shop/users/index' );
				showMessage ( lang ( 'Export successfully', 'admin' ) );
			} else {
				pjax ( '/admin/components/run/shop/users/index#export' );
				showMessage ( lang ( 'No configuration key or<br /> key account list on Mailchimp', 'admin' ) . $settings->adminMessageMonkeylist, '', 'r' );
			}
		}

		// return false;
	}

	/**
	 *
	 * Create html box with errors.
	 *
	 * @param array $errors
	 *        	Errors array
	 * @return string
	 */
	protected function processErrors(array $errors) {
		$result = '';
		foreach ( $errors as $err ) {
			$result .= $err . '<br/>';
		}

		return '<p class="errors">' . $result . '</p>';
	}

	/**
	 * Check uploaded file extension
	 *
	 * @return boolean
	 */
	protected function checkFileExtension($fileName) {
		$parts = explode ( '.', $fileName );

		if (end ( $parts ) != 'csv') {
			return false;
		} else {
			return true;
		}
	}
}
