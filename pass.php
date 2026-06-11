<?php
// 1. Define the input string
$input = "12345";

// 2. Set the algorithmic work factor cost to 10
$options = [
    'cost' => 10
];

// 3. Generate the unique Bcrypt hash
$bcryptHash = password_hash($input, PASSWORD_BCRYPT, $options);

// 4. Display the resulting hash
echo "Input: " . $input . "\n";
echo "Bcrypt Hash: " . $bcryptHash . "\n";
?>
