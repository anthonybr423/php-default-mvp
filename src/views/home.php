<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Framework</title>
    <?php script('https://unpkg.com/@phosphor-icons/web'); ?>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: #0d1117;
            color: #c9d1d9;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .container {
            text-align: center;
            padding: 40px;
        }

        .logo {
            width: 120px;
            height: 120px;
            margin-bottom: 24px;
        }

        h1 {
            font-size: 28px;
            font-weight: 600;
            color: #f0f6fc;
            margin-bottom: 8px;
        }

        p {
            font-size: 16px;
            color: #8b949e;
            margin-bottom: 32px;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 20px;
            border-radius: 6px;
            font-size: 14px;
            font-weight: 500;
            text-decoration: none;
            border: 1px solid;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .btn-primary {
            background: #2f81f7;
            color: #fff;
            border-color: #2f81f7;
        }

        .btn-primary:hover {
            background: #388bfd;
            border-color: #388bfd;
        }

        .btn-secondary {
            background: transparent;
            color: #f0f6fc;
            border-color: #30363d;
            margin-left: 8px;
        }

        .btn-secondary:hover {
            background: #21262d;
            border-color: #8b949e;
        }

        .version {
            margin-top: 24px;
            font-size: 12px;
            color: #484f58;
        }
    </style>
<base target="_blank">
</head>
<body>
    <div class="container">
        <img src="https://www.php.net/images/logos/new-php-logo.svg" alt="PHP" class="logo">
        <h1>PHP Framework</h1>
        <p>Moderno, elegante e poderoso.</p>
        
        <div>
            <a href="#" class="btn btn-primary">
                <i class="ph ph-rocket"></i>
                Get Started
            </a>
            <a href="#" class="btn btn-secondary">
                <i class="ph ph-github-logo"></i>
                GitHub
            </a>
        </div>
        
        <div class="version">v1.0.0</div>
    </div>
</body>
</html>