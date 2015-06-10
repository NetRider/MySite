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

                echo("sono nella funzione login");
                $username = $this->getDataFromRequest("username");
                $password = $this->getDataFromRequest("password");
                echo("USER: " . $username);

                if($this->dataFromSession->validate($username, $password))
                {
                    echo("ho validato i dati");
                    $this->dataFromSession->login($username, $password);
                    $view->assignData('loggedIn',true);
                    $view->assignData('username',$username);
                    $view->assignData("loggedIn", true);

                }else
                    $view->assignData("loggedIn", false);

                break;

            case 'logout':
                echo("ho fatto il logout");
                $this->closeSession();
                $view->assignData("loggedIn", false);
                break;
        }

        //$view->assignData('templateToDisplay', 'home.tpl');
    }
}