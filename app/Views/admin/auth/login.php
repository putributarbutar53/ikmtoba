<!DOCTYPE html>
<html lang="en-US" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>

    <!-- Custom Styles -->
    <style>
        /* Reset default margin and padding */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Fullscreen background with gradient animation */
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(-45deg, #1b998b, #f3a712, #e84855, #5bc0eb);
            background-size: 400% 400%;
            animation: gradientAnimation 15s ease infinite;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #fff;
        }

        /* Gradient animation */
        @keyframes gradientAnimation {
            0% {
                background-position: 0% 50%;
            }
            50% {
                background-position: 100% 50%;
            }
            100% {
                background-position: 0% 50%;
            }
        }

        /* Login card container */
        .login-card {
            background: rgba(255, 255, 255, 0.1); /* Glass effect */
            backdrop-filter: blur(20px);
            border-radius: 15px;
            padding: 40px;
            width: 100%;
            max-width: 400px;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.3);
            text-align: center;
            transition: transform 0.3s ease;
        }

        .login-card:hover {
            transform: translateY(-10px);
        }

        /* Logo styling */
        .logo {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin-bottom: 20px;
            border: 2px solid #fff;
            padding: 5px;
            object-fit: cover;
        }

        /* Form heading */
        h5 {
            font-size: 18px;
            font-weight: bold;
            color: #fff;
            margin-bottom: 25px;
            letter-spacing: 1px;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.5);
        }

        /* Form input fields */
        .form-control {
            border-radius: 30px;
            padding: 15px;
            font-size: 14px;
            border: 1px solid rgba(255, 255, 255, 0.3);
            background: rgba(255, 255, 255, 0.2);
            color: #fff;
            margin-bottom: 20px;
            width: 100%;
            outline: none;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            background: rgba(255, 255, 255, 0.4);
            border-color: #fff;
        }

        /* Submit button */
        .btn-primary {
            background: linear-gradient(135deg, #4caf50, #2e7d32);
            color: white;
            font-weight: bold;
            border-radius: 30px;
            padding: 15px;
            font-size: 14px;
            width: 100%;
            border: none;
            cursor: pointer;
            transition: background 0.3s ease, transform 0.3s ease;
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, #2e7d32, #1b5e20);
            transform: translateY(-3px);
        }

        /* Link styling */
        .register-link {
            font-size: 14px;
            margin-top: 20px;
            color: #fff;
            text-decoration: none;
            display: inline-block;
            transition: color 0.3s ease;
        }

        .register-link:hover {
            color: #ffc107;
        }

        /* Footer text */
        .footer {
            font-size: 12px;
            color: rgba(255, 255, 255, 0.6);
            margin-top: 20px;
            text-align: center;
        }
    </style>
</head>

<body>
    <!-- Login Content -->
    <div class="login-card">
        <!-- Logo -->
        <img class="logo" src="<?= base_url() ?>assets/img/logo.png" alt="Logo">
        <h5>SKP<br>SURVEY KEPUASAN PELAYANAN DINAS KABUPATEN TOBA</h5>
        <form method="POST" action="<?= site_url('admin2045/login') ?>">
        <div class="form-group">
            <input class="form-control" type="text" name="username" placeholder="Username" required>
            <input class="form-control" type="password" name="password" placeholder="Password" required>
            <button class="btn-primary" type="submit">Log in</button>
        </form>
        <a href="#" class="register-link">Create an Account</a>
        <div class="footer">© 2024 Kabupaten Toba.</div>
    </div>
</body>

</html>
