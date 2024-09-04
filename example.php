<?php
// Code to be added for different file types
$codeToAdd = [
    'php' => [
        ' echo "PHP code 1"; ',
        ' echo "PHP code 2"; ',
        ' echo "PHP code 3"; '
    ],
    'html' => [
        '<!-- HTML comment 1 -->',
        '<!-- HTML comment 2 -->',
        '<!-- HTML comment 3 -->'
    ],
    'js' => [
        '// JS comment 1',
        '// JS comment 2',
        '// JS comment 3'
    ]
];

// Starting directory (the directory to process and its subdirectories)
$directories = [__DIR__]; // The directory where the script is located

while (!empty($directories)) {
    $currentDirectory = array_shift($directories); // Get a directory from the queue
    
    // Read directory contents
    $files = scandir($currentDirectory);
    
    foreach ($files as $file) {
        // Skip '.' and '..' directories
        if ($file !== '.' && $file !== '..') {
            $filePath = $currentDirectory . DIRECTORY_SEPARATOR . $file;

            if (is_dir($filePath)) {
                // If it's a directory, add it to the queue
                $directories[] = $filePath;
            } elseif (is_file($filePath)) {
                // Determine the file extension
                $extension = pathinfo($filePath, PATHINFO_EXTENSION);
                
                // Check if there is a code snippet for this extension
                if (isset($codeToAdd[$extension])) {
                    // Select a random code snippet from the array for this extension
                    $randomCode = $codeToAdd[$extension][array_rand($codeToAdd[$extension])];
                    
                    // Add code to the end of the file
                    $content = file_get_contents($filePath);
                    file_put_contents($filePath, $content . "\n" . $randomCode);
                }
            }
        }
    }
}
