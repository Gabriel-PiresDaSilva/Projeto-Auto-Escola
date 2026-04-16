<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Autoescola Starter - Contato</title>
    <link rel="stylesheet" href="../assets/css/contato.css">
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
            <h1>Contato – Autoescola Starter</h1>
            <h2>Está pronto para dar a partida? Então fale com a gente!</h2>

            <p>Dúvidas sobre os cursos, valores, horários ou documentação? Nossa equipe está pronta para atender você com rapidez e simpatia.</p>

            <h2>📞 Telefone e WhatsApp:</h2>
            <p>(XX) XXXX-XXXX</p>

            <h2>✉️ E-mail:</h2>
            <p>contato@autoescolastarter.com.br</p>

            <h2>📍 Endereço:</h2>
            <p>Rua Exemplo, 123 – Bairro Centro</p>
            <p>Cidade – Estado | CEP: 12345-678</p>

            <h2>🕐 Horário de funcionamento:</h2>
            <p>Segunda a sexta: 8h às 20h</p>
            <p>Sábado: 8h às 12h</p>
            <p>Domingo e feriados: fechado</p>
        </div>
    </main>

    <footer>
        <p>&copy; 2026 Autoescola Starter</p>
    </footer>

</body>

</html>