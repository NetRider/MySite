<div class="vertical layout center">
    {foreach $projectsCardsRows as $row}
      <div class="horizontal layout">
        {foreach $row as $projectCard}
          <generic-card title="{$projectCard.title}" image="{$projectCard.image}" description="{$projectCard.description}" Id="{$projectCard.Id}" url="controller=Project&task=getProjectView">
          </generic-card>
          {/foreach}
        </div>
    {/foreach}
</div>
