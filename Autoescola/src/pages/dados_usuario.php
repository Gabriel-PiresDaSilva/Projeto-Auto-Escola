<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Autoescola Starter - Gerenciar Usuarios</title>
    <link rel="stylesheet" href="../assets/css/dados_usuario.css">
</head>

<body>

    <header>
        <div class="topo">
            <h1>Autoescola Starter</h1>

            <nav>
                <ul class="menu">
                    <?php if (isset($_SESSION['cargo']) && $_SESSION['cargo'] == 'Administrador') : ?>
                        <li class="dropdown">
                            <span class="dropdown-btn">Cadastrar ▼</span>
                            <ul class="dropdown-content">
                                <li><a href="../pages/form_aluno.php">📝 Cadastrar Aluno</a></li>
                                <li><a href="../pages/form_usuario.php">👤 Cadastrar Usuário</a></li>
                                <li><a href="../pages/dados_aluno.php">✏️ Lista de alunos</a></li>
                                <li><a href="../pages/dados_usuario.php">✍️ Lista de usuarios</a></li>
                            </ul>
                        </li>
                    <?php endif; ?>
                    <li><a href="../pages/index.php">Home</a></li>
                    <li><a href="../pages/quem_somos.php">Quem Somos</a></li>
                    <li><a href="../pages/contato.php">Contato</a></li>

                    <!-- LOGIN À DIREITA -->
                    <li class="login-menu">
                        <?php if (isset($_SESSION['email'])): ?>
                            <?php echo 'Bem vindo, ' . $_SESSION['nome']; ?>
                            <a href="../usuario/logout.php">[ sair ]</a>
                        <?php else: ?>
                            <a href="../usuario/form_login.php">Login</a>
                        <?php endif; ?>
                    </li>
                </ul>
            </nav>
        </div>
    </header>

    <?php
    require_once('../config/conexao.php');

    $sql = "select id_usuario, nome, email, cargo from usuario";

    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    $usuario = $stmt->fetchAll(PDO::FETCH_ASSOC);
     ?>

    <main>
        <div class="container">
            <div class="header-table">
                <h1>Gerenciar Usuarios</h1>
                <p class="subtitle">Visualize, edite ou remova usuarios cadastrados</p>
                <a href="../aluno/form_usuario.php" class="btn-novo">+ Novo Usuario</a>
            </div>

            <!-- Barra de pesquisa -->
            <div class="search-bar">
                <input type="text" id="pesquisa" placeholder="🔍 Pesquisar usuario por nome,e-mail ou cargo">
                <button class="btn-pesquisar">Pesquisar</button>
            </div>

            <!-- Tabela de alunos -->
            <div class="table-responsive">
                <table class="tabela-usuario">
                    <thead>
                        <tr>
                            <th>ID></th>
                            <th>Nome</th>
                            <th>E-mail</th>
                            <th>Cargo</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(count($usuario) > 0): ?>
                        
                        <?php foreach ($usuario as $row): ?>
                        <tr>
                            <td><?php echo $row ['id_usuario'] ?></td>
                            <td><?php echo $row ['nome'] ?></td>
                            <td><?php echo $row ['email'] ?></td>
                            <td><?php echo $row ['cargo'] ?></td>
                            <td class="acoes">
                                <a href="../usuario/form_update_usuario.php?id_usuario=<?php echo $row['id_usuario']; ?>" class="btn-editar">✏️ Editar</a>
                                <a href="#" class="btn-excluir" onclick="return confirm('Tem certeza que deseja excluir este usuario?')">🗑️ Excluir</a>
                            </td>
                        </tr>
                        <?php endforeach;?>
                        <?php else: ?>
                            <tr colspan="8">Nenhum usuario encontrado</tr>
                            <?php endif?>

                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <footer>
        <p>&copy; 2026 Autoescola Starter</p>
    </footer>

</body>

</html>