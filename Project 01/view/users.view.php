<?php
include_once "layouts/header.view.php"
?>
<section>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="row">
                <div class="col-lg-12">
                    <?php if(isset($_SESSION['success'])){ ?>
                        <div class="alert alert-success"><?=$_SESSION['success']?></div>
                    <?php } ?>
                    <?php if(isset($_SESSION['error'])){ ?>
                        <div class="alert alert-danger"><?=$_SESSION['error']?></div>
                    <?php } ?>
                    <div class="card">
                        <div class="card-header">
                            <h3>All Users</h3>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr class="table-dark">
                                        <th scope="col">SL</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <?php foreach($users as $key=> $user){ ?>
                                <tbody>
                                    <tr>
                                        <td><?=$key+1?></td>
                                        <td>
                                            <img src="uploads/<?=$user['photo']?>" width="80" alt="">
                                        </td>
                                        <td><?=$user['name']?></td>
                                        <td><?=$user['email']?></td>
                                        <td>
                                            <span class="badge <?=$user['status'] == 1 ? 'bg-success' : 'bg-warning'?>">
                                                <?=$user['status'] == 1 ? 'Active' : 'Deactive'?>
                                            </span>
                                        </td>
                                        <td>
                                            <a href="singleuser.php?id=<?=$user['id']?>" class="btn btn-info btn-sm">View</a>
                                            <a href="edit.php?id=<?=$user['id']?>" class="btn btn-primary btn-sm">Edit</a>
                                            <a href="delete.php?id=<?=$user['id']?>" class="btn btn-danger btn-sm">Delete</a>

                                            <a href="status.php?id=<?=$user['id']?>" class="btn btn-sm <?=$user['status'] == 1 ? 'bg-warning' : 'bg-success'?>">
                                                <?=$user['status'] == 1 ? 'Deactive' : 'Active'?>
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                                <?php } ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
include_once "layouts/footer.view.php";

unset($_SESSION['success']);
unset($_SESSION['error']);
?>