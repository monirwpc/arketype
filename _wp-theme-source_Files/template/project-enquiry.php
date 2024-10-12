<div class="container project-enquiry-container"><!--start container--> 
	<div class="center-content">
		<?php 
			$project_enq = get_field('project_enquiry_block', 'option');
		?>
		<div class="why-work-content">
			<div class="why-work-left">
				<h2><?php echo $project_enq['project_enquiry_left_title']; ?></h2>
			</div>
			<div class="why-work-right">                    
				<h5><?php echo $project_enq['project_enquiry_right_content']; ?></h5>
				<a href="<?php echo esc_url( home_url() ); ?>/contact">Let’s chat<span></span></a>
			</div>
		</div>
	</div>
</div><!-- //end .container -->