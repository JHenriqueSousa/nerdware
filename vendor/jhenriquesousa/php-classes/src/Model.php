<?php

namespace jhenriquesousa;

class Model {

    // os valores do value são os valores que temos do campo do nosso objeto 
    private $values = [];

    // para saber quando é chamado
    public function __call($name, $args)
    {
        // saber se o que foi chamado é um método get ou set
        $method = substr($name, 0, 3);
        $fieldName = substr($name, 3, strlen($name));

        switch ($method) 
        {
            case "get":
                return (isset($this->values[$fieldName])) ? $this->values[$fieldName] : NULL;
            break;

            case "set":
                $this->values[$fieldName] = $args[0];
            break;
        }
    }

    // para cada campo que foi returnado na base de dados vai ser criado um atributo com o valor de cada informação do campo
    public function setData($data = array())
    {
        foreach ($data as $key => $value) {
            // como não queremos nada estático precisamos de criar um método com o set + o valor da key. para isso usamos o seguinte código:
            $this->{"set".$key}($value); # se fosse set$key não iria funcionar, tem que ser com {}
        }
    }

    public function getValues() {
        // podiamos dar logo return na página user, mas não seria uma boa prática a nivel de segurança.
        return $this->values;
    }
}
?>