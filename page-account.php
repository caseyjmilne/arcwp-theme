<?php
/**
 * Template Name: Account Page
 */

get_header(); ?>

<main class="min-h-screen">

    <section class="py-24 lg:py-32">
        <div class="max-w-[500px] mx-auto px-4">

            <?php if (is_user_logged_in()) : ?>
                <!-- Logged In State -->
                <div class="text-center">
                    <h1 class="text-4xl lg:text-5xl font-black text-slate-900 dark:text-slate-50 mb-6">
                        Welcome Back!
                    </h1>
                    <p class="text-lg text-slate-900 dark:text-slate-50 mb-8">
                        You are logged in as <strong><?php echo wp_get_current_user()->user_login; ?></strong>
                    </p>
                    <a href="<?php echo wp_logout_url(home_url()); ?>" class="inline-flex items-center justify-center border-2 border-slate-900 dark:border-slate-50 text-slate-900 dark:text-slate-50 px-8 py-4 rounded-md text-sm font-medium hover:bg-slate-900 dark:hover:bg-slate-50 hover:text-slate-50 dark:hover:text-slate-900 transition-colors">
                        Log Out
                    </a>
                </div>

            <?php else : ?>
                <!-- Login Form -->
                <div class="border-2 border-slate-900 dark:border-slate-50 rounded-xl p-8 lg:p-12">
                    <h1 class="text-3xl lg:text-4xl font-black text-slate-900 dark:text-slate-50 mb-2 text-center">
                        Account Login
                    </h1>
                    <p class="text-base text-slate-900 dark:text-slate-50 mb-8 text-center">
                        Sign in to access your account
                    </p>

                    <?php
                    // Display error messages
                    if (isset($_GET['login'])) :
                        $error_message = '';
                        switch ($_GET['login']) {
                            case 'failed':
                                $error_message = 'Invalid username or password. Please try again.';
                                break;
                            case 'empty':
                                $error_message = 'Please enter both username and password.';
                                break;
                        }
                        if ($error_message) :
                    ?>
                        <div class="mb-6 p-4 border-2 border-orange-600 rounded-md">
                            <p class="text-sm text-slate-900 dark:text-slate-50 text-center font-medium">
                                ⚠️ <?php echo esc_html($error_message); ?>
                            </p>
                        </div>
                    <?php
                        endif;
                    endif;
                    ?>

                    <?php
                    // Configure login form
                    $args = array(
                        'echo' => true,
                        'redirect' => site_url('/dashboard/'),
                        'form_id' => 'loginform',
                        'label_username' => __('Username or Email'),
                        'label_password' => __('Password'),
                        'label_remember' => __('Remember Me'),
                        'label_log_in' => __('Log In'),
                        'id_username' => 'user_login',
                        'id_password' => 'user_pass',
                        'id_remember' => 'rememberme',
                        'id_submit' => 'wp-submit',
                        'remember' => true,
                        'value_username' => '',
                        'value_remember' => false
                    );
                    ?>

                    <style>
                        #loginform {
                            display: flex;
                            flex-direction: column;
                            gap: 1.5rem;
                        }
                        #loginform label {
                            display: block;
                            font-size: 0.875rem;
                            font-weight: 600;
                            margin-bottom: 0.5rem;
                        }
                        /* Light mode label colors */
                        @media (prefers-color-scheme: light) {
                            #loginform label {
                                color: #0f172a;
                            }
                        }
                        /* Dark mode label colors */
                        @media (prefers-color-scheme: dark) {
                            #loginform label {
                                color: #f8fafc;
                            }
                        }
                        #loginform input[type="text"],
                        #loginform input[type="password"] {
                            width: 100%;
                            background-color: transparent;
                            border: 2px solid;
                            border-radius: 0.375rem;
                            padding: 0.75rem 1rem;
                            font-size: 1rem;
                            transition: all 0.2s;
                        }
                        /* Light mode input colors */
                        @media (prefers-color-scheme: light) {
                            #loginform input[type="text"],
                            #loginform input[type="password"] {
                                border-color: #0f172a;
                                color: #0f172a;
                            }
                        }
                        /* Dark mode input colors */
                        @media (prefers-color-scheme: dark) {
                            #loginform input[type="text"],
                            #loginform input[type="password"] {
                                border-color: #f8fafc;
                                color: #f8fafc;
                            }
                        }
                        #loginform input[type="text"]:focus,
                        #loginform input[type="password"]:focus {
                            outline: none;
                            border-color: #ea580c;
                        }
                        #loginform .login-remember {
                            display: flex;
                            align-items: center;
                            gap: 0.5rem;
                            margin-top: -0.5rem;
                        }
                        #loginform .login-remember label {
                            margin: 0;
                            font-weight: 500;
                            font-size: 0.875rem;
                        }
                        #loginform input[type="checkbox"] {
                            width: 1rem;
                            height: 1rem;
                            accent-color: #ea580c;
                        }
                        #loginform .login-submit {
                            margin-top: 0.5rem;
                        }
                        #loginform #wp-submit {
                            width: 100%;
                            background-color: #ea580c;
                            color: #f8fafc;
                            padding: 0.875rem 1.5rem;
                            border-radius: 0.375rem;
                            font-size: 0.875rem;
                            font-weight: 500;
                            border: none;
                            cursor: pointer;
                            transition: all 0.2s;
                        }
                        #loginform #wp-submit:hover {
                            background-color: #c2410c;
                        }
                    </style>

                    <?php wp_login_form($args); ?>

                    <!-- Password Recovery -->
                    <div class="mt-6 pt-6 border-t border-slate-900 dark:border-slate-50 text-center">
                        <a href="<?php echo wp_lostpassword_url(); ?>" class="text-sm text-orange-600 hover:opacity-70 transition-opacity font-medium">
                            Forgot your password?
                        </a>
                    </div>
                </div>

            <?php endif; ?>

        </div>
    </section>

</main>

<?php get_footer(); ?>
