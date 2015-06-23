<?php

namespace Control;

include_once('Page.php');
include_once(dirname(__FILE__).'/../Utility/Session.php');

use View\MainView;
use Control\Session;


class LogController extends Page {

  public function getPage(MainView $view) {

    switch ($view->getDataFromRequest('sessionAction')) {
      case 'login':
        $username = $view->getDataFromRequest("username");
        $password = $view->getDataFromRequest("password");
        $userData = $this->dataFromSession->validate($username, $password);
        $image = $userData[0]->getImage();
        $userID = $userData[0]->getId();
        if($userData)
        {
          $this->dataFromSession->login($username, $userID, $image);
          $view->assignData('username',$username);
          $view->assignData('userimage', $image);
          $view->assignData("loggedIn", true);
        }else
          $view->assignData("loggedIn", false);

        break;

      case 'logout':
        $this->closeSession();
        $view->assignData("loggedIn", false);
      break;
    }
    
    $view->assignData('templateToDisplay', 'home.tpl');
    $view->fetchTemplate('main.tpl');
  }
}
