<?php

function themeConfig($form) {
    $logoUrl = new Typecho_Widget_Helper_Form_Element_Text('logoUrl', NULL, NULL, _t('站点LOGO地址'), _t('在这里填入一个图片URL地址, 以在网站标题前加上一个LOGO'));
    $form->addInput($logoUrl);
	
    $sidebarBlock = new Typecho_Widget_Helper_Form_Element_Checkbox('sidebarBlock', 
    array('ShowRecentPosts' => _t('显示最新文章'),
    'ShowRecentComments' => _t('显示最近回复'),
    'ShowCategory' => _t('显示分类'),
    'ShowArchive' => _t('显示归档'),
    'ShowOther' => _t('显示其它杂项')),
    array('ShowRecentPosts', 'ShowRecentComments', 'ShowCategory', 'ShowArchive', 'ShowOther'), _t('侧边栏显示'));
    $form->addInput($sidebarBlock->multiMode());
	
	$siteTj = new Typecho_Widget_Helper_Form_Element_Textarea('siteTj', NULL, NULL, _t('第三方统计代码'), _t('在这里填入第三方的统计代码, 以给网站统计'));
	$form->addInput($siteTj);
}
/* thunmb */
	function posart_thumb_isImage($type,$arr_ext){
	    for($i = 0;$i<count($arr_ext);$i++){
				if( $type == $arr_ext[$i]  ){
					$isImg = true;
					break;
				}
		}
		if( $isImg ){
			return true;
		}else{
		    return false;
		}
	}
	
	function posart_thumb_randPic( $dir_rand, $default_img, $arr_ext){
		if ($handle = opendir( $_SERVER['DOCUMENT_ROOT'].$dir_rand )) {
			$count = 0; //初始化
			while (false !== ($file = readdir($handle))) {
				$ext = ltrim(strstr($file,"."),".");
				if( in_array( $ext, $arr_ext )  ){
					$imgArr[$count] = $file;
					$count++;
				}
			}
			if( $count >0 ){
				$rand = rand(0,19881223)%count($imgArr);
				$img =  $dir_rand.$imgArr[$rand];
			}else{
				$img = $default_img;
			}
			closedir($handle);
		}else{
		    $img = $default_img;
		}
		return $img;
	}
	
    function posart_thumb_show($obj){
        $options = Typecho_Widget::widget('Widget_Options');
		
		$url_resource = $options->themeUrl.'/img/thumb/'; //资源地址  ->  http://domain.com/usr/resources/
		$dir_resource = "/".str_replace( $options->siteUrl,"",$url_resource ); 
		
		/*********  以下可以自定义  ************/
		$arr_ext = array('jpg','gif','png','bmp','jpeg'); //随机图片的后缀名
		/*********  以上可以自定义  ************/
		
        $cid = $obj->cid;
		$cate = $obj->category;
		$content = $obj->text;
		
        $db = Typecho_Db::get();
        $attach = $db->fetchAll($db->select()->from('table.contents')
                 ->where('type = ? AND parent = ? ', 'attachment', $cid)
                 );
		if( empty($attach) ){
			preg_match_all( "/\<img.*?src\=(\'|\")(.*?)(\'|\")[^>]*>/i", $content, $matches );
			$imgCount = count($matches[0]);
			if( $imgCount >=1 ){
				$img = $matches[2][0];
			}else {
				$img = Null;  //随机图片
			}
		}else{ //直接从附件中找出第一个上传的图片		
		    foreach( $attach as $attach ){
			    $attach_text = unserialize($attach['text']);
			    if( posart_thumb_isImage($attach_text['type'],$arr_ext) ){
				    $img = $attach_text['path'];
					break;
				}			
			}
		
		}
		return $img;	
    }
?>


