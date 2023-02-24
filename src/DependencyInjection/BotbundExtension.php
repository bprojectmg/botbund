<?php

namespace Bprojectmg\Botbund\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\PrependExtensionInterface;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

class BotbundExtension extends Extension implements PrependExtensionInterface
{
    /**
     * {@inheritdoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $processedConfig = $this->processConfiguration($configuration, $configs);

        $container->setParameter('botbund', $processedConfig);
        $container->setParameter('botbund.fb_api_version', $processedConfig['fb_api_version']);
        $container->setParameter('botbund.pages.access_token', $processedConfig['pages']['access_token']);
        $container->setParameter('botbund.pages.verify_token', $processedConfig['pages']['verify_token']);

        // $loader = new YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        // $loader->load('services.yaml');
    }

    public function prepend(ContainerBuilder $container)
    {
        // TODO: Implement prepend() method.
    }

    public function getAlias(): string
    {
        return parent::getAlias();
    }
}
