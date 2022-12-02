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

namespace ShineUnited\WordPress\Dotenv\Provider;

use ShineUnited\WordPress\Dotenv\Extension\DotenvSetupExtension;
use ShineUnited\WordPress\Installer\Capability\ExtensionProvider as ExtensionProviderCapability;

/**
 * Extension Provider
 */
class ExtensionProvider implements ExtensionProviderCapability {

	/**
	 * {@inheritDoc}
	 */
	public function getExtensions(): array {
		return [
			new DotenvSetupExtension(),
		];
	}
}
