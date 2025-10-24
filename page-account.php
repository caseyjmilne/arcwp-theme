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
                    <h1 class="text-4xl lg:text-5xl font-black text-gray-400 mb-6">
                        Welcome Back!
                    </h1>
                    <p class="text-xl text-gray-500 mb-8">
                        You are logged in as <strong><?php echo wp_get_current_user()->user_login; ?></strong>
                    </p>
                    <a href="<?php echo wp_logout_url(home_url()); ?>" class="inline-flex items-center justify-center bg-zinc-800 text-gray-400 px-8 py-4 rounded-lg text-base font-semibold hover:bg-zinc-700 transition-colors border border-zinc-700">
                        Log Out
                    </a>
                </div>

            <?php else : ?>
                <!-- Login Form -->
                <div class="bg-zinc-900 border border-zinc-800 rounded-2xl p-8 lg:p-12">
                    <h1 class="text-3xl lg:text-4xl font-black text-gray-400 mb-2 text-center">
                        Account Login
                    </h1>
                    <p class="text-gray-500 mb-8 text-center">
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
                        <div class="mb-6 p-4 bg-red-900/20 border border-red-800/50 rounded-lg">
                            <p class="text-red-400 text-sm text-center">
                                <?php echo esc_html($error_message); ?>
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
                            color: #9ca3af;
                            margin-bottom: 0.5rem;
                        }
                        #loginform input[type="text"],
                        #loginform input[type="password"] {
                            width: 100%;
                            background-color: #18181b;
                            border: 1px solid #27272a;
                            border-radius: 0.5rem;
                            padding: 0.75rem 1rem;
                            color: #e5e7eb;
                            font-size: 1rem;
                            transition: all 0.2s;
                        }
                        #loginform input[type="text"]:focus,
                        #loginform input[type="password"]:focus {
                            outline: none;
                            border-color: #3b82f6;
                            background-color: #09090b;
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
                            accent-color: #3b82f6;
                        }
                        #loginform .login-submit {
                            margin-top: 0.5rem;
                        }
                        #loginform #wp-submit {
                            width: 100%;
                            background-color: #1e3a8a;
                            color: white;
                            padding: 0.875rem 1.5rem;
                            border-radius: 0.75rem;
                            font-size: 1rem;
                            font-weight: 700;
                            border: none;
                            cursor: pointer;
                            transition: all 0.2s;
                        }
                        #loginform #wp-submit:hover {
                            background-color: #1e40af;
                            transform: translateY(-1px);
                        }
                    </style>

                    <?php wp_login_form($args); ?>

                    <!-- Password Recovery -->
                    <div class="mt-6 pt-6 border-t border-zinc-800 text-center">
                        <a href="<?php echo wp_lostpassword_url(); ?>" class="text-sm text-gray-500 hover:text-gray-400 transition-colors">
                            Forgot your password?
                        </a>
                    </div>
                </div>

            <?php endif; ?>

        </div>
    </section>

</main>

<?php get_footer(); ?>
