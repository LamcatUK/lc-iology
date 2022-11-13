<?php
/*
   Template Name: Custom Login Page
*/

get_header();

if ( ! is_user_logged_in() ) {
    $args = array (
        'redirect' => admin_url(), // redirect to admin dashboard.
        'form_id' => 'custom_loginform',
        'label_username' => __( 'Username:' ),
        'label_password' => __( 'Password:' ),
        'label_remember' => __( 'Remember Me' ),
        'label_log_in' => __( 'Login' ),
        'remember' => false,
        'echo' => false
    );
    ?>
<main>
    <section class="login py-5">
        <div class="container-xl">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <h1>Trade Login</h1>
                    <div class="mb-4">This area is for registered users.</div>
                    <a href="/register/" class="btn btn-primary me-3 mb-4">Register</a>
                    <button onclick="history.back()" class="btn btn-secondary mb-4">Back</button>
                </div>
                <div class="col-md-4">
                    <div class="login__form">
                        <?php
                        $state = $_GET['login'];
                        if ($state == 'failed') {
                            echo '<div class="alert alert-danger">Invalid Username or Password</div>';
                        }
                        ?>
                        <form name="custom_loginform" id="custom_loginform" action="/wp-login.php" method="post">
                            <label class="form-label" for="user_login">Username:</label>
                            <input type="text" name="log" id="user_login" autocomplete="username" class="form-control" value="" size="20" required>
                            <label class="form-label" for="user_pass">Password:</label>
                            <input type="password" name="pwd" id="user_pass" autocomplete="current-password" class="form-control mb-4" value="" size="20" required>
                            <input type="submit" name="wp-submit" id="wp-submit" class="btn btn-primary" value="Login">
                            <input type="hidden" name="redirect_to" value="/stock/">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
    <?php
}

get_footer();