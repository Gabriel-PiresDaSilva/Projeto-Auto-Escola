<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Auto escola Starter</title>
    <link rel="stylesheet" href="../assets/css/style.css">
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
                                <li><a href="../pages/cadastro_aluno.php">📝 Cadastrar Aluno</a></li>
                                <li><a href="../pages/cadastro_usuario.php">👤 Cadastrar Usuário</a></li>
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
                            <a href="../pages/form_login.php">Login</a>
                        <?php endif; ?>
                    </li>
                </ul>
            </nav>
        </div>
    </header>

    <main>

        <div class="container">
            <div class="box1">
                <h1>Dê o primeiro passo para sua CNH com quem sabe ensinar!</h1>
                <p>Na Starter, você aprende de verdade, do seu jeito e no seu ritmo. Aqui o iniciante vira motorista preparado, confiante e pronto para o trânsito.</p>

                <h2>🚗 Oferecemos:</h2>
                <ul>
                    <li>Aulas teóricas e práticas com instrutores experientes</li>
                    <li>Carros novos e bem cuidados</li>
                    <li>Horários flexíveis (manhã, tarde, noite e finais de semana)</li>
                </ul>

                <h2>💰 Preços justos e condições especiais</h2>

                <h2>👉 Comece sua jornada com a Starter. É simples, seguro e você consegue!</h2>
            </div>
        </div>

    </main>

    <footer>
        <p>&copy; 2026 Autoescola Starter</p>
    </footer>

</body>

</html>