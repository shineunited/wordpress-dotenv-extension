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

use ShineUnited\Conductor\Addon\Twig\Capability\NamespaceProvider as NamespaceProviderCapability;
use ShineUnited\Conductor\Addon\Twig\Loader\TwigNamespace;

/**
 * Namespace Provider
 */
class NamespaceProvider implements NamespaceProviderCapability {

	/**
	 * {@inheritDoc}
	 */
	public function getNamespaces(): array {
		return [
			new TwigNamespace(__DIR__ . '/../../inc', 'wordpress-dotenv')
		];
	}
}
