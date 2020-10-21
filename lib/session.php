<?php 
    if(!isset($_SESSION)) {
        session_start();
    }
    // secureSession();

    function secureSession() {
        if(!isset($_SESSION['regenerateDelay']) OR intval($_SESSION['regenerateDelay']) <= time()) {
            $_SESSION['regenerateDelay'] = time() + 600;
            session_regenerate_id(TRUE);
        }

        if(isset($_SESSION['user_agent'])) {
            if($_SESSION['user_agent'] !== $_SERVER['HTTP_USER_AGENT']) {
                session_unset();
                session_destroy();
            }
        } else {
            $_SESSION['user_agent'] = $_SERVER['HTTP_USER_AGENT'];
        }

        if(isset($_SESSION['user_ip'])) {
            if($_SESSION['user_ip'] !== getIp()) {
                session_unset();
                session_destroy();
            }
        } else {
            $_SESSION['user_ip'] = getIp();
        }
    }

    function getIp() {
        $ipaddress = '';
        if (isset($_SERVER['HTTP_CLIENT_IP'])) {
            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        } 
        else if(isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }
        else if(isset($_SERVER['HTTP_X_FORWARDED'])) {
            $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
        } 
        else if(isset($_SERVER['HTTP_FORWARDED_FOR'])) {
            $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
        }
        else if(isset($_SERVER['HTTP_FORWARDED'])) {
            $ipaddress = $_SERVER['HTTP_FORWARDED'];
        }
        else if(isset($_SERVER['REMOTE_ADDR'])) {
            $ipaddress = $_SERVER['REMOTE_ADDR'];
        }
        else {
            $ipaddress = 'UNKNOWN';
        }
        return $ipaddress;
    }


?>
