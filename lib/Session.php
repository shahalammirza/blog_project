<?php
    class Session{
        public static function init(){
            session_start();
        }

        public static function set($Key, $value){
            $_SESSION['$Key'] = $value;
        }

        public static function get($Key){
            if(isset($_SESSION['$Key'])){
                return $_SESSION['$Key'];
            }else{
                return false;
            }
        }

        public static function sheckSession(){
            self::init();
            if(self::get('login')==false){
                self::destroy();
                header("Location:login.php");
            }
        }

        public static function destroy(){
            session_destroy();
            header("Location:login.php");
        }
    }

?>