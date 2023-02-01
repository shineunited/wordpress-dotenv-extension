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

use ShineUnited\Conductor\Addon\Gitignore\Capability\GitignoreProvider as GitignoreProviderCapability;
use ShineUnited\Conductor\Addon\Gitignore\Pattern\Rule;

/**
 * Gitignore Provider
 */
class GitignoreProvider implements GitignoreProviderCapability {

	/**
	 * {@inheritDoc}
	 */
	public function getGitignores(): array {
		return [
			new Rule('{$wordpress.dotenv-dir}/.env'),
		];
	}
}
