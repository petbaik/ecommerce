<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Ecommerce\App;

class View {
    
    public function render ($view,$params = []) {
        extract($params);
        require "Views/".$view.'.php';
    }
}