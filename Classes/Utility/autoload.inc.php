<?php

function __autoload($class_name) {
    /*if (strpos($class_name,'Control') !== false)
        require_once ('./Classes/Control/'.$class_name.'.php');
    elseif(strpos($class_name,'View') !== false)
        require_once ('./Classes/View/'.$class_name.'.php');
    elseif(strpos($class_name,'Mapper') !== false)
        require_once ('./Classes/Foundation/'.$class_name.'.php');
    elseif(strpos($class_name,'Entity') !== false)
        require_once ('./Classes/Entity/'.$class_name.'.php');
    elseif($class_name == "Singleton")
        require_once ('./Classes/Utility/'.$class_name.'.php');
    elseif($class_name == "Session")
        require_once ('./Classes/Utility/'.$class_name.'.php');
    elseif($class_name == "Database")
        require_once ('./Classes/Foundation/'.$class_name.'.php');
    else {
            require_once('/home/u649457658/public_html/Library/Smarty-3.1.18/libs/sysplugins/' . strtolower($class_name) . '.php');
        }*/

        if (strpos($class_name,'Control') !== false)
            require_once ('./Classes/Control/'.$class_name.'.php');
        elseif(strpos($class_name,'View') !== false)
            require_once ('./Classes/View/'.$class_name.'.php');
        elseif(strpos($class_name,'Mapper') !== false)
            require_once ('./Classes/Foundation/'.$class_name.'.php');
        elseif(strpos($class_name,'Entity') !== false)
            require_once ('./Classes/Entity/'.$class_name.'.php');
        elseif($class_name == "Singleton")
            require_once ('./Classes/Utility/'.$class_name.'.php');
        elseif($class_name == "Session")
            require_once ('./Classes/Utility/'.$class_name.'.php');
        elseif($class_name == "Database")
            require_once ('./Classes/Foundation/'.$class_name.'.php');
        else {
                require_once('Library/Smarty-3.1.18/libs/sysplugins/' . strtolower($class_name) . '.php');
            }
}

?>
