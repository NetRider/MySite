<?php

    namespace Control;
    
    include_once('Creator.php');
    include_once('IPage.php');
    include_once(dirname(__FILE__).'/../View/IView.php');

    use View\IView;

    /**PageFactory implements the abstract function factoryMethod.
     */

    class PageFactory extends Creator
    {
        private $currentPage;
        private $currentView;

        /**
         * factoryMethod launch the getPage method on the IPage object parameter 
         * and pass him a IView object. 
         * @param  IPage  $page 
         * @param  IView  $view 
         * @return void
         */
        protected function factoryMethod(IPage $page, IView $view)
        {
            $this->currentPage=$page;
            $this->currentView=$view;
            $this->currentPage->getPage($this->currentView);
        } 
    }
?> 