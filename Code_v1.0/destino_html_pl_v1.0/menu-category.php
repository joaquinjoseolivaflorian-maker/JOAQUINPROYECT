<?php
require_once __DIR__ . '/apple-menu-data.php';

$slug = isset($_GET['menu']) ? strtolower(trim($_GET['menu'])) : 'iphone';
$page = getAppleMenuPage($slug, $appleMenuCatalog);

if (!$page) {
    http_response_code(404);
    $slug = 'iphone';
    $page = getAppleMenuPage($slug, $appleMenuCatalog);
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title><?php echo htmlspecialchars($page['title']); ?> | OpenApple</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link rel="shortcut icon" href="ico/favicon.png">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap/css/bootstrap.min.css">
    <link href="css/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="css/footer1.css" rel="stylesheet">
    <link href="css/header1.css" rel="stylesheet">
    <link href="css/theme.css" rel="stylesheet">
    <link href="css/iphone-store.css" rel="stylesheet">
</head>
<body class="menu-category-page">
<div id="wrapper" class="wrapper-full">
    <header id="header" class="variantleft type_1">
        <div class="header-center left">
            <div class="container">
                <div class="row">
                    <div class="navbar-logo col-md-3 col-sm-12 col-xs-7">
                        <a href="index.php"><img src="img/demo/home-assets/header/logo/store-logo.png" alt="OpenApple"></a>
                    </div>
                    <div class="col-md-9 col-sm-12 col-xs-12 brand-header-links">
                        <a href="index.php">Inicio</a>
                        <a href="menu-category.php?menu=mac">Mac</a>
                        <a href="menu-category.php?menu=ipad">iPad</a>
                        <a href="menu-category.php?menu=iphone">iPhone</a>
                        <a href="menu-category.php?menu=watch">Watch</a>
                        <a href="menu-category.php?menu=airpods">AirPods</a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <main class="menu-category-shell">
        <section class="menu-category-hero">
            <div class="container menu-category-hero-grid">
                <div class="menu-category-copy">
                    <span class="menu-category-eyebrow"><?php echo htmlspecialchars($page['eyebrow']); ?></span>
                    <h1><?php echo htmlspecialchars($page['title']); ?></h1>
                    <p><?php echo htmlspecialchars($page['description']); ?></p>
                    <a href="index.php" class="menu-category-back">Volver al inicio</a>
                </div>
                <div class="menu-category-visual">
                    <img src="<?php echo htmlspecialchars($page['hero_image']); ?>" alt="<?php echo htmlspecialchars($page['title']); ?>">
                </div>
            </div>
        </section>

        <section class="menu-category-content container">
            <div class="menu-category-grid">
                <?php foreach ($page['cards'] as $card): ?>
                    <article class="menu-category-card">
                        <a href="<?php echo htmlspecialchars($card['link']); ?>" class="menu-category-card-media">
                            <img src="<?php echo htmlspecialchars($card['image']); ?>" alt="<?php echo htmlspecialchars($card['title']); ?>">
                        </a>
                        <div class="menu-category-card-copy">
                            <span class="menu-category-card-price"><?php echo htmlspecialchars($card['price']); ?></span>
                            <h3><a href="<?php echo htmlspecialchars($card['link']); ?>"><?php echo htmlspecialchars($card['title']); ?></a></h3>
                            <p><?php echo htmlspecialchars($card['copy']); ?></p>
                            <a href="<?php echo htmlspecialchars($card['link']); ?>" class="menu-category-card-button">Ver opcion</a>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        </section>
    </main>
</div>
</body>
</html>
