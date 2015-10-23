<!-- Page Content -->
<div class="container">

    <div class="row">
        <div class="panel panel-default">
          <div class="panel-body">

        <!-- Blog Post Content Column -->
        <div class="col-lg-12">

            <!-- Blog Post -->

            <!-- Title -->
            <h1>{$articleTitle}</h1>

            <!-- Author -->
            <p class="lead">
                by {$author}
            </p>

            <hr>

            <!-- Date/Time -->
            <p><span class="glyphicon glyphicon-time"></span> Posted on August 24, 2013 at 9:00 PM</p>

            <hr>

            <!-- Preview Image -->
            <img class="img-responsive" src="{$articleImage}" alt="">

            <hr>

            <!-- Post Content -->
            <p>
                {$articleText}
            </p>
            <hr>

            <!-- Blog Comments -->

            <!-- Comments Form -->
            {if $loggedIn}
            <div class="well">
                <h4>Leave a Comment:</h4>
                <form role="form" id="commentForm">
                    <div class="form-group">
                        <textarea id="textComment" class="form-control" rows="3"></textarea>
                        <input type="text" id="articleId" value ="{$articleId}" hidden>
                    </div>
                    <button type="submit" class="btn btn-primary" id="submitButton" disabled>Submit</button>
                </form>
            </div>
            <hr>
            {/if}

            <!-- Comment -->
            {foreach $comments as $comment}
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object commentImage" src="{$comment.image}" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">{$comment.author}
                            <small>August 25, 2014 at 9:30 PM</small>
                        </h4>
                        {$comment.text}
                    </div>
                </div>
            {/foreach}
        </div>
    </div>

    <!-- /.row -->
</div>
</div>
</div>

<script src="Smarty_dir/templates/js/comment.js"></script>
