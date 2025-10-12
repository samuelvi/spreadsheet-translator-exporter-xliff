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

use Atico\SpreadsheetTranslator\Core\Util\Localization;

class XliffBuilder
{
    function __construct(private $data, private $destinationFile, private $locale, private $defaultLocale)
    {
    }

    protected function buildFile(): string
    {
        return sprintf(
            '%s<file source-language="%s" target-language="%s" datatype="plaintext" original="file.ext">',
            str_pad(' ', 4),
            Localization::getLanguageFromLocale($this->defaultLocale),
            Localization::getLanguageFromLocale($this->locale)
        );
    }

    protected function buildBody(): string
    {
        return sprintf('%s<body>', str_pad(' ', 8));
    }

    protected function buildTrans(): string
    {
        $rows = [];
        foreach ($this->data as $key => $value) {
            $rows[] = sprintf('%s<trans-unit id="%s">', str_pad(' ', 12), $key);
            $rows[] = sprintf('%s<source>%s</source>', str_pad(' ', 16), $key);
            $rows[] = sprintf('%s<target><![CDATA[%s]]></target>', str_pad(' ', 16), $value);
            $rows[] = sprintf('%s</trans-unit>', str_pad(' ', 12));
        }
        return implode(PHP_EOL, $rows);
    }

    function buildDocument(): string
    {
        $rows = [];
        $rows[] = '<?xml version="1.0"?>';
        $rows[] = sprintf('<!-- %s -->', $this->destinationFile);
        $rows[] = '<xliff version="1.2" xmlns="urn:oasis:names:tc:xliff:document:1.2">';
        $rows[] = $this->buildFile();
        $rows[] = $this->buildBody();
        $rows[] = $this->buildTrans();
        $rows[] = sprintf('%s</body>', str_pad(' ', 8));
        $rows[] = sprintf('%s</file>', str_pad(' ', 4));
        $rows[] = '</xliff>';

        return implode(PHP_EOL, $rows);
    }
}