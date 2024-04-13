<?php function editLoginPage()
// Add actually link in background-image: url
{ ?>

    <style type="text/css">
        #login h1 a {
            background-image: url('/wp-content/themes/pointer-theme/src/img/logo.svg');
            display: block;
            width: 272px;
            height: 92px;
            background-size: contain;
        }
    </style>
<?php }

add_action('login_enqueue_scripts', 'editLoginPage');