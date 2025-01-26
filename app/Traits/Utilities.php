<?php
namespace App\Traits;

trait Utilities{


    public function getTokenGlobalAbilities()
    {
        return [
            'article:can-add',
            'article:can-view',
            'article:can-edit',

            'category:can-add',
            'category:can-view',
            'category:can-edit',

            'comment:can-add',
            'comment:can-view',
            'comment:can-edit',
        ];
    }

}


