includer: <?= $greet ?>

<?= $helpers["sub"]->load(__DIR__ . "/sub_tmpl.php", [
    "greet" => $greet
]) ?>