<div class="horizzontal layout">

  <div class="flex">
    <paper-icon-item>
      <div item-icon>
        <img id="logImg" src="Data/profile_images/{$userimage}"></img>
      </div>
      <div>
        <a class="menulink" href="index.php?controllerAction=ProfileController&ProfileAction=getProfilePage">{$username}</a>
      </div>
      <div>
        <a class="menulink" href="index.php?controllerAction=LogController&sessionAction=logout">Logout</a>
      </div>
    </paper-icon-item>
  </div>
</div>
