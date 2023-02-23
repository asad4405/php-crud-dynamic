<?php
include "layouts/header.view.php";
?>

<section>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <?php if(isset($message)){ ?>
                    <div class="alert <?=$message_type == 'success'? 'alert-success' : 'alert-danger' ?>"><?=$message?></div>
                <?php } ?>
                <?php if(isset($_SESSION['error'])){ ?>
                        <div class="alert alert-danger"><?=$_SESSION['error']?></div>
                    <?php } ?>
                <div class="card">
                    <div class="card-header">
                        <h2>Login your Account</h2>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="mt-2">
                                <input type="email" name="email" class="form-control" placeholder="Email">
                                <?php
                                    if(isset($errors['emailError'])){ ?>
                                        <div class="text-danger"><?=$errors['emailError']?></div>
                                <?php } ?>
                            </div>
                            <div class="mt-2">
                                <input type="password" name="password" class="form-control" placeholder="Password">
                                <?php
                                    if(isset($errors['passError'])){ ?>
                                        <div class="text-danger"><?=$errors['passError']?></div>
                                <?php } ?>
                            </div>
                            <div class="mt-2">
                                <button type="submit" name="submit" class="btn btn-primary">Log In</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
include "layouts/footer.view.php";

unset($_SESSION['success']);
unset($_SESSION['error']);
?>