<?php

declare(strict_types=1);

namespace Madikon\GrumphpComposerAudit\Extension;

use GrumPHP\Extension\ExtensionInterface;

/**
 * Class Loader
 */
class Loader implements ExtensionInterface
{
    public function imports(): iterable
    {
        yield dirname(__DIR__) . '/../composer-audit-extension.yaml';
    }
}
