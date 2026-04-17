<?php
session_start();
require_once('../config/conexao.php');

// Buscar os dados do aluno baseado no ID recebido via GET
if (isset($_GET['id_aluno'])) {
    $id = $_GET['id_aluno'];
    
    $sql = 'SELECT * FROM aluno WHERE id_aluno = :id_aluno';
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id_aluno', $id);
    $stmt->execute();
    
    $aluno = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if (!$aluno) {
        die('Aluno não encontrado');
    }
} else {
    die('ID do aluno não informado');
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Autoescola Starter - Alterar Cadastro de Aluno</title>
    <link rel="stylesheet" href="../assets/css/cadastro_aluno.css">
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
            <h1>Alterar cadastro de Aluno</h1>

            <form action="../aluno/update_aluno.php" method="POST" class="cadastro-form">
                
                <!-- Campo oculto para enviar o ID -->
                <input type="hidden" name="id_aluno" value="<?php echo $aluno['id_aluno']; ?>">

                <!-- Dados Pessoais -->
                <fieldset>
                    <legend>Dados Pessoais</legend>

                    <div class="form-group">
                        <label for="nome">Nome Completo *</label>
                        <input type="text" id="nome" name="nome" value="<?php echo htmlspecialchars($aluno['nome']); ?>" required placeholder="Digite o nome completo">
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="email">E-mail *</label>
                            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($aluno['email']); ?>" required placeholder="seu@email.com">
                        </div>

                        <div class="form-group">
                            <label for="senha">Senha *</label>
                            <input type="password" id="senha" name="senha" value="<?php echo htmlspecialchars($aluno['senha']); ?>" required placeholder="Digite a senha">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="cpf">CPF *</label>
                            <input type="text" id="cpf" name="cpf" value="<?php echo htmlspecialchars($aluno['cpf']); ?>" required placeholder="000.000.000-00">
                        </div>

                        <div class="form-group">
                            <label for="telefone">Telefone *</label>
                            <input type="tel" id="telefone" name="telefone" value="<?php echo htmlspecialchars($aluno['telefone']); ?>" required placeholder="(00) 00000-0000">
                        </div>
                    </div>
                </fieldset>

                <!-- Endereço -->
                <fieldset>
                    <legend>Endereço</legend>

                    <div class="form-group">
                        <label for="endereco">Endereço *</label>
                        <input type="text" id="endereco" name="endereco" value="<?php echo htmlspecialchars($aluno['endereco']); ?>" required placeholder="Rua, Avenida, etc">
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="numero">Número *</label>
                            <input type="text" id="numero" name="numero" value="<?php echo htmlspecialchars($aluno['numero']); ?>" required placeholder="Nº">
                        </div>

                        <div class="form-group">
                            <label for="complemento">Complemento</label>
                            <input type="text" id="complemento" name="complemento" value="<?php echo htmlspecialchars($aluno['complemento']); ?>" placeholder="Apto, Bloco, Casa">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="bairro">Bairro</label>
                            <input type="text" id="bairro" name="bairro" value="<?php echo htmlspecialchars($aluno['bairro']); ?>" required placeholder="Seu bairro">
                        </div>

                        <div class="form-group">
                            <label for="estado">Estado</label>
                            <select id="estado" name="estado" required>
                                <option value="AC" <?= ($aluno['estado'] == 'AC') ? 'selected' : '' ?>>Acre</option>
                                <option value="AL" <?= ($aluno['estado'] == 'AL') ? 'selected' : '' ?>>Alagoas</option>
                                <option value="AP" <?= ($aluno['estado'] == 'AP') ? 'selected' : '' ?>>Amapá</option>
                                <option value="AM" <?= ($aluno['estado'] == 'AM') ? 'selected' : '' ?>>Amazonas</option>
                                <option value="BA" <?= ($aluno['estado'] == 'BA') ? 'selected' : '' ?>>Bahia</option>
                                <option value="CE" <?= ($aluno['estado'] == 'CE') ? 'selected' : '' ?>>Ceará</option>
                                <option value="DF" <?= ($aluno['estado'] == 'DF') ? 'selected' : '' ?>>Distrito Federal</option>
                                <option value="ES" <?= ($aluno['estado'] == 'ES') ? 'selected' : '' ?>>Espírito Santo</option>
                                <option value="GO" <?= ($aluno['estado'] == 'GO') ? 'selected' : '' ?>>Goiás</option>
                                <option value="MA" <?= ($aluno['estado'] == 'MA') ? 'selected' : '' ?>>Maranhão</option>
                                <option value="MT" <?= ($aluno['estado'] == 'MT') ? 'selected' : '' ?>>Mato Grosso</option>
                                <option value="MS" <?= ($aluno['estado'] == 'MS') ? 'selected' : '' ?>>Mato Grosso do Sul</option>
                                <option value="MG" <?= ($aluno['estado'] == 'MG') ? 'selected' : '' ?>>Minas Gerais</option>
                                <option value="PA" <?= ($aluno['estado'] == 'PA') ? 'selected' : '' ?>>Pará</option>
                                <option value="PB" <?= ($aluno['estado'] == 'PB') ? 'selected' : '' ?>>Paraíba</option>
                                <option value="PR" <?= ($aluno['estado'] == 'PR') ? 'selected' : '' ?>>Paraná</option>
                                <option value="PE" <?= ($aluno['estado'] == 'PE') ? 'selected' : '' ?>>Pernambuco</option>
                                <option value="PI" <?= ($aluno['estado'] == 'PI') ? 'selected' : '' ?>>Piauí</option>
                                <option value="RJ" <?= ($aluno['estado'] == 'RJ') ? 'selected' : '' ?>>Rio de Janeiro</option>
                                <option value="RN" <?= ($aluno['estado'] == 'RN') ? 'selected' : '' ?>>Rio Grande do Norte</option>
                                <option value="RS" <?= ($aluno['estado'] == 'RS') ? 'selected' : '' ?>>Rio Grande do Sul</option>
                                <option value="RO" <?= ($aluno['estado'] == 'RO') ? 'selected' : '' ?>>Rondônia</option>
                                <option value="RR" <?= ($aluno['estado'] == 'RR') ? 'selected' : '' ?>>Roraima</option>
                                <option value="SC" <?= ($aluno['estado'] == 'SC') ? 'selected' : '' ?>>Santa Catarina</option>
                                <option value="SP" <?= ($aluno['estado'] == 'SP') ? 'selected' : '' ?>>São Paulo</option>
                                <option value="SE" <?= ($aluno['estado'] == 'SE') ? 'selected' : '' ?>>Sergipe</option>
                                <option value="TO" <?= ($aluno['estado'] == 'TO') ? 'selected' : '' ?>>Tocantins</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="cep">CEP</label>
                        <input type="text" id="cep" name="cep" value="<?php echo htmlspecialchars($aluno['cep']); ?>" required placeholder="00000-000">
                    </div>
                </fieldset>

                <!-- Plano e Instrutor -->
                <fieldset>
                    <legend>Curso e Instrutor</legend>

                    <div class="form-group">
                        <label for="plano">Tipo de Plano</label>
                        <select id="plano" name="plano" required>
                            <option value="">Selecione o plano</option>
                            <option value="1" <?php echo ($aluno['id_plano'] == 1) ? 'selected' : '' ?>>Plano CNH Carro</option>
                            <option value="2" <?php echo ($aluno['id_plano'] == 2) ? 'selected' : '' ?>>Plano CNH Moto</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="instrutor">Escolha seu Instrutor</label>
                        <select id="instrutor" name="instrutor" required>
                            <option value="">Selecione o instrutor</option>
                            <option value="2" <?php echo ($aluno['id_usuario'] == 2) ? 'selected' : '' ?>>Thainara Pires</option>
                            <option value="3" <?php echo ($aluno['id_usuario'] == 3) ? 'selected' : '' ?>>Pedro Augusto</option>
                        </select>
                    </div>
                </fieldset>

                <!-- Botões -->
                <div class="form-buttons">
                    <button type="submit" class="btn-submit">Alterar dados</button>
                    <a href="../aluno/dados_aluno.php" class="btn-cancel">Voltar</a>
                </div>
            </form>
        </div>
    </main>

    <footer>
        <p>&copy; 2026 Autoescola Starter</p>
    </footer>

</body>

</html>