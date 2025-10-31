<?php
session_start();
require_once "../model/Tarefas.php";

if (!isset($_SESSION['tarefas'])) {
    $_SESSION['erros'] = "Não é possível adicionar tarefas sem criar uma sessão primeiro";
    header("Location: ../view/index.php");
    exit;}

//validação de entrada
$tituloTarefa = $_GET['tarefa'] ?? '';
$dataTarefa   = $_GET['data'] ?? '';

if (trim($tituloTarefa) === '') {
    $_SESSION['erros'] = "Insira os dados da tarefa";
    header("Location: ../view/index.php");
    exit;
}

//p criar e adicionar a tarefa na session
$tarefa = new Tarefas($tituloTarefa, $dataTarefa);
$_SESSION['tarefas'][] = $tarefa;  //o [] faz adicionar no final do array
header("Location: ../view/index.php");
exit;