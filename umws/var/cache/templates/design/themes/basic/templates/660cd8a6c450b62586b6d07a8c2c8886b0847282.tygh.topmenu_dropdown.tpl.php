<?php /* Smarty version Smarty-3.1.13, created on 2013-11-18 15:34:58
         compiled from "/home/mike/public_html/umws/design/themes/basic/templates/blocks/topmenu_dropdown.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9227372895289fb62a032d4-39979170%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '660cd8a6c450b62586b6d07a8c2c8886b0847282' => 
    array (
      0 => '/home/mike/public_html/umws/design/themes/basic/templates/blocks/topmenu_dropdown.tpl',
      1 => 1384774367,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '9227372895289fb62a032d4-39979170',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'runtime' => 0,
    'items' => 0,
    'item1' => 0,
    'block' => 0,
    'item1_url' => 0,
    'unique_elm_id' => 0,
    'childs' => 0,
    'subitems_count' => 0,
    'divider' => 0,
    'cols' => 0,
    'name' => 0,
    'item2' => 0,
    'item_url2' => 0,
    'dropdown_class' => 0,
    'item2_url' => 0,
    'item3' => 0,
    'item3_url' => 0,
    'auth' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5289fb62dc49c8_47765317',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5289fb62dc49c8_47765317')) {function content_5289fb62dc49c8_47765317($_smarty_tpl) {?><?php if (!is_callable('smarty_block_hook')) include '/home/mike/public_html/umws/app/functions/smarty_plugins/block.hook.php';
if (!is_callable('smarty_function_math')) include '/home/mike/public_html/umws/app/lib/other/smarty/plugins/function.math.php';
if (!is_callable('smarty_function_set_id')) include '/home/mike/public_html/umws/app/functions/smarty_plugins/function.set_id.php';
?><?php
fn_preload_lang_vars(array('text_topmenu_view_more','text_topmenu_view_more','text_topmenu_more','text_topmenu_view_more','text_topmenu_view_more','text_topmenu_more'));
?>
<?php if ($_smarty_tpl->tpl_vars['runtime']->value['customization_mode']['design']=="Y"&&@constant('AREA')=="C"){?><?php $_smarty_tpl->_capture_stack[0][] = array("template_content", null, null); ob_start(); ?><?php $_smarty_tpl->smarty->_tag_stack[] = array('hook', array('name'=>"blocks:topmenu_dropdown")); $_block_repeat=true; echo smarty_block_hook(array('name'=>"blocks:topmenu_dropdown"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>


<?php if ($_smarty_tpl->tpl_vars['items']->value){?>
    <div class="wrap-dropdown-multicolumns">
        <ul class="dropdown-multicolumns clearfix">
        
        <?php $_smarty_tpl->smarty->_tag_stack[] = array('hook', array('name'=>"blocks:topmenu_dropdown_top_menu")); $_block_repeat=true; echo smarty_block_hook(array('name'=>"blocks:topmenu_dropdown_top_menu"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

        
        <?php  $_smarty_tpl->tpl_vars["item1"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["item1"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['items']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars["item1"]->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars["item1"]->iteration=0;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["item1"]['index']=-1;
foreach ($_from as $_smarty_tpl->tpl_vars["item1"]->key => $_smarty_tpl->tpl_vars["item1"]->value){
$_smarty_tpl->tpl_vars["item1"]->_loop = true;
 $_smarty_tpl->tpl_vars["item1"]->iteration++;
 $_smarty_tpl->tpl_vars["item1"]->last = $_smarty_tpl->tpl_vars["item1"]->iteration === $_smarty_tpl->tpl_vars["item1"]->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["item1"]['index']++;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["item1"]['last'] = $_smarty_tpl->tpl_vars["item1"]->last;
?>
            <?php $_smarty_tpl->tpl_vars["item1_url"] = new Smarty_variable(fn_form_dropdown_object_link($_smarty_tpl->tpl_vars['item1']->value,$_smarty_tpl->tpl_vars['block']->value['type']), null, 0);?>
            <?php $_smarty_tpl->tpl_vars["unique_elm_id"] = new Smarty_variable(md5($_smarty_tpl->tpl_vars['item1_url']->value), null, 0);?>
            <?php $_smarty_tpl->tpl_vars["unique_elm_id"] = new Smarty_variable("topmenu_".((string)$_smarty_tpl->tpl_vars['block']->value['block_id'])."_".((string)$_smarty_tpl->tpl_vars['unique_elm_id']->value), null, 0);?>

            <?php $_smarty_tpl->tpl_vars["subitems_count"] = new Smarty_variable(count($_smarty_tpl->tpl_vars['item1']->value[$_smarty_tpl->tpl_vars['childs']->value]), null, 0);?>
            <?php $_smarty_tpl->tpl_vars["cols"] = new Smarty_variable(0, null, 0);?>
            <?php if ($_smarty_tpl->tpl_vars['subitems_count']->value){?>
                <?php echo smarty_function_math(array('assign'=>"divider",'equation'=>"ceil(x / 6)",'x'=>$_smarty_tpl->tpl_vars['subitems_count']->value),$_smarty_tpl);?>

                <?php echo smarty_function_math(array('assign'=>"cols",'equation'=>"ceil(x / y)",'x'=>$_smarty_tpl->tpl_vars['subitems_count']->value,'y'=>$_smarty_tpl->tpl_vars['divider']->value),$_smarty_tpl);?>

            <?php }?>
            <li class="<?php if (!$_smarty_tpl->tpl_vars['item1']->value[$_smarty_tpl->tpl_vars['childs']->value]){?>nodrop<?php }elseif(fn_check_second_level_child_array($_smarty_tpl->tpl_vars['item1']->value[$_smarty_tpl->tpl_vars['childs']->value],$_smarty_tpl->tpl_vars['childs']->value)&&$_smarty_tpl->tpl_vars['cols']->value==6){?>fullwidth<?php }?><?php if ($_smarty_tpl->tpl_vars['item1']->value['active']||fn_check_is_active_menu_item($_smarty_tpl->tpl_vars['item1']->value,$_smarty_tpl->tpl_vars['block']->value['type'])){?> active<?php }?>">
                <a<?php if ($_smarty_tpl->tpl_vars['item1_url']->value){?> href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item1_url']->value, ENT_QUOTES, 'UTF-8');?>
"<?php }?><?php if ($_smarty_tpl->tpl_vars['item1']->value[$_smarty_tpl->tpl_vars['childs']->value]){?> class="drop"<?php }?>><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item1']->value[$_smarty_tpl->tpl_vars['name']->value], ENT_QUOTES, 'UTF-8');?>
<?php if ($_smarty_tpl->tpl_vars['item1']->value[$_smarty_tpl->tpl_vars['childs']->value]){?><i class="icon-down-micro"></i><?php }?></a>

            <?php if ($_smarty_tpl->tpl_vars['item1']->value[$_smarty_tpl->tpl_vars['childs']->value]){?>

                <?php if (!fn_check_second_level_child_array($_smarty_tpl->tpl_vars['item1']->value[$_smarty_tpl->tpl_vars['childs']->value],$_smarty_tpl->tpl_vars['childs']->value)){?>
                

                <div class="dropdown-1column">

                        <div class="col-1 firstcolumn lastcolumn">
                            <ul>
                            
                            <?php $_smarty_tpl->smarty->_tag_stack[] = array('hook', array('name'=>"blocks:topmenu_dropdown_2levels_elements")); $_block_repeat=true; echo smarty_block_hook(array('name'=>"blocks:topmenu_dropdown_2levels_elements"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

                            
                            <?php  $_smarty_tpl->tpl_vars["item2"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["item2"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['item1']->value[$_smarty_tpl->tpl_vars['childs']->value]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars["item2"]->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars["item2"]->iteration=0;
 $_smarty_tpl->tpl_vars["item2"]->index=-1;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["item2"]['index']=-1;
foreach ($_from as $_smarty_tpl->tpl_vars["item2"]->key => $_smarty_tpl->tpl_vars["item2"]->value){
$_smarty_tpl->tpl_vars["item2"]->_loop = true;
 $_smarty_tpl->tpl_vars["item2"]->iteration++;
 $_smarty_tpl->tpl_vars["item2"]->index++;
 $_smarty_tpl->tpl_vars["item2"]->first = $_smarty_tpl->tpl_vars["item2"]->index === 0;
 $_smarty_tpl->tpl_vars["item2"]->last = $_smarty_tpl->tpl_vars["item2"]->iteration === $_smarty_tpl->tpl_vars["item2"]->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["item2"]['first'] = $_smarty_tpl->tpl_vars["item2"]->first;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["item2"]['index']++;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["item2"]['last'] = $_smarty_tpl->tpl_vars["item2"]->last;
?>
                                <?php $_smarty_tpl->tpl_vars["item_url2"] = new Smarty_variable(fn_form_dropdown_object_link($_smarty_tpl->tpl_vars['item2']->value,$_smarty_tpl->tpl_vars['block']->value['type']), null, 0);?>
                                <li<?php if ($_smarty_tpl->tpl_vars['item2']->value['active']||fn_check_is_active_menu_item($_smarty_tpl->tpl_vars['item2']->value,$_smarty_tpl->tpl_vars['block']->value['type'])){?> class="active"<?php }?>><a<?php if ($_smarty_tpl->tpl_vars['item_url2']->value){?> href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item_url2']->value, ENT_QUOTES, 'UTF-8');?>
"<?php }?>><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item2']->value[$_smarty_tpl->tpl_vars['name']->value], ENT_QUOTES, 'UTF-8');?>
</a></li>
                            <?php } ?>
                            <?php if ($_smarty_tpl->tpl_vars['item1']->value['show_more']&&$_smarty_tpl->tpl_vars['item1_url']->value){?>
                                <li class="alt-link"><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item1_url']->value, ENT_QUOTES, 'UTF-8');?>
"><?php echo $_smarty_tpl->__("text_topmenu_view_more");?>
</a></li>
                            <?php }?>
                            
                            <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_hook(array('name'=>"blocks:topmenu_dropdown_2levels_elements"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

                            
                            </ul> 

                        </div>
                    </div>
                    
                <?php }else{ ?>
                
                    <?php if ($_smarty_tpl->tpl_vars['cols']->value==1){?>
                        <?php $_smarty_tpl->tpl_vars["dropdown_class"] = new Smarty_variable("dropdown-1column", null, 0);?>
                    <?php }elseif($_smarty_tpl->tpl_vars['cols']->value==6){?>
                        <?php $_smarty_tpl->tpl_vars["dropdown_class"] = new Smarty_variable("dropdown-fullwidth", null, 0);?>
                    <?php }else{ ?>
                        <?php $_smarty_tpl->tpl_vars["dropdown_class"] = new Smarty_variable("dropdown-".((string)$_smarty_tpl->tpl_vars['cols']->value)."columns", null, 0);?>
                    <?php }?>

                    <div class="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['dropdown_class']->value, ENT_QUOTES, 'UTF-8');?>
<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['item1']['index']>4&&$_smarty_tpl->getVariable('smarty')->value['foreach']['item1']['last']){?> drop-left<?php }?>" id="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['unique_elm_id']->value, ENT_QUOTES, 'UTF-8');?>
">
                        <?php $_smarty_tpl->smarty->_tag_stack[] = array('hook', array('name'=>"blocks:topmenu_dropdown_3levels_cols")); $_block_repeat=true; echo smarty_block_hook(array('name'=>"blocks:topmenu_dropdown_3levels_cols"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

                        
                        <?php  $_smarty_tpl->tpl_vars["item2"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["item2"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['item1']->value[$_smarty_tpl->tpl_vars['childs']->value]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars["item2"]->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars["item2"]->iteration=0;
 $_smarty_tpl->tpl_vars["item2"]->index=-1;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["item2"]['index']=-1;
foreach ($_from as $_smarty_tpl->tpl_vars["item2"]->key => $_smarty_tpl->tpl_vars["item2"]->value){
$_smarty_tpl->tpl_vars["item2"]->_loop = true;
 $_smarty_tpl->tpl_vars["item2"]->iteration++;
 $_smarty_tpl->tpl_vars["item2"]->index++;
 $_smarty_tpl->tpl_vars["item2"]->first = $_smarty_tpl->tpl_vars["item2"]->index === 0;
 $_smarty_tpl->tpl_vars["item2"]->last = $_smarty_tpl->tpl_vars["item2"]->iteration === $_smarty_tpl->tpl_vars["item2"]->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["item2"]['first'] = $_smarty_tpl->tpl_vars["item2"]->first;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["item2"]['index']++;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["item2"]['last'] = $_smarty_tpl->tpl_vars["item2"]->last;
?>
                            <div class="col-1<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['item2']['index']%$_smarty_tpl->tpl_vars['cols']->value==0||$_smarty_tpl->getVariable('smarty')->value['foreach']['item2']['first']){?> firstcolumn<?php }elseif($_smarty_tpl->getVariable('smarty')->value['foreach']['item2']['index']%$_smarty_tpl->tpl_vars['cols']->value==($_smarty_tpl->tpl_vars['cols']->value-1)||$_smarty_tpl->getVariable('smarty')->value['foreach']['item2']['last']){?> lastcolumn<?php }?>">
                                <?php $_smarty_tpl->tpl_vars["item2_url"] = new Smarty_variable(fn_form_dropdown_object_link($_smarty_tpl->tpl_vars['item2']->value,$_smarty_tpl->tpl_vars['block']->value['type']), null, 0);?>
                                <h3<?php if ($_smarty_tpl->tpl_vars['item2']->value['active']||fn_check_is_active_menu_item($_smarty_tpl->tpl_vars['item2']->value,$_smarty_tpl->tpl_vars['block']->value['type'])){?> class="active"<?php }?>><a<?php if ($_smarty_tpl->tpl_vars['item2_url']->value){?> href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item2_url']->value, ENT_QUOTES, 'UTF-8');?>
"<?php }?>><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item2']->value[$_smarty_tpl->tpl_vars['name']->value], ENT_QUOTES, 'UTF-8');?>
</a></h3>

                                <?php if ($_smarty_tpl->tpl_vars['item2']->value[$_smarty_tpl->tpl_vars['childs']->value]){?>
                                <ul>
                                <?php $_smarty_tpl->smarty->_tag_stack[] = array('hook', array('name'=>"blocks:topmenu_dropdown_3levels_col_elements")); $_block_repeat=true; echo smarty_block_hook(array('name'=>"blocks:topmenu_dropdown_3levels_col_elements"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

                                <?php  $_smarty_tpl->tpl_vars["item3"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["item3"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['item2']->value[$_smarty_tpl->tpl_vars['childs']->value]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["item3"]->key => $_smarty_tpl->tpl_vars["item3"]->value){
$_smarty_tpl->tpl_vars["item3"]->_loop = true;
?>
                                    <?php $_smarty_tpl->tpl_vars["item3_url"] = new Smarty_variable(fn_form_dropdown_object_link($_smarty_tpl->tpl_vars['item3']->value,$_smarty_tpl->tpl_vars['block']->value['type']), null, 0);?>
                                    <li<?php if ($_smarty_tpl->tpl_vars['item3']->value['active']||fn_check_is_active_menu_item($_smarty_tpl->tpl_vars['item3']->value,$_smarty_tpl->tpl_vars['block']->value['type'])){?> class="active"<?php }?>><a<?php if ($_smarty_tpl->tpl_vars['item3_url']->value){?> href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item3_url']->value, ENT_QUOTES, 'UTF-8');?>
"<?php }?>><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item3']->value[$_smarty_tpl->tpl_vars['name']->value], ENT_QUOTES, 'UTF-8');?>
</a></li>
                                <?php } ?>
                                <?php if ($_smarty_tpl->tpl_vars['item2']->value['show_more']&&$_smarty_tpl->tpl_vars['item2_url']->value){?>
                                    <li class="alt-link"><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item2_url']->value, ENT_QUOTES, 'UTF-8');?>
"><?php echo $_smarty_tpl->__("text_topmenu_view_more");?>
</a></li>
                                <?php }?>
                                <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_hook(array('name'=>"blocks:topmenu_dropdown_3levels_col_elements"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

                                </ul> 
                                <?php }?>
                            </div>

                        <?php } ?>

                        <?php if ($_smarty_tpl->tpl_vars['item1']->value['show_more']&&$_smarty_tpl->tpl_vars['item1_url']->value){?>
                        <div class="dropdown-bottom">
                            <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item1_url']->value, ENT_QUOTES, 'UTF-8');?>
"><?php echo $_smarty_tpl->__("text_topmenu_more",array("[item]"=>$_smarty_tpl->tpl_vars['item1']->value[$_smarty_tpl->tpl_vars['name']->value]));?>
</a>
                        </div>
                        <?php }?>
                        
                        <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_hook(array('name'=>"blocks:topmenu_dropdown_3levels_cols"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>


                    </div>

                <?php }?>

            <?php }?>
            </li>
        <?php } ?>
        
        <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_hook(array('name'=>"blocks:topmenu_dropdown_top_menu"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

        </ul>
        <div class="clear"></div>
    </div>
<?php }?>

<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_hook(array('name'=>"blocks:topmenu_dropdown"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>



<script type="text/javascript">
//<![CDATA[
(function(_, $) {

    $.ceEvent('on', 'ce.commoninit', function(context) {
        var col1 = context.find('.dropdown-1column');
        var colfull = context.find('.dropdown-fullwidth');

        if (col1.length) {
            col1.each(function() {
                var p = $(this).parents('li:first');
                if (p.length) {
                    $(this).css('min-width', (p.width() + 10) + 'px');
                }
            });                
        }
            
        if (colfull.length) {
            var global_offset = $('.wrap-dropdown-multicolumns').offset().top;
            colfull.each(function(){
                var offset = $(this).parent('.fullwidth').offset().top;
                $(this).css('top', offset - global_offset + 25 + 'px');
            });
        }
    });

}(Tygh, Tygh.$));
//]]>
</script>

<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?><?php if (trim(Smarty::$_smarty_vars['capture']['template_content'])){?><?php if ($_smarty_tpl->tpl_vars['auth']->value['area']=="A"){?><span class="cm-template-box template-box" data-ca-te-template="blocks/topmenu_dropdown.tpl" id="<?php echo smarty_function_set_id(array('name'=>"blocks/topmenu_dropdown.tpl"),$_smarty_tpl);?>
"><div class="cm-template-icon icon-edit hidden"></div><?php echo Smarty::$_smarty_vars['capture']['template_content'];?>
<!--[/tpl_id]--></span><?php }else{ ?><?php echo Smarty::$_smarty_vars['capture']['template_content'];?>
<?php }?><?php }?><?php }else{ ?><?php $_smarty_tpl->smarty->_tag_stack[] = array('hook', array('name'=>"blocks:topmenu_dropdown")); $_block_repeat=true; echo smarty_block_hook(array('name'=>"blocks:topmenu_dropdown"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>


<?php if ($_smarty_tpl->tpl_vars['items']->value){?>
    <div class="wrap-dropdown-multicolumns">
        <ul class="dropdown-multicolumns clearfix">
        
        <?php $_smarty_tpl->smarty->_tag_stack[] = array('hook', array('name'=>"blocks:topmenu_dropdown_top_menu")); $_block_repeat=true; echo smarty_block_hook(array('name'=>"blocks:topmenu_dropdown_top_menu"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

        
        <?php  $_smarty_tpl->tpl_vars["item1"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["item1"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['items']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars["item1"]->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars["item1"]->iteration=0;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["item1"]['index']=-1;
foreach ($_from as $_smarty_tpl->tpl_vars["item1"]->key => $_smarty_tpl->tpl_vars["item1"]->value){
$_smarty_tpl->tpl_vars["item1"]->_loop = true;
 $_smarty_tpl->tpl_vars["item1"]->iteration++;
 $_smarty_tpl->tpl_vars["item1"]->last = $_smarty_tpl->tpl_vars["item1"]->iteration === $_smarty_tpl->tpl_vars["item1"]->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["item1"]['index']++;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["item1"]['last'] = $_smarty_tpl->tpl_vars["item1"]->last;
?>
            <?php $_smarty_tpl->tpl_vars["item1_url"] = new Smarty_variable(fn_form_dropdown_object_link($_smarty_tpl->tpl_vars['item1']->value,$_smarty_tpl->tpl_vars['block']->value['type']), null, 0);?>
            <?php $_smarty_tpl->tpl_vars["unique_elm_id"] = new Smarty_variable(md5($_smarty_tpl->tpl_vars['item1_url']->value), null, 0);?>
            <?php $_smarty_tpl->tpl_vars["unique_elm_id"] = new Smarty_variable("topmenu_".((string)$_smarty_tpl->tpl_vars['block']->value['block_id'])."_".((string)$_smarty_tpl->tpl_vars['unique_elm_id']->value), null, 0);?>

            <?php $_smarty_tpl->tpl_vars["subitems_count"] = new Smarty_variable(count($_smarty_tpl->tpl_vars['item1']->value[$_smarty_tpl->tpl_vars['childs']->value]), null, 0);?>
            <?php $_smarty_tpl->tpl_vars["cols"] = new Smarty_variable(0, null, 0);?>
            <?php if ($_smarty_tpl->tpl_vars['subitems_count']->value){?>
                <?php echo smarty_function_math(array('assign'=>"divider",'equation'=>"ceil(x / 6)",'x'=>$_smarty_tpl->tpl_vars['subitems_count']->value),$_smarty_tpl);?>

                <?php echo smarty_function_math(array('assign'=>"cols",'equation'=>"ceil(x / y)",'x'=>$_smarty_tpl->tpl_vars['subitems_count']->value,'y'=>$_smarty_tpl->tpl_vars['divider']->value),$_smarty_tpl);?>

            <?php }?>
            <li class="<?php if (!$_smarty_tpl->tpl_vars['item1']->value[$_smarty_tpl->tpl_vars['childs']->value]){?>nodrop<?php }elseif(fn_check_second_level_child_array($_smarty_tpl->tpl_vars['item1']->value[$_smarty_tpl->tpl_vars['childs']->value],$_smarty_tpl->tpl_vars['childs']->value)&&$_smarty_tpl->tpl_vars['cols']->value==6){?>fullwidth<?php }?><?php if ($_smarty_tpl->tpl_vars['item1']->value['active']||fn_check_is_active_menu_item($_smarty_tpl->tpl_vars['item1']->value,$_smarty_tpl->tpl_vars['block']->value['type'])){?> active<?php }?>">
                <a<?php if ($_smarty_tpl->tpl_vars['item1_url']->value){?> href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item1_url']->value, ENT_QUOTES, 'UTF-8');?>
"<?php }?><?php if ($_smarty_tpl->tpl_vars['item1']->value[$_smarty_tpl->tpl_vars['childs']->value]){?> class="drop"<?php }?>><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item1']->value[$_smarty_tpl->tpl_vars['name']->value], ENT_QUOTES, 'UTF-8');?>
<?php if ($_smarty_tpl->tpl_vars['item1']->value[$_smarty_tpl->tpl_vars['childs']->value]){?><i class="icon-down-micro"></i><?php }?></a>

            <?php if ($_smarty_tpl->tpl_vars['item1']->value[$_smarty_tpl->tpl_vars['childs']->value]){?>

                <?php if (!fn_check_second_level_child_array($_smarty_tpl->tpl_vars['item1']->value[$_smarty_tpl->tpl_vars['childs']->value],$_smarty_tpl->tpl_vars['childs']->value)){?>
                

                <div class="dropdown-1column">

                        <div class="col-1 firstcolumn lastcolumn">
                            <ul>
                            
                            <?php $_smarty_tpl->smarty->_tag_stack[] = array('hook', array('name'=>"blocks:topmenu_dropdown_2levels_elements")); $_block_repeat=true; echo smarty_block_hook(array('name'=>"blocks:topmenu_dropdown_2levels_elements"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

                            
                            <?php  $_smarty_tpl->tpl_vars["item2"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["item2"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['item1']->value[$_smarty_tpl->tpl_vars['childs']->value]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars["item2"]->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars["item2"]->iteration=0;
 $_smarty_tpl->tpl_vars["item2"]->index=-1;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["item2"]['index']=-1;
foreach ($_from as $_smarty_tpl->tpl_vars["item2"]->key => $_smarty_tpl->tpl_vars["item2"]->value){
$_smarty_tpl->tpl_vars["item2"]->_loop = true;
 $_smarty_tpl->tpl_vars["item2"]->iteration++;
 $_smarty_tpl->tpl_vars["item2"]->index++;
 $_smarty_tpl->tpl_vars["item2"]->first = $_smarty_tpl->tpl_vars["item2"]->index === 0;
 $_smarty_tpl->tpl_vars["item2"]->last = $_smarty_tpl->tpl_vars["item2"]->iteration === $_smarty_tpl->tpl_vars["item2"]->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["item2"]['first'] = $_smarty_tpl->tpl_vars["item2"]->first;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["item2"]['index']++;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["item2"]['last'] = $_smarty_tpl->tpl_vars["item2"]->last;
?>
                                <?php $_smarty_tpl->tpl_vars["item_url2"] = new Smarty_variable(fn_form_dropdown_object_link($_smarty_tpl->tpl_vars['item2']->value,$_smarty_tpl->tpl_vars['block']->value['type']), null, 0);?>
                                <li<?php if ($_smarty_tpl->tpl_vars['item2']->value['active']||fn_check_is_active_menu_item($_smarty_tpl->tpl_vars['item2']->value,$_smarty_tpl->tpl_vars['block']->value['type'])){?> class="active"<?php }?>><a<?php if ($_smarty_tpl->tpl_vars['item_url2']->value){?> href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item_url2']->value, ENT_QUOTES, 'UTF-8');?>
"<?php }?>><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item2']->value[$_smarty_tpl->tpl_vars['name']->value], ENT_QUOTES, 'UTF-8');?>
</a></li>
                            <?php } ?>
                            <?php if ($_smarty_tpl->tpl_vars['item1']->value['show_more']&&$_smarty_tpl->tpl_vars['item1_url']->value){?>
                                <li class="alt-link"><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item1_url']->value, ENT_QUOTES, 'UTF-8');?>
"><?php echo $_smarty_tpl->__("text_topmenu_view_more");?>
</a></li>
                            <?php }?>
                            
                            <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_hook(array('name'=>"blocks:topmenu_dropdown_2levels_elements"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

                            
                            </ul> 

                        </div>
                    </div>
                    
                <?php }else{ ?>
                
                    <?php if ($_smarty_tpl->tpl_vars['cols']->value==1){?>
                        <?php $_smarty_tpl->tpl_vars["dropdown_class"] = new Smarty_variable("dropdown-1column", null, 0);?>
                    <?php }elseif($_smarty_tpl->tpl_vars['cols']->value==6){?>
                        <?php $_smarty_tpl->tpl_vars["dropdown_class"] = new Smarty_variable("dropdown-fullwidth", null, 0);?>
                    <?php }else{ ?>
                        <?php $_smarty_tpl->tpl_vars["dropdown_class"] = new Smarty_variable("dropdown-".((string)$_smarty_tpl->tpl_vars['cols']->value)."columns", null, 0);?>
                    <?php }?>

                    <div class="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['dropdown_class']->value, ENT_QUOTES, 'UTF-8');?>
<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['item1']['index']>4&&$_smarty_tpl->getVariable('smarty')->value['foreach']['item1']['last']){?> drop-left<?php }?>" id="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['unique_elm_id']->value, ENT_QUOTES, 'UTF-8');?>
">
                        <?php $_smarty_tpl->smarty->_tag_stack[] = array('hook', array('name'=>"blocks:topmenu_dropdown_3levels_cols")); $_block_repeat=true; echo smarty_block_hook(array('name'=>"blocks:topmenu_dropdown_3levels_cols"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

                        
                        <?php  $_smarty_tpl->tpl_vars["item2"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["item2"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['item1']->value[$_smarty_tpl->tpl_vars['childs']->value]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars["item2"]->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars["item2"]->iteration=0;
 $_smarty_tpl->tpl_vars["item2"]->index=-1;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["item2"]['index']=-1;
foreach ($_from as $_smarty_tpl->tpl_vars["item2"]->key => $_smarty_tpl->tpl_vars["item2"]->value){
$_smarty_tpl->tpl_vars["item2"]->_loop = true;
 $_smarty_tpl->tpl_vars["item2"]->iteration++;
 $_smarty_tpl->tpl_vars["item2"]->index++;
 $_smarty_tpl->tpl_vars["item2"]->first = $_smarty_tpl->tpl_vars["item2"]->index === 0;
 $_smarty_tpl->tpl_vars["item2"]->last = $_smarty_tpl->tpl_vars["item2"]->iteration === $_smarty_tpl->tpl_vars["item2"]->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["item2"]['first'] = $_smarty_tpl->tpl_vars["item2"]->first;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["item2"]['index']++;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["item2"]['last'] = $_smarty_tpl->tpl_vars["item2"]->last;
?>
                            <div class="col-1<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['item2']['index']%$_smarty_tpl->tpl_vars['cols']->value==0||$_smarty_tpl->getVariable('smarty')->value['foreach']['item2']['first']){?> firstcolumn<?php }elseif($_smarty_tpl->getVariable('smarty')->value['foreach']['item2']['index']%$_smarty_tpl->tpl_vars['cols']->value==($_smarty_tpl->tpl_vars['cols']->value-1)||$_smarty_tpl->getVariable('smarty')->value['foreach']['item2']['last']){?> lastcolumn<?php }?>">
                                <?php $_smarty_tpl->tpl_vars["item2_url"] = new Smarty_variable(fn_form_dropdown_object_link($_smarty_tpl->tpl_vars['item2']->value,$_smarty_tpl->tpl_vars['block']->value['type']), null, 0);?>
                                <h3<?php if ($_smarty_tpl->tpl_vars['item2']->value['active']||fn_check_is_active_menu_item($_smarty_tpl->tpl_vars['item2']->value,$_smarty_tpl->tpl_vars['block']->value['type'])){?> class="active"<?php }?>><a<?php if ($_smarty_tpl->tpl_vars['item2_url']->value){?> href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item2_url']->value, ENT_QUOTES, 'UTF-8');?>
"<?php }?>><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item2']->value[$_smarty_tpl->tpl_vars['name']->value], ENT_QUOTES, 'UTF-8');?>
</a></h3>

                                <?php if ($_smarty_tpl->tpl_vars['item2']->value[$_smarty_tpl->tpl_vars['childs']->value]){?>
                                <ul>
                                <?php $_smarty_tpl->smarty->_tag_stack[] = array('hook', array('name'=>"blocks:topmenu_dropdown_3levels_col_elements")); $_block_repeat=true; echo smarty_block_hook(array('name'=>"blocks:topmenu_dropdown_3levels_col_elements"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

                                <?php  $_smarty_tpl->tpl_vars["item3"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["item3"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['item2']->value[$_smarty_tpl->tpl_vars['childs']->value]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["item3"]->key => $_smarty_tpl->tpl_vars["item3"]->value){
$_smarty_tpl->tpl_vars["item3"]->_loop = true;
?>
                                    <?php $_smarty_tpl->tpl_vars["item3_url"] = new Smarty_variable(fn_form_dropdown_object_link($_smarty_tpl->tpl_vars['item3']->value,$_smarty_tpl->tpl_vars['block']->value['type']), null, 0);?>
                                    <li<?php if ($_smarty_tpl->tpl_vars['item3']->value['active']||fn_check_is_active_menu_item($_smarty_tpl->tpl_vars['item3']->value,$_smarty_tpl->tpl_vars['block']->value['type'])){?> class="active"<?php }?>><a<?php if ($_smarty_tpl->tpl_vars['item3_url']->value){?> href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item3_url']->value, ENT_QUOTES, 'UTF-8');?>
"<?php }?>><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item3']->value[$_smarty_tpl->tpl_vars['name']->value], ENT_QUOTES, 'UTF-8');?>
</a></li>
                                <?php } ?>
                                <?php if ($_smarty_tpl->tpl_vars['item2']->value['show_more']&&$_smarty_tpl->tpl_vars['item2_url']->value){?>
                                    <li class="alt-link"><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item2_url']->value, ENT_QUOTES, 'UTF-8');?>
"><?php echo $_smarty_tpl->__("text_topmenu_view_more");?>
</a></li>
                                <?php }?>
                                <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_hook(array('name'=>"blocks:topmenu_dropdown_3levels_col_elements"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

                                </ul> 
                                <?php }?>
                            </div>

                        <?php } ?>

                        <?php if ($_smarty_tpl->tpl_vars['item1']->value['show_more']&&$_smarty_tpl->tpl_vars['item1_url']->value){?>
                        <div class="dropdown-bottom">
                            <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item1_url']->value, ENT_QUOTES, 'UTF-8');?>
"><?php echo $_smarty_tpl->__("text_topmenu_more",array("[item]"=>$_smarty_tpl->tpl_vars['item1']->value[$_smarty_tpl->tpl_vars['name']->value]));?>
</a>
                        </div>
                        <?php }?>
                        
                        <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_hook(array('name'=>"blocks:topmenu_dropdown_3levels_cols"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>


                    </div>

                <?php }?>

            <?php }?>
            </li>
        <?php } ?>
        
        <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_hook(array('name'=>"blocks:topmenu_dropdown_top_menu"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

        </ul>
        <div class="clear"></div>
    </div>
<?php }?>

<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_hook(array('name'=>"blocks:topmenu_dropdown"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>



<script type="text/javascript">
//<![CDATA[
(function(_, $) {

    $.ceEvent('on', 'ce.commoninit', function(context) {
        var col1 = context.find('.dropdown-1column');
        var colfull = context.find('.dropdown-fullwidth');

        if (col1.length) {
            col1.each(function() {
                var p = $(this).parents('li:first');
                if (p.length) {
                    $(this).css('min-width', (p.width() + 10) + 'px');
                }
            });                
        }
            
        if (colfull.length) {
            var global_offset = $('.wrap-dropdown-multicolumns').offset().top;
            colfull.each(function(){
                var offset = $(this).parent('.fullwidth').offset().top;
                $(this).css('top', offset - global_offset + 25 + 'px');
            });
        }
    });

}(Tygh, Tygh.$));
//]]>
</script>

<?php }?><?php }} ?>