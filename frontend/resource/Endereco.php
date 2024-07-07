<?php

namespace frontend\resource;

use common\models\Endereco as ModelsEndereco;

class Endereco extends ModelsEndereco
{

    public function extraFields()
    {
        return ['cliente'];
    }
}