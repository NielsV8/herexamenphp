<?php
    abstract class Security {
        public static function loggedInUser() {
            session_start();
            if(!isset($_SESSION['username'])){
                return false;
            }
            else{
                return true;
            }
        }
    }