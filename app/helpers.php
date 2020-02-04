<?php


if(!function_exists('redirect')) {
    function redirect($url, $statusCode = 302) {
        return new \Zend\Diactoros\Response\RedirectResponse($url, $statusCode);
    }
}