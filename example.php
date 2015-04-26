<?php
include 'vendor/autoload.php';

// Provide the base location for where the files can be found that are to be collected
$dsn = new \phpDocumentor\Files\Dsn('file://' . __DIR__);

// specify that each file needs to be in or underneath the 'src' folder
$specification = new \phpDocumentor\Files\Specification\InPath(__DIR__ . '/src');

// AND specify that files must have the extension 'php'
$specification = $specification->andX(new \phpDocumentor\Files\Specification\HasExtension(['php']));

// initialize a finder object
$finder = new \phpDocumentor\Files\Finder();

// find all files in the current working directory of the given DSN and matching the provided specification(s)
foreach ($finder->find($dsn, $specification) as $path) {
    var_dump($path->getPath());
}
