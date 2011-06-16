<?php use_javascript('jquery-1.3.2.min.js') ?>
<?php use_helper ('Form','Javascript','Object') ?>

<?php use_javascript('prototype.js') ?>		
<?php use_javascript('effects.js') ?>		
<?php use_javascript('dragdrop.js') ?>		
<?php use_javascript('popup.js') ?>		
<link href="<?php echo _compute_public_path('popup', 'css', 'css', false);  ?>" rel="stylesheet" type="text/css" />	
<div id="main_content">
	<div class="box_content">
	<div class="box_title">
		<h2><span class="dark_blue">Patient Detail</h2>
		
	</div>
	<div class="box_text_content">
	<div class="box_text">

	<table width="100%" border="0" cellspacing="0" cellpadding="0" class="datagrid">
	  <tr>
		<th width="15%" style="text-align:left;">Patient's ID</th>
		<th width="44%" style="text-align:left;">Patient's Name</th>
		<th width="41%" style="text-align:left;">CNIC No.</th>
		<!--<th style="text-align:center;">Ward Doctor</th>
		<th style="text-align:left;">Status</th>
		<th style="text-align:left;">Operation</th>-->
	  </tr>
	  
	 <!-- Populating the List -->
		
	  <?php 
	  
	  if (count($patients)): ?>
		<?php 
		
		foreach ($patients as $j => $patient) : ?>
		
		<tr>
		<td align="left"><?php echo $patient->getId(); ?> </td>
		<td align="left"><?php echo link_to($patient->getName(),'FrontDesk/visitAdd?patient='.Utility::EncryptQueryString($patient->getId())); ?></td>
		<td style="text-align:left;"><?php echo $patient->getCnic(); ?></td>
		</tr>
	  
	   <?php endforeach; ?>
	  <tr>
		<td class="last">&nbsp;</td>
	  </tr>
	   <?php else:?>
	  
			<tr>
			<td colspan="6" style="background:none; text-align:center;"><?php echo Constant::RECORD_NOT_FOUND; ?></td>
			</tr>
			
	  <?php endif; ?>
	</table>
		
				</div>
	</div>
	
	</div>

<div class="clear"></div>    
</div>