<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
  <title>Hospital Management System</title>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
	<?php include_javascripts() ?>
<script language="JavaScript" src="<?php echo _compute_public_path('livevalidation_standalone.compressed', 'js', 'js', false);  ?>"></script>
<script language="JavaScript" src="<?php echo _compute_public_path('json2', 'js', 'js', false);  ?>"></script>

<link href="<?php echo _compute_public_path('chromestyle', 'css', 'css', false);  ?>" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="<?php echo _compute_public_path('chrome', 'js', 'js', false);  ?>"></script>


<!--FOR Favicon-->
<link rel="favicon" href="<?php echo _compute_public_path('favicon', 'images', 'ico', true);  ?>"/> 
<link rel="shortcut icon" href="<?php echo _compute_public_path('favicon', 'images', 'ico', true);  ?>" />
<link rel="icon" href="<?php echo _compute_public_path('favicon', 'images', 'ico', true);  ?>" />

<!--FOR CSS File-->
<link href="<?php echo _compute_public_path('style', 'css', 'css', false);  ?>" rel="stylesheet" type="text/css" />
<!--[if IE 6]>
<link href="<?php echo _compute_public_path('iecss', 'css', 'css', false);  ?>" rel="stylesheet" type="text/css" />
<![endif]-->
  </head>
 
 <body>
    
	
	<div id="main_container">
	<div class="header">
    	<div id="logo">
		<?php if ($sf_user->isAuthenticated()): ?>
			<?php echo link_to (image_tag('hopital1.gif',array('borber'=>'0','width'=>'182', 'height'=>'45')),'Home/index');?>
			<?php else: ?>
			<?php echo link_to (image_tag('hopital1.gif',array('borber'=>'0','width'=>'182', 'height'=>'45')),'Login/index');?>
		<?php endif; ?>
		</div>
    
    	<div class="right_header">
        	<div class="top_menu">
			<?php if ($sf_user->isAuthenticated()): ?>
			<?php echo 'Welcome <strong>'.$sf_user->getAttribute('NAME').'</strong>'; ?><br />

			<?php echo link_to ('Change Password', 'Login/changePassword'); ?>&nbsp;|&nbsp;<?php echo link_to ('Logout', 'Login/logout'); ?>
			<!--<a href="#" class="login">login</a>-->
            <!--<a href="#" class="sign_up">signup</a>-->
			<?php else:?>
			<?php echo link_to('Login','Login/index', array('class'=>'login')) ;?>
            
			<?php //echo 'Welcome '.$sf_user->getAttribute('NAME'); ?>
        	<?php endif ?>
			</div>
            <div id="menu">
			<div class="chromestyle" id="chromemenu">
				<?php if ($sf_user->isAuthenticated()): ?>
				<ul>
					<li><?php echo link_to ('Home', 'Home/index', array(/*'class'=>'current'*/)); ?></li>
                    <li><?php echo link_to ('Employee', 'Employee/list'); ?></li>
					 <li><?php echo link_to ('Patient', 'Patient/list'); ?></li>
					<li><?php echo link_to ('Settings', 'Home/settings', 'rel=dropmenu_1'); ?></li>
				
				</ul>
			</div>
	
			<div id="dropmenu_1" class="dropmenudiv" style="width: 150px; height:30px;">
				<?php echo link_to ('Department', 'Department/list'); ?>
				<?php echo link_to ('Designation', 'Designation/list'); ?>
				<?php echo link_to ('Pharma', 'Pharma/list'); ?>
				<?php echo link_to ('Ward', 'Ward/list'); ?>
				<?php echo link_to ('Beds in Ward', 'WardBed/list'); ?>
			</div>
				<?php else: ?>
					<ul>
					  <li><?php echo link_to ('Home', 'Home/index', array(/*'class'=>'current'*/)); ?></li>
					  <li><?php echo link_to ('Medical', 'Home/med', 'rel=dropmenu_3' , array(/*'class'=>'current'*/)); ?></li>
					  <li><?php echo link_to ('Surgical', 'Home/cardiac', 'rel=dropmenu_2' , array(/*'class'=>'current'*/)); ?></li>
                    <li><?php echo link_to ('About Us', 'Home/about', array(/*'class'=>'current'*/)); ?></li>
					<li><?php echo link_to ('Contact Us', 'Home/contact', array(/*'class'=>'current'*/)); ?></li>
					</ul>
					<div id="dropmenu_2" class="dropmenudiv" style="width: 150px; height:30px; ">
				<?php echo link_to ('Cardiac Surgery', 'Home/cardiac'); ?>
				<?php echo link_to ('General Surgery', 'Home/general'); ?>
				<?php echo link_to ('Neuro Surgery', 'Home/neuro'); ?>
				<?php echo link_to ('Ent Surgery', 'Home/ent'); ?>
				
			</div>
					<div id="dropmenu_3" class="dropmenudiv" style="width: 150px; height:30px; ">
				<?php echo link_to ('General Madication', 'Home/med'); ?>
				<?php echo link_to ('Cardioloy', 'Home/cardiacs'); ?>
				<?php echo link_to ('Neurology', 'Home/neuros'); ?>
				
				
			</div>
			</div>
				<?php endif ?>
	
	
			<script type="text/javascript">
				cssdropdown.startchrome("chromemenu")
			</script>
                <!--<ul>                                              
                    <li><?php //echo link_to ('Home', 'Home/index', array(/*'class'=>'current'*/)); ?></li>
                    <li><?php //echo link_to ('Employee', 'Employee/list'); ?></li>
					 <li><?php //echo link_to ('Patient', 'Patient/list'); ?></li>
					<li><?php //echo link_to ('Settings', 'Home/settings'); ?></li>
					
                </ul>-->
            </div>
        
        </div>
    
    </div>
    
  
    
	<?php if ($sf_user->hasFlash('SUCCESS_MESSAGE')): ?>
				<tr>
					<td align="center" colspan="2">
						<div class="success_bar">
							<?php echo $sf_user->getFlash('SUCCESS_MESSAGE');?>
						</div>
					</td>
				 </tr>
			<?php endif; ?>
	
	
			<?php if ($sf_user->hasFlash('ERROR_MESSAGE')): ?>
				<tr>
					<td align="center" colspan="2">
						<div class="error_bar">
							<?php echo $sf_user->getFlash('ERROR_MESSAGE');?>
						</div>
					</td>
				 </tr>
			<?php endif; ?>
			
		<!--This is the place where the main content will appear-->
          <?php echo $sf_content ?>  
            
     <div id="footer">
     	<!--<div class="copyright">
        <img src="images/footer_logo.gif" alt="" title="" />
        </div>-->
        <div class="center_footer">&copy; Hospital Management System 2011. All Rights Reserved <br />COMSATS Institute of Information Technology, Wah Campus</div>
    </div>


</div>
  </body>
</html>
