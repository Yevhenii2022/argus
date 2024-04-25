<?php

function editLoginPage()
{
    $custom_logo_id = get_theme_mod('custom_logo');
    $logo_url = wp_get_attachment_image_url($custom_logo_id, 'full');
?>

    <style type="text/css">
        #login h1 a {
            background-image: url(<?= $logo_url ?>);
            display: block;
            width: 17rem;
            height: 6rem;
            background-size: contain;
            background-repeat: no-repeat;
            background-position: center;
            margin: 0 auto 10px;
        }

        #login,
        #nav,
        #backtoblog,
        .language-switcher {
            z-index: 5;
            position: relative;


        }

        /* .login {
            background-image: url(<?= $logo_url ?>);
            background-repeat: no-repeat;
            background-size: contain;
            background-position: center;

        } */

        .login:before {
            content: "";
            top: 0;
            left: 0;
            position: fixed;
            width: 100%;
            height: 100%;
            z-index: 0;
            background-color: rgba(51, 168, 222, 0.55);
            opacity: 1;
            backdrop-filter: blur(10px);
        }
    </style>
<?php
}

add_action('login_enqueue_scripts', 'editLoginPage');
