<?php
include 'vendor/autoload.php';

// Provide the location for where the files can be found that are to be collected
$dsn = new \phpDocumentor\Files\Dsn(getcwd());

// specify that each file needs to be in or underneath the current working directory
$specification = new \phpDocumentor\Files\Specification\InPath(getcwd());

// AND specify that files must have the extension 'php'
$specification = $specification->andX(new \phpDocumentor\Files\Specification\HasExtension(['php']));

// initialize a finder object
$finder = new \phpDocumentor\Files\Finder();

// find all files in the current working directory of the given DSN and matching the provided specification(s)
foreach ($finder->find($dsn, $specification) as $path) {
    var_dump($path);
}
