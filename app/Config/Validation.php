<?php

namespace Config;

use CodeIgniter\Validation\CreditCardRules;
use CodeIgniter\Validation\FileRules;
use CodeIgniter\Validation\FormatRules;
use CodeIgniter\Validation\Rules;

class Validation
{
    //--------------------------------------------------------------------
    // Setup
    //--------------------------------------------------------------------

    /**
     * Stores the classes that contain the
     * rules that are available.
     *
     * @var string[]
     */
    public $ruleSets = [
        Rules::class,
        FormatRules::class,
        FileRules::class,
        CreditCardRules::class,
    ];

    /**
     * Specifies the views that are used to display the
     * errors.
     *
     * @var array<string, string>
     */
    public $templates = [
        'list'   => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
    ];

    
    //--------------------------------------------------------------------
    // Rules
    //--------------------------------------------------------------------
    
    public $register=[
        'fullname'     => 'required|min_length[5]|max_length[100]',
        'username'     => 'required|min_length[3]|max_length[15]',
        'password'     => 'required|min_length[4]|max_length[15]',
        'pass_confirm' => 'required|matches[password]'
    ];
    
    public $register_errors = [
        'fullname' => [
            'required'=>'Ingresa tu nombre completo por favor!!',
            'min_length'=>'Se requieren minimo 5 caracteres',
            'max_length'=>'No debes sobrepasar los 100 caracteres' 
        ],
        'username'=>[
            'required'=>'Ingresa un numero de usuario',
            'min_length'=>'Se requieren minimo 3 caracteres',
            'max_length'=>'No debes sobrepasar los 15 caracteres'
        ],
        'password'=>[
            'required'=>'Ingresa una contraseña',
            'min_length'=>'Se requieren minimo de 4 caracteres',
            'max_length'=>'No debes sobrepasar los 15 caracteres'
        ],
        'pass_confirm'=>[
            'required'=>'Ingresa la misma contraseña del campo de contraseña',
            'matches'=>'Las contraseñas no son similares!!'
        ]
    ];
    
    public $login=[
        'username'     => 'required|min_length[3]|max_length[15]',
        'password'     => 'required|min_length[4]|max_length[15]'
    ];
    
    public $login_errors=[
        'username'=>[
            'required'=>'Ingresa un numero de usuario',
            'min_length'=>'Se requieren minimo 3 caracteres',
            'max_length'=>'No debes sobrepasar los 15 caracteres'
        ],
        'password'=>[
            'required'=>'Ingresa una contraseña',
            'min_length'=>'Se requieren minimo de 4 caracteres',
            'max_length'=>'No debes sobrepasar los 15 caracteres'
        ]
    ];


    public $link=[
        'id_category' => 'required',
        'title'     => 'required|min_length[3]|max_length[9]',
        'url'     => 'required|valid_url'
    ];


}
