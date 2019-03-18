<?php
include '../logic/autoload.php';
include '../logic/guard/auth.php';

$page_title = "Dashboard";
include '../layouts/header.php';

?>
    <main class="align-items-center">
        <div class="container"><br>
            <p style="font-size: large">Welcome, <?= auth('fullname') ?></p>
            <br/>

            <button type="button" class="btn btn-default btn-lg bg-primary text-white float-right" data-toggle="modal"
                    data-target="#myModal">New Post
            </button>
            <div class="modal fade " id="myModal">
                <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">New Post</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                            <form method="post" action="../logic/process.php">
                            <div class="form-group">
                                <label for="title">Title</label><br>
                                <input type="text" class="form-control" id="title" name="title"
                                       value="<?= old("title") ?>">
                                <?php if (isset($errors['title'])): ?>
                                <small class ="form-text text-danger">
                                <?= $errors['title']?>
                                </small>
                                <?php endif;?>
                                <label for="body">Body</label><br>
                                <textarea class="form-control" rows="20" id="body" name="body"
                                          value="<?= old('body') ?>"></textarea>
                                <?php if (isset($errors['body'])): ?>
                                    <small class="form-text text-danger">
                                        <?= $errors['body'] ?>
                                    </small>
                                <?php endif; ?>
                                <br>
                                <button type="submit" name="submit" class="btn btn-outline-primary">Submit</button>
                            </div>
                            </form>
                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
            </div>
    </main>
<?php
include '../layouts/footer.php';

include '../logic/unset_sessions.php';
?>