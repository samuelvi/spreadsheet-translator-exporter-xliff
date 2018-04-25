<?php

/*
 * This file is part of the Atico/SpreadsheetTranslator package.
 *
 * (c) Samuel Vicent <samuelvicent@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Atico\SpreadsheetTranslator\Exporter\Xliff;

use Atico\SpreadsheetTranslator\Core\Exporter\ExportContentInterface;
use Atico\SpreadsheetTranslator\Core\Exporter\ExporterInterface;
use Atico\SpreadsheetTranslator\Core\Exporter\AbstractExporter;

class Xliff extends AbstractExporter implements ExporterInterface
{
    function __construct($configuration)
    {
        $this->configuration = new XliffExporterConfigurationManager($configuration);
    }

    public function getFormat()
    {
        return 'xliff';
    }

    protected function buildContent(ExportContentInterface $exportContent)
    {
        $xliffBuilder = new XliffBuilder(
            $exportContent->getTranslations(),
            $exportContent->getDestinationFile(),
            $exportContent->getLocale(),
            $this->configuration->getDefaultLocale()
        );
        return $xliffBuilder->buildDocument();
    }
}