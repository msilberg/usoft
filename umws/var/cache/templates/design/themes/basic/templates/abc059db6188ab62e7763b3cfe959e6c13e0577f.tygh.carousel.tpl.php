<?php /* Smarty version Smarty-3.1.13, created on 2013-10-22 14:37:12
         compiled from "/home/mike/public_html/umws/design/themes/basic/templates/addons/banners/blocks/carousel.tpl" */ ?>
<?php /*%%SmartyHeaderCode:57109250252665558d8c949-12571957%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'abc059db6188ab62e7763b3cfe959e6c13e0577f' => 
    array (
      0 => '/home/mike/public_html/umws/design/themes/basic/templates/addons/banners/blocks/carousel.tpl',
      1 => 1382438044,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '57109250252665558d8c949-12571957',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'runtime' => 0,
    'items' => 0,
    'block' => 0,
    'banner' => 0,
    'auth' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_52665558ef2040_07229895',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52665558ef2040_07229895')) {function content_52665558ef2040_07229895($_smarty_tpl) {?><?php if (!is_callable('smarty_function_math')) include '/home/mike/public_html/umws/app/lib/other/smarty/plugins/function.math.php';
if (!is_callable('smarty_function_set_id')) include '/home/mike/public_html/umws/app/functions/smarty_plugins/function.set_id.php';
?><?php if ($_smarty_tpl->tpl_vars['runtime']->value['customization_mode']['design']=="Y"&&@constant('AREA')=="C"){?><?php $_smarty_tpl->_capture_stack[0][] = array("template_content", null, null); ob_start(); ?>

<?php if ($_smarty_tpl->tpl_vars['items']->value){?>
<div class="cm-slider" id="banner_slider_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['block']->value['snapping_id'], ENT_QUOTES, 'UTF-8');?>
">
    <div class="cm-slider-window">
        <div class="cm-slide-page-reel">
        <?php  $_smarty_tpl->tpl_vars["banner"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["banner"]->_loop = false;
 $_smarty_tpl->tpl_vars["key"] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['items']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["banner"]->key => $_smarty_tpl->tpl_vars["banner"]->value){
$_smarty_tpl->tpl_vars["banner"]->_loop = true;
 $_smarty_tpl->tpl_vars["key"]->value = $_smarty_tpl->tpl_vars["banner"]->key;
?>
            <div class="cm-slide-page">
            <?php if ($_smarty_tpl->tpl_vars['banner']->value['type']=="G"&&$_smarty_tpl->tpl_vars['banner']->value['main_pair']['image_id']){?>
                <?php if ($_smarty_tpl->tpl_vars['banner']->value['url']!=''){?><a href="<?php echo htmlspecialchars(fn_url($_smarty_tpl->tpl_vars['banner']->value['url']), ENT_QUOTES, 'UTF-8');?>
" <?php if ($_smarty_tpl->tpl_vars['banner']->value['target']=="B"){?>target="_blank"<?php }?>><?php }?>
                <?php echo $_smarty_tpl->getSubTemplate ("common/image.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('images'=>$_smarty_tpl->tpl_vars['banner']->value['main_pair']), 0);?>

                <?php if ($_smarty_tpl->tpl_vars['banner']->value['url']!=''){?></a><?php }?>
            <?php }else{ ?>
                <div class="wysiwyg-content">
                    <?php echo $_smarty_tpl->tpl_vars['banner']->value['description'];?>

                </div>
            <?php }?>
            </div>
        <?php } ?>
        </div>
    </div>
    <div class="cm-paging <?php if ($_smarty_tpl->tpl_vars['block']->value['properties']['navigation']=="D"){?>cm-paging-dots<?php }?>">
        <?php  $_smarty_tpl->tpl_vars["banner"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["banner"]->_loop = false;
 $_smarty_tpl->tpl_vars["key"] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['items']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["banners"]['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars["banner"]->key => $_smarty_tpl->tpl_vars["banner"]->value){
$_smarty_tpl->tpl_vars["banner"]->_loop = true;
 $_smarty_tpl->tpl_vars["key"]->value = $_smarty_tpl->tpl_vars["banner"]->key;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["banners"]['iteration']++;
?>
        <?php if ($_smarty_tpl->tpl_vars['block']->value['properties']['navigation']=="P"){?>
            <a data-ca-banner-iteration="<?php echo htmlspecialchars($_smarty_tpl->getVariable('smarty')->value['foreach']['banners']['iteration'], ENT_QUOTES, 'UTF-8');?>
" href="#"><?php echo htmlspecialchars($_smarty_tpl->getVariable('smarty')->value['foreach']['banners']['iteration'], ENT_QUOTES, 'UTF-8');?>
</a>
        <?php }else{ ?>
            <a data-ca-banner-iteration="<?php echo htmlspecialchars($_smarty_tpl->getVariable('smarty')->value['foreach']['banners']['iteration'], ENT_QUOTES, 'UTF-8');?>
" href="#"><i>&nbsp;</i></a>
        <?php }?>
        <?php } ?>
    </div>
</div>
<?php }?>

<script type="text/javascript">
//<![CDATA[
(function(_, $) {
    $.ceEvent('on', 'ce.commoninit', function(context) {
        var slider = context.find('#banner_slider_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['block']->value['snapping_id'], ENT_QUOTES, 'UTF-8');?>
');
        if (slider.length) {
            slider.bannerSlider({
                delay: <?php echo smarty_function_math(array('equation'=>"s*1000",'s'=>(($tmp = @$_smarty_tpl->tpl_vars['block']->value['properties']['delay'])===null||$tmp==='' ? 0 : $tmp)),$_smarty_tpl);?>
,
                navigation: <?php if (count($_smarty_tpl->tpl_vars['items']->value)>1){?>'<?php echo htmlspecialchars((($tmp = @$_smarty_tpl->tpl_vars['block']->value['properties']['navigation'])===null||$tmp==='' ? 'N' : $tmp), ENT_QUOTES, 'UTF-8');?>
'<?php }else{ ?>'N'<?php }?>
            });
        }
    });
}(Tygh, Tygh.$));
//]]>
</script><?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?><?php if (trim(Smarty::$_smarty_vars['capture']['template_content'])){?><?php if ($_smarty_tpl->tpl_vars['auth']->value['area']=="A"){?><span class="cm-template-box template-box" data-ca-te-template="addons/banners/blocks/carousel.tpl" id="<?php echo smarty_function_set_id(array('name'=>"addons/banners/blocks/carousel.tpl"),$_smarty_tpl);?>
"><div class="cm-template-icon icon-edit hidden"></div><?php echo Smarty::$_smarty_vars['capture']['template_content'];?>
<!--[/tpl_id]--></span><?php }else{ ?><?php echo Smarty::$_smarty_vars['capture']['template_content'];?>
<?php }?><?php }?><?php }else{ ?>

<?php if ($_smarty_tpl->tpl_vars['items']->value){?>
<div class="cm-slider" id="banner_slider_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['block']->value['snapping_id'], ENT_QUOTES, 'UTF-8');?>
">
    <div class="cm-slider-window">
        <div class="cm-slide-page-reel">
        <?php  $_smarty_tpl->tpl_vars["banner"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["banner"]->_loop = false;
 $_smarty_tpl->tpl_vars["key"] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['items']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["banner"]->key => $_smarty_tpl->tpl_vars["banner"]->value){
$_smarty_tpl->tpl_vars["banner"]->_loop = true;
 $_smarty_tpl->tpl_vars["key"]->value = $_smarty_tpl->tpl_vars["banner"]->key;
?>
            <div class="cm-slide-page">
            <?php if ($_smarty_tpl->tpl_vars['banner']->value['type']=="G"&&$_smarty_tpl->tpl_vars['banner']->value['main_pair']['image_id']){?>
                <?php if ($_smarty_tpl->tpl_vars['banner']->value['url']!=''){?><a href="<?php echo htmlspecialchars(fn_url($_smarty_tpl->tpl_vars['banner']->value['url']), ENT_QUOTES, 'UTF-8');?>
" <?php if ($_smarty_tpl->tpl_vars['banner']->value['target']=="B"){?>target="_blank"<?php }?>><?php }?>
                <?php echo $_smarty_tpl->getSubTemplate ("common/image.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('images'=>$_smarty_tpl->tpl_vars['banner']->value['main_pair']), 0);?>

                <?php if ($_smarty_tpl->tpl_vars['banner']->value['url']!=''){?></a><?php }?>
            <?php }else{ ?>
                <div class="wysiwyg-content">
                    <?php echo $_smarty_tpl->tpl_vars['banner']->value['description'];?>

                </div>
            <?php }?>
            </div>
        <?php } ?>
        </div>
    </div>
    <div class="cm-paging <?php if ($_smarty_tpl->tpl_vars['block']->value['properties']['navigation']=="D"){?>cm-paging-dots<?php }?>">
        <?php  $_smarty_tpl->tpl_vars["banner"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["banner"]->_loop = false;
 $_smarty_tpl->tpl_vars["key"] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['items']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["banners"]['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars["banner"]->key => $_smarty_tpl->tpl_vars["banner"]->value){
$_smarty_tpl->tpl_vars["banner"]->_loop = true;
 $_smarty_tpl->tpl_vars["key"]->value = $_smarty_tpl->tpl_vars["banner"]->key;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["banners"]['iteration']++;
?>
        <?php if ($_smarty_tpl->tpl_vars['block']->value['properties']['navigation']=="P"){?>
            <a data-ca-banner-iteration="<?php echo htmlspecialchars($_smarty_tpl->getVariable('smarty')->value['foreach']['banners']['iteration'], ENT_QUOTES, 'UTF-8');?>
" href="#"><?php echo htmlspecialchars($_smarty_tpl->getVariable('smarty')->value['foreach']['banners']['iteration'], ENT_QUOTES, 'UTF-8');?>
</a>
        <?php }else{ ?>
            <a data-ca-banner-iteration="<?php echo htmlspecialchars($_smarty_tpl->getVariable('smarty')->value['foreach']['banners']['iteration'], ENT_QUOTES, 'UTF-8');?>
" href="#"><i>&nbsp;</i></a>
        <?php }?>
        <?php } ?>
    </div>
</div>
<?php }?>

<script type="text/javascript">
//<![CDATA[
(function(_, $) {
    $.ceEvent('on', 'ce.commoninit', function(context) {
        var slider = context.find('#banner_slider_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['block']->value['snapping_id'], ENT_QUOTES, 'UTF-8');?>
');
        if (slider.length) {
            slider.bannerSlider({
                delay: <?php echo smarty_function_math(array('equation'=>"s*1000",'s'=>(($tmp = @$_smarty_tpl->tpl_vars['block']->value['properties']['delay'])===null||$tmp==='' ? 0 : $tmp)),$_smarty_tpl);?>
,
                navigation: <?php if (count($_smarty_tpl->tpl_vars['items']->value)>1){?>'<?php echo htmlspecialchars((($tmp = @$_smarty_tpl->tpl_vars['block']->value['properties']['navigation'])===null||$tmp==='' ? 'N' : $tmp), ENT_QUOTES, 'UTF-8');?>
'<?php }else{ ?>'N'<?php }?>
            });
        }
    });
}(Tygh, Tygh.$));
//]]>
</script><?php }?><?php }} ?>