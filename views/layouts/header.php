<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/images/logo.ico" type="image/x-icon"/>
    <title><?php echo $this->title ?></title>
</head>

<body>
    <header class="menu_bar">
        <div class="top-menu">
            <a href="/homepage" class="site-logo">
                <img src="/images/logo.png" alt="logo">
            </a>
            <nav class="menu">
                <ul role="menu">
                    <li role="menuitem">
                        <a href="/market">Marketplace</a>
                    </li>
                    <li role="menuitem">
                        <a href="/news">News</a>
                    </li>
                    <li role="menuitem">
                        <a href="/faq">FAQ</a>
                    </li>
                    <li role="menuitem">
                        <a href="/about_us">About Us</a>
                    </li>
                    <li role="menuitem">
                        <a href="/contact">Contact</a>
                    </li>
                </ul>
            </nav>
    <?php use core\Application;
    if(Application::isGuest()):?>
            <a href="/login" class="menu_button">Login</a>
        </div>
    </header>
    {{content}}
    <?php else: ?>
        <section class="profile-picture-container">
            <button class="profile-picture" onclick="showMenu()"></button>
        </section>
    </header>
    {{content}}
    <section class="profile-menu" id="profile-menu">
        <nav class="profile-picture-menu">
            <ul role="profile" class="profile">
                <li role="menuitem">
                    <a href="/user">Signed in as <?php echo Application::$app->user->getEmail()?></a>
                </li>
                <li role="menuitem">
                    <a href="/notifications">Notifications <h6>🔴</h6></a>
                </li>
                <li role="menuitem">
                    <a href="/upload">Upload</a>
                </li>
                <li role="menuitem">
                    <a href="/dashboard">Dashboard</a>

                </li>
                <li role="menuitem">
                    <a href="/logout">Log out</a>
                </li>
            </ul>
        </nav>
        </section>
        <script>
            <?php require_once("showMenu.js");?>
        </script>
    <?php endif?>
    <?php if (Application::$app->session->getFlash('success')): ?>
    <div class="alert alert-success">
        <?php echo Application::$app->session->getFlash('success')?>
    </div>
    <?php endif?>
</body>


