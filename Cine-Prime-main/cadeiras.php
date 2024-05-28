<?php

include("ingresso.html");

session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["bt_confirmar"])) {
    $cliente = $_POST['nome'];
    echo "Confirmado! " . ($cliente) . ", seu lugar foi reservado.<br>";
}

$cadeiras = $_POST['row'];

$cadeiras = array(
    "A1", "A2", "A3", "A4", "A5", "A6", "A7", "A8", "A9", "A10",
    "B1", "B2", "B3", "B4", "B5", "B6", "B7", "B8", "B9", "B10",
    "C1", "C2", "C3", "C4", "C5", "C6", "C7", "C8", "C9", "C10",
    "D1", "D2", "D3", "D4", "D5", "D6", "D7", "D8", "D9", "D10",
    "E1", "E2", "E3", "E4", "E5", "E6", "E7", "E8", "E9", "E10"
);

function reservarCadeiras($cadeira, $cliente) {
    global $cadeiras;
    if (in_array($cadeira, $cadeiras)) {
        $index = array_search($cadeira, $cadeiras);
        $cadeiras[$index] = $cliente;
        echo "Cadeira " . ($cadeira) . " reservada para " . ($cliente) . ".<br>";
    } else {
        echo "Lugar " . ($cadeira) . " já está reservado.<br>";
    }
}

 

function sortearCadeira() {
    global $cadeiras;
    $cadeiraSorteada = array_rand($cadeiras);
    $ganhador = $cadeiras[$cadeiraSorteada];
    if (!in_array($ganhador, array(
        "A1", "A2", "A3", "A4", "A5", "A6", "A7", "A8", "A9", "A10",
        "B1", "B2", "B3", "B4", "B5", "B6", "B7", "B8", "B9", "B10",
        "C1", "C2", "C3", "C4", "C5", "C6", "C7", "C8", "C9", "C10",
        "D1", "D2", "D3", "D4", "D5", "D6", "D7", "D8", "D9", "D10",
        "E1", "E2", "E3", "E4", "E5", "E6", "E7", "E8", "E9", "E10"
    ))) {
        echo "A cadeira sorteada foi a " . ($cadeiraSorteada) . " e o ganhador é " . ($ganhador) . ".<br>";
    } else {
        $ganhador !== null ? $ganhador : 'null';
        echo "Nenhuma cadeira foi reservada, portanto não há ganhador.<br>" ;
    }
}
?>
