<?php

/*
 * This file is part of the Atico/SpreadsheetTranslator package.
 *
 * (c) Samuel Vicent <samuelvicent@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Atico\SpreadsheetTranslator\Exporter\Xliff\Tests;

use Atico\SpreadsheetTranslator\Core\Configuration\Configuration;
use Atico\SpreadsheetTranslator\Exporter\Xliff\XliffExporterConfigurationManager;
use PHPUnit\Framework\TestCase;

class XliffExporterConfigurationManagerTest extends TestCase
{
    private XliffExporterConfigurationManager $configManager;

    protected function setUp(): void
    {
        parent::setUp();
        $configuration = $this->createConfiguration([]);
        $this->configManager = new XliffExporterConfigurationManager($configuration);
    }

    private function createConfiguration(array $options): Configuration
    {
        return new Configuration(
            ['exporter' => ['xliff' => $options]],
            'xliff'
        );
    }

    public function testGetDefaultLocaleReturnsEmptyStringWhenNotSet(): void
    {
        $locale = $this->configManager->getDefaultLocale();

        $this->assertIsString($locale);
        $this->assertSame('', $locale);
    }

    public function testGetDefaultLocaleReturnsConfiguredValue(): void
    {
        $configuration = $this->createConfiguration([
            'default_locale' => 'en_US'
        ]);
        $configManager = new XliffExporterConfigurationManager($configuration);

        $locale = $configManager->getDefaultLocale();

        $this->assertSame('en_US', $locale);
    }

    public function testGetDefaultLocaleWithDifferentLocales(): void
    {
        $testCases = [
            'en_US' => 'en_US',
            'es_ES' => 'es_ES',
            'fr_FR' => 'fr_FR',
            'de_DE' => 'de_DE',
        ];

        foreach ($testCases as $input => $expected) {
            $configuration = $this->createConfiguration([
                'default_locale' => $input
            ]);
            $configManager = new XliffExporterConfigurationManager($configuration);

            $this->assertSame(
                $expected,
                $configManager->getDefaultLocale(),
                "Failed asserting that default_locale '{$input}' returns '{$expected}'"
            );
        }
    }

    public function testImplementsXliffExporterConfigurationInterface(): void
    {
        $this->assertInstanceOf(
            \Atico\SpreadsheetTranslator\Exporter\Xliff\XliffExporterConfigurationInterface::class,
            $this->configManager
        );
    }

    public function testExtendsExporterConfigurationManager(): void
    {
        $this->assertInstanceOf(
            \Atico\SpreadsheetTranslator\Core\Exporter\ExporterConfigurationManager::class,
            $this->configManager
        );
    }
}
