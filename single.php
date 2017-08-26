<?php get_header();?>
<body class="u-single-page">
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
		<?php if(have_posts()) :?>
		<?php while (have_posts()) : the_post(); ?>
		<div class="g-right u-left">
			<!-- 板块大标题 -->
			<div class="u-page-title">
				<h1><?php the_title(); ?></h1>
				<table>
					<tr>
						<td class="u-first-td"><p><span>时间</span></p></td>
						<td><p><?php the_time('Y年n月j日') ?></p></td>
					</tr>
					<tr>
						<td><p><span>分类</span></p></td>
						<td><p><a href="#"><?php the_category(’, ‘) ?></a></p></td>
					</tr>
					<!--<tr>
						<td><p><span>喜欢</span></p></td>
						<td><p>共 22 次</p></td>
					</tr>-->
					<tr>
						<td><p><span>评论</span></p></td>
						<td><p><?php comments_popup_link('0 条', '1 条', '% 条', '', '已关闭'); ?></p></td>
					</tr>
					<tr>
						<td><p><span>标签</span></p></td>
						<td><p><?php the_tags('', ', ', ''); ?></td>
					</tr>
				</table>
			</div>

			<p class="g-copyright">MOCHIKO &copy; 2017</p>
		</div>	

		<div class="g-left u-right">
			<div class="g-single-article">
				<div class="g-article-body">
					<?php echo the_content();?>
				</div>	

					<div class="g-article-itrct">
						<div class="g-like-num u-right">
							<a href="#"><i class="fa fa-comment-o" aria-hidden="true"></i><?php comments_popup_link('0', '1', '%', '', '0'); ?></a>	
						</div>

						<div class="g-comment-num u-right">
							<a href="#"><i class="fa fa-heart-o" aria-hidden="true"></i>0</a>
						</div>
						<div class="u-clearfix"></div>
					</div>			
			</div>	
			<?php comments_template(); ?>
		</div>
	<?php endwhile; endif;?>
	</div>

<?php get_footer(); ?>