@php
$rows = 3;
for ($i = 1; $i <= $rows; $i++) { // Outer loop for rows
    // Print spaces
    for ($j = 1; $j <= $rows - $i; $j++) {
        echo " ";
    }
    // Print stars
    for ($j = 1; $j <= 2 * $i - 1; $j++) {
        echo "*";
    }
    echo "<br>";
}
@endphp