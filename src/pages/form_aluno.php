<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <title>Autoescola Starter - Cadastro de Aluno</title>
  <link rel="stylesheet" href="../assets/css/form_aluno.css">
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
      <h1>Cadastro de Aluno</h1>
      <p class="subtitle">Preencha todos os campos para cadastrar um novo aluno</p>

      <form action="../aluno/insert_aluno.php" method="POST" class="cadastro-form">

        <!-- Dados Pessoais -->
        <fieldset>
          <legend>Dados Pessoais</legend>

          <div class="form-group">
            <label for="nome">Nome Completo<strong>*</strong></label>
            <input type="text" id="nome" name="nome" values="<?php echo isset($nome) ? $nome : ""; ?>" required placeholder="Digite o nome completo">
          </div>

          <div class="form-row">
            <div class="form-group">
              <label for="email">E-mail<strong>*</strong></label>
              <input type="email" id="email" name="email" values="<?php isset($email) ? $email : ""; ?>" required placeholder="seu@email.com">
            </div>

            <div class="form-group">
              <label for="senha">Senha<strong>*</strong></label>
              <input type="password" id="senha" name="senha" values="<?php isset($senha) ? $senha : ""; ?>" required placeholder="Digite a senha">
            </div>
          </div>

          <div class="form-row">
            <div class="form-group">
              <label for="cpf">CPF<strong>*</strong></label>
              <input type="text" id="cpf" name="cpf" values="<?php isset($cpf) ? $cpf : ""; ?>" required placeholder="000.000.000-00">
            </div>

            <div class="form-group">
              <label for="telefone">Telefone<strong>*</strong></label>
              <input type="tel" id="telefone" name="telefone" values="<?php isset($telefone) ? $telefone : ""; ?>" required placeholder="(00) 00000-0000">
            </div>
          </div>
        </fieldset>

        <!-- Endereço -->
        <fieldset>
          <legend>Endereço</legend>

          <div class="form-group">
            <label for="endereco">Endereço<strong>*</strong></label>
            <input type="text" id="endereco" name="endereco" values="<?php isset($endereco) ? $endereco : ""; ?>" required placeholder="Rua, Avenida, etc">
          </div>

          <div class="form-row">
            <div class="form-group">
              <label for="numero">Número<strong>*</strong></label>
              <input type="text" id="numero" name="numero" values="<?php isset($numero) ? $numero : ""; ?>" required placeholder="Nº">
            </div>

            <div class="form-group">
              <label for="complemento">Complemento</label>
              <input type="text" id="complemento" name="complemento" values="<?php isset($complemento) ? $complemento : ""; ?>" placeholder="Apto, Bloco, Casa">
            </div>
          </div>

          <div class="form-row">
            <div class="form-group">
              <label for="bairro">Bairro<strong>*</strong></label>
              <input type="text" id="bairro" name="bairro" values="<?php isset($bairro) ? $bairro : ""; ?>" required placeholder="Seu bairro">
            </div>

            <div class="form-group">
              <label for="estado">Estado<strong>*</strong></label>
              <select id="estado" name="estado" value="<?php echo isset($estado) ? $estado : "" ?>" required>
                <option value="">Selecione o estado</option>
                <option value="AC">Acre</option>
                <option value="AL">Alagoas</option>
                <option value="AP">Amapá</option>
                <option value="AM">Amazonas</option>
                <option value="BA">Bahia</option>
                <option value="CE">Ceará</option>
                <option value="DF">Distrito Federal</option>
                <option value="ES">Espírito Santo</option>
                <option value="GO">Goiás</option>
                <option value="MA">Maranhão</option>
                <option value="MT">Mato Grosso</option>
                <option value="MS">Mato Grosso do Sul</option>
                <option value="MG">Minas Gerais</option>
                <option value="PA">Pará</option>
                <option value="PB">Paraíba</option>
                <option value="PR">Paraná</option>
                <option value="PE">Pernambuco</option>
                <option value="PI">Piauí</option>
                <option value="RJ">Rio de Janeiro</option>
                <option value="RN">Rio Grande do Norte</option>
                <option value="RS">Rio Grande do Sul</option>
                <option value="RO">Rondônia</option>
                <option value="RR">Roraima</option>
                <option value="SC">Santa Catarina</option>
                <option value="SP">São Paulo</option>
                <option value="SE">Sergipe</option>
                <option value="TO">Tocantins</option>
              </select>
            </div>
          </div>

          <div class="form-group">
            <label for="cep">CEP<strong>*</strong></label>
            <input type="text" id="cep" name="cep" values="<?php isset($cep) ? $cep : ""; ?>" required placeholder="00000-000">
          </div>
        </fieldset>

        <!-- Plano e Instrutor -->
        <fieldset>
          <legend>Curso e Instrutor</legend>

          <div class="form-group">
            <label for="plano">Tipo de Plano<strong>*</strong></label>
            <select id="plano" name="plano" required>
              <option value="">Selecione o plano</option>
              <option value="1" <?php echo (isset($id_plano) && $id_plano == 1) ? 'selected' : '' ?>>Plano CNH Carro</option>
              <option value="2" <?php echo (isset($id_plano) && $id_plano == 2) ? 'selected' : '' ?>>Plano CNH Moto </option>
            </select>
          </div>

          <?php
          include_once '../config/conexao.php';

          $sql = "SELECT id_usuario, nome from usuario where cargo = 'instrutor' ";
          $stmt = $pdo->prepare($sql);
          $stmt->execute();
          $instrutores = $stmt->fetchAll(PDO::FETCH_ASSOC);
          
          ?>

          <div class="form-group">
            <label for="instrutor">Escolha seu Instrutor<strong>*</strong></label>
            <select id="instrutor" name="instrutor" required>
              <option value="">Selecione o instrutor</option>
              <?php foreach($instrutores as $instrutor): ?>
              <option value="<?php echo $instrutor['id_usuario']; ?>" <?php echo (isset($id_usuario) && $id_usuario == $instrutor['id_usuario']) ? 'selected' : '' ?> ><?php echo htmlspecialchars($instrutor['nome']) ?> </option>
              <?php endforeach;?>
            </select>
          </div>
        </fieldset>

        <!-- Botões -->
        <div class="form-buttons">
          <button type="submit" class="btn-submit">Cadastrar Aluno</button>
          <button type="reset" class="btn-reset">Limpar</button>
          <a href="../pages/index.php" class="btn-cancel">Cancelar</a>
        </div>
      </form>
    </div>
  </main>

  <footer>
    <p>&copy; 2026 Autoescola Starter</p>
  </footer>

</body>

</html>