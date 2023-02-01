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

use ShineUnited\WordPress\Installer\Extension\ExtensionInterface;
use ShineUnited\Conductor\Capability\BlueprintProvider as BlueprintProviderCapability;
use ShineUnited\Conductor\Addon\Twig\Blueprint\TwigBlueprint;

/**
 * Blueprint Provider
 */
class BlueprintProvider implements BlueprintProviderCapability {

	/**
	 * {@inheritDoc}
	 */
	public function getBlueprints(): array {
		return [
			new TwigBlueprint('{$wordpress.dotenv-dir}/.env.example', '@wordpress-dotenv/example'),
		];
	}
}
