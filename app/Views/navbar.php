<?php
$routes = [
    ['label' => 'Home', 'url' => base_url('/')],
    ['label' => 'Contact', 'url' => base_url('/contact')],
    ['label' => 'About', 'url' => base_url('/about')],
    ['label' => 'FAQs', 'url' => base_url('/faqs')],
    ['label' => 'Terms of Service', 'url' => base_url('/tos')],
    ['label' => 'Biodata', 'url' => base_url('/biodata')],
    ['label' => 'Books', 'url' => base_url('/books')],
    ['label' => 'Penulis', 'url' => base_url('/penulis')],
];

// Dapatkan URI path tanpa query, misal '/books' atau '/'
$currentPath = service('uri')->getPath();

// Fungsi untuk normalisasi trailing slash dan lowercase
function normalize($path) {
    return rtrim(strtolower($path), '/');
}

$currentPath = normalize($currentPath);
?>

<nav>
    <ul>
        <?php foreach ($routes as $route):
            $routePath = parse_url($route['url'], PHP_URL_PATH);
            $routePath = normalize($routePath);

            $isActive = ($routePath === $currentPath) ? 'active' : '';
        ?>
        <li><a href="<?= $route['url']; ?>" class="<?= $isActive ?>"><?= $route['label']; ?></a></li>
        <?php endforeach; ?>
    </ul>
</nav>
