<?php

declare(strict_types=1);

$finder = PhpCsFixer\Finder::create()
    ->exclude('vendor')
    ->in(__DIR__);

$config = new PhpCsFixer\Config();
$config
    ->setFinder($finder)
    ->setRiskyAllowed(true)
    ->setRules([
        '@PSR12' => true,
        '@PHP80Migration' => true,
        'strict_param' => true,
        'array_syntax' => ['syntax' => 'short'],
        'no_multiline_whitespace_around_double_arrow' => true,
        'no_trailing_comma_in_singleline_array' => true,
        'trim_array_spaces' => true,
        'whitespace_after_comma_in_array' => true,
        'modernize_types_casting' => true,
        'short_scalar_cast' => true,
        'no_blank_lines_after_class_opening' => true,
        'no_unneeded_final_method' => true,
        'protected_to_private' => true,
        'single_trait_insert_per_statement' => true,
        'self_static_accessor' => true,
        'self_accessor' => true,
        'no_empty_comment' => true,
        'include' => true,
        'simplified_if_return' => true,
        'function_declaration' => true,
        'combine_consecutive_issets' => true,
        'dir_constant' => true,
        'single_blank_line_before_namespace' => true,
        'new_with_braces' => true,
        'blank_line_after_opening_tag' => true,
        'no_closing_tag' => true,
        'general_phpdoc_annotation_remove' => ['annotations' => ['package', 'subpackage']],
        'no_empty_phpdoc' => true,
        // 'strict_comparison' => true,
    ]);

return $config;
