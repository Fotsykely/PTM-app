<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Page</title>
</head>

<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2>Login</h2>
            </div>
            <div class="card-body">
                <?php if(session()->getFlashdata('msg')):?>
                <div class="alert alert-warning text-center">
                   <?= session()->getFlashdata('msg') ?>
                </div>
                <?php endif;?>
                <form action="<?php echo base_url(); ?>/LoginController/login" method="post">
                    <div class="form-group mb-3">
                        <input type="email" name="email" placeholder="Email" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <input type="password" name="password" placeholder="Password" class="form-control">
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-dark">Submit</button>
                    </div>
                    <a href="<?= site_url('/signin') ?>" class="d-block text-center mt-3">Don't have an account? Sign up here</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>