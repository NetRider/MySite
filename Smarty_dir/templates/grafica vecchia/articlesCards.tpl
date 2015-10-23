<div class="vertical layout center">
    {foreach $articlesCardsRows as $row}
      <div class="horizontal layout">
        {foreach $row as $articleCard}
          <generic-card title="{$articleCard.title}" image="{$articleCard.image}" description="{$articleCard.description}" Id="{$articleCard.articleId}" url="controller=Article&task=getArticleView">
          </generic-card>
          {/foreach}
        </div>
    {/foreach}
</div>
