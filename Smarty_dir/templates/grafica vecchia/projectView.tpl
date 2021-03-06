<div>
    <h1>{$projectTitle}</h1>
    <p>
        {$projectText}
    </p>

    <div class="vertical layout flex">
      {if $loggedIn}
        <docomment-element authorimage="{{$userimage}}" author="{{$username}}" authorid="{$authorId}"></docomment-element>
      {/if}
        {foreach $comments as $comment}
            <comment-element authorimage="{$comment.image}" author="{$comment.author}" text="{$comment.text}" authorid="{$comment.authorId}"></comment-element>
        {/foreach}
    </div>
</div>
