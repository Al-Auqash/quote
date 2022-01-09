<section class="hold-transition login-page">
    <div class="container-sm">
        <div class="d-flex flex-column justify-content-center">
            <div class="card bg-light mb-3 mt-4 mx-auto" style="width: 48rem;">
                <div class="card-header">
                    <img src="/quote/dist/img/kingsman.png" class="card-img-top" alt="Not Found">
                </div>

                <div class="card-body login-card-body">
                    <p class="login-box-msg">Sign in to get access to incredible quotes</p>

                    <form action="index.php?include=confirm-sign-in" method="post">
                        <div class="form-group row">
                            <label class="col-md-12 control-label">Username</label>
                            <div class="col-md-12">
                                <input type="text" name="username" class="form-control" autocomplete="off" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-12 control-label">Password</label>
                            <div class="col-md-12">
                                <input type="password" name="password" class="form-control" autocomplete="off" />
                            </div>
                        </div>
                        <div class="form-group row d-flex justify-content-between">
                            <button type="submit" class="btn btn-dark mx-3 col-md-3" name="sign-in" value="sign-in">
                                Sign In
                            </button>
                            <button type="submit" class="btn btn-dark mx-3 col-md-3" name="sign-up" value="sign-up">
                                Sign Up
                            </button>
                        </div>

                        <?php if (!empty($_GET['gagal'])) { ?>
                            <?php if ($_GET['gagal'] == "userKosong") { ?>
                                <span class="text-danger">Username cannot be empty</span>
                            <?php } else if ($_GET['gagal'] == "passKosong") { ?>
                                <span class="text-danger">Password cannot be empty</span>
                            <?php } else { ?>
                                <span class="text-danger">Wrong Username or Password, please try again!</span>
                            <?php } ?>
                        <?php } ?>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php include("includes/script.php") ?>
</section>