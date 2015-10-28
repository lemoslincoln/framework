<div class="row" id="chamada-newsletter">
	<div class="col-sm-4">
		<img src="<?php images_url('newsletter.png') ?>" alt="Receba novidades em seu e-mail" class="img-responsive">
	</div>
	<div class="col-sm-8">
		<?php echo do_shortcode('[simplenewsletter]'); ?>
	</div>
</div>


<style type="text/css" media="screen">
	
	/* Newsletter */
	/* ----------------------------------------- */
		#chamada-newsletter {
			
			#submit_simplenewsletter {
				
				input {
					width: 100%;
					padding: 9px 17px;
					color: #808082;
					font-size: 14px;
					.radius(5px);
					border: 0;
				}
				> * {
					margin-top: 10px;
				}

				.simplenewsleter-field-submit {			
					background-color: @brand-success;
					color: white;
					&:hover {
						background-color: darken(@brand-success, 15%);
					}
				}

				.clearfix();				
				/* Small devices (tablets, 768px and up) */
				@media (min-width: @screen-sm-min) { 
					> * { 
						float: left;
						margin-top: 0;
					}
					fieldset {
						width: 34%;
						margin-right: 3%;				
					}
					.simplenewsleter-field-submit {
						width: 26%;				
					}
				}
				
			}
			.simplenewsletter-success {
				padding: 10px 15px;
				border: 1px solid white;
				margin-top: 15px;
				.radius(5px);
				color: white;		
			}
		}
		
	/* ----------------------------------------- Newsletter */		

</style>