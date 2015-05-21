<?php
/**
 * @package		Joomla.Site
 * @subpackage	com_content
 * @copyright	Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;

JHtml::addIncludePath(JPATH_COMPONENT . '/helpers');

// Create shortcuts to some parameters.
$params		= $this->item->params;
$images = json_decode($this->item->images);
$urls = json_decode($this->item->urls);
$canEdit	= $this->item->params->get('access-edit');
$user		= JFactory::getUser();
?>
<div class="item-page<?php echo $this->pageclass_sfx?>">
<div class="dl_article_page">
<?php if ($this->params->get('show_page_heading', 1)) : ?>
	<h1>
	<?php echo $this->escape($this->params->get('page_heading')); ?>
	</h1>
<?php endif; ?>
<?php
if (!empty($this->item->pagination) AND $this->item->pagination && !$this->item->paginationposition && $this->item->paginationrelative)
{
 echo $this->item->pagination;
}
 ?>
<?php if ($params->get('show_title')) : ?>
	<h2 style="text-align:center;">
	<?php if ($params->get('link_titles') && !empty($this->item->readmore_link)) : ?>
		<a href="<?php echo $this->item->readmore_link; ?>">
		<?php echo $this->escape($this->item->title); ?></a>
	<?php else : ?>
		<?php echo $this->escape($this->item->title); ?>
	<?php endif; ?>
	</h2>
 <?php endif; ?>      
<div style="width: 100px; float:right; margin:0; padding:0; ">
<?php if ($canEdit ||  $params->get('show_print_icon') || $params->get('show_email_icon')) : ?>
	<ul class="actions">
	<?php if (!$this->print) : ?>
		<?php if ($params->get('show_print_icon')) : ?>
			<li class="print-icon">
			<?php echo JHtml::_('icon.print_popup',  $this->item, $params); ?>
			</li>
		<?php endif; ?>

		<?php if ($params->get('show_email_icon')) : ?>
			<li class="email-icon">
			<?php echo JHtml::_('icon.email',  $this->item, $params); ?>
			</li>
		<?php endif; ?>

		<?php if ($canEdit) : ?>
			<li class="edit-icon">
			<?php echo JHtml::_('icon.edit', $this->item, $params); ?>
			</li>
		<?php endif; ?>

	<?php else : ?>
		<li>
		<?php echo JHtml::_('icon.print_screen',  $this->item, $params); ?>
		</li>
	<?php endif; ?>

	</ul>
<?php endif; ?>
</div>

<!-- Add share icons -->
<div class="bshare-custom"><a title="分享到新浪微博" class="bshare-sinaminiblog" href="javascript:void(0);"></a><a title="分享到腾讯微博" class="bshare-qqmb" href="javascript:void(0);"></a><a title="分享到朋友网" class="bshare-qqxiaoyou" href="javascript:void(0);"></a><a title="分享到Facebook" class="bshare-facebook" href="javascript:void(0);"></a><a title="分享到Twitter" class="bshare-twitter" href="javascript:void(0);"></a><a title="分享到搜狐微博" class="bshare-sohuminiblog" href="javascript:void(0);"></a><a title="分享到凤凰微博" class="bshare-ifengmb" href="javascript:void(0);"></a><a title="分享到Google书签" class="bshare-bgoogle" href="javascript:void(0);"></a><a title="分享到人人网" class="bshare-renren" href="javascript:void(0);"></a><a title="更多平台" class="bshare-more bshare-more-icon more-style-addthis"></a>
</div><script type="text/javascript" charset="utf-8" src="http://static.bshare.cn/b/buttonLite.js#style=-1&amp;uuid=&amp;pophcol=2&amp;lang=zh"></script><script type="text/javascript" charset="utf-8" src="http://static.bshare.cn/b/bshareC0.js"></script>   

<!--End share icons-->
<?php  if (!$params->get('show_intro')) :
	echo $this->item->event->afterDisplayTitle;
endif; ?>
<?php $useDefList = (($params->get('show_author')) or ($params->get('show_category')) or ($params->get('show_parent_category'))
	or ($params->get('show_create_date')) or ($params->get('show_modify_date')) or ($params->get('show_publish_date'))
	or ($params->get('show_hits'))); ?>
	
<?php if ($useDefList) : ?>
	<dl class="article-info">
	<dt class="article-info-term"><?php  echo JText::_('COM_CONTENT_ARTICLE_INFO'); ?></dt>

<?php endif; ?>
<?php if ($params->get('show_parent_category') && $this->item->parent_slug != '1:root') : ?>
	<dd class="parent-category-name">
	<?php	$title = $this->escape($this->item->parent_title);
	$url = '<a href="'.JRoute::_(ContentHelperRoute::getCategoryRoute($this->item->parent_slug)).'">'.$title.'</a>';?>
	<?php if ($params->get('link_parent_category') and $this->item->parent_slug) : ?>
		<?php echo JText::sprintf('COM_CONTENT_PARENT', $url); ?>
	<?php else : ?>
		<?php echo JText::sprintf('COM_CONTENT_PARENT', $title); ?>
	<?php endif; ?>
	</dd>
<?php endif; ?>
<?php if ($params->get('show_category')) : ?>
	<dd class="category-name">
	<?php 	$title = $this->escape($this->item->category_title);
	$url = '<a href="'.JRoute::_(ContentHelperRoute::getCategoryRoute($this->item->catslug)).'">'.$title.'</a>';?>
	<?php if ($params->get('link_category') and $this->item->catslug) : ?>
		<?php echo JText::sprintf('COM_CONTENT_CATEGORY', $url); ?>
	<?php else : ?>
		<?php echo JText::sprintf('COM_CONTENT_CATEGORY', $title); ?>
	<?php endif; ?>
	</dd>
<?php endif; ?>
<?php if ($params->get('show_create_date')) : ?>
	<dd class="create">
	<?php echo JText::sprintf('COM_CONTENT_CREATED_DATE_ON', JHtml::_('date', $this->item->created, JText::_('DATE_FORMAT_LC2'))); ?>
	</dd>
<?php endif; ?>
<?php if ($params->get('show_modify_date')) : ?>
	<dd class="modified">
	<?php echo JText::sprintf('COM_CONTENT_LAST_UPDATED', JHtml::_('date', $this->item->modified, JText::_('DATE_FORMAT_LC2'))); ?>
	</dd>
<?php endif; ?>
<?php if ($params->get('show_publish_date')) : ?>
	<dd class="published">
	<?php echo JText::sprintf('COM_CONTENT_PUBLISHED_DATE_ON', JHtml::_('date', $this->item->publish_up, JText::_('DATE_FORMAT_LC2'))); ?>
	</dd>
<?php endif; ?>
<?php if ($params->get('show_author') && !empty($this->item->author )) : ?>
	<dd class="createdby">
	<?php $author = $this->item->created_by_alias ? $this->item->created_by_alias : $this->item->author; ?>
	<?php if (!empty($this->item->contactid) && $params->get('link_author') == true): ?>
	<?php
		$needle = 'index.php?option=com_contact&view=contact&id=' . $this->item->contactid;
		$menu = JFactory::getApplication()->getMenu();
		$item = $menu->getItems('link', $needle, true);
		$cntlink = !empty($item) ? $needle . '&Itemid=' . $item->id : $needle;
	?>
		<?php echo JText::sprintf('COM_CONTENT_WRITTEN_BY', JHtml::_('link', JRoute::_($cntlink), $author)); ?>
	<?php else: ?>
		<?php echo JText::sprintf('COM_CONTENT_WRITTEN_BY', $author); ?>
		
	<?php endif; ?>
	</dd>
<?php endif; ?>
<?php if ($params->get('show_hits')) : ?>
	<dd class="hits">
	<?php echo JText::sprintf('COM_CONTENT_ARTICLE_HITS', $this->item->hits); ?>
	</dd>
<?php endif; ?>
<?php if ($useDefList) : ?>
	</dl>
<?php endif; ?>
<br/>

<!--内容部份开始 -->
<?php if (isset ($this->item->toc)) : ?>
	<?php echo $this->item->toc; ?>
<?php endif; ?>
<?php if (isset($urls) AND ((!empty($urls->urls_position) AND ($urls->urls_position=='0')) OR  ($params->get('urls_position')=='0' AND empty($urls->urls_position) ))
		OR (empty($urls->urls_position) AND (!$params->get('urls_position')))): ?>
<?php echo $this->loadTemplate('links'); ?>
<?php endif; ?>

<?php if ($params->get('access-view')):?>
<?php  if (isset($images->image_fulltext) and !empty($images->image_fulltext)) : ?>
<?php $imgfloat = (empty($images->float_fulltext)) ? $params->get('float_fulltext') : $images->float_fulltext; ?>
<div class="img-fulltext-<?php echo htmlspecialchars($imgfloat); ?>">
<img
	<?php if ($images->image_fulltext_caption):
		echo 'class="caption"'.' title="' .htmlspecialchars($images->image_fulltext_caption) .'"';
	endif; ?>
	src="<?php echo htmlspecialchars($images->image_fulltext); ?>" alt="<?php echo htmlspecialchars($images->image_fulltext_alt); ?>"/>
</div>
<?php endif; ?>
<?php
if (!empty($this->item->pagination) AND $this->item->pagination AND !$this->item->paginationposition AND !$this->item->paginationrelative):
	echo $this->item->pagination;
 endif;
?>
<!-- 文章 -->
<div class="dl-content-page">

<?php 
	$itemtext = $this->item->text;
	$nav = strpos($itemtext,"sigProContainer sigProGalleriaContainer");	//skip the gallery
	//remove the tags
	$tags = '';
	if(stripos($itemtext,"<nav class=\"content-showtags\"",0) != false):
		$tags = substr($itemtext,stripos($itemtext,"<nav class=\"content-showtags\"",0),stripos($itemtext,"</nav>",0)+5);	
								  
		$itemtext = substr($itemtext,stripos($itemtext,"</nav>",0)+6);
			  endif;
	//Format the text	
	if ($nav == false):	  
	  $itemtext = str_replace("<div","<p",$itemtext);
	  $itemtext = str_replace("</div>","</p>",$itemtext);
	  $itemtext = str_replace("\n","</p><p>",$itemtext);
	endif;
	//remove the white space both beginning and end sides
	$itemtext = mb_ereg_replace('　　', '', $itemtext); 
	//$itemtext = trim($itemtext);								  
	
	if ($tags!=''):
		echo $tags;
	endif;
echo $itemtext .'<span style="color:#FFFFFF;">http://ny.usqiaobao.com</span>';

?>
<!--end -->
<?php
if (!empty($this->item->pagination) AND $this->item->pagination AND $this->item->paginationposition AND!$this->item->paginationrelative):
	 echo $this->item->pagination;?>
<?php endif; ?>

<?php if (isset($urls) AND ((!empty($urls->urls_position)  AND ($urls->urls_position=='1')) OR ( $params->get('urls_position')=='1') )): ?>
<?php echo $this->loadTemplate('links'); ?>
<?php endif; ?>
	<?php //optional teaser intro text for guests ?>
<?php elseif ($params->get('show_noauth') == true and  $user->get('guest') ) : ?>
	<?php echo $this->item->introtext; ?>
		
	<?php //Optional link to let them register to see the whole article. ?>
	<?php if ($params->get('show_readmore') && $this->item->fulltext != null) :
		$link1 = JRoute::_('index.php?option=com_users&view=login');
		$link = new JURI($link1);?>
		<p class="readmore">
		<a href="<?php echo $link; ?>">
		<?php $attribs = json_decode($this->item->attribs);  ?>
		<?php
		if ($attribs->alternative_readmore == null) :
			echo JText::_('COM_CONTENT_REGISTER_TO_READ_MORE');
		elseif ($readmore = $this->item->alternative_readmore) :
			echo $readmore;
			if ($params->get('show_readmore_title', 0) != 0) :
			    echo JHtml::_('string.truncate', ($this->item->title), $params->get('readmore_limit'));
			endif;
		elseif ($params->get('show_readmore_title', 0) == 0) :
			echo JText::sprintf('COM_CONTENT_READ_MORE_TITLE');
		else :
			echo JText::_('COM_CONTENT_READ_MORE');
			echo JHtml::_('string.truncate', ($this->item->title), $params->get('readmore_limit'));
		endif; ?></a>
		</p>
	<?php endif; ?>
	
<?php endif; ?>

<br/>

 <div style="float:right;">
<?php
if (!empty($this->item->pagination) AND $this->item->pagination AND $this->item->paginationposition AND $this->item->paginationrelative):
    echo $this->item->pagination;
  
	 ?>
<?php endif; ?>
  </div>
 
</div>

<div style="width: 100%;border-top:1px #999999 solid;border-bottom:1px #999999 solid; text-align:center; margin: 20px 0; font-size: 16px; clear:both;">
<span style="color:#027AC6; text-align:left; font-weight:bold;">欢迎提供新闻线索：</span>
<span style="color:#027AC6;">Email：</span><a href=mailto:news@chinapress.net><span style="color:#666;">news@chinapress.net</span></a> 
<span style="color:#027AC6;"> MSN：</span><a href=mailto:nychinapress@hotmail.com><span style="color:#666;">nychinapress@hotmail.com</a></span>
<span style="color:#027AC6;">QQ：</span><span style="color:#666;">2289914185</span><br/> 
</div>
<div style="padding: 0 0 10px 16px;">
<!-- Vote -->
<?php echo $this->item->event->beforeDisplayContent; ?>
<!-- Vote -->
</div>
<div style="padding: 0 0 10px 0px;">
<?php echo $this->item->event->afterDisplayContent; ?>
</div>
<!-- UY BEGIN -->
<script type="text/javascript" src="http://v2.uyan.cc/code/uyan.js?uid=1952092">	
</script>
<!-- UY END -->
<!--text watermark
<script>
function watermark()
{
 var myP = document.getElementsByTagName("p");
 for(var i=0;i<myP.length;i++)
 {
  var createLink = document.createElement("a");
  createLink.setAttribute("class","watermark");
  createLink.setAttribute("href","http://ny.usqiaobao.com");
  createLink.setAttribute("target","new");
  var createText = document.createTextNode("【侨报纽约网】");
  createLink.appendChild(createText);
  myP[i].appendChild(createLink);
 }
}
window.onload = function() {watermark();}
</script>
//text watermark-->
</div>
</div>
