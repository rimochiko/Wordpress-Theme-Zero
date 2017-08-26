<?php
$option = get_option('mochi_theme_options');//获取选项   

// 设置选项页
function themeoptions_admin_menu()
{
	// 在控制面板的侧边栏添加设置选项页链接
	add_theme_page('主题选项','选项', 'administrator', 'mochi_theme_settings','themeoptions_page');
}

function themeoptions_page()
{
	// 设置选项页面的主要功能
	global $option;
	if( $option == '' ) {   
		//设置默认数据  
		$option['if_bg_on'] = 0;
		$option['if_cat_use'] = 0;
		$option['if_author_profile'] = 0;
		$option['if_friendlink'] = 0;
	} 
	if(isset($_POST['theme_options_submit'])){  
		//对提交数据进行处理
		$option['if_bg_on'] = $_POST['if_bg_on'];
		$option['if_cat_use'] = $_POST['if_cat_use'];
		$option['if_author_profile'] = $_POST['if_author_profile'];
		$option['if_friendlink'] = $_POST['if_friendlink'];
		$option['my_avatar'] = $_POST['my_avatar'];

		//处理banner
		foreach ($_POST['banner'] as $key => $url) {
			if($url==''){
				unset($_POST['banner'][$key]);
				unset($_POST['banner_link'][$key]);
				unset($_POST['banner_text'][$key]);
			}	
		}
		$option['banner'] = $_POST['banner'];
		$option['banner_link'] = $_POST['banner_link'];
		$option['banner_text'] = $_POST['banner_text'];

		//处理分类模板
		if(isset($_POST['use_article_m']))
			$option['use_article_m'] = $_POST['use_article_m'];

		if(isset($_POST['use_pic_m']))
			$option['use_pic_m'] = $_POST['use_pic_m'];

		if(isset($_POST['use_mix_m']))
			$option['use_mix_m'] = $_POST['use_mix_m'];

		//处理友情链接
		foreach ($_POST['friend'] as $key => $url) {
			if($_POST['friend_text'][$key]=='') {
				$_POST['friend_text'][$key] = '#';
			}

			if($url==''){
				unset($_POST['friend'][$key]);
				unset($_POST['friend_link'][$key]);
			}	
		}
		$option['friend']=$_POST['friend'];
		$option['friend_link'] = $_POST['friend_link'];		
		
		//更新选项 
		update_option('mochi_theme_options', $option);  
	}
?>

	<div class="wrap">
		<h1>主题设置</h1>
		<form method="post" novalidate="novalidate"> 
		<table class="form-table">
			<tbody>
				<tr>
					<th scope="row"><label for="if_bg_on">Banner功能</label></th>
					<td>  <label><input type="radio" name="if_bg_on" value="1" <?php if($option['if_bg_on']==1){
						  echo 'checked="checked"';} ?> />
						开启</label><label>
					  <input type="radio" name="if_bg_on" value="0" <?php if(!$option['if_bg_on']){echo 'checked="checked"';}?> />
						关闭</label></td>
				</tr>
				<tr>
				<td></td>
				<td id="bannerinputs">
					<p><small style="color:red;">建议尺寸为：742 x 300</small></p>
					<p><label style="margin-right:6px;">图片地址</label><input type="text" name="banner[]" value="<?php echo $option['banner'][0];?>"/></p>
					<p><label style="margin-right:6px;">链接地址</label><input type="text" name="banner_link[]" value="<?php echo $option['banner_link'][0];?>"/></p>									
					<p><label style="margin-right:6px;">图片描述</label><input type="text" name="banner_text[]" value="<?php echo $option['banner_text'][0];?>"  class="regular-text"/><span class="add_banner" style="margin-left:10px; color:red; cursor:pointer;">增加</span></p>
					<?php 
					for( $i=1;$i<count($option['banner']);$i++){?>
						<p><label style="margin-right:6px;">图片地址</label><input type="text" name="banner[]" value="<?php echo $option['banner'][$i];?>"/></p>
						<p><label style="margin-right:6px;">链接地址</label><input type="text" name="banner_link[]" value="<?php echo $option['banner_link'][$i];?>"/></p>
						<p><label style="margin-right:6px;">图片描述</label><input type="text" name="banner_text[]" value="<?php echo $option['banner_text'][$i];?>"  class="regular-text"/></p>
					<?php }
					?>	
				</td>
				</tr>
				<tr>
					<th scope="row">分类模板选择</th>
					<td><p><small style="color:red;">若不开启则默认为文章列表显示</small></p> 
						<label>
					  <input type="radio" name="if_cat_use" value="1"  <?php if($option['if_cat_use']==1){
						  echo 'checked="checked"';
					  } ?>/>
						开启</label><label>
					  <input type="radio" name="if_cat_use" value="0" <?php if(!$option['if_cat_use']){echo 'checked="checked"';}?> />
						关闭</label></td>
				</tr>
				<tr>
					<td></td>
					<td>
						<p><small style="color:red;">填写使用分类的ID编号，并以,隔开</small></p> 
						<p><label style="margin-right:6px;">使用普通文章模板</label><input type="text" id="use_article_m" name="use_article_m" value="<?php echo $option['use_article_m'];?>"/></p>
						<p><label style="margin-right:6px;">使用图片展示模板</label><input type="text" id="use_pic_m" name="use_pic_m" value="<?php echo $option['use_pic_m'];?>"/></p>
						<p><label style="margin-right:6px;">使用图文展示模板</label><input type="text" id="use_mix_m" name="use_mix_m" value="<?php echo $option['use_mix_m'];?>"/></p>						
					</td>
				</tr>
				<tr>
					<th scope="row"><label for="author_profile">个人信息展示</label></th>
					<td><label><input type="radio" name="if_author_profile" value="1"  <?php if($option['if_author_profile']==1){
						  echo 'checked="checked"';
					  } ?>/>
						开启</label><label>
					  <input type="radio" name="if_author_profile" value="0" <?php if(!$option['if_author_profile']){echo 'checked="checked"';}?> />
						关闭</label></td>
				</tr>
				<tr>
					<td></td>
					<td><p><label style="margin-right:6px;">头像地址</label><input type="text" name="my_avatar" value="<?php echo $option['my_avatar'];?>"/></td>					
				</tr>

				<tr>
					<th scope="row"><label for="friendlink">友情链接功能</label></th>
					<td>  <label><input type="radio" name="if_friendlink" value="1"  <?php if($option['if_friendlink']==1){
						  echo 'checked="checked"';
					  } ?>/>
						开启</label><label>
					  <input type="radio" name="if_friendlink" value="0" <?php if(!$option['if_friendlink']){echo 'checked="checked"';}?> />
						关闭</label></td>
				</tr>
				<<tr>
					<td></td>
					<td id="friendinputs">
						<p><label style="margin-right:6px;">网站名称</label><input type="text" name="friend[]" value="<?php echo $option['friend'][0];?>"/>					
						<p><label style="margin-right:6px;">网站地址</label><input type="text" name="friend_link[]" value="<?php echo $option['friend_link'][0];?>"  class="regular-text"/><span class="add_friend" style="margin-left:10px; color:red; cursor:pointer;">增加</span></p>
						<?php 
						for( $i=1;$i<count($option['friend']);$i++){?>
							<p><label style="margin-right:6px;">网站名称</label><input type="text" name="friend[]" value="<?php echo $option['friend'][$i];?>"/></p>
							<p><label style="margin-right:6px;">网站地址</label><input type="text" name="friend_link[]" value="<?php echo $option['friend_link'][$i];?>"  class="regular-text"/></p>
						<?php }
						?>	
					</td>					
				</tr>

			</tbody>
		</table>
    <?php wp_nonce_field('update-options'); ?>
    <input type="hidden" name="action" value="update" />
		<p class="submit"><input type="submit" name="theme_options_submit" id="submit" class="button button-primary" value="保存"></p>
		</form>
		<script>
		jQuery(document).ready(function() {    
			jQuery('.add_banner').click(function(){
				jQuery('#bannerinputs').append('<p><label style="margin-right:6px;">图片地址</label><input type="text" name="banner[]" value=""/><p><label style="margin-right:6px;">图片描述</label><input type="text" name="banner_text[]" value=""  class="regular-text"/>');
			});
			jQuery('.add_friend').click(function(){
				jQuery('#friendinputs').append('<p><label style="margin-right:6px;">网站名称</label><input type="text" name="friend[]" value=""/><p><label style="margin-right:6px;">网站地址</label><input type="text" name="friend_link[]" value=""  class="regular-text"/>');
			})
		});
		</script>
	</div>
<?php
	}	
	add_action('admin_menu', 'themeoptions_admin_menu');
?>