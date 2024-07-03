<?php
    $container->set(\Cowsayphp\AnimalInterface::class, function() {
        $class = '\\Cowsayphp\\Farm\\'.(getenv("COWSAY_FARM_CLASS")?:'Cow');
        return \Cowsayphp\Farm::create($class);
      });

    $app->get('/coolbeans', function(Request $request, Response $response, LoggerInterface $logger, \Cowsayphp\AnimalInterface $animal) {
    $logger->debug('letting the Cowsay library write something cool.');
    $response->getBody()->write("<pre>".$animal->say("Cool beans")."</pre>");
    return $response;
    });
?>