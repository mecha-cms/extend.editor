<?php

Hook::set('shield.before', function() {
    $__id = Path::B(__DIR__);
    $__state = Config::get('page.editor', "");
    if ($__state === $__id) {
        $__f = __DIR__ . DS . 'lot' . DS . 'asset' . DS . 'js' . DS . 't-e' . DS . 'ui' . DS;
        if ($__s = Lot::get('__page')) {
            Asset::set($__f . 'h-t-m-l.min.js', 20.2);
            $__s = !empty($__s[0]) ? __c2f__($__s[0]->type) : false;
            if ($__s) {
                Asset::set($__f . $__s . '.min.js', 20.3);
            }
        }
        $__extend = Extend::state(__DIR__, 'TE')['extend'];
        foreach ($__extend as $__k => $__v) {
            Asset::set($__f . 'ui' . DS . $__k . '.min.js', 20.5);
        }
    }
});

Hook::set('panel.js', function($__content) {
    $__id = Path::B(__DIR__);
    $__state = Config::get('page.editor', "");
    if ($__state === $__id) {
        $__s = Extend::state(__DIR__, 'TE');
        $__ui = $__s['ui'];
        $__extend = $__s['extend'];
        $__a = [];
        foreach ($__extend as $__k => $__v) {
            if (!$__v) continue;
            $__a = array_replace_recursive($__a, (array) $__v);
        }
        foreach ($__ui as $__k => $__v) {
            $__ui[$__k] = array_replace_recursive($__v, $__a);
        }
        return $__content . '!function($){$.TE=' . json_encode($__ui) . '}(window.PANEL);';
    }
    return $__content;
});

Hook::set('on.panel.ready', function() {
    $__id = Path::B(__DIR__);
    $__state = Config::get('page.editor', "");
    if ($__state === $__id) {
        $__ff = __DIR__ . DS . 'lot' . DS . 'asset' . DS;
        $__f = $__ff . 'css' . DS . 't-e' . DS;
        Asset::set([$__f . 'ui.i.min.css', $__f . 'ui.min.css'], [20, 20.1]);
        if ($__s = Extend::state('panel', 'shield')) {
            Asset::set($__ff . 'css' . DS . 't-e' . DS . $__s . '.min.css', 20.3);
        }
        Asset::set([
            $__ff . 'js' . DS . 't-e.min.js',
            $__ff . 'js' . DS . 't-e' . DS . 'ui.min.js',
            $__ff . 'js' . DS . 't-e.fire.min.js'
        ], [
            20,
            20.1,
            20.4
        ]);
    }
});