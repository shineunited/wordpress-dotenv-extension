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

namespace ShineUnited\WordPress\Dotenv;

use ShineUnited\WordPress\Dotenv\Provider\BlueprintProvider;
use ShineUnited\WordPress\Dotenv\Provider\ExtensionProvider;
use ShineUnited\WordPress\Dotenv\Provider\GitignoreProvider;
use ShineUnited\WordPress\Dotenv\Provider\NamespaceProvider;
use ShineUnited\WordPress\Dotenv\Provider\ParameterProvider;
use ShineUnited\Conductor\Capability\BlueprintProvider as BlueprintProviderCapability;
use ShineUnited\Conductor\Capability\ParameterProvider as ParameterProviderCapability;
use ShineUnited\Conductor\Addon\Gitignore\Capability\GitignoreProvider as GitignoreProviderCapability;
use ShineUnited\Conductor\Addon\Twig\Capability\NamespaceProvider as NamespaceProviderCapability;
use ShineUnited\WordPress\Installer\Capability\ExtensionProvider as ExtensionProviderCapability;
use Composer\Composer;
use Composer\IO\IOInterface;
use Composer\Plugin\PluginInterface;
use Composer\Plugin\Capable;

/**
 * Composer Plugin
 */
class Plugin implements PluginInterface, Capable {

	/**
	 * {@inheritDoc}
	 */
	public function activate(Composer $composer, IOInterface $io) {
		// do nothing
	}

	/**
	 * {@inheritDoc}
	 */
	public function deactivate(Composer $composer, IOInterface $io) {
		// do nothing
	}

	/**
	 * {@inheritDoc}
	 */
	public function uninstall(Composer $composer, IOInterface $io) {
		// do nothing
	}

	/**
	 * {@inheritDoc}
	 */
	public function getCapabilities() {
		return [
			BlueprintProviderCapability::class => BlueprintProvider::class,
			ExtensionProviderCapability::class => ExtensionProvider::class,
			GitignoreProviderCapability::class => GitignoreProvider::class,
			NamespaceProviderCapability::class => NamespaceProvider::class,
			ParameterProviderCapability::class => ParameterProvider::class
		];
	}
}
