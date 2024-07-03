<?php
$container->set(PDO::class, function() {
  $dburl = parse_url(getenv('DATABASE_URL') ?: throw new Exception('no DATABASE_URL'));
  return new PDO(sprintf(
    "mysql:host=%s;port=%s;dbname=%s;user=%s;password=%s",
    $dburl['host'],
    $dburl['port'],
    ltrim($dburl['path'], '/'), // URL path is the DB name, must remove leading slash
    $dburl['user'],
    $dburl['pass'],
  ));
});

$app->get('/db', function(Request $request, Response $response, LoggerInterface $logger, Twig $twig, PDO $pdo) {
    $st = $pdo->prepare('SELECT name FROM test_table');
    $st->execute();
    $names = array();
    while($row = $st->fetch(PDO::FETCH_ASSOC)) {
      $logger->debug('Row ' . $row['name']);
      $names[] = $row;
    }
    return $twig->render($response, 'database.twig', [
      'names' => $names,
    ]);
  });
?>