<!-- Searchform -->
<div class="row">
	<div class="col-md-6">
		<form method="get" class="search-form clearfix" action="<?php echo esc_url( home_url( '/' ) ); ?>" >
			<div class="input-group">
				<input id="s" type="text" name="s" class="form-control" value="" placeholder="<?php esc_attr_e( 'Search...', 'rocket' ); ?>">
				<div class="input-group-btn">
					<button class="btn btn-primary"><i class="fa fa-search"></i></button>
				</div>
			</div>
		</form>
	</div>
</div>
<!-- /Searchform -->