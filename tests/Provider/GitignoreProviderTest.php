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

use ShineUnited\WordPress\Dotenv\Provider\GitignoreProvider;
use ShineUnited\Conductor\Addon\Gitignore\Capability\GitignoreProvider as GitignoreProviderCapability;
use ShineUnited\Conductor\Addon\Gitignore\Pattern\RuleInterface;

/**
 * Gitignore Provider Test
 */
class GitignoreProviderTest extends ProviderTestCase {

	/**
	 * {@inheritDoc}
	 */
	protected function getProviderClass(): string {
		return GitignoreProvider::class;
	}

	/**
	 * {@inheritDoc}
	 */
	protected function getProviderInterface(): string {
		return GitignoreProviderCapability::class;
	}

	/**
	 * {@inheritDoc}
	 */
	protected function getProviderMethod(): string {
		return 'getGitignores';
	}

	/**
	 * {@inheritDoc}
	 */
	protected function getObjectInterface(): string {
		return RuleInterface::class;
	}
}
