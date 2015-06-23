<?php /* Smarty version Smarty-3.1.18, created on 2015-06-18 13:17:09
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/MySite/Smarty_dir/templates/logged.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1301645389557ab571e41850-47078811%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b1fef12379daf47d650a3025a5926980d08ce4e1' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/MySite/Smarty_dir/templates/logged.tpl',
      1 => 1434626227,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1301645389557ab571e41850-47078811',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_557ab571e87232_18357992',
  'variables' => 
  array (
    'userimage' => 0,
    'username' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_557ab571e87232_18357992')) {function content_557ab571e87232_18357992($_smarty_tpl) {?><div class="horizzontal layout">

  <div class="flex">
    <paper-icon-item>
      <div item-icon>
        <img id="logImg" src="Data/profile_images/<?php echo $_smarty_tpl->tpl_vars['userimage']->value;?>
"></img>
      </div>
      <div>
        <a class="menulink" href="index.php?controllerAction=ProfileController&ProfileAction=getProfilePage"><?php echo $_smarty_tpl->tpl_vars['username']->value;?>
</a>
      </div>
      <div>
        <a class="menulink" href="index.php?controllerAction=LogController&sessionAction=logout">Logout</a>
      </div>
    </paper-icon-item>
  </div>
</div>
<?php }} ?>
