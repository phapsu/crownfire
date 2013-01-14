<?php
$document_states = document::getDocumentStates();
$document2 = new document();
$reports = $document2->getDocumentsByPropertyId($_REQUEST['property_id'], null, true);
$techs = $users->getUsers('techs');

if ($_REQUEST['id']) {
	$reportData 	= $document2->getData('document_data_11_cert','document_id',$_REQUEST['id'], true);
	$documentInfo 	= $document2->getData('document_data_11_data','document_id',$_REQUEST['id']);
	
	// We need to process this array a bit
	if (is_array($reportData)) {
		foreach($reportData as $key => $array) {
			$reportArray[$array['report_id']] = $array;
		}
	}
}

if (is_array($reports)) {
	?>
	<table width="100%" class="dataTable">
	 <tr bgcolor="#000" style="color: #fff; font-weight: bold;" align="center">
	  <td>&nbsp; </td>
	  <td>Document</td>
	  <td>Date Inspected</td>
	  <td>Deficiencies Corrected</td>
	  <td>Certified Technician</td>
	 </tr>
	<?php
	$i = 0;
	foreach($reports as $report) {
		$i++;
		if ($report->getTypeId() == 11) {
			continue;
		}
		if (is_array($reportArray[$report->getDocumentId()])) {
			$checked = ' checked="checked" ';
		} else {
			$checked = '';
		}
		?>
		<tr align="center">
		 <td><input type="checkbox" name="include[<?=$i?>]" value="<?=$report->getDocumentId()?>" style="width: 15px;" <?=$checked?>/></td>
		 <td><?=document::getDocumentTypeById($report->getTypeId())?></td>
		 <td><input type="text" name="inspected[<?=$i?>]" value="<?=$reportArray[$report->getDocumentId()]['inspected']?>" style="width: 150px;" /></td>
		 <td><input type="text" name="deficiencies[<?=$i?>]" value="<?=$reportArray[$report->getDocumentId()]['deficiencies']?>" style="width: 150px;" /></td>
		 <td><?=display::getTechs($techs, 'certified_technician['.$i.']', $reportArray[$report->getDocumentId()]['tech']);?></td>
		</tr>
		<?php
	}
	?>
  </table>
  <br />
  <table>  
   <tr>
    <td>Next Inspection due on or before:</td>
    <td><input type="Text" name="inspection_date" value="<?=$documentInfo['inspection_date']?>" style="width: 200px;" /></td>
    <td>Service Manager:</td>
    <td><b>David Leonardis</b></td>
   </tr>
  </table>
<?php
}
?>