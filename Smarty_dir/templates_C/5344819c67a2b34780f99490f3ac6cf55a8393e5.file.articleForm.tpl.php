<?php /* Smarty version Smarty-3.1.18, created on 2015-06-02 11:12:32
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/MySite/Smarty_dir/templates/articleForm.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1348455771556998ea9529e2-31999014%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5344819c67a2b34780f99490f3ac6cf55a8393e5' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/MySite/Smarty_dir/templates/articleForm.tpl',
      1 => 1433105448,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1348455771556998ea9529e2-31999014',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_556998ea973ec7_09519549',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_556998ea973ec7_09519549')) {function content_556998ea973ec7_09519549($_smarty_tpl) {?><div>
    <div id="containerStatus">
    </div>

    <div id="containerArticleForm">
        <form form enctype="multipart/form-data" id="articleForm">
            Titolo: 			<input type="text" name="title"/> <br>
            Testo: 				<input type="text" name="text"/> <br>
            <input type="submit" value="Submit" id="submitButton">
        </form>
        <a href="index.php?controllerAction=HomePage">Torna alla home</a>
    </div>
</div>

<script src="Smarty_dir/templates/javascript/newArticle.js"></script>


<?php }} ?>
