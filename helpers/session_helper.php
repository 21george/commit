<?php
session_start();

function msg($name = '', $message ='', $class='alert alert-success'){

    if(!empty($name)){
        if(!empty($message) && empty($_SESSION[$name])){
            if(!empty($_SESSION[$name])){
                unset($_SESSION[$name]);
            }
            if(!empty($_SESSION[$name .'_class'])){
                unset($_SESSION[$name .'_class']);
            }
            $_SESSION[$name] = $message;
            $_SESSION[$name .'_class'] = $class;
        }elseif(empty($message) && !empty($_SESSION[$name])){
            $class = !empty($_SESSION[$name . '_class']) ? $_SESSION[$name . '_class'] : '';
            echo '<div class="text-center '.$class.'" id = "msg-flash" style="font-size:2rem; padding-left:1rem;">'.$_SESSION[$name].'</div>';
            unset($_SESSION[$name]);
            unset($_SESSION[$name. '_class']);
        }
    }

}


function msgDanger($name = '', $message ='', $class='alert alert-danger'){

    if(!empty($name)){
        if(!empty($message) && empty($_SESSION[$name])){
            if(!empty($_SESSION[$name])){
                unset($_SESSION[$name]);
            }
            if(!empty($_SESSION[$name .'_class'])){
                unset($_SESSION[$name .'_class']);
            }
            $_SESSION[$name] = $message;
            $_SESSION[$name .'_class'] = $class;
        }elseif(empty($message) && !empty($_SESSION[$name])){
            $class = !empty($_SESSION[$name . '_class']) ? $_SESSION[$name . '_class'] : '';
            echo '<div class="text-center '.$class.'" id = "msg-flash" style="font-size:2rem; padding-left:1rem;">'.$_SESSION[$name].'</div>';
            unset($_SESSION[$name]);
            unset($_SESSION[$name. '_class']);
        }
    }

}


//profile success or fail messages

function flashSuccess($name = '', $message ='', $class='display-msgheader'){

    if(!empty($name)){
        if(!empty($message) && empty($_SESSION[$name])){
            if(!empty($_SESSION[$name])){
                unset($_SESSION[$name]);
            }
            if(!empty($_SESSION[$name .'_class'])){
                unset($_SESSION[$name .'_class']);
            }
            $_SESSION[$name] = $message;
            $_SESSION[$name .'_class'] = $class;
        }elseif(empty($message) && !empty($_SESSION[$name])){
            $class = !empty($_SESSION[$name . '_class']) ? $_SESSION[$name . '_class'] : '';
            echo '<div class="text-center '.$class.'" id = "msg-flash" style="font-size:3rem; padding-left:1rem;z-index:1;">'.$_SESSION[$name].'</div>';
            unset($_SESSION[$name]);
            unset($_SESSION[$name. '_class']);
        }
    }

}

function flashDanger($name = '', $message ='', $class='display-msgheader-danger'){

    if(!empty($name)){
        if(!empty($message) && empty($_SESSION[$name])){
            if(!empty($_SESSION[$name])){
                unset($_SESSION[$name]);
            }
            if(!empty($_SESSION[$name .'_class'])){
                unset($_SESSION[$name .'_class']);
            }
            $_SESSION[$name] = $message;
            $_SESSION[$name .'_class'] = $class;
        }elseif(empty($message) && !empty($_SESSION[$name])){
            $class = !empty($_SESSION[$name . '_class']) ? $_SESSION[$name . '_class'] : '';
            echo '<div class="text-center '.$class.'" id = "msg-flash" style="font-size:3rem; padding-left:1rem;">'.$_SESSION[$name].'</div>';
            unset($_SESSION[$name]);
            unset($_SESSION[$name. '_class']);
        }
    }

}
?>