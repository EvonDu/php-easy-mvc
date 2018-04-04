<?php
//PHP<5.3版本支持get_called_class()方法
if (!function_exists('get_called_class')) {
    function get_called_class() {
        $list = get_declared_classes ();
        $class = $list[count($list)-1];
        return $class;
    }
}