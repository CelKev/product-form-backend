<?php
$file = "data.csv";
if (!file_exists($file)) {
    echo "No products submitted yet.";
    exit;
}

echo "<h2>📦 Submitted Products</h2>";
echo "<a href='data.csv' download>⬇️ Download CSV</a><br><br>";
echo "<table border='1' cellpadding='8' style='border-collapse: collapse;'>";
echo "<tr><th>Product Title</th><th>Description</th><th>Dimensions</th><th>Materials</th><th>Date</th></tr>";

$csv = fopen($file, "r");
while (($row = fgetcsv($csv)) !== FALSE) {
    echo "<tr>";
    foreach ($row as $cell) {
        echo "<td>" . htmlspecialchars($cell) . "</td>";
    }
    echo "</tr>";
}
fclose($csv);
echo "</table>";
?>
