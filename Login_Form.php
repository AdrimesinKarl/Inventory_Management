<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f8f9fa;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
        .login-container {
            width: 100%;
            max-width: 400px;
            background: #ffffff;
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
        }
    </style>
</head>

<body>

<div class="login-container">
    <h3 class="text-center mb-4">Login</h3>
    <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" autocomplete="off">
        <!-- Username Field -->
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input
                type="text"
                class="form-control <?= !empty($usernameErr) ? 'is-invalid' : ''; ?>"
                id="username"
                name="username"
                value="<?= htmlspecialchars($username ?? '') ?>"
                required
            >
            <div class="invalid-feedback">
                <?= $usernameErr ?>
            </div>
        </div>


        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input
                type="password"
                class="form-control <?= !empty($passwordErr) ? 'is-invalid' : ''; ?>"
                id="password"
                name="password"
                required
            >
            <div class="invalid-feedback">
                <?= $passwordErr ?>
            </div>
        </div>
        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" name="remember" id="remember" <?= isset($_COOKIE["remember_username"]) ? "checked" : "" ?>>
            <label class="form-check-label" for="remember">Remember Me</label>
        </div>


        <div class="d-grid">
            <button type="submit" class="btn btn-primary">Login</button>
        </div>
    </form>
</div>

</body>
</html>
