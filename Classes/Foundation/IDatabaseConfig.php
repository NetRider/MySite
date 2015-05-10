<?php
    namespace Foundation;

    interface IDatabaseConfig
    {
        const HOST ="localhost";
        const UNAME ="root";
        const PW ="pippo";
        const DBNAME = "blog";
        public static function doConnect();
    }
?>