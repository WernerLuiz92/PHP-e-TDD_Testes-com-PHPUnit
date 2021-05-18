<?php

require './vendor/autoload.php';

use Werner\Leilao\Model\Lance;
use Werner\Leilao\Model\Leilao;
use Werner\Leilao\Model\Usuario;
use Werner\Leilao\Service\Avaliador;

// ARRANGE - GIVEN
// Cria o cenário para o teste
$leilao = new Leilao('Fiat 147 0KM');

$maria = new Usuario('Maria');
$joao = new Usuario('João');

$leilao->recebeLance(new Lance($joao, 2000));
$leilao->recebeLance(new Lance($maria, 2500));

$leiloeiro = new Avaliador();

// ACT - WHEN
// Executa o código a ser testato
$leiloeiro->avalia($leilao);

$maiorValor = $leiloeiro->getMaiorValor();

// ASSERT - THEN
// Define o valor esperado e testa a saída
$valorEsperado = 2500;

if ($maiorValor == $valorEsperado) {
    echo "TEST OK";
} else {
    echo "TEST FAIL";
}
