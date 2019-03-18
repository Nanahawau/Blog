<?php
include '../logic/autoload.php';

$page_title = "Login";
include '../layouts/header.php';
?>
<main class="d-flex align-items-center">
    <div class="container">
        <div class="d-flex justify-content-center">
            <div class="login-form card">
                <div class="card-header">
                    <h5 class="card-title">Login Form</h5>

                    <?php if(isset($errors['login'])): ?>
                        <small class="form-text text-danger">
                            <?= $errors['login']; ?>
                        </small>
                    <?php endif; ?>

                <form method="post" action="/logic/loginprocess.php">
                    <div class="form-group">
                        <label for="email">Email address:</label>
                        <input type="email" class="form-control" name="email" id="email" value="<?= old('email') ?>">

                        <?php if(isset($errors['email'])): ?>
                        <small class="form-text text-danger">
                            <?= $errors['email']; ?>
                        </small>
                        <?php endif; ?>
                    </div>

                    <div class="form-group">
                        <label for="pwd">Password: </label>
                        <input type="password" class="form-control" name="password" id="pwd">

                        <?php if(isset($errors['password'])): ?>
                            <small class="form-text text-danger">
                                <?= $errors['password']; ?>
                            </small>
                        <?php endif; ?>
                    </div>
                    <div class="form-group form-check">
                        <label class="form-check-label">
                            <input class="form-check-input" type="checkbox"> Remember me
                        </label>
                    </div>
                    <button type="submit" class="btn btn-outline-primary">Submit</button>
                    <p class="p-4">Haven't signed up yet? <a href="signup.php">Signup</a></p>
                </form>
                </div>

            </div>
        </div>
    </div>
</main>
<?php
include '../layouts/footer.php';

include '../logic/unset_sessions.php';
?>

