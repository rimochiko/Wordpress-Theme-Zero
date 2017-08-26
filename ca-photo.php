<?php get_header();?>
<body class="u-sub-page">
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
		<div class="g-right u-right">
			<!-- 板块大标题 -->
			<div class="u-page-title">
				<h1># 记忆の写真。</h1>
				<p>共有<span><?php $category = get_the_category(); $thiscat = get_category($category[0]->cat_ID);echo get_category_by_slug($thiscat ->slug)->count;?></span>篇图片记录，留下了我曾经的の回忆，只与快乐相关。</p>
			</div>

			<!-- 文章标签 -->
			<div class="g-tags">
				<p class="u-section-title"><i class="fa fa-tags" aria-hidden="true"></i>标签</p>
				<ul>
					<?php 
					$args = array( 'categories' => $category[0]->cat_ID);
					$tags = mochi_get_category_tags($args);
					if(!empty($tags)) {
					  foreach ($tags as $tag) {
					    echo "<li><a href=\"".get_tag_link($tag->term_id)."\">".$tag->name."</a></li>";
					  }
					}
					?>
				</ul>
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
				
		<?php if(have_posts()) :?>
		<div class="g-left u-left">	
			<!-- 文章列表 -->
			<div class="g-photo-article">

				<?php 
				while(have_posts()) :the_post();?>				
				<a class="g-article-box u-left" style="background-image: url(<?php echo get_the_post_thumbnail_url(null);?>)" href="<?php the_permalink(); ?>">
					<div class="g-photo-info">
						<p><?php the_title();?></p>
					</div>
				</a>
				<?php endwhile;?>

				<div class="u-clearfix"></div>
			</div>
			
			<!--页数-->
			<?php mochi_page_show(12); ?>
		</div>
		<?php endif; ?>	
	</div>
<?php get_footer(); ?>