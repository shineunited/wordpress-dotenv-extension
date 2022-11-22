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

namespace ShineUnited\WordPress\Dotenv\Tests\Provider;

use ShineUnited\WordPress\Dotenv\Provider\ExtensionProvider;
use ShineUnited\WordPress\Installer\Capability\ExtensionProvider as ExtensionProviderCapability;
use ShineUnited\WordPress\Installer\Extension\ExtensionInterface;

/**
 * Extension Provider Test
 */
class ExtensionProviderTest extends ProviderTestCase {

	/**
	 * {@inheritDoc}
	 */
	protected function getProviderClass(): string {
		return ExtensionProvider::class;
	}

	/**
	 * {@inheritDoc}
	 */
	protected function getProviderInterface(): string {
		return ExtensionProviderCapability::class;
	}

	/**
	 * {@inheritDoc}
	 */
	protected function getProviderMethod(): string {
		return 'getExtensions';
	}

	/**
	 * {@inheritDoc}
	 */
	protected function getObjectInterface(): string {
		return ExtensionInterface::class;
	}
}
