<?php

/**
 * @return array
 */
    function activateMenuItem($itemName = 'home')
    {
        $menu = [
            'home'  => '',
            'create_new_resource' => '',
            'useful_tools' => '',
            'about_app'=> '',
            'contact'=> ''
        ];
        foreach ($menu as $key => $value) {
            if($key === $itemName){
                $menu[$itemName] = 'active';
            } 
        }
        return $menu;
    }

?>