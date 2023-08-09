<div class="wrapper-page">

    <div class="text-center" style="background: rgba(222,222,222,.1);">
        <!--<a href="http://coderthemes.com/minton/dark-dark/index.html" class="logo-lg"><i class="mdi mdi-radar"></i> <span>Unified-BI</span> </a>-->
        <img src="<?= ($SESSION['org_logo']) ?>" height="200px"> 
    </div>

    <form class="form-horizontal m-t-20" action="./login" method="post">

        <div class="form-group row">
            <div class="col-12">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="mdi mdi-account"></i></span>
                    </div>
                    <input class="form-control" type="text" required="" placeholder="User Email" autocomplete="off" name="email">
                </div>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-12">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="mdi mdi-key"></i></span>
                    </div>
                    <input class="form-control" type="password" required="" placeholder="Password" autocomplete="off" name="password">
                </div>
            </div>
        </div>

        <!--<div class="form-group row">-->
        <!--    <div class="col-12">-->
        <!--        <div class="checkbox checkbox-primary">-->
        <!--            <input id="checkbox-signup" type="checkbox">-->
        <!--            <label for="checkbox-signup">-->
        <!--                Remember me-->
        <!--            </label>-->
        <!--        </div>-->

        <!--    </div>-->
        <!--</div>-->

        <div class="form-group text-right m-t-20">
            <div class="col-xs-12">
                <button class="btn btn-primary btn-custom w-md waves-effect waves-light" type="submit">Log In
                </button>
            </div>
        </div>

        <div class="form-group row m-t-30">
            <!--<div class="col-sm-7">-->
            <!--    <a href="./forgot_password" class="text-muted"><i class="fa fa-lock m-r-5"></i> Forgot your-->
            <!--        password?</a>-->
            <!--</div>-->
            <!--div class="col-sm-5 text-right">
                <a href="http://coderthemes.com/minton/dark-dark/pages-register.html" class="text-muted">Create an account</a>
            </div-->
        </div>
    </form>
</div>