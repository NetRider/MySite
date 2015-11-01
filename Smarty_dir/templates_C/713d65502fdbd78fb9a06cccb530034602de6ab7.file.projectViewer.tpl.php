<?php /* Smarty version Smarty-3.1.18, created on 2015-11-01 16:13:08
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/MySite/Smarty_dir/templates/projectViewer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6614960365624a37b0103a8-86133285%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '713d65502fdbd78fb9a06cccb530034602de6ab7' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/MySite/Smarty_dir/templates/projectViewer.tpl',
      1 => 1446390764,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6614960365624a37b0103a8-86133285',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5624a37b0524a7_52878069',
  'variables' => 
  array (
    'projectTitle' => 0,
    'projectAuthor' => 0,
    'date' => 0,
    'projectImage' => 0,
    'projectText' => 0,
    'dependencies' => 0,
    'dependency' => 0,
    'loggedIn' => 0,
    'projectId' => 0,
    'comments' => 0,
    'comment' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5624a37b0524a7_52878069')) {function content_5624a37b0524a7_52878069($_smarty_tpl) {?><!-- Page Content -->
<div class="container">
    <div class="row">
        <!-- Blog Post Content Column -->
        <div class="col-lg-9">
            <!-- Blog Post -->

            <!-- Title -->
            <h1><?php echo $_smarty_tpl->tpl_vars['projectTitle']->value;?>
</h1>

            <!-- Author -->
            <p class="lead">
                by <?php echo $_smarty_tpl->tpl_vars['projectAuthor']->value;?>

            </p>

            <hr>

            <!-- Date/Time -->
            <p><span class="glyphicon glyphicon-time"></span> Postato il <i>"<?php echo $_smarty_tpl->tpl_vars['date']->value;?>
"</i></p>

            <hr>

            <!-- Preview Image -->
            <img class="img-responsive" src="<?php echo $_smarty_tpl->tpl_vars['projectImage']->value;?>
" alt="">

            <hr>

            <!-- Post Content -->
            <p class="lead">
                <?php echo $_smarty_tpl->tpl_vars['projectText']->value;?>

            </p>
        </div>

        <div class="col-lg-3">
            <div class="well">
                <h4>Articoli consigliati per questo progetto</h4>
                <div class="row">
                    <div class="col-lg-12">
                        <ul class="list-unstyled">
                            <?php  $_smarty_tpl->tpl_vars['dependency'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['dependency']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['dependencies']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['dependency']->key => $_smarty_tpl->tpl_vars['dependency']->value) {
$_smarty_tpl->tpl_vars['dependency']->_loop = true;
?>
                                <li> <a href="index.php?controller=Article&task=getArticleView&Id=<?php echo $_smarty_tpl->tpl_vars['dependency']->value['id'];?>
"> <?php echo $_smarty_tpl->tpl_vars['dependency']->value['title'];?>
 </a> </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="row">
        <!-- Blog Comments -->

        <!-- Comments Form -->
        <?php if ($_smarty_tpl->tpl_vars['loggedIn']->value) {?>
        <div class="well">
            <h4>Leave a Comment:</h4>
            <form role="form" id="commentForm">
                <div class="form-group">
                    <textarea id="textComment" class="form-control" rows="3"></textarea>
                    <input type="text" id="projectId" value ="<?php echo $_smarty_tpl->tpl_vars['projectId']->value;?>
" hidden>
                </div>
                <button type="submit" class="btn btn-primary" id="submitButton" disabled>Submit</button>
            </form>
        </div>
        <hr>
        <?php }?>

        <!-- Comment -->
        <?php  $_smarty_tpl->tpl_vars['comment'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['comment']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['comments']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['comment']->key => $_smarty_tpl->tpl_vars['comment']->value) {
$_smarty_tpl->tpl_vars['comment']->_loop = true;
?>
            <div class="media">
                <a class="pull-left" href="#">
                    <img class="media-object commentImage" src="<?php echo $_smarty_tpl->tpl_vars['comment']->value['image'];?>
" alt="">
                </a>
                <div class="media-body">
                    <h4 class="media-heading"><?php echo $_smarty_tpl->tpl_vars['comment']->value['author'];?>

                        <small>Postato il <?php echo $_smarty_tpl->tpl_vars['comment']->value['date'];?>
</small>
                    </h4>
                    <?php echo $_smarty_tpl->tpl_vars['comment']->value['text'];?>

                </div>
            </div>
        <?php } ?>
    </div>
</div>

<script src="Smarty_dir/templates/js/comment.js"></script>
<?php }} ?>
