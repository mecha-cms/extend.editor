<?php

$tools = 'expand | clear | b i u s | sub sup | abbr | a img symbol emoji | p,h1,h2,h3,h4,h5,h6 | blockquote,q pre,code | ul ol | indent outdent | table | hr | find | undo redo';
$preview_css = File::exist(EXTEND . DS . 'panel' . DS . 'lot' . DS . 'asset' . DS . 'css' . DS . 'panel.min.css');
$preview_css = $preview_css ? To::url($preview_css) : false;

return [
    'TE' => [
        'ui' => [
            'HTML' => [
                'tab' => DENT,
                'tools' => $tools
            ],
            'Markdown' => [
                'extra' => true,
                'tools' => $tools,
                'states' => [
                    'a' => [],
                    'abbr' => []
                ]
            ],
            'Textile' => [
                'tools' => $tools,
                'states' => [
                    'a' => [],
                    'abbr' => []
                ]
            ],
            'BBCode' => [
                'tools' => $tools
            ]
        ],
        'extend' => [
            'bubble' => [
                'bubble' => true
            ],
            'counter' => [
                'counter' => true
            ],
            'emoji' => [
                'emoji' => true
            ],
            'expand' => [],
            'find' => [],
            'preview' => [
                'preview_css' => [
                    $preview_css,
                    To::url(EXTEND . DS . 'editor' . DS . 'lot' . DS . 'asset' . DS . 'css' . DS . 't-e' . DS . 'ui' . DS . 'preview.min.css')
                ]
            ],
            'symbol' => [
                'symbol' => true
            ],
            'table' => [],
        ]
    ]
];