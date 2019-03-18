<?php
include '../logic/autoload.php';
$page_title = "Sign Up";
include '../layouts/header.php';
?>
<main class="d-flex align-items-center">
<div class="container">
    <div class="d-flex justify-content-center">
        <div class="login-form card">
            <div class="card-header">
                <h5 class="card-title">Signup Form</h5>
                <?php if(isset($errors['signup'])): ?>
<small class="form-text text-danger">
    <?= $errors['signup']; ?>
</small>
<?php endif; ?>
                <form method="post" action="../logic/formprocessing.php">
                    <div class="form-group">
                        <label for="fullname">Fullname:</label>
                        <input type="text" class="form-control" id="fullname" name="fullname" value="<?php old('fullname') ?>">
                        <?php if(isset($errors['fullname'])): ?>
                            <small class="form-text text-danger">
                                <?= $errors['fullname']; ?>
                            </small>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <label for="email">Email address:</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?php old('email') ?>">
                        <?php if(isset($errors['email'])): ?>
                            <small class="form-text text-danger">
                                <?= $errors['email']; ?>
                            </small>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <label for="pwd">Password:</label>
                        <input type="password" class="form-control" id="pwd" name="password">
                        <?php if (isset($errors['password'])): ?>
                        <small class="form-text text-danger">
                            <?= $errors['password']?>
                        </small>
                        <?php endif; ?>
                    </div>
                    <div class="form-group form-check">
                        <label class="form-check-label">
                            <input class="form-check-input" type="checkbox"> Remember me
                        </label>
                    </div>
                    <button type="submit" class="btn btn-outline-primary">Submit</button>
                    <p class="p-4">Already have an account? <a href="login.php">Login</a></p>
                </form>
            </div>

        </div>
    </div>
</div>
</main>
<?php include '../layouts/footer.php';?>
<?php include '../logic/unset_sessions.php'; ?>
