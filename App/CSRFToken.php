<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Ecommerce\App;

use Ecommerce\App\Session;

class CSRFToken {
    
    
    public static function set (){ 
        if(empty(Session::get('token'))) {
            Session::set('token',bin2hex(random_bytes(32)));
        }
        
    }
    
    public static function get ()  {
        return Session::get('token');
    }
    
    public static function compare ($token) {
        return Session::get('token') === $token;
    }
    
    public function reGenerateToken () {
        Session::get('token', bin2hex(random_bytes(32)));
    }
            
}