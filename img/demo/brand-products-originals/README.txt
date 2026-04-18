Estructura de imagenes de marcas y productos

1. Carpeta publicada en la web:
img/demo/brand-products/

Aqui van las imagenes que YA usa la pagina en:
- brand.php
- brand-product.php
- brand-data.php

Subcarpetas actuales:
- jbl/
- nco/
- bose/
- belkin/
- marshall/
- zagg/

2. Carpeta de originales/base para reemplazo:
img/demo/brand-products-originals/

Usa esta carpeta para guardar:
- archivos descargados originales
- versiones editables
- PNG/JPG/SVG antes de optimizar

Recomendacion de trabajo:
- guarda primero el archivo base en brand-products-originals/<marca>/
- cuando ya este listo para publicar, copialo o exportalo a brand-products/<marca>/
- si cambias el nombre del archivo final, actualiza la ruta en brand-data.php

Ejemplo:
Original/base:
img/demo/brand-products-originals/jbl/jbl-go4-black.png

Publicado:
img/demo/brand-products/jbl/jbl-go4-black.svg

Archivo que manda las rutas:
brand-data.php
