<?php

$students = [
    ['name' => 'Alaa', 'email' => 'ahmed@test.com', 'track' => 'PHP'],
    ['name' => 'Shamy', 'email' => 'ali@test.com', 'track' => 'CMS'],
    ['name' => 'Youssef', 'email' => 'basem@test.com', 'track' => 'PHP'],
    ['name' => 'Waleid', 'email' => 'farouk@test.com', 'track' => 'CMS'],
    ['name' => 'Rahma', 'email' => 'hany@test.com', 'track' => 'PHP'],
];

echo "<h3>students information</h3>";
echo "<table border='1'>";
echo "<tr><th>Name</th><th>Email</th><th>Track</th></tr>";

foreach ($students as $student) {
    $style = "";
    if ($student['track'] == 'CMS') {
        $style = "style='color: red;'";
    }
    echo "<tr $style>";
    echo "<td>" . $student['name'] . "</td>";
    echo "<td>" . $student['email'] . "</td>";
    echo "<td>" . $student['track'] . "</td>";
    echo "</tr>";
}

echo "</table>";
?>
