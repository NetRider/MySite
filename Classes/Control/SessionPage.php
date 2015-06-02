<?php
/**
 * Created by PhpStorm.
 * User: matteopolsinelli
 * Date: 02/06/15
 * Time: 10:10
 */

namespace Control;

include_once('Page.php');
include_once(dirname(__FILE__).'/../Utility/Session.php');

use View\MainView;
use Control\Session;


class LoginPage extends Page {

    public function getPage(MainView $view) {

        switch ($this->getDataFromRequest('sessionAction'))
        {
            case 'login':
                break;
            case 'logout':
                break;
        }



        $session = new Session();
        $username = $this->getDataFromRequest("username");
        $password = $this->getDataFromRequest("password");

        if($session->validate($username, $password))
        {
            $session->login($username, $password);

            $view->assignData('loggedIn',true);
            $view->assignData('username',$username);
            $view->assignData("loggedIn", true);

        }else
            $this->mainView->assignData("loggedIn", false);
    }
}