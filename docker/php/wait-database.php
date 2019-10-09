<?php

use Symfony\Component\Dotenv\Dotenv;

$projectDir = __DIR__."/../../";

require $projectDir."vendor/autoload.php";

echo "Wait database...".PHP_EOL;

set_time_limit(10);

(new Dotenv())->loadEnv($projectDir.".env");

$host = getenv("MYSQL_HOST");

for (; ;) {
    if (@fsockopen($host.":3306")) {
        break;
    }
}
