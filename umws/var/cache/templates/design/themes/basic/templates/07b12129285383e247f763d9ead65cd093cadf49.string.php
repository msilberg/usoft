<?php /* Smarty version Smarty-3.1.13, created on 2013-11-18 15:35:01
         compiled from "07b12129285383e247f763d9ead65cd093cadf49" */ ?>
<?php /*%%SmartyHeaderCode:11013512115289fb65b29234-07613209%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '07b12129285383e247f763d9ead65cd093cadf49' => 
    array (
      0 => '07b12129285383e247f763d9ead65cd093cadf49',
      1 => 0,
      2 => 'string',
    ),
  ),
  'nocache_hash' => '11013512115289fb65b29234-07613209',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5289fb65b351d8_79006040',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5289fb65b351d8_79006040')) {function content_5289fb65b351d8_79006040($_smarty_tpl) {?><p><span>Обслуживание клиентов</span></p>
<ul>
<li><a href="<?php echo htmlspecialchars(fn_url("orders.search"), ENT_QUOTES, 'UTF-8');?>
">Ваши заказы</a></li>
<li><a href="<?php echo htmlspecialchars(fn_url("wishlist.view"), ENT_QUOTES, 'UTF-8');?>
">Отложенные</a></li>
<li><a href="<?php echo htmlspecialchars(fn_url("product_features.compare"), ENT_QUOTES, 'UTF-8');?>
">Список сравнения</a></li>
</ul><?php }} ?>