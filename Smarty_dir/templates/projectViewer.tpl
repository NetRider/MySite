<!-- Page Content -->
<div class="container">
    <div class="row">
        <!-- Blog Post Content Column -->
        <div class="col-lg-9">
            <!-- Blog Post -->

            <!-- Title -->
            <h1>{$projectTitle}</h1>

            <!-- Author -->
            <p class="lead">
                by {$projectAuthor}
            </p>

            <hr>

            <!-- Date/Time -->
            <p><span class="glyphicon glyphicon-time"></span> Postato il <i>"{$date}"</i></p>

            <hr>

            <!-- Preview Image -->
            <img class="img-responsive" src="{$projectImage}" alt="">

            <hr>

            <!-- Post Content -->
            <p class="lead">
                {$projectText}
            </p>
        </div>

        <div class="col-lg-3">
            <div class="well">
                <h4>Articoli consigliati per questo progetto</h4>
                <div class="row">
                    <div class="col-lg-12">
                        <ul class="list-unstyled">
                            {foreach $dependencies as $dependency}
                                <li> <a href="index.php?controller=Article&task=getArticleView&Id={$dependency.id}"> {$dependency.title} </a> </li>
                            {/foreach}
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="row">
        <!-- Blog Comments -->

        <!-- Comments Form -->
        {if $loggedIn}
        <div class="well">
            <h4>Leave a Comment:</h4>
            <form role="form" id="commentForm">
                <div class="form-group">
                    <textarea id="textComment" class="form-control" rows="3"></textarea>
                    <input type="text" id="projectId" value ="{$projectId}" hidden>
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
                        <small>Postato il {$comment.date}</small>
                    </h4>
                    {$comment.text}
                </div>
            </div>
        {/foreach}
    </div>
</div>

<script src="Smarty_dir/templates/js/comment.js"></script>
