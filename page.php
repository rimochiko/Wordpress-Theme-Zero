<?php get_header();?>
<body class="u-about-page">
	<!-- header begin -->
	<div class="g-header">
		<div class="u-container">
			<!-- logo begin --> 
			<div class="g-logo">
				<a href="<?php bloginfo('url'); ?>" class="s-normal-a-hover"><?php bloginfo('name'); ?></a>
			</div>

			<!-- nav begin -->
			<nav>
				<a class="g-hmg-nav" href="#">
					<i class="g-line"></i>
					<i class="g-line"></i>
					<i class="g-line"></i>
				</a>
				<?php
					if(function_exists('wp_nav_menu')) {
					wp_nav_menu(array('theme_location'=>'','menu_class'=>'g-main-nav','container'=>'div'));
				}
				?>
				<div class="u-clearfix"></div>
			</nav>			
		</div>
	</div>

	<div class="u-container">
		<div class="g-right u-left">
			<!-- 板块大标题 -->
			<div class="u-page-title">
				<h1># <?php the_title(); ?>。</h1>
				<p>阿糕家后院上辈子是<span>糕の物语</span>。这里介绍了一些关于后院的事情。</p>
				<p><a href="http://weibo.com/rimochiko" target="_blank"><i class="fa fa-weibo" aria-hidden="true"></i>微博</a>&nbsp;&nbsp;&nbsp;<a href="https://github.com/rimochiko" target="_blank"><i class="fa fa-github" aria-hidden="true"></i>github</a>&nbsp;&nbsp;&nbsp;<a href="#" id="g-show-wechat"><i class="fa fa-weixin" aria-hidden="true"></i>公众号</a></p>
			</div>
			
			<?php if($option['if_friendlink']==1):?>
			<!-- 友情链接 -->
			<div class="g-footer">
				<ul class="g-friends">
					<?php mochi_friends_show()?>
				</ul>
			</div>
			<?php endif;?>
			<p class="g-copyright">MOCHIKO &copy; 2017</p>
		</div>	

		<div class="g-left u-right">	
			<div class="g-site-about">	
				<?php if(have_posts()) :?>
				<?php while(have_posts()) :the_post();?>
				<?php the_content(); ?>	
				<?php endwhile;?>
				<?php endif; ?>	
			</div>
		</div>
	</div>

	<?php get_footer(); ?>
