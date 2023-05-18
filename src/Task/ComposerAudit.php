<?php

declare(strict_types=1);

namespace Madikon\GrumphpComposerAudit\Task;

use GrumPHP\Runner\TaskResult;
use GrumPHP\Runner\TaskResultInterface;
use GrumPHP\Task\AbstractExternalTask;
use GrumPHP\Task\Context\ContextInterface;

;
use GrumPHP\Task\Context\RunContext;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class ComposerAudit
 */
class ComposerAudit extends AbstractExternalTask
{
    /**
     * @return string
     */
    public function getName(): string
    {
        return 'composer_audit';
    }

    /**
     * @return OptionsResolver
     */
    public static function getConfigurableOptions(): OptionsResolver
    {
        $resolver = new OptionsResolver();
        $resolver->setDefaults(
            [
                'path' => dirname(__DIR__, 2),
                'format' => 'table'
            ]
        );
        $resolver->addAllowedTypes('path', ['string']);
        $resolver->addAllowedTypes('format', ['null', 'string']);

        return $resolver;
    }

    /**
     * @param ContextInterface $context
     * @return bool
     */
    public function canRunInContext(ContextInterface $context): bool
    {
        return $context instanceof RunContext;
    }

    /**
     * @param ContextInterface $context
     * @return TaskResultInterface
     */
    public function run(ContextInterface $context): TaskResultInterface
    {
        $config = $this->getConfig()->getOptions();

        $arguments = $this->processBuilder->createArgumentsForCommand('composer');
        $arguments->add('audit');
        $arguments->addOptionalArgument('--working-dir=%s', $config['path']);
        $arguments->addOptionalArgument('--format=%s', $config['format']);

        $process = $this->processBuilder->buildProcess($arguments);
        $process->run();

        if (!$process->isSuccessful()) {
            return TaskResult::createFailed($this, $context, $this->formatter->format($process));
        }

        return TaskResult::createPassed($this, $context);
    }
}
