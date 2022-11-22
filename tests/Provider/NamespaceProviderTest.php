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

use ShineUnited\WordPress\Dotenv\Provider\NamespaceProvider;
use ShineUnited\Conductor\Addon\Twig\Capability\NamespaceProvider as NamespaceProviderCapability;
use ShineUnited\Conductor\Addon\Twig\Loader\TwigNamespaceInterface;

/**
 * Namespace Provider Test
 */
class NamespaceProviderTest extends ProviderTestCase {

	/**
	 * {@inheritDoc}
	 */
	protected function getProviderClass(): string {
		return NamespaceProvider::class;
	}

	/**
	 * {@inheritDoc}
	 */
	protected function getProviderInterface(): string {
		return NamespaceProviderCapability::class;
	}

	/**
	 * {@inheritDoc}
	 */
	protected function getProviderMethod(): string {
		return 'getNamespaces';
	}

	/**
	 * {@inheritDoc}
	 */
	protected function getObjectInterface(): string {
		return TwigNamespaceInterface::class;
	}
}
