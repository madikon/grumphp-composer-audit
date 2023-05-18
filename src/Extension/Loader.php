<?php

declare(strict_types=1);

namespace Madikon\GrumphpComposerAudit\Extension;

use GrumPHP\Extension\ExtensionInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;
use Madikon\GrumphpComposerAudit\Task\ComposerAudit;

/**
 * Class Loader
 */
class Loader implements ExtensionInterface
{
    /**
     * @param ContainerBuilder $container
     */
    public function load(ContainerBuilder $container): void
    {
        $container->register('task.composer_audit', ComposerAudit::class)
            ->addArgument(new Reference('process_builder'))
            ->addArgument(new Reference('formatter.raw_process'))
            ->addTag('grumphp.task', ['task' => 'composer_audit']);
    }
}
