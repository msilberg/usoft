<?php /* Smarty version Smarty-3.1.13, created on 2013-11-18 15:35:01
         compiled from "/home/mike/public_html/umws/design/themes/basic/templates/common/scroller_init.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11472611845289fb657d4e00-89603785%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9483937d1d3418c51587e96087ced4e3b780550f' => 
    array (
      0 => '/home/mike/public_html/umws/design/themes/basic/templates/common/scroller_init.tpl',
      1 => 1384774366,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '11472611845289fb657d4e00-89603785',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'runtime' => 0,
    'block' => 0,
    'item_width' => 0,
    'item_height' => 0,
    'scroller_vert' => 0,
    'items' => 0,
    'scroller_direction' => 0,
    'scroller_event' => 0,
    'clip_width' => 0,
    'clip_height' => 0,
    'auth' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5289fb6599cee3_28857532',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5289fb6599cee3_28857532')) {function content_5289fb6599cee3_28857532($_smarty_tpl) {?><?php if (!is_callable('smarty_function_math')) include '/home/mike/public_html/umws/app/lib/other/smarty/plugins/function.math.php';
if (!is_callable('smarty_function_script')) include '/home/mike/public_html/umws/app/functions/smarty_plugins/function.script.php';
if (!is_callable('smarty_function_set_id')) include '/home/mike/public_html/umws/app/functions/smarty_plugins/function.set_id.php';
?><?php if ($_smarty_tpl->tpl_vars['runtime']->value['customization_mode']['design']=="Y"&&@constant('AREA')=="C"){?><?php $_smarty_tpl->_capture_stack[0][] = array("template_content", null, null); ob_start(); ?><?php if ($_smarty_tpl->tpl_vars['block']->value['properties']['scroller_direction']=="up"||$_smarty_tpl->tpl_vars['block']->value['properties']['scroller_direction']=="left"){?>
    <?php $_smarty_tpl->tpl_vars["scroller_direction"] = new Smarty_variable("next", null, 0);?>
    <?php $_smarty_tpl->tpl_vars["scroller_event"] = new Smarty_variable("onAfterAnimation", null, 0);?>
<?php }else{ ?>
    <?php $_smarty_tpl->tpl_vars["scroller_direction"] = new Smarty_variable("prev", null, 0);?>
    <?php $_smarty_tpl->tpl_vars["scroller_event"] = new Smarty_variable("onBeforeAnimation", null, 0);?>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['block']->value['properties']['scroller_direction']=="left"||$_smarty_tpl->tpl_vars['block']->value['properties']['scroller_direction']=="right"){?>
    <?php $_smarty_tpl->tpl_vars["scroller_vert"] = new Smarty_variable("false", null, 0);?>
    <?php echo smarty_function_math(array('equation'=>"item_quantity * item_width",'assign'=>"clip_width",'item_width'=>$_smarty_tpl->tpl_vars['item_width']->value,'item_quantity'=>(($tmp = @$_smarty_tpl->tpl_vars['block']->value['properties']['item_quantity'])===null||$tmp==='' ? 1 : $tmp)),$_smarty_tpl);?>

    <?php $_smarty_tpl->tpl_vars["clip_height"] = new Smarty_variable($_smarty_tpl->tpl_vars['item_height']->value, null, 0);?>
<?php }else{ ?>
    <?php $_smarty_tpl->tpl_vars["scroller_vert"] = new Smarty_variable("true", null, 0);?>
    <?php $_smarty_tpl->tpl_vars["clip_width"] = new Smarty_variable($_smarty_tpl->tpl_vars['item_width']->value, null, 0);?>
    <?php echo smarty_function_math(array('equation'=>"item_quantity * item_height",'assign'=>"clip_height",'item_height'=>$_smarty_tpl->tpl_vars['item_height']->value,'item_quantity'=>(($tmp = @$_smarty_tpl->tpl_vars['block']->value['properties']['item_quantity'])===null||$tmp==='' ? 1 : $tmp)),$_smarty_tpl);?>

<?php }?>

<?php echo smarty_function_script(array('src'=>"js/lib/jcarousel/jquery.jcarousel.js"),$_smarty_tpl);?>

<script type="text/javascript">
//<![CDATA[
(function(_, $) {
    $.ceEvent('on', 'ce.commoninit', function(context) {
        var elm = context.find('#scroll_list_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['block']->value['block_id'], ENT_QUOTES, 'UTF-8');?>
');

        if (elm.length) {
            elm.jcarousel({
                vertical: <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['scroller_vert']->value, ENT_QUOTES, 'UTF-8');?>
,
                size: <?php if (count($_smarty_tpl->tpl_vars['items']->value)>$_smarty_tpl->tpl_vars['block']->value['properties']['item_quantity']){?><?php echo htmlspecialchars((($tmp = @count($_smarty_tpl->tpl_vars['items']->value))===null||$tmp==='' ? "null" : $tmp), ENT_QUOTES, 'UTF-8');?>
<?php }else{ ?><?php echo htmlspecialchars((($tmp = @$_smarty_tpl->tpl_vars['block']->value['properties']['item_quantity'])===null||$tmp==='' ? 1 : $tmp), ENT_QUOTES, 'UTF-8');?>
<?php }?>,
                scroll: <?php if ($_smarty_tpl->tpl_vars['block']->value['properties']['scroller_direction']=="right"||$_smarty_tpl->tpl_vars['block']->value['properties']['scroller_direction']=="down"){?>-<?php }?><?php echo htmlspecialchars((($tmp = @$_smarty_tpl->tpl_vars['block']->value['properties']['item_quantity'])===null||$tmp==='' ? 1 : $tmp), ENT_QUOTES, 'UTF-8');?>
,
                animation: '<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['block']->value['properties']['speed'], ENT_QUOTES, 'UTF-8');?>
',
                easing: '<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['block']->value['properties']['easing'], ENT_QUOTES, 'UTF-8');?>
',
                <?php if ($_smarty_tpl->tpl_vars['block']->value['properties']['not_scroll_automatically']=="Y"){?>
                auto: 0,
                <?php }else{ ?>
                auto: '<?php echo htmlspecialchars((($tmp = @$_smarty_tpl->tpl_vars['block']->value['properties']['pause_delay'])===null||$tmp==='' ? 0 : $tmp), ENT_QUOTES, 'UTF-8');?>
',
                <?php }?>
                autoDirection: '<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['scroller_direction']->value, ENT_QUOTES, 'UTF-8');?>
',
                wrap: 'circular',
                initCallback: $.ceScrollerMethods.init_callback,
                itemVisibleOutCallback: {
                    <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['scroller_event']->value, ENT_QUOTES, 'UTF-8');?>
: $.ceScrollerMethods.in_out_callback
                },
                item_width: <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item_width']->value, ENT_QUOTES, 'UTF-8');?>
,
                item_height: <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item_height']->value, ENT_QUOTES, 'UTF-8');?>
,
                clip_width: <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['clip_width']->value, ENT_QUOTES, 'UTF-8');?>
,
                clip_height: <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['clip_height']->value, ENT_QUOTES, 'UTF-8');?>
,
                item_count: <?php echo htmlspecialchars(sizeof($_smarty_tpl->tpl_vars['items']->value), ENT_QUOTES, 'UTF-8');?>
,
                buttonNextHTML: '<div><i class="icon-right-open-thin"></i><i class="icon-down-open"></i></div>',
                buttonPrevHTML: '<div><i class="icon-left-open-thin"></i><i class="icon-up-open"></i></div>'
            }).show();
        }
    });
}(Tygh, Tygh.$));
//]]>
</script><?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?><?php if (trim(Smarty::$_smarty_vars['capture']['template_content'])){?><?php if ($_smarty_tpl->tpl_vars['auth']->value['area']=="A"){?><span class="cm-template-box template-box" data-ca-te-template="common/scroller_init.tpl" id="<?php echo smarty_function_set_id(array('name'=>"common/scroller_init.tpl"),$_smarty_tpl);?>
"><div class="cm-template-icon icon-edit hidden"></div><?php echo Smarty::$_smarty_vars['capture']['template_content'];?>
<!--[/tpl_id]--></span><?php }else{ ?><?php echo Smarty::$_smarty_vars['capture']['template_content'];?>
<?php }?><?php }?><?php }else{ ?><?php if ($_smarty_tpl->tpl_vars['block']->value['properties']['scroller_direction']=="up"||$_smarty_tpl->tpl_vars['block']->value['properties']['scroller_direction']=="left"){?>
    <?php $_smarty_tpl->tpl_vars["scroller_direction"] = new Smarty_variable("next", null, 0);?>
    <?php $_smarty_tpl->tpl_vars["scroller_event"] = new Smarty_variable("onAfterAnimation", null, 0);?>
<?php }else{ ?>
    <?php $_smarty_tpl->tpl_vars["scroller_direction"] = new Smarty_variable("prev", null, 0);?>
    <?php $_smarty_tpl->tpl_vars["scroller_event"] = new Smarty_variable("onBeforeAnimation", null, 0);?>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['block']->value['properties']['scroller_direction']=="left"||$_smarty_tpl->tpl_vars['block']->value['properties']['scroller_direction']=="right"){?>
    <?php $_smarty_tpl->tpl_vars["scroller_vert"] = new Smarty_variable("false", null, 0);?>
    <?php echo smarty_function_math(array('equation'=>"item_quantity * item_width",'assign'=>"clip_width",'item_width'=>$_smarty_tpl->tpl_vars['item_width']->value,'item_quantity'=>(($tmp = @$_smarty_tpl->tpl_vars['block']->value['properties']['item_quantity'])===null||$tmp==='' ? 1 : $tmp)),$_smarty_tpl);?>

    <?php $_smarty_tpl->tpl_vars["clip_height"] = new Smarty_variable($_smarty_tpl->tpl_vars['item_height']->value, null, 0);?>
<?php }else{ ?>
    <?php $_smarty_tpl->tpl_vars["scroller_vert"] = new Smarty_variable("true", null, 0);?>
    <?php $_smarty_tpl->tpl_vars["clip_width"] = new Smarty_variable($_smarty_tpl->tpl_vars['item_width']->value, null, 0);?>
    <?php echo smarty_function_math(array('equation'=>"item_quantity * item_height",'assign'=>"clip_height",'item_height'=>$_smarty_tpl->tpl_vars['item_height']->value,'item_quantity'=>(($tmp = @$_smarty_tpl->tpl_vars['block']->value['properties']['item_quantity'])===null||$tmp==='' ? 1 : $tmp)),$_smarty_tpl);?>

<?php }?>

<?php echo smarty_function_script(array('src'=>"js/lib/jcarousel/jquery.jcarousel.js"),$_smarty_tpl);?>

<script type="text/javascript">
//<![CDATA[
(function(_, $) {
    $.ceEvent('on', 'ce.commoninit', function(context) {
        var elm = context.find('#scroll_list_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['block']->value['block_id'], ENT_QUOTES, 'UTF-8');?>
');

        if (elm.length) {
            elm.jcarousel({
                vertical: <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['scroller_vert']->value, ENT_QUOTES, 'UTF-8');?>
,
                size: <?php if (count($_smarty_tpl->tpl_vars['items']->value)>$_smarty_tpl->tpl_vars['block']->value['properties']['item_quantity']){?><?php echo htmlspecialchars((($tmp = @count($_smarty_tpl->tpl_vars['items']->value))===null||$tmp==='' ? "null" : $tmp), ENT_QUOTES, 'UTF-8');?>
<?php }else{ ?><?php echo htmlspecialchars((($tmp = @$_smarty_tpl->tpl_vars['block']->value['properties']['item_quantity'])===null||$tmp==='' ? 1 : $tmp), ENT_QUOTES, 'UTF-8');?>
<?php }?>,
                scroll: <?php if ($_smarty_tpl->tpl_vars['block']->value['properties']['scroller_direction']=="right"||$_smarty_tpl->tpl_vars['block']->value['properties']['scroller_direction']=="down"){?>-<?php }?><?php echo htmlspecialchars((($tmp = @$_smarty_tpl->tpl_vars['block']->value['properties']['item_quantity'])===null||$tmp==='' ? 1 : $tmp), ENT_QUOTES, 'UTF-8');?>
,
                animation: '<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['block']->value['properties']['speed'], ENT_QUOTES, 'UTF-8');?>
',
                easing: '<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['block']->value['properties']['easing'], ENT_QUOTES, 'UTF-8');?>
',
                <?php if ($_smarty_tpl->tpl_vars['block']->value['properties']['not_scroll_automatically']=="Y"){?>
                auto: 0,
                <?php }else{ ?>
                auto: '<?php echo htmlspecialchars((($tmp = @$_smarty_tpl->tpl_vars['block']->value['properties']['pause_delay'])===null||$tmp==='' ? 0 : $tmp), ENT_QUOTES, 'UTF-8');?>
',
                <?php }?>
                autoDirection: '<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['scroller_direction']->value, ENT_QUOTES, 'UTF-8');?>
',
                wrap: 'circular',
                initCallback: $.ceScrollerMethods.init_callback,
                itemVisibleOutCallback: {
                    <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['scroller_event']->value, ENT_QUOTES, 'UTF-8');?>
: $.ceScrollerMethods.in_out_callback
                },
                item_width: <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item_width']->value, ENT_QUOTES, 'UTF-8');?>
,
                item_height: <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item_height']->value, ENT_QUOTES, 'UTF-8');?>
,
                clip_width: <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['clip_width']->value, ENT_QUOTES, 'UTF-8');?>
,
                clip_height: <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['clip_height']->value, ENT_QUOTES, 'UTF-8');?>
,
                item_count: <?php echo htmlspecialchars(sizeof($_smarty_tpl->tpl_vars['items']->value), ENT_QUOTES, 'UTF-8');?>
,
                buttonNextHTML: '<div><i class="icon-right-open-thin"></i><i class="icon-down-open"></i></div>',
                buttonPrevHTML: '<div><i class="icon-left-open-thin"></i><i class="icon-up-open"></i></div>'
            }).show();
        }
    });
}(Tygh, Tygh.$));
//]]>
</script><?php }?><?php }} ?>