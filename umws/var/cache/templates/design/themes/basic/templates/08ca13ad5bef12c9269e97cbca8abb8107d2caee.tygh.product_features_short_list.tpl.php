<?php /* Smarty version Smarty-3.1.13, created on 2013-11-18 16:31:47
         compiled from "/home/mike/public_html/umws/design/themes/basic/templates/views/products/components/product_features_short_list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:182124353528a08b3693fc7-08696685%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '08ca13ad5bef12c9269e97cbca8abb8107d2caee' => 
    array (
      0 => '/home/mike/public_html/umws/design/themes/basic/templates/views/products/components/product_features_short_list.tpl',
      1 => 1384774367,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '182124353528a08b3693fc7-08696685',
  'function' => 
  array (
    'feature_value' => 
    array (
      'parameter' => 
      array (
      ),
      'compiled' => '',
    ),
  ),
  'variables' => 
  array (
    'runtime' => 0,
    'feature' => 0,
    'product' => 0,
    'settings' => 0,
    'fvariant' => 0,
    'features' => 0,
    'no_container' => 0,
    'auth' => 0,
  ),
  'has_nocache_code' => 0,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_528a08b3814c78_04542097',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_528a08b3814c78_04542097')) {function content_528a08b3814c78_04542097($_smarty_tpl) {?><?php if (!is_callable('smarty_function_set_id')) include '/home/mike/public_html/umws/app/functions/smarty_plugins/function.set_id.php';
?><?php if ($_smarty_tpl->tpl_vars['runtime']->value['customization_mode']['design']=="Y"&&@constant('AREA')=="C"){?><?php $_smarty_tpl->_capture_stack[0][] = array("template_content", null, null); ob_start(); ?><?php if (!is_callable('smarty_modifier_date_format')) include '/home/mike/public_html/umws/app/functions/smarty_plugins/modifier.date_format.php';
?><?php if (!function_exists('smarty_template_function_feature_value')) {
    function smarty_template_function_feature_value($_smarty_tpl,$params) {
    $saved_tpl_vars = $_smarty_tpl->tpl_vars;
    foreach ($_smarty_tpl->smarty->template_functions['feature_value']['parameter'] as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);};
    foreach ($params as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);}?>
<?php if ($_smarty_tpl->tpl_vars['feature']->value['features_hash']&&$_smarty_tpl->tpl_vars['feature']->value['feature_type']=="E"){?><a href="<?php echo htmlspecialchars(fn_url("categories.view?category_id=".((string)$_smarty_tpl->tpl_vars['product']->value['main_category'])."&features_hash=".((string)$_smarty_tpl->tpl_vars['feature']->value['features_hash'])), ENT_QUOTES, 'UTF-8');?>
"><?php }?><?php if ($_smarty_tpl->tpl_vars['feature']->value['prefix']){?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['feature']->value['prefix'], ENT_QUOTES, 'UTF-8');?>
<?php }?><?php if ($_smarty_tpl->tpl_vars['feature']->value['feature_type']=="D"){?><?php echo htmlspecialchars(smarty_modifier_date_format($_smarty_tpl->tpl_vars['feature']->value['value_int'],((string)$_smarty_tpl->tpl_vars['settings']->value['Appearance']['date_format'])), ENT_QUOTES, 'UTF-8');?>
<?php }elseif($_smarty_tpl->tpl_vars['feature']->value['feature_type']=="M"){?><?php  $_smarty_tpl->tpl_vars["fvariant"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["fvariant"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['feature']->value['variants']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars["fvariant"]->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars["fvariant"]->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars["fvariant"]->key => $_smarty_tpl->tpl_vars["fvariant"]->value){
$_smarty_tpl->tpl_vars["fvariant"]->_loop = true;
 $_smarty_tpl->tpl_vars["fvariant"]->iteration++;
 $_smarty_tpl->tpl_vars["fvariant"]->last = $_smarty_tpl->tpl_vars["fvariant"]->iteration === $_smarty_tpl->tpl_vars["fvariant"]->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["ffev"]['last'] = $_smarty_tpl->tpl_vars["fvariant"]->last;
?><?php echo htmlspecialchars((($tmp = @$_smarty_tpl->tpl_vars['fvariant']->value['variant'])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['fvariant']->value['value'] : $tmp), ENT_QUOTES, 'UTF-8');?>
<?php if (!$_smarty_tpl->getVariable('smarty')->value['foreach']['ffev']['last']){?>, <?php }?><?php } ?><?php }elseif($_smarty_tpl->tpl_vars['feature']->value['feature_type']=="S"||$_smarty_tpl->tpl_vars['feature']->value['feature_type']=="N"||$_smarty_tpl->tpl_vars['feature']->value['feature_type']=="E"){?><?php echo htmlspecialchars((($tmp = @$_smarty_tpl->tpl_vars['feature']->value['variant'])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['feature']->value['value'] : $tmp), ENT_QUOTES, 'UTF-8');?>
<?php }elseif($_smarty_tpl->tpl_vars['feature']->value['feature_type']=="C"){?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['feature']->value['description'], ENT_QUOTES, 'UTF-8');?>
<?php }elseif($_smarty_tpl->tpl_vars['feature']->value['feature_type']=="O"){?><?php echo htmlspecialchars(floatval($_smarty_tpl->tpl_vars['feature']->value['value_int']), ENT_QUOTES, 'UTF-8');?>
<?php }else{ ?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['feature']->value['value'], ENT_QUOTES, 'UTF-8');?>
<?php }?><?php if ($_smarty_tpl->tpl_vars['feature']->value['suffix']){?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['feature']->value['suffix'], ENT_QUOTES, 'UTF-8');?>
<?php }?><?php if ($_smarty_tpl->tpl_vars['feature']->value['feature_type']=="E"&&$_smarty_tpl->tpl_vars['feature']->value['features_hash']){?></a><?php }?>
<?php $_smarty_tpl->tpl_vars = $saved_tpl_vars;
foreach (Smarty::$global_tpl_vars as $key => $value) if(!isset($_smarty_tpl->tpl_vars[$key])) $_smarty_tpl->tpl_vars[$key] = $value;}}?>


<?php if ($_smarty_tpl->tpl_vars['features']->value){?>
<?php if (!$_smarty_tpl->tpl_vars['no_container']->value){?><p class="features-list description"><?php }?>
    <?php  $_smarty_tpl->tpl_vars['feature'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['feature']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['features']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['feature']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['feature']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['feature']->key => $_smarty_tpl->tpl_vars['feature']->value){
$_smarty_tpl->tpl_vars['feature']->_loop = true;
 $_smarty_tpl->tpl_vars['feature']->iteration++;
 $_smarty_tpl->tpl_vars['feature']->last = $_smarty_tpl->tpl_vars['feature']->iteration === $_smarty_tpl->tpl_vars['feature']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['features_list']['last'] = $_smarty_tpl->tpl_vars['feature']->last;
?>
        <?php if ($_smarty_tpl->tpl_vars['feature']->value['feature_type']=="D"||$_smarty_tpl->tpl_vars['feature']->value['feature_type']=="O"||$_smarty_tpl->tpl_vars['feature']->value['feature_type']=="N"){?>
            <?php echo $_smarty_tpl->tpl_vars['feature']->value['description'];?>
: 
        <?php }?>
        <?php smarty_template_function_feature_value($_smarty_tpl,array('feature'=>$_smarty_tpl->tpl_vars['feature']->value));?>
<?php if (!$_smarty_tpl->getVariable('smarty')->value['foreach']['features_list']['last']){?>, <?php }?>
    <?php } ?>
<?php if (!$_smarty_tpl->tpl_vars['no_container']->value){?></p><?php }?>

<?php }?><?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?><?php if (trim(Smarty::$_smarty_vars['capture']['template_content'])){?><?php if ($_smarty_tpl->tpl_vars['auth']->value['area']=="A"){?><span class="cm-template-box template-box" data-ca-te-template="views/products/components/product_features_short_list.tpl" id="<?php echo smarty_function_set_id(array('name'=>"views/products/components/product_features_short_list.tpl"),$_smarty_tpl);?>
"><div class="cm-template-icon icon-edit hidden"></div><?php echo Smarty::$_smarty_vars['capture']['template_content'];?>
<!--[/tpl_id]--></span><?php }else{ ?><?php echo Smarty::$_smarty_vars['capture']['template_content'];?>
<?php }?><?php }?><?php }else{ ?><?php if (!is_callable('smarty_modifier_date_format')) include '/home/mike/public_html/umws/app/functions/smarty_plugins/modifier.date_format.php';
?><?php if (!function_exists('smarty_template_function_feature_value')) {
    function smarty_template_function_feature_value($_smarty_tpl,$params) {
    $saved_tpl_vars = $_smarty_tpl->tpl_vars;
    foreach ($_smarty_tpl->smarty->template_functions['feature_value']['parameter'] as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);};
    foreach ($params as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);}?>
<?php if ($_smarty_tpl->tpl_vars['feature']->value['features_hash']&&$_smarty_tpl->tpl_vars['feature']->value['feature_type']=="E"){?><a href="<?php echo htmlspecialchars(fn_url("categories.view?category_id=".((string)$_smarty_tpl->tpl_vars['product']->value['main_category'])."&features_hash=".((string)$_smarty_tpl->tpl_vars['feature']->value['features_hash'])), ENT_QUOTES, 'UTF-8');?>
"><?php }?><?php if ($_smarty_tpl->tpl_vars['feature']->value['prefix']){?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['feature']->value['prefix'], ENT_QUOTES, 'UTF-8');?>
<?php }?><?php if ($_smarty_tpl->tpl_vars['feature']->value['feature_type']=="D"){?><?php echo htmlspecialchars(smarty_modifier_date_format($_smarty_tpl->tpl_vars['feature']->value['value_int'],((string)$_smarty_tpl->tpl_vars['settings']->value['Appearance']['date_format'])), ENT_QUOTES, 'UTF-8');?>
<?php }elseif($_smarty_tpl->tpl_vars['feature']->value['feature_type']=="M"){?><?php  $_smarty_tpl->tpl_vars["fvariant"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["fvariant"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['feature']->value['variants']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars["fvariant"]->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars["fvariant"]->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars["fvariant"]->key => $_smarty_tpl->tpl_vars["fvariant"]->value){
$_smarty_tpl->tpl_vars["fvariant"]->_loop = true;
 $_smarty_tpl->tpl_vars["fvariant"]->iteration++;
 $_smarty_tpl->tpl_vars["fvariant"]->last = $_smarty_tpl->tpl_vars["fvariant"]->iteration === $_smarty_tpl->tpl_vars["fvariant"]->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["ffev"]['last'] = $_smarty_tpl->tpl_vars["fvariant"]->last;
?><?php echo htmlspecialchars((($tmp = @$_smarty_tpl->tpl_vars['fvariant']->value['variant'])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['fvariant']->value['value'] : $tmp), ENT_QUOTES, 'UTF-8');?>
<?php if (!$_smarty_tpl->getVariable('smarty')->value['foreach']['ffev']['last']){?>, <?php }?><?php } ?><?php }elseif($_smarty_tpl->tpl_vars['feature']->value['feature_type']=="S"||$_smarty_tpl->tpl_vars['feature']->value['feature_type']=="N"||$_smarty_tpl->tpl_vars['feature']->value['feature_type']=="E"){?><?php echo htmlspecialchars((($tmp = @$_smarty_tpl->tpl_vars['feature']->value['variant'])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['feature']->value['value'] : $tmp), ENT_QUOTES, 'UTF-8');?>
<?php }elseif($_smarty_tpl->tpl_vars['feature']->value['feature_type']=="C"){?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['feature']->value['description'], ENT_QUOTES, 'UTF-8');?>
<?php }elseif($_smarty_tpl->tpl_vars['feature']->value['feature_type']=="O"){?><?php echo htmlspecialchars(floatval($_smarty_tpl->tpl_vars['feature']->value['value_int']), ENT_QUOTES, 'UTF-8');?>
<?php }else{ ?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['feature']->value['value'], ENT_QUOTES, 'UTF-8');?>
<?php }?><?php if ($_smarty_tpl->tpl_vars['feature']->value['suffix']){?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['feature']->value['suffix'], ENT_QUOTES, 'UTF-8');?>
<?php }?><?php if ($_smarty_tpl->tpl_vars['feature']->value['feature_type']=="E"&&$_smarty_tpl->tpl_vars['feature']->value['features_hash']){?></a><?php }?>
<?php $_smarty_tpl->tpl_vars = $saved_tpl_vars;
foreach (Smarty::$global_tpl_vars as $key => $value) if(!isset($_smarty_tpl->tpl_vars[$key])) $_smarty_tpl->tpl_vars[$key] = $value;}}?>


<?php if ($_smarty_tpl->tpl_vars['features']->value){?>
<?php if (!$_smarty_tpl->tpl_vars['no_container']->value){?><p class="features-list description"><?php }?>
    <?php  $_smarty_tpl->tpl_vars['feature'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['feature']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['features']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['feature']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['feature']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['feature']->key => $_smarty_tpl->tpl_vars['feature']->value){
$_smarty_tpl->tpl_vars['feature']->_loop = true;
 $_smarty_tpl->tpl_vars['feature']->iteration++;
 $_smarty_tpl->tpl_vars['feature']->last = $_smarty_tpl->tpl_vars['feature']->iteration === $_smarty_tpl->tpl_vars['feature']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['features_list']['last'] = $_smarty_tpl->tpl_vars['feature']->last;
?>
        <?php if ($_smarty_tpl->tpl_vars['feature']->value['feature_type']=="D"||$_smarty_tpl->tpl_vars['feature']->value['feature_type']=="O"||$_smarty_tpl->tpl_vars['feature']->value['feature_type']=="N"){?>
            <?php echo $_smarty_tpl->tpl_vars['feature']->value['description'];?>
: 
        <?php }?>
        <?php smarty_template_function_feature_value($_smarty_tpl,array('feature'=>$_smarty_tpl->tpl_vars['feature']->value));?>
<?php if (!$_smarty_tpl->getVariable('smarty')->value['foreach']['features_list']['last']){?>, <?php }?>
    <?php } ?>
<?php if (!$_smarty_tpl->tpl_vars['no_container']->value){?></p><?php }?>

<?php }?><?php }?><?php }} ?>