<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $file = fopen("data.csv", "a");
    if (!$file) {
        http_response_code(500);
        echo "❌ Cannot write to data.csv";
        exit;
    }

    $now = date("Y-m-d H:i:s");
    $i = 1;
    while (isset($_POST["title$i"])) {
        $row = [
            $_POST["title$i"] ?? '',
            $_POST["description$i"] ?? '',
            $_POST["dimensions$i"] ?? '',
            $_POST["materials$i"] ?? '',
            $now
        ];
        fputcsv($file, $row);
        $i++;
    }

    fclose($file);
    echo "✅ Saved " . ($i - 1) . " products.";
} else {
    echo "Use POST method only.";
}
?>
