<?php

    function init_session(){
        if(!session_id())
        {
            session_start();
            session_regenerate_id();
            return true;
        }
        return false;
    }

    // function clean_session()
    // {
    //     session_unset();
    //     session_destroy();
    // }

    function is_logged()
    {
        if(isset($_SESSION['operateur'])){
            return true;
        }else{
            return false;
        }
    }
?>