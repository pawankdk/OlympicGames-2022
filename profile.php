<?php
require_once 'assets/php/header.php';
?>


<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card rounded-0 mt-3 border-primary">
                <div class="card-header border-primary">
                    <ul class="nav nav-tabs card-header-tabs">
                        <li class="nav-item">
                            <a href="#profile" class="nav-link active font-weight-bol" data-toggle="tab">Profile</a>
                        </li>

                        <li class="nav-item">
                            <a href="#editProfile" class="nav-link font-weight-bol" data-toggle="tab">Edit Profile</a>
                        </li>

                        <li class="nav-item">
                            <a href="#changePass" class="nav-link font-weight-bol" data-toggle="tab">Change Password</a>
                        </li>
                    </ul>
                </div>

                <div class="card-body">
                    <div class="tab-content">
                        <!-- profile tab content start -->
                        <div class="tab-pane container active" id="profile">
                            <div id="verifyEmailAlert"></div>
                            <div class="card-deck">
                                <div class="card border-primary">
                                    <div class="card-header bg-primary text-light text-center lead">
                                        Unique Id : <?= $cid; ?>
                                    </div>
                                    <div class="card-body">
                                        <p class="card-text p-2 m-1 rounded" style="border: 1px solid #0275d8;"><b>Name : </b><?= $cname; ?></p>

                                        <p class="card-text p-2 m-1 rounded" style="border: 1px solid #0275d8;"><b>Email : </b><?= $cemail; ?></p>

                                        <p class="card-text p-2 m-1 rounded" style="border: 1px solid #0275d8;"><b>Gender : </b><?= $cgender; ?></p>

                                        <p class="card-text p-2 m-1 rounded" style="border: 1px solid #0275d8;"><b>Date of Birth : </b><?= $cdob; ?></p>

                                        <p class="card-text p-2 m-1 rounded" style="border: 1px solid #0275d8;"><b>Phone : </b><?= $cphone; ?></p>

                                        <p class="card-text p-2 m-1 rounded" style="border: 1px solid #0275d8;"><b>Registered On : </b><?= $reg_on; ?></p>

                                        <p class="card-text p-2 m-1 rounded" style="border: 1px solid #0275d8;"><b>Email Verified : </b><?= $verified; ?>
                                            <?php if ($verified == 'Not Verified!') : ?>
                                                <a href="#" id="verify-email" class="float-right">Verify Now</a>
                                            <?php endif; ?>
                                        </p>
                                        <br>
                                        <div class="form-group">
                                            <input type="submit" name="resetpass" value="Request Reset Password" class="btn btn-danger btn-block btn-lg" id="resetbtn">
                                        </div>
                                        <div class="clearfix"></div>

                                    </div>
                                </div>
                                <div class="card border-primary align-self-center">
                                    <?php if (!$cphoto) : ?>
                                        <img src="assets/images/profile.jpg" class="img-thumbnail img-fluid" width="408px">
                                    <?php else : ?>
                                        <img src="<?= 'assets/php/' . $cphoto; ?>" class="img-thumbnail img-fluid" width="408px">
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <!-- profile tab content end -->

                        <!-- edit profile tab content start -->
                        <div class="tab-pane container fade" id="editProfile">
                            <div class="card-deck">
                                <div class="card border-danger align-self-center">
                                    <?php if (!$cphoto) : ?>
                                        <img src="assets/images/profile.jpg" class="img-thumbnail img-fluid" width="408px">
                                    <?php else : ?>
                                        <img src="<?= 'assets/php/' . $cphoto; ?>" class="img-thumbnail img-fluid" width="408px">
                                    <?php endif; ?>
                                </div>

                                <div class="card border-danger">
                                    <form action="" class="px-3 mt-2" method="post" enctype="multipart/form-data" id="profile-update-form">
                                        <input type="hidden" name="oldimage" value="<?= $cphoto; ?>" class="">
                                        <div class="form-group m-0">
                                            <label for="profilePhoto" class="m-1">Upload Profile Image</label>
                                            <input type="file" name="image" id="profilePhoto">
                                        </div>

                                        <div class="form-group m-0">
                                            <label for="name" class="m-1">Name</label>
                                            <input type="text" name="name" id="name" class="form-control" style="color: #ffffff;" value="<?= $cname; ?>">
                                        </div>

                                        <div class="form-group m-0">
                                            <label for="name" class="m-1">Gender</label>
                                            <select name="gender" id="gender" class="form-control" style="color: #ffffff;">
                                                <option value="" disabled <?php if ($cgender == null) {
                                                                                echo 'selected';
                                                                            } ?>>Select</option>
                                                <option value="Male" <?php if ($cgender == 'Male') {
                                                                            echo 'selected';
                                                                        } ?>>Male</option>
                                                <option value="Female" <?php if ($cgender == 'Female') {
                                                                            echo 'selected';
                                                                        } ?>>Female</option>
                                            </select>
                                        </div>

                                        <div class="form-group m-0">
                                            <label for="dob" class="m-1">Date of Birth</label>
                                            <input type="date" id="dob" name="dob" value="<?= $cdob; ?>" class="form-control" style="color: #ffffff;">
                                        </div>

                                        <div class="form-group m-0">
                                            <label for="name" class="m-1">Phone</label>
                                            <input type="tel" name="phone" id="phone" class="form-control" style="color: #ffffff;" value="<?= $cphone; ?>" placeholder="+977 ">
                                        </div>

                                        <div class="form-group m-2">
                                            <input type="submit" name="profile_update" value="Update Profile" class="btn btn-danger btn-block" id="profileUpdateBtn">
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- edit profile tab content end -->

                        <!-- change password tab content start -->
                        <div class="tab-pane container fade" id="changePass">
                            <div id="chnagepassAlert"></div>
                            <div class="card-deck">
                                <div class="card border-success">
                                    <div class="card-header bg-success text-white text-center lead">
                                        Change Password
                                    </div>
                                    <form action="#" method="post" class="px-3 mt-2" id="change-pass-form">
                                        <div class="form-group">
                                            <label for="curpass">Enter Your Current Password</label>
                                            <input type="password" name="curpass" placeholder="Current Password" class="form-control form-control-lg" id="curpass" required minlength="5" style="color: #ffffff;">
                                        </div>

                                        <div class="form-group">
                                            <p class="text-danger" id="changepassError"></p>
                                        </div>

                                        <div class="form-group">
                                            <label for="newpass">Enter New Password</label>
                                            <input type="password" name="newpass" placeholder="New Password" class="form-control form-control-lg" id="newpass" required minlength="5" style="color: #ffffff;">
                                        </div>

                                        <div class="form-group">
                                            <label for="cnewpass">Confirm New Password</label>
                                            <input type="password" name="cnewpass" placeholder="Confirm New Password" class="form-control form-control-lg" id="cnewpass" required minlength="5" style="color: #ffffff;">
                                        </div>

                                        <div class="form-group">
                                            <input type="submit" name="changepass" value="Change Password" class="btn btn-success btn-block btn-lg" id="changePassBtn">
                                        </div>
                                    </form>
                                </div>

                                <div class="card border-success align-self-center">
                                    <img src="assets/images/chnagepass.jpg" class="img-thumbnail img-fluid" width="408px">
                                </div>
                            </div>
                        </div>
                        <!-- change password tab content end -->

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>



