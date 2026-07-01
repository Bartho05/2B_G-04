<?php
require_once 'config.php';
require_once 'rules.php';

$user = getLoggedUser();

$headerClass = 'header';
if ($user) {
    if ($user['type'] === 'admin') {
        $headerClass .= ' header_adm';
    } elseif ($user['type'] === 'moderator') {
        $headerClass .= ' header_mod';
    }
}

$loginError = $_SESSION['login_error'] ?? null;
unset($_SESSION['login_error']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Credenciais</title>
</head>
<body>

<!-- CONTEÚDO DO CABEÇALHO -->
    <div class="<?php echo $headerClass; ?>">

        <h1>Header</h1>

        <nav>
            <?php if ($user): ?>
                <span>Olá, <?php echo htmlspecialchars($user['name']); ?> (<?php echo htmlspecialchars($user['type']); ?>)</span>
                <a href="logout.php">Sair</a>
            <?php else: ?>
                <form action="login.php" method="POST">
                    <label for="username">Usuário:</label>
                    <input type="text" id="username" name="username" required>
                    <label for="password">Senha:</label>
                    <input type="password" id="password" name="password" required>

                    <button type="submit">Entrar</button>
                </form>
                <?php if ($loginError): ?>
                    <span style="color: red;"><?php echo htmlspecialchars($loginError); ?></span>
                <?php endif; ?>
            <?php endif; ?>
        </nav>

    </div>

<!-- CONTEÚDO DO MIOLO -->
    <div class="container">

      <!-- <div class="sidebar">Menu da sidebar</div> -->
      <div class="content">
        <?php if ($user): ?>
            <h1>Bem-vindo, <?php echo htmlspecialchars($user['name']); ?>!</h1>
        <?php else: ?>
            <h1>Conteúdo do miolo</h1>
        <?php endif; ?>
      </div>

    </div>
</body>
</html>
