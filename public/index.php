<?php
require_once __DIR__ . '/../vendor/autoload.php';

if (file_exists('assets/assets.json')) {
    $mode = 'production';
    $assets = json_decode(file_get_contents('assets/assets.json'), true);
} else {
    $mode = 'development';
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>PHP + Vue.js</title>
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.min.css"
            integrity="sha256-HxaKz5E/eBbvhGMNwhWRPrAR9i/lG1JeT4mD6hCQ7s4="
            crossorigin="anonymous"
        />
        <link
            rel="stylesheet"
            href="https://fonts.googleapis.com/css?family=Lato:400,400i,900"
        />
<?php if ($mode == 'production'): ?>
        <link
            rel="stylesheet"
            href="/assets/<?= $assets['main']['css'] ?>"
        />
<?php endif; ?>
    </head>
    <body>
        <div id="app">
            <noscript>This app needs JavaScript to run</noscript>
        </div>
        <script src="<?= $mode == 'production'
            ? '/assets/' . $assets['main']['js']
            : 'http://localhost:8080/js/main.js' ?>"></script>
    </body>
</html>
