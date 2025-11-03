<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MiniCars - Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    body {
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      font-family: 'Poppins', sans-serif;
    }

    .icon-login {
        font-size: 3rem;

    }

    .login-card {
      background: #fff;
      border-radius: 15px;
      box-shadow: 0 5px 25px rgba(0,0,0,0.2);
      width: 380px;
      padding: 30px;
      text-align: center;
      transition: transform 0.2s ease-in-out;
    }
    .login-card:hover {
      transform: scale(1.02);
    }
    .login-card img {
      width: 90px;
      margin-bottom: 15px;
    }

    .form-control {
      border-radius: 10px;
      padding: 12px;
    }

    .btn-primary {
      background-color: #0d6efd;
      border: none;
      border-radius: 10px;
      padding: 12px;
      font-weight: 500;
      letter-spacing: 0.5px;
    }

    .btn-primary:hover {
      background-color: #0b5ed7;
    }
    .link {
      display: block;
      margin-top: 10px;
      color: #0d6efd;
      text-decoration: none;
      font-size: 0.9rem;
    }
    
    .link:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body class="container bg-danger bg-gradient">

  <div class="login-card">
    <i class="bi bi-car-front-fill text-secondary icon-login"></i>
    <h3 class="fw-bold mb-3">AcceleRods - Login</h3>

    <form>
      <div class="mb-3 text-start">
        <label for="email" class="form-label"><i class="bi bi-envelope"></i> E-mail</label>
        <input type="email" class="form-control" id="email" placeholder="Digite seu e-mail" required>
      </div>

      <div class="mb-3 text-start">
        <label for="password" class="form-label"><i class="bi bi-lock"></i> Senha</label>
        <input type="password" class="form-control" id="password" placeholder="Digite sua senha" required>
      </div>

      <button type="submit" class="btn btn-secondary w-100 mt-2">Entrar</button>

      <a href="#" class="link">Esqueceu a senha?</a>
      <a href="#" class="link">Criar conta</a>
    </form>
  </div>

</body>
</html>
