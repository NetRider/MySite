<div class="vertical layout center">
    {foreach $data as $row}
      <div class="horizontal layout">
        {foreach $row as $value}
          <article-card title="{$value.title}" authorimage="{$value.image}" author="{$value.author}" description="{$value.description}" articleId="{$value.articleId}" url="controllerAction=ProjectController&ProjectAction=getProjectView">
          </article-card>
          {/foreach}
        </div>
    {/foreach}
</div>
