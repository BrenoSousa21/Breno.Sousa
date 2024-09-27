<?php
class Vinho {
    private $nome;
    private $tipo;
    private $preco;
    private $safra;
 
    public function __construct($nome, $tipo, $preco, $safra) {
        $this->nome = $nome;
        $this->tipo = $tipo;
        $this->preco = $preco;
        $this->safra = $safra;
    }
 
    public function getNome() {
        return $this->nome;
    }
 
    public function getTipo() {
        return $this->tipo;
    }
 
    public function getPreco() {
        return $this->preco;
    }
 
    public function getSafra() {
        return $this->safra;
    }

    public function mostrarVinho() {
        return "Nome: " . $this->nome . "<br>Tipo: " . $this->tipo . "<br>Preço: " . $this->preco . "<br>Safra: " . $this->safra;
    }
 
    public function verificaPreco($preco) {
        return $preco < 25;
    }
}
 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
    $nome = $_POST['nome'];
    $tipo = $_POST['tipo'];
    $preco = $_POST['preco'];
    $safra = $_POST['safra'];
 

    $vinho = new Vinho($nome, $tipo, $preco, $safra);
 

    $oferta = $vinho->verificaPreco($vinho->getPreco()) ? "Produto em Oferta" : "Produto com preço normal";
}
?>
 
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Vinho</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Cadastro de Vinho</h1>
        <form method="post" action="">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required>
 
            <label for="tipo">Tipo:</label>
            <input type="text" id="tipo" name="tipo" required>
 
            <label for="preco">Preço:</label>
            <input type="number" id="preco" name="preco" step="0.01" required>
 
            <label for="safra">Safra:</label>
            <input type="number" id="safra" name="safra" required>
 
            <input type="submit" value="Cadastrar Vinho">
        </form>
 
        <?php if ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
            <div class="resultado">
                <h2>Informações do Vinho Cadastrado:</h2>
                <p><?php echo $vinho->mostrarVinho(); ?></p>
                <p><strong><?php echo $oferta; ?></strong></p>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>
 