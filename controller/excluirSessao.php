<?php

require_once("../model/Tarefas.php");
session_start();

if (!isset($_SESSION['tarefas'])) {
    $_SESSION['erro'] = "Não há nenhuma sessão para excluir";
} else {
    session_destroy();
}

header("Location: ../view/index.php");