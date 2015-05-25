<?php

    namespace Control;

    include_once('IPage.php');
    include_once(dirname(__FILE__).'/../View/MainView.php');

    use View\MainView;

    /**PageFactory implements the abstract function factoryMethod.
     */

    class PageFactory
    {
        private $currentPage;
        private $currentView;

        /**
         * factoryMethod launch the getPage method on the IPage object parameter 
         * and pass him a IView object. 
         * @param  IPage  $page
         * @return void
         */
        public function createPage(IPage $page, MainView $view)
        {
            $this->currentPage=$page;
            $this->currentView=$view;
            $this->currentPage->getPage($this->currentView);
        } 
    }
?> 