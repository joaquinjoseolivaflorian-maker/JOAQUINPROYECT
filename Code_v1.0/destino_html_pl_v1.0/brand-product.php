<?php
require_once __DIR__ . '/brand-data.php';

$sku = isset($_GET['sku']) ? trim($_GET['sku']) : 'jbl-go4-black';
$product = getProductBySku($sku, $brandProducts);

if (!$product) {
    http_response_code(404);
    $product = getProductBySku('jbl-go4-black', $brandProducts);
}

$brand = getBrandBySlug($product['brand'], $brandCatalog);
$related = array_values(array_filter(getProductsByBrand($product['brand'], $brandProducts), function ($item) use ($sku) {
    return $item['sku'] !== $sku;
}));
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title><?php echo htmlspecialchars($product['name']); ?> | <?php echo htmlspecialchars($brand['name']); ?></title>
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
<body class="brand-page brand-product-page">
<div id="wrapper" class="wrapper-full">
    <header id="header" class="variantleft type_1">
        <div class="header-center left">
            <div class="container">
                <div class="row">
                    <div class="navbar-logo col-md-3 col-sm-12 col-xs-7">
                        <a href="index.php"><img src="img/demo/logo/logo (196 x 40 px).png" alt="Destino"></a>
                    </div>
                    <div class="col-md-9 col-sm-12 col-xs-12 brand-header-links">
                        <a href="index.php">Inicio</a>
                        <a href="brand.php?brand=<?php echo urlencode($product['brand']); ?>">Volver a <?php echo htmlspecialchars($brand['name']); ?></a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <main class="brand-product-layout container">
        <section class="brand-product-gallery">
            <div class="brand-product-art brand-product-art-large tone-<?php echo htmlspecialchars($product['tone']); ?>">
                <img src="<?php echo htmlspecialchars($product['image']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>">
            </div>
            <div class="brand-product-thumbs">
                <div class="brand-product-art tone-<?php echo htmlspecialchars($product['tone']); ?>"><img src="<?php echo htmlspecialchars($product['image']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>"></div>
                <div class="brand-product-art tone-silver"><img src="<?php echo htmlspecialchars($product['image']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>"></div>
                <div class="brand-product-art tone-dark"><img src="<?php echo htmlspecialchars($product['image']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>"></div>
            </div>
        </section>

        <section class="brand-product-summary brand-hero-theme-<?php echo htmlspecialchars($product['brand']); ?>">
            <span class="brand-product-path"><?php echo htmlspecialchars($brand['name']); ?></span>
            <h1><?php echo htmlspecialchars($product['name']); ?></h1>
            <div class="brand-product-rating">
                <span><?php echo htmlspecialchars($product['rating']); ?></span>
                <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
            </div>
            <div class="brand-product-price detail-price">
                <?php if (!empty($product['old_price'])): ?>
                    <span class="old-price"><?php echo htmlspecialchars($product['old_price']); ?></span>
                <?php endif; ?>
                <strong><?php echo htmlspecialchars($product['price']); ?></strong>
            </div>
            <p class="brand-product-description"><?php echo htmlspecialchars($product['description']); ?></p>
            <div class="brand-product-panel">
                <h3>Lo que ofrece este modelo</h3>
                <ul>
                    <?php foreach ($product['features'] as $feature): ?>
                        <li><?php echo htmlspecialchars($feature); ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="brand-product-actions">
                <button class="brand-product-button" type="button">Agregar al carrito</button>
                <button class="brand-product-secondary" type="button">Consultar disponibilidad</button>
            </div>
        </section>
    </main>

    <section class="brand-related container">
        <h2>Tambien te puede interesar</h2>
        <div class="brand-products">
            <?php foreach (array_slice($related, 0, 3) as $item): ?>
                <article class="brand-product-card">
                    <a href="brand-product.php?sku=<?php echo urlencode($item['sku']); ?>" class="brand-product-media">
                        <div class="brand-product-art tone-<?php echo htmlspecialchars($item['tone']); ?>">
                            <img src="<?php echo htmlspecialchars($item['image']); ?>" alt="<?php echo htmlspecialchars($item['name']); ?>">
                        </div>
                    </a>
                    <h3><a href="brand-product.php?sku=<?php echo urlencode($item['sku']); ?>"><?php echo htmlspecialchars($item['name']); ?></a></h3>
                    <div class="brand-product-price">
                        <strong><?php echo htmlspecialchars($item['price']); ?></strong>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </section>
</div>
</body>
</html>
