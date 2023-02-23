<?php
include "layouts/header.view.php";
?>

<section>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <?php if(isset($message)){ ?>
                    <div class="alert <?=$message_type == 'success'? 'alert-success' : 'alert-danger' ?>"><?=$message?></div>
                <?php } ?>
                <div class="card">
                    <div class="card-header">
                        <h2>Update your Account</h2>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="mt-2">
                                <input type="text" name="name" value="<?=$user['name']?>" class="form-control" placeholder="Name">
                                <?php
                                    if(isset($errors['nameError'])){ ?>
                                        <div class="text-danger"><?=$errors['nameError']?></div>
                                <?php } ?>
                            </div>
                            <div class="mt-2">
                                <input type="email" name="email" value="<?=$user['email']?>" class="form-control" placeholder="Email">
                                <?php
                                    if(isset($errors['emailError'])){ ?>
                                        <div class="text-danger"><?=$errors['emailError']?></div>
                                <?php } ?>
                            </div>
                            <div class="mt-2">
                                <input type="file" name="photo" class="form-control">
                                <?php
                                    if(isset($errors['photoError'])){ ?>
                                        <div class="text-danger"><?=$errors['photoError']?></div>
                                <?php } ?>
                                <div class="mt-2">
                                    <img src="uploads/<?=$user['photo']?>" width="80" alt="">
                                </div>
                            </div>
                            <div class="mt-2">
                                <button type="submit" name="submit" class="btn btn-primary">Update</button>
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
?>