<?php

use Dotenv\Dotenv;
use Env\Env;
use function Env\env;

$rootDir = __DIR__ . '/{{ path('wordpress.dotenv-dir', 'wordpress.config-dir') }}';
{% if config('wordpress.config.source') == 'server' or config('wordpress.config.source') == 'env' %}
$dotenv = Dotenv::createImmutable($rootDir);
{% else %}
$dotenv = Dotenv::createUnsafeImmutable($rootDir);
{% endif %}
if(file_exists($rootDir . '/.env')) {
	$dotenv->load();
	if(!env('DATABASE_URL')) {
		$dotenv->required([
			'DB_NAME',
			'DB_USER',
			'DB_PASSWORD'
		]);
	}
}
