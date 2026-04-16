<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Autoescola Starter - Quem Somos</title>
    <link rel="stylesheet" href="../assets/css/sobre.css">
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
            <h1>Autoescola Starter</h1>

            <h2>Começar é o primeiro passo. E a Starter está aqui para te acompanhar do primeiro passo até a conquista da sua independência no trânsito.</h2>

            <p>Somos uma autoescola moderna, criada para quem quer aprender de verdade, sem complicação e sem medo. Nosso nome, Starter, já diz tudo: acreditamos que dentro de cada pessoa existe um grande motorista pronto para sair do lugar. Basta o estímulo certo.

                Com uma equipe de instrutores altamente capacitados, pacientes e atualizados com as novas leis do trânsito, oferecemos um ensino personalizado, respeitando o ritmo de cada aluno. Unimos tecnologia, frota nova e uma metodologia leve e eficiente para transformar a jornada da primeira habilitação (ou da reciclagem) em uma experiência positiva e segura.

                Na Autoescola Starter, você não é apenas mais um número. Você é parte de uma turma que valoriza a responsabilidade, o respeito ao próximo e a direção defensiva. Nossa missão vai além de aprovar no exame: queremos formar condutores conscientes, confiantes e preparados para os desafios reais do dia a dia.</p>

            <h3>Seja para começar do zero, mudar de categoria ou atualizar seus conhecimentos, aperte o cinto e venha fazer parte dessa história. Aqui, o motor da sua liberdade dá a partida.</h3>
            <h3>Autoescola Starter – Sua jornada no trânsito começa conosco.</h3>
        </div>
    </main>

    <footer>
        <p>&copy; 2026 Autoescola Starter</p>
    </footer>

</body>

</html>