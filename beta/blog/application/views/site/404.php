<?php $this->load->view('site/components/header'); ?>

<div class="single-wrapper">
	<div class="single-inner">
		<div class="container">

			<div class="error-message-holder">
				<h2>404</h2>
				<h4>Ooops, Page not found!</h4>
				<p>The page you are looking for either has moved or doesn't exists in this server.Try hitting search!</p>

				<div class="error_page_search">
				
				<form method="get" action="<?php echo base_url('blogsearch.html/search') ?>"  class="search-form">
			    	<div class="input-group stylish-input-group">
			    		<input type="text" name="q" id="q" class="form-control" value="" placeholder="Start Typing ....">
			    		<span class="input-group-addon">
			    			<button type="submit" name="submit"  value="Search">
			    				<i class="fa fa-search"></i>
			    			</button>
			    		</span>
			    	</div>
			    </form>
				</div>

			</div><!-- // error-message-holder -->
		</div><!-- // container -->
	</div><!-- // single_inner -->
</div><!-- // single-wrapper -->


<?php $this->load->view('site/components/footer'); ?>