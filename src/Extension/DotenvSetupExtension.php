<?php

/**
 * This file is part of WordPress Dotenv Extensions.
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

		$dirPath = Path::makeRelative($config['wordpress.dotenv-dir'], $config['vendor-dir']);
		$envPath = Path::makeRelative($config['wordpress.dotenv-dir'] . '/.env', $config['vendor-dir']);

		$dirPathCode = '__DIR__ . \'/' . addslashes($dirPath) . '\'';
		$envPathCode = '__DIR__ . \'/' . addslashes($envPath) . '\'';

		$code[] = 'if (file_exists(' . $envPathCode . ')) {';
		if (in_array($config['wordpress.config.source'], ['server', 'env'])) {
			$code[] = "\t" . '$dotenv = \\Dotenv\\Dotenv::createImmutable(' . $dirPathCode . ');';
		} else {
			$code[] = "\t" . '$dotenv = \\Dotenv\\Dotenv::createUnsafeImmutable(' . $dirPathCode . ');';
		}
		$code[] = "\t" . '$dotenv->load();';
		$code[] = "\t" . 'if (env(\'DATABASE_URL\')) {';
		$code[] = "\t\t" . '$dotenv->required([';
		$code[] = "\t\t\t" . '\'DB_NAME\',';
		$code[] = "\t\t\t" . '\'DB_USER\',';
		$code[] = "\t\t\t" . '\'DB_PASSWORD\'';
		$code[] = "\t\t" . ']);';
		$code[] = "\t" . '}';
		$code[] = '}';

		return implode(PHP_EOL, $code);
	}
}
