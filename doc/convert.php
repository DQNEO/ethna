#!/usr/bin/env php
<?php
require_once __DIR__ . '/vendor/autoload.php';


global $argv;

$file = $argv[1];
// use github markdown

// this is broken
//$parser = new \cebe\markdown\GithubMarkdown();
//echo $parser->parse(file_get_contents($file));

$Parsedown = new Parsedown();
echo $Parsedown->text(file_get_contents($file));
