<?php
header("Content-Type: application/xml; charset=utf-8");
echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
<?php
$base_url = "https://sunjiwo88.github.io/Breakingnews/";
$exclude = ['LICENSE', 'README.md', 'sitemap.xml'];

$dir = '.';
$files = scandir($dir);

foreach ($files as $file) {
    if (in_array($file, ['.', '..']) || in_array($file, $exclude)) {
        continue;
    }

    $ext = pathinfo($file, PATHINFO_EXTENSION);
    if ($ext === 'html') {
        $url = htmlspecialchars($base_url . $file);
        $lastmod = date('Y-m-d', filemtime($file));
        echo "  <url>\n";
        echo "    <loc>$url</loc>\n";
        echo "    <lastmod>$lastmod</lastmod>\n";
        echo "    <changefreq>weekly</changefreq>\n";
        echo "    <priority>0.8</priority>\n";
        echo "  </url>\n";
    }
}
?>
</urlset>
