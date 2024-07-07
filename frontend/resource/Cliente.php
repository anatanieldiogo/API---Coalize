<?php

namespace frontend\resource;

use common\models\Cliente as ModelsCliente;

class Cliente extends ModelsCliente
{
    public function fields(){
        return [
            'nome',
            'cpf',
            'foto',
            'sexo',
            'enderecos'
        ];
    }
}