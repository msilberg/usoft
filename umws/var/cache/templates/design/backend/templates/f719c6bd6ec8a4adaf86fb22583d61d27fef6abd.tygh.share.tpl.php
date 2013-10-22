<?php /* Smarty version Smarty-3.1.13, created on 2013-10-22 14:34:24
         compiled from "/home/mike/public_html/umws/design/backend/templates/common/share.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1774826124526654b05b17d6-75720040%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f719c6bd6ec8a4adaf86fb22583d61d27fef6abd' => 
    array (
      0 => '/home/mike/public_html/umws/design/backend/templates/common/share.tpl',
      1 => 1380199120,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '1774826124526654b05b17d6-75720040',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'mode' => 0,
    'runtime' => 0,
    'config' => 0,
    'url' => 0,
    'logos' => 0,
    'product_name' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_526654b062e8d9_06090141',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_526654b062e8d9_06090141')) {function content_526654b062e8d9_06090141($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['mode']->value=="notification"){?>
    <?php echo $_smarty_tpl->__("share.congratulations_first_order");?>

<?php }?>

<?php if ($_smarty_tpl->tpl_vars['runtime']->value['company_data']['storefront']){?>
    <?php $_smarty_tpl->tpl_vars['url'] = new Smarty_variable("http://".((string)$_smarty_tpl->tpl_vars['runtime']->value['company_data']['storefront']), null, 0);?>
<?php }else{ ?>
    <?php $_smarty_tpl->tpl_vars['url'] = new Smarty_variable($_smarty_tpl->tpl_vars['config']->value['http_location'], null, 0);?>
<?php }?>

<ul class="inline social-share">
    <?php echo $_smarty_tpl->__("share.tell_friends");?>

    <li><a href="#" class="uibutton large confirm" onclick=" window.open('https://www.facebook.com/sharer/sharer.php?s=100&p[url]=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['url']->value, ENT_QUOTES, 'UTF-8');?>
&p[images][0]=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['logos']->value['theme']['image']['http_image_path'], ENT_QUOTES, 'UTF-8');?>
&p[title]=<?php if ($_smarty_tpl->tpl_vars['mode']->value=="notification"){?><?php echo $_smarty_tpl->__("share.first_order_tweet");?>
<?php }else{ ?><?php echo $_smarty_tpl->__("share.installation_tweet",array('[product_name]'=>$_smarty_tpl->tpl_vars['product_name']->value));?>
<?php }?>', 'facebook-share-dialog', 'width=626,height=436'); return false;"> Share on Facebook</a></li>
    <li><a href="https://twitter.com/share" class="twitter-share-button" data-count="none" data-text="<?php if ($_smarty_tpl->tpl_vars['mode']->value=="notification"){?><?php echo $_smarty_tpl->__("share.first_order_tweet");?>
<?php }else{ ?><?php echo $_smarty_tpl->__("share.installation_tweet",array('[product_name]'=>$_smarty_tpl->tpl_vars['product_name']->value));?>
<?php }?>" data-url="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['url']->value, ENT_QUOTES, 'UTF-8');?>
" data-via="cscart" data-size="large">Tweet</a>
        
            <script type="text/javascript">!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
        </li>
</ul>
<?php }} ?>