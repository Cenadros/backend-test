<?php

use PhpCsFixer\Finder;
use PhpCsFixer\Config;

$finder = Finder::create()
    ->exclude('vendor')
    ->in(getcwd())
    ->name('*.php')
    ->ignoreDotFiles(true)
    ->ignoreVCS(true);

$rules = [
    '@Symfony' => true,
    'braces' => [
        'allow_single_line_closure' => false,
    ],
    'ordered_imports' => [
        'sortAlgorithm' => 'length',
    ],
    'ordered_class_elements' => true,
    'phpdoc_order' => true,
    'no_empty_comment' => false,
    'phpdoc_to_comment' => false,
    'no_extra_consecutive_blank_lines' => [
        'tokens' => [
            'curly_brace_block',
            'parenthesis_brace_block',
            'extra',
            'throw',
            'use',
        ],
    ],
    'not_operator_with_successor_space' => true,
    'concat_space' => ['spacing' => 'one'],
];

return Config::create()
    ->setFinder($finder)
    ->setRules($rules)
    ->setUsingCache(true);
