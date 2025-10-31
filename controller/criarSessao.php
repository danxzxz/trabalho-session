<?php
require_once("../model/Tarefas.php");
session_start();

$tarefas = null;

if (isset($_SESSION['tarefas'])) {
    $_SESSION['erros'] = "A sessão de tarefas ja foi criada";
    header("Location: ../view/index.php");
    exit;

}
//verifica se os parametros foram enviados corretamente
$tarefaValida = isset($_GET['tarefa']);
$dataValida = isset($_GET['data']) && $_GET['data'] !== "";

if ($tarefaValida && $dataValida) {
    $novaTarefa = new Tarefas($_GET['tarefa'], $_GET['data']);

    $_SESSION['tarefas'] = [$novaTarefa];
    $_SESSION['erros'] = "";
} else {
    $_SESSION['erros'] = "Preencha todos os campos da tarefa";
}

header("Location: ../view/index.php");