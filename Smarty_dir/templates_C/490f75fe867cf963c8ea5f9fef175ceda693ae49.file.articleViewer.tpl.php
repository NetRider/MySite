<?php /* Smarty version Smarty-3.1.18, created on 2015-11-07 12:42:23
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/MySite/Smarty_dir/templates/articleViewer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:552206195563de39f8dc508-20586839%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '490f75fe867cf963c8ea5f9fef175ceda693ae49' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/MySite/Smarty_dir/templates/articleViewer.tpl',
      1 => 1446390744,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '552206195563de39f8dc508-20586839',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'articleTitle' => 0,
    'author' => 0,
    'date' => 0,
    'articleImage' => 0,
    'articleText' => 0,
    'loggedIn' => 0,
    'articleId' => 0,
    'comments' => 0,
    'comment' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_563de39f9132c3_75920909',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_563de39f9132c3_75920909')) {function content_563de39f9132c3_75920909($_smarty_tpl) {?><!-- Page Content -->
<div class="container">

    <div class="row">
        <div class="panel panel-default">
          <div class="panel-body">

        <!-- Blog Post Content Column -->
        <div class="col-lg-12">

            <!-- Blog Post -->

            <!-- Title -->
            <h1><?php echo $_smarty_tpl->tpl_vars['articleTitle']->value;?>
</h1>

            <!-- Author -->
            <p class="lead">
                by <?php echo $_smarty_tpl->tpl_vars['author']->value;?>

            </p>

            <hr>

            <!-- Date/Time -->
            <p><span class="glyphicon glyphicon-time"></span> Postato il <i>"<?php echo $_smarty_tpl->tpl_vars['date']->value;?>
"</i></p>

            <hr>

            <!-- Preview Image -->
            <img class="img-responsive" src="<?php echo $_smarty_tpl->tpl_vars['articleImage']->value;?>
" alt="">

            <hr>

            <!-- Post Content -->
            <p>
                <?php echo $_smarty_tpl->tpl_vars['articleText']->value;?>

            </p>
            <hr>

            <!-- Blog Comments -->

            <!-- Comments Form -->
            <?php if ($_smarty_tpl->tpl_vars['loggedIn']->value) {?>
            <div class="well">
                <h4>Leave a Comment:</h4>
                <form role="form" id="commentForm">
                    <div class="form-group">
                        <textarea id="textComment" class="form-control" rows="3"></textarea>
                        <input type="text" id="articleId" value ="<?php echo $_smarty_tpl->tpl_vars['articleId']->value;?>
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

    <!-- /.row -->
</div>
</div>
</div>

<script src="Smarty_dir/templates/js/comment.js"></script>
<?php }} ?>
