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
				<h1># <?php single_cat_title(); ?>。</h1>
				<?php 
					$category = get_the_category(); $thiscat = get_category($category[0]->cat_ID);
					if(is_category(4)){
						echo "<p>共有<span>".get_category_by_slug($thiscat ->slug)->count."</span>篇关于学习的小记的文章。让我们一同<span>学习</span>与<span>进步</span>吧。</p>";
					}

					if(is_category(6)) {
						echo "<p>共有<span>".get_category_by_slug($thiscat ->slug)->count."</span>篇关于日常、音乐还有其他种种现象的碎碎叨文章。</p>";
					}
				?>
			</div>

			<!--文章标签-->
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
			<div class="g-text-article">
				
				<?php while(have_posts()) :the_post();?>

				<div class="g-article-box">
					<div class="g-article-info">
						<a href="<?php the_permalink(); ?>" class="u-left g-article-title"><?php the_title();?></a>
						<p class="u-right g-article-time"><i class="fa fa-clock-o" aria-hidden="true"></i><?php the_time('Y年n月j日') ?></p>
						<div class="u-clearfix"></div>
					</div>
					
					<div class="g-article-abstract">
						<?php the_content(); ?>
					</div>

					<div class="g-article-itrct">
						<div class="g-comment-num u-left">
							<a href="#"><i class="fa fa-heart-o" aria-hidden="true"></i>0</a>
						</div>
						<div class="g-like-num u-left">
							<a href="#"><i class="fa fa-comment-o" aria-hidden="true"></i><?php comments_popup_link('0', '1', '% Comments'); ?></a>	
						</div>

						<div class="g-check-more u-right">
							<a href="<?php the_permalink(); ?>">更多</a>	
						</div>

						<div class="u-clearfix"></div>
					</div>
				</div>
				<?php endwhile;?>
			</div>
			
			<!--页数-->
			<?php mochi_page_show(); ?>
		</div>			
		<?php endif; ?>	
	</div>
<?php get_footer(); ?>