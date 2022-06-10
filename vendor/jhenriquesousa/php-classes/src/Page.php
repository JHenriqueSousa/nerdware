<?php 

namespace jhenriquesousa;

// como vou utilizar classes do raintpl e este tem o próprio namespace é preciso chamá-lo
use Rain\Tpl;

class Page {

    # criação de atributos privados 
    private $tpl;
    private $options = [];
    private $defaults = [
        "header" =>true,
        "footer" =>true,
        "data" => []
    ];

    // criar o método mágico constructor. Por padrão caso não chegue nada à variável opções (opts) o array fica vazio
    // no segundo parametro estamos a dizer que por padrão, ou seja se não mencionarmos nada, irá para o folder views. Isto é necessário porque esta classe será utilizado na classe pageAdmin. Não podemos usar a mesma class porque a class page está a trabalhar com a pasta views. Se utilizássemos a mesma class iria gerar conflito, visto que iriamos ter dois header, dois footer e dois index (um iria subscrever o outro)
    public function __construct($opts = array(), $tpl_dir = "/views/") {

        // se eu passar alguma informação no segundo parametro (opts, que é chamado pelo construtuor) e por algum motivo der conflicto com o defaults, o que fica é o opts. As duas informações vão juntar (array_merge) e o resultado vai ser guardado no atributo options
        $this->options = array_merge($this->defaults, $opts);
    
        $config = array(
            # para o raintpl funcionar é necessário uma pasta para ir buscar os arquivos html (tpl_dir) e outra para o cache (cache_dir)

            # utilização da variável ambiente server document root. Está variável ambiente vai buscar onde está o dirétorio root (dirétório inicial). Desta maneira o código fica mais inteligente e evita problemas futuros
            "tpl_dir"       => $_SERVER["DOCUMENT_ROOT"]. $tpl_dir,
            "cache_dir"     => $_SERVER["DOCUMENT_ROOT"]. "/views-cache/",
            "debug"         => false // set to false to improve the speed
        );

        Tpl::configure( $config );

        $this->tpl = new Tpl;

        $this->setData($this->options["data"]);

        # quando alguem quer criar uma página (no nosso projeto seria chamar o constructer) a primeira coisa a ser feita é o header, portanto é o que iremos fazer primeiro.
        if ($this->options["header"] === true) $this ->tpl-> draw("header"); # o draw é um método do tpl. o header está na pasta views

    }

    # vamos criar um método que apresenta um foreach. Como teriamos que usar esta estrutura de controlo várias vezes mais vale criar um método que torne este código mais inteligente. Será um método privado porque só será necessário utilizar nesta class.
    private function setData($data = array())
    {
        # tpl = template que foi referido na linha 34
        # atribuição de variáveis que vão aparecer no template. vamos supor que temos uma variavel nome. Ele vai buscar o nome e o valor dele.
        foreach ($data as $key => $value){
            $this->tpl->assign($key, $value);
        }
    }

    // método mágico para o conteudo da página 
    public function setTpl($name, $data = array(), $returnHTML = false)
    {
        $this->setData($data);

        return $this->tpl->draw($name, $returnHTML); # passar o nome do template e o return do HTML 
    }
    public function __destruct() {

        if ($this->options["footer"] === true) $this ->tpl-> draw("footer"); # o draw é um método do tpl. o footer está na pasta views

    }
}

?>