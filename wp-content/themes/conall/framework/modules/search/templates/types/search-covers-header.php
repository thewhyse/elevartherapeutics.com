<form action="<?php echo esc_url(home_url('/')); ?>" class="edgtf-search-cover" method="get">
	<?php if ( $search_in_grid ) { ?>
	<div class="edgtf-container">
		<div class="edgtf-container-inner clearfix">
			<?php } ?>
			<div class="edgtf-form-holder-outer">
				<div class="edgtf-form-holder">
					<div class="edgtf-form-holder-inner">
						<input type="text" placeholder="<?php esc_attr_e('Search...', 'conall'); ?>" name="s" class="edgt_search_field" autocomplete="off" />
						<div class="edgtf-search-close">
							<a href="#">
								<?php echo conall_edge_get_module_part($search_icon_close); ?>
							</a>
						</div>
					</div>
				</div>
			</div>
			<?php if ( $search_in_grid ) { ?>
		</div>
	</div>
	<?php } ?>
</form>