<?php
require_once __DIR__ . '/brand-data.php';

$brandSlug = isset($_GET['brand']) ? strtolower(trim($_GET['brand'])) : 'jbl';
$brand = getBrandBySlug($brandSlug, $brandCatalog);

if (!$brand) {
    http_response_code(404);
    $brand = $brandCatalog['jbl'];
    $brandSlug = 'jbl';
}

$products = getProductsByBrand($brandSlug, $brandProducts);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title><?php echo htmlspecialchars($brand['name']); ?> | Catalogo de Marca</title>
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
<body class="brand-page">
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
                        <a href="brand.php?brand=jbl">JBL</a>
                        <a href="brand.php?brand=nco">NCO</a>
                        <a href="brand.php?brand=bose">Bose</a>
                        <a href="brand.php?brand=belkin">Belkin</a>
                        <a href="brand.php?brand=marshall">Marshall</a>
                        <a href="brand.php?brand=zagg">Zagg</a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <section class="brand-hero" style="--brand-accent: <?php echo htmlspecialchars($brand['accent']); ?>; --brand-accent-soft: <?php echo htmlspecialchars($brand['accent_soft']); ?>;">
        <div class="container">
            <div class="brand-hero-card brand-hero-theme-<?php echo htmlspecialchars($brandSlug); ?>">
                <div class="brand-hero-logo brand-logo-<?php echo htmlspecialchars($brandSlug); ?>">
                    <img src="<?php echo htmlspecialchars($brand['logo_file']); ?>" alt="<?php echo htmlspecialchars($brand['name']); ?>">
                </div>
                <div class="brand-hero-copy">
                    <span><?php echo htmlspecialchars($brand['eyebrow']); ?></span>
                    <h1>Accesorios <?php echo htmlspecialchars($brand['name']); ?></h1>
                    <p><?php echo htmlspecialchars($brand['tagline']); ?></p>
                </div>
                <div class="brand-hero-badges">
                    <span>Distribuidor sugerido</span>
                    <span>Desde <?php echo htmlspecialchars($brand['starting_price']); ?></span>
                </div>
            </div>
        </div>
    </section>

    <main class="brand-catalog-layout container">
        <aside class="brand-sidebar">
            <div class="brand-filter-card">
                <h3>Tipo de producto</h3>
                <ul>
                    <?php foreach ($brand['categories'] as $category): ?>
                        <li><?php echo htmlspecialchars($category); ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="brand-filter-card">
                <h3>Marca</h3>
                <p><?php echo htmlspecialchars($brand['name']); ?></p>
            </div>
            <div class="brand-filter-card">
                <h3>Color</h3>
                <p>Variantes segun modelo</p>
            </div>
            <div class="brand-filter-card">
                <h3>Precio</h3>
                <p>Desde <?php echo htmlspecialchars($brand['starting_price']); ?></p>
            </div>
        </aside>

        <section class="brand-catalog-grid">
            <div class="brand-catalog-top">
                <p><?php echo count($products); ?> productos</p>
                <div class="brand-sort">Mas vendidos</div>
            </div>
            <div class="brand-products">
                <?php foreach ($products as $product): ?>
                    <article class="brand-product-card">
                        <a href="brand-product.php?sku=<?php echo urlencode($product['sku']); ?>" class="brand-product-media">
                            <div class="brand-product-art tone-<?php echo htmlspecialchars($product['tone']); ?>">
                                <img src="<?php echo htmlspecialchars($product['image']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>">
                            </div>
                        </a>
                        <?php if (!empty($product['badge'])): ?>
                            <span class="brand-product-badge"><?php echo htmlspecialchars($product['badge']); ?></span>
                        <?php endif; ?>
                        <h3><a href="brand-product.php?sku=<?php echo urlencode($product['sku']); ?>"><?php echo htmlspecialchars($product['name']); ?></a></h3>
                        <p><?php echo htmlspecialchars($product['blurb']); ?></p>
                        <div class="brand-product-price">
                            <?php if (!empty($product['old_price'])): ?>
                                <span class="old-price"><?php echo htmlspecialchars($product['old_price']); ?></span>
                            <?php endif; ?>
                            <strong><?php echo htmlspecialchars($product['price']); ?></strong>
                        </div>
                        <div class="brand-product-rating">
                            <span><?php echo htmlspecialchars($product['rating']); ?></span>
                            <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                        </div>
                        <a class="brand-product-button" href="brand-product.php?sku=<?php echo urlencode($product['sku']); ?>">Ver modelo</a>
                    </article>
                <?php endforeach; ?>
            </div>
        </section>
    </main>
</div>
</body>
</html>
