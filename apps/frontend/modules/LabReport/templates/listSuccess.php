<?php use_javascript('jquery-1.3.2.min.js') ?>
<?php use_helper ('Form','Javascript','Object') ?>

<div id="main_content">
	<div class="box_content">
	<div class="box_title">
		<h2><span class="dark_blue">Laboratory Test for Reporting</span></h2>
	</div>
	<div class="box_text_content">
	<div class="box_text">

	<table width="100%" border="0" cellspacing="0" cellpadding="0" class="datagrid">
             
			  <tr>
				<th width="25%" style="text-align:left;">Test Name</th>
				<th width="32%" style="text-align:left;">Patient Name</th>
				<th width="13%" style="text-align:left;">Visit</th>
				<th width="17%" style="text-align:left;">Last Updated</th>
                <th width="13%" style="text-align:left;">Operation</th>
              </tr>
			  
			 <!-- Populating the List -->
				
			  <?php 
			  
			  if (count($lab_tests)): ?>
				<?php 
				
				foreach ($lab_tests as $j => $lab_test) : ?>
				
              <tr>
                <td align="left"><?php echo link_to($lab_test->getLabTest(), 'LabReport/add?report='.Utility::EncryptQueryString($lab_test->getId())); ?> </td>
				<td align="left"><?php echo $lab_test->getPatient(); ?></td>
				<td align="center"><?php echo $lab_test->getVisit(); ?></td>
				<td align="center"><?php echo $lab_test->getUpdatedAt('d-M-Y'); ?>
				<td align="right">
				<?php //echo link_to('&nbsp;','LabReport/edit?report='.Utility::EncryptQueryString($lab_test->getId()),array('title'=>'Edit', 'class' => 'edit'))?>
				
				<?php //echo link_to('&nbsp;','LabTest/delete?id='.Utility::EncryptQueryString($lab_test->getId()), array('confirm'=>'Are you sure you want to Delete this?', 'title'=>'Delete', 'class' => 'delete')); ?>
				</td>
              </tr>
			  
			  <?php endforeach; ?>
			  <tr>
			  	<td class="last">&nbsp;</td>
			  </tr>
			   <?php else:?>
			  
					<tr>
						<td colspan="6" style="background:none; text-align:center;"><?php echo Constant::RECORD_NOT_FOUND; ?></Td></tr>
					
			  <?php endif; ?>
            </table>

	</div>
	</div>
	</div>
<div class="clear"></div>    
</div>