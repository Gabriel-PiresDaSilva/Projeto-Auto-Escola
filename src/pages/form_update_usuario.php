    <?php
    session_start();
    require_once('../config/conexao.php');

    if (isset($_GET['id_usuario'])) {
        $id = $_GET['id_usuario'];

        $sql = "SELECT * FROM usuario where id_usuario = :id_usuario";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":id_usuario", $id);
        $stmt->execute();

        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if(!$usuario) {
            die("Usuario nao encontrado");
        }
    }    else {
            die("Id do aluno nao informado");
        }

    ?>
    <!DOCTYPE html>
    <html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <title>Autoescola Starter - Cadastro de Usuário</title>
        <link rel="stylesheet" href="../assets/css/form_user.css">
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

        <main>
            <div class="form-container">
                <h1>Cadastro de Usuário</h1>
                <p class="subtitle">Preencha os dados para criar um novo usuário</p>

                <form action="../usuario/update_usuario.php" method="POST" class="usuario-form">

                <input type="hidden" name="id_usuario" value="<?php echo $usuario['id_usuario']?>">
                    
                    <div class="form-group">
                        <label for="nome">Nome Completo *</label>
                        <input type="text" id="nome" name="nome" value="<?php echo htmlspecialchars($usuario['nome']);?>" required placeholder="Digite o nome completo">
                    </div>

                    <div class="form-group">
                        <label for="email">E-mail *</label>
                        <input type="email" id="email" name="email" required value="<?php echo htmlspecialchars($usuario['email']);?>" placeholder="email@exemplo.com">
                    </div>

                    <div class="form-group">
                        <label for="senha">Senha *</label>
                        <input type="password" id="senha" name="senha" required value="<?php echo htmlspecialchars($usuario['senha']);?>" placeholder="Digite a senha">
                    </div>

                    <div class="form-group">
                        <label for="cargo">Cargo *</label>
                        <select id="cargo" name="cargo" required>
                            <option value="">Selecione o cargo</option>
                            <option value="Administrador" <?= ($usuario['cargo'] == 'Administrador') ? 'selected' : '' ?>>Administrador</option>
                            <option value="Instrutor" <?= ($usuario['cargo'] == 'Instrutor') ? 'selected' : '' ?>>Instrutor</option>
                        </select>
                    </div>

                    <div class="form-buttons">
                        <button type="submit" class="btn-submit">Alterar</button>
                        <button type="reset" class="btn-reset">Limpar</button>
                        <a href="../pages/dados_usuario.php" class="btn-cancel">Voltar</a>
                    </div>
                </form>
            </div>
        </main>

        <footer>
            <p>&copy; 2026 Autoescola Starter</p>
        </footer>

    </body>

    </html>