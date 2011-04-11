<?php use_helper ('Form','DateForm','Object') ?>
<?php echo form_tag('Register/addEmployee') ?>

<div id="main_content">
    
 			<div class="box_content">
					<div class="box_title">
                    	<div class="title_icon"><img src="<?php image_tag('mini_icon1.gif','border="0"')?>" alt="" title="" /></div>
                        <h2><span class="dark_blue">Employee Registration</span></h2>
                    </div>
                    <div class="box_text_content">
                    	<img src="<?php image_tag('calendar.gif','border="0"')?>" alt="" title="" class="box_icon" />
                        <div class="box_text">
<table width="100%" cellpadding="0" cellspacing="0"  align="left" border="0">
<tr height="30">
	<td>Name: <span class="error">*</span></td>
	<td> <?php echo input_tag('name','','60'); ?>
	<script type="text/javascript">
	var name = new LiveValidation('name', { validMessage: "<?php echo 'ok';?>", wait:500});
	name.add( Validate.Presence,{ failureMessage: "<?php echo 'Naaa';?>"});
	</script>
	</td>
	<td>Father/Husband Name:</td>
	<td><?php echo input_tag('father_name','','60'); ?></td>
</tr>
</table>
                        </div>
                        <!--<a href="#" class="details"></a>-->
                    </div>
	
            </div>
            
        <div class="clear"></div>    
       </div>