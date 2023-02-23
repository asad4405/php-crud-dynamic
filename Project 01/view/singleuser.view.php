<?php
include "layouts/header.view.php"
?>
<section>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card">
                    <div class="card-header">
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <td width="15%">Image</td>
                                <td width="5%">:</td>
                                <td>
                                    <img src="uploads/<?=$user['photo']?>" width="250" alt="">
                                </td>
                            </tr>
                            <tr>
                                <td width="15%">Id Number</td>
                                <td width="5%">:</td>
                                <td><?='#'.$user['id']?></td>
                            </tr>
                            <tr>
                                <td width="15%">Name</td>
                                <td width="5%">:</td>
                                <td><?=$user['name']?></td>
                            </tr>
                            <tr>
                                <td width="15%">Email</td>
                                <td width="5%">:</td>
                                <td><?=$user['email']?></td>
                            </tr>
                            <tr>
                                <td width="15%">Status</td>
                                <td width="5%">:</td>
                                <td><?=$user['status']?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
include "layouts/footer.view.php"
?>