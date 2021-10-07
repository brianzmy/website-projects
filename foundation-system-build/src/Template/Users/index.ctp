<?php
/**
 * @var \App\View\AppView $this
 */


?>


<html>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- Login Register area Start-->
    <div class="login-background"> </div>
    <div class="login-content">
        <!-- Login -->
        <div class="nk-block toggled" id="l-login">
            <div class="nk-form">
            <p><?php echo $this->Html->image('tprojects_logo.png')?></p>
            Welcome to the T Projects artists database, a bespoke database designed to accommodate our growing artists files.
                        </p>
                        This database has been created to allow us to store artist’s contact details, artist’s representation details, galleries etc, artist’s statement, exhibiting and commissioning details and a selection of images to reflect current practice. Our artist files are managed and curated by the T Projects international team of consultants. Artists are added strictly by invitation only. Invited artists are responsible for their own content stored in this database.
                        </p>
                        Information for participating artists - When creating your artist file, you are able to submit the information and images that you feel is most representative of your current practice. All images copyright remains with the artist. This database is strictly for the use of T Projects only. Images and information may be presented by T Projects to clients for consideration for commissioning projects. Third parties can not access this database.
                        </p>
                        This bespoke artists database has been created in partnership with Monash University.
                        </p>
                        For further information please contact <a href="http://www.tprojects.co">T Projects</a>.






            </div>
            <div class="nk-navigation nk-lg-ic rg-ic-stl">
                <a href="" data-ma-action="nk-login-switch" data-ma-block="#l-forget-password"><i class="notika-icon notika-right-arrow"></i> <span><?= $this->Html->link('Add Artists', ['controller' => 'users', 'action' => 'add']) ?></span></a>
            </div>
        </div>



        <!-- Register -->
        <div class="nk-block" id="l-register">
            <div class="nk-form">
                <div class="input-group">
                    <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-support"></i></span>
                    <div class="nk-int-st">
                        <input type="text" class="form-control" placeholder="Username">
                    </div>
                </div>

                <div class="input-group mg-t-15">
                    <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-mail"></i></span>
                    <div class="nk-int-st">
                        <input type="text" class="form-control" placeholder="Email Address">
                    </div>
                </div>

                <div class="input-group mg-t-15">
                    <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-edit"></i></span>
                    <div class="nk-int-st">
                        <input type="password" class="form-control" placeholder="Password">
                    </div>
                </div>

                <a href="#l-login" data-ma-action="nk-login-switch" data-ma-block="#l-login" class="btn btn-login btn-success btn-float"><i class="notika-icon notika-right-arrow"></i></a>
            </div>

            <div class="nk-navigation rg-ic-stl">
                <a href="#" data-ma-action="nk-login-switch" data-ma-block="#l-login"><i class="notika-icon notika-right-arrow"></i> <span>Sign in</span></a>
                <a href="" data-ma-action="nk-login-switch" data-ma-block="#l-forget-password"><i>?</i> <span>Forgot Password</span></a>
            </div>
        </div>

    <!-- Login Register area End-->

</body>
</html>

