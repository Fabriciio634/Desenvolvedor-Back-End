<?php
    $container->set(\Cowsayphp\AnimalInterface::class,          function() {
    return \Cowsayphp\Farm::create(\Cowsayphp\Farm\Cow::class);
    });

    $app->get('/coolbeans', function(Request $request, Response $response, LoggerInterface $logger, \Cowsayphp\AnimalInterface $animal) {
    $logger->debug('letting the Cowsay library write something cool.');
    $response->getBody()->write("<pre>".$animal->say("Cool beans")."</pre>");
    return $response;
    });
?>