<?php
namespace jhenriquesousa;

// como esta classe vai ser parecida com a classe page vamos dar um extend. Não podemos usar a mesma class porque a class page está a trabalhar com a pasta views. Se utilizássemos a mesma class iria gerar conflito, visto que iriamos ter dois header, dois footer e dois index (um iria subscrever o outro)

// visto que estamos a extender, tudo o que for publico da class page, podemos usar na class pageAdmin

class PageAdmin extends Page{ 

    public function __construct($opts = array(), $tpl_dir = "/views/admin/") {

        // a class page já tem o método constructer que pretendemos então para não escrever o código todo novamente basta chamar o método mágico
        parent::__construct($opts, $tpl_dir);

    }
}

?>