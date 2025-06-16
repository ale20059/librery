<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión | Biblioteca</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(to right, #74ebd5, #acb6e5);
            font-family: 'Segoe UI', sans-serif;
        }
        .login-card {
            background: white;
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
        }
        .login-card h4 {
            font-weight: 600;
            color: #333;
        }
        .btn-primary {
            background-color: #4a90e2;
            border: none;
        }
        .btn-primary:hover {
            background-color: #357ab8;
        }
    </style>
</head>
<body>

    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="login-card w-100" style="max-width: 400px;">
            <h4 class="text-center mb-4">🔐 Iniciar Sesión</h4>

            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <form method="POST" action="{{ route('login.custom') }}">
                @csrf

                <div class="mb-3">
                    <label for="email" class="form-label">📧 Correo</label>
                    <input type="email" class="form-control" name="email" required autofocus>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">🔒 Contraseña</label>
                    <input type="password" class="form-control" name="password" required>
                </div>

                <button type="submit" class="btn btn-primary w-100 mt-2">Entrar</button>
            </form>
        </div>
    </div>

</body>
</html>
