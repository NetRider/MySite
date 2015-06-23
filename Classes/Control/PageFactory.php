<?php

namespace Control;

include_once('Page.php');
include_once(dirname(__FILE__).'/../View/MainView.php');

use View\MainView;

class PageFactory {
  private $currentPage;
  private $currentView;

  public function createPage(Page $page, MainView $view) {
    $this->currentPage=$page;
    $this->currentView=$view;
    $this->currentPage->getPage($this->currentView);
  }
}
