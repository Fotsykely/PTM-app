<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register Page</title>
    <link rel="stylesheet" href="/css/entry.css">
</head>

<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2>Register Here</h2>
            </div>
            <div class="card-body">
                <?php if(isset($validation)): ?>
                <div class="alert">
                   <?= $validation->listErrors() ?>
                </div>
                <?php endif; ?>
                <form action="<?php echo base_url(); ?>/SigninController/store" method="post" class="form-signin">
                    <div class="form-group">
                        <input type="text" name="username" placeholder="Username" value="<?= set_value('username') ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" placeholder="Email" value="<?= set_value('email') ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" placeholder="Password" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="password" name="confirmpassword" placeholder="Confirm Password" class="form-control">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn">Register</button>
                    </div>
                </form>
                <div class="social-login">
                    <a href="http://gmail.com" class="btn-social google">G Google</a>
                    <a href="http://facebook.com" class="btn-social facebook">f Facebook</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>