<?php

return function (\Smile\Interfaces\RouterInterface $router) {
    $router->addRoute(
        (new \Smile\Router\Route())
            ->get('/{a}[/{b}[/{c}]]')
            ->setTarget([\SmileDemo\Controller\TestController::class, 'test'])
    );
};
