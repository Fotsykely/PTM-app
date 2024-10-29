<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Page</title>
    <link rel="stylesheet" href="/css/entry.css">
</head>

<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2>Login Here</h2>
            </div>
            <div class="card-body">
                <?php if(session()->getFlashdata('msg')):?>
                <div class="alert">
                   <?= session()->getFlashdata('msg') ?>
                </div>
                <?php endif;?>
                <form action="<?php echo base_url(); ?>/LoginController/login" method="post">
                    <div class="form-group">
                        <input type="email" name="email" placeholder="Email" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" placeholder="Password" class="form-control">
                    </div>
                    
                    <button type="submit" class="btn">Log In</button>
                    
                    <div class="form-other">
                        <a href="<?= site_url('/signin') ?>" class="register-link">Don't have an account? Sign up here</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
