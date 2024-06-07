<?php
{% include "docHeader.txt" ignore missing %}

/**
 * This is the configuration file for php-cs-fixer header
 *
 * @link https://github.com/FriendsOfPHP/PHP-CS-Fixer
 * @link https://mlocati.github.io/php-cs-fixer-configurator/#version:3.0
 * 
 */

// All files in tmp folder created in build process
$finder = PhpCsFixer\Finder::create()
    ->in(
        [
            dirname(__DIR__) . '/build/tmp',
        ]
        );

$header = <<<EOF
{% include "docHeaderExt.txt" ignore missing %}
EOF;

$config = new PhpCsFixer\Config();
$config
    ->setRiskyAllowed(true)
    ->setHideProgress(false)
    ->setUsingCache(false)
    ->setRules(
        [
            'header_comment' => [
                'comment_type' => 'PHPDoc',
                'header' => $header,
                'location' => 'after_open',
                'separate' => 'both',
            ],

        ]
    )
    ->setFinder($finder);

return $config;
