<?php
/**
 * @var \App\View\AppView $this
 */
?>
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
            <?= $this->Flash->render() ?>
            <?= $this->Form->create() ?>
                <div class="input-group">
                    <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-support"></i></span>
                    <div class="nk-int-st">
                        <?= $this->Form->control('username', [
                        'class' => 'form-control',
                        'label' => false,
                        'placeholder' => 'Username'
                        ])?>
                    </div>
                </div>
                <div class="input-group mg-t-15">
                    <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-edit"></i></span>
                    <div class="nk-int-st">
                        <?= $this->Form->control('password', [
                            'class' => 'form-control',
                            'label' => false,
                            'placeholder' => 'Password'
                        ])?>
                    </div>
                </div>
                </br>
                <button type="login" class="btn btn-success notika-btn-success waves-effect">Login</button>

                <button class="btn btn-warning notika-btn-warning waves-effect">
                    <?= $this->Html->link('Forgot Password',
                        ['controller' => 'Users', 'action' => 'forgotpass']
                    );?>
                </button>
                <?= $this->Form->end() ?>
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
                <a href="#" data-ma-action="nk-login-switch" data-ma-block="#l-login"><i class="notika-icon notika-right-arrow"></i><span>Sign in</span></a>
                <a href="" data-ma-action="nk-login-switch" data-ma-block="#l-forget-password"><i>?</i> <span>Forgot Password</span></a>
            </div>
        </div>


    <!-- Login Register area End-->

</body>