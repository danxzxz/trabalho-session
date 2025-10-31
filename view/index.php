<!DOCTYPE tabela_tarefas>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda</title>
    <link rel="stylesheet" href="../estilos/estilos.css">
</head>
<body>
    <header>
        <h2>Agenda de compromissos</h2>
    </header>
    <main>
        <div>
            <?php
            require_once("../model/Tarefas.php");
            session_start();
            
            if (isset($_SESSION['erro']) && $_SESSION['erro'] != "") {
                echo '<div id="erro">' . $_SESSION['erro'] . '</div>';
                $_SESSION['erro'] = "";
            }
            ?>

            <form action="../controller/criarSessao.php">
                <label for="tarefa">Tarefa:</label>
                <input type="text" id="tarefa" name="tarefa" placeholder="reunião, consulta...">
                
                <label for="data">Data:</label>
                <input type="date" id="data" name="data" placeholder="DD/MM/AAAA">
                
                <div>
                    <button type="submit" name="action" value="criar">Criar Sessão</button>
                    <button type="submit" formaction="../controller/adicionarTarefa.php">Adicionar à Sessão</button>
                    <button type="button" onclick="window.location.href='../controller/excluirSessao.php'">Excluir Sessão</button>
                </div>
            </form>
            <!-- cria a tabela se houver uma sessao -->
            <?php
            if (isset($_SESSION['tarefas'])) {
                $tabela_tarefas = '<p>Lista de Tarefas Registradas:</p>';
                $tabela_tarefas .= '<table>';
                $tabela_tarefas .= '<thead><tr><th>Tarefa</th><th>Data</th></tr></thead>';
                $tabela_tarefas .= '<tbody>';
                
                foreach ($_SESSION['tarefas'] as $item) {
                    $tabela_tarefas .= '<tr><td>' . $item->getTarefa() . '</td><td>' . $item->getData() . '</td></tr>';
                }
                
                $tabela_tarefas .= '</tbody>';
                $tabela_tarefas .= '</table>';
                
                echo $tabela_tarefas;
            } else {
                echo '<p>A sessão não existe!</p>';
            }
            ?>
        </div>
    </main>
</body>
</html>