<?php

namespace frontend\resource;

use common\models\Produto as ModelsProduto;

class Produto extends ModelsProduto
{
    public function fields(){
        return [
            'nome',
            'preco',
            'foto',
            'cliente'
        ];
    }
}