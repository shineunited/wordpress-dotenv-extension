<?php

/**
 * This file is part of WordPress Installer.
 *
 * (c) Shine United LLC
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace ShineUnited\WordPress\Dotenv\Extension;

use ShineUnited\WordPress\Installer\Extension\PriorityExtension;
use ShineUnited\Conductor\Configuration\Configuration;
use Symfony\Component\Filesystem\Path;

/**
 * Dotenv Setup Extension
 */
class DotenvSetupExtension extends PriorityExtension {
	public const PRIORITY = 1;

	/**
	 * Initializes the extension.
	 */
	public function __construct() {
		parent::__construct(static::PRIORITY);
	}

	/**
	 * {@inheritDoc}
	 */
	public function generateCode(Configuration $config): string {
		$code = [];

		$rootPath = Path::makeRelative($config['wordpress.dotenv-dir'], $config['wordpress.config-dir']);

		$code[] = '$dotenvDir = __DIR__ . \'/' . addslashes($rootPath) . '\';';

		if (in_array($config['wordpress.config.source'], ['server', 'env'])) {
			$code[] = '$dotenv = \\Dotenv\\Dotenv::createImmutable($dotenvDir);';
		} else {
			$code[] = '$dotenv = \\Dotenv\\Dotenv::createUnsafeImmutable($dotenvDir);';
		}

		$code[] = 'if(file_exists($dotenvDir . \'/.env\')) {';
		$code[] = '	$dotenv->load();';
		$code[] = '	if(env(\'DATABASE_URL\')) {';
		$code[] = '		$dotenv->required([';
		$code[] = '			\'DB_NAME\',';
		$code[] = '			\'DB_USER\',';
		$code[] = '			\'DB_PASSWORD\'';
		$code[] = '		]);';
		$code[] = '	}';
		$code[] = '}';

		return implode(PHP_EOL, $code);
	}
}
