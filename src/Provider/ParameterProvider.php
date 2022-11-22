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

use ShineUnited\Conductor\Capability\ParameterProvider as ParameterProviderCapability;
use ShineUnited\Conductor\Configuration\Parameter\PathParameter;

/**
 * Parameter Provider
 */
class ParameterProvider implements ParameterProviderCapability {

	/**
	 * {@inheritDoc}
	 */
	public function getParameters(): array {
		return [
			new PathParameter('wordpress.dotenv-dir', '{$working-dir}', [
				'outside' => '{$wordpress.webroot}'
			]),
		];
	}
}