<br>
<?php
require_once 'assets/php/footer.php';
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {

        //profile update ajax request
        $("#profile-update-form").submit(function(e) {
            e.preventDefault();

            $.ajax({
                url: 'assets/php/process.php',
                method: 'post',
                processData: false,
                contentType: false,
                cache: false,
                data: new FormData(this),
                success: function(response) {
                    location.reload();
                }
            });
        });

        //change password ajax request
        $("#changePassBtn").click(function(e) {
            if ($("#change-pass-form")[0].checkValidity()) {
                e.preventDefault();
                $("#changePassBtn").val('Please Wait...');

                if ($('#newpass').val() != $("#cnewpass").val()) {
                    $("#changepassError").text('* Password did not matched!');
                    $("#changePassBtn").val('Change Password');
                } else {
                    $.ajax({
                        url: 'assets/php/process.php',
                        method: 'post',
                        data: $("#change-pass-form").serialize() + '&action=change_pass',
                        success: function(response) {
                            $("#chnagepassAlert").html(response);
                            $("#changePassBtn").val('Change Password');
                            $("#changepassError").text('');
                            $("#change-pass-form")[0].reset();
                        }
                    });
                }
            }
        });


        // Verify E-mail Ajax Request
        $("#verify-email").click(function(e) {
            e.preventDefault();
            $(this).text('Please Wait...');

            $.ajax({
                url: 'assets/php/process.php',
                method: 'post',
                data: {
                    action: 'verify_email'
                },
                success: function(response) {
                    $("#verifyEmailAlert").html(response);
                    $("#verify-email").text('Verify Now');
                }
            });
        });

    });


    // back to top
    $(document).ready(function() {
        $(window).scroll(function() {
            if ($(this).scrollTop() > 50) {
                $('#back-to-top').fadeIn();
            } else {
                $('#back-to-top').fadeOut();
            }
        });
        // scroll body to 0px on click
        $('#back-to-top').click(function() {
            $('body,html').animate({
                scrollTop: 0
            }, 400);
            return false;
        });
    });

    //check notification
    checkNotification();

    function checkNotification() {
        $.ajax({
            url: 'assets/php/process.php',
            method: 'post',
            data: {
                action: 'checkNotification'
            },
            success: function(response) {
                $("#checkNotification").html(response);
            }
        });
    }


    //checking user is logged in or not
    $.ajax({
        url: 'assets/php/action.php',
        method: 'post',
        data: {
            action: 'checkUser'
        },
        success: function(response) {
            if (response === 'bye') {
                window.location = 'index.php';
            }
        }
    });
</script>

</body>

</html>