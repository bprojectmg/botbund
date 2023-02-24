<?php

namespace Bprojectmg\Botbund\DependencyInjection;

use Bprojectmg\Botbund\Interface\BotbundInterface;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder(BotbundInterface::CONFIG_KEY);

        $treeBuilder->getRootNode()
            ->children()
            ->scalarNode('fb_api_version')->end()
            ->arrayNode('pages')
                ->children()
                    ->scalarNode('access_token')->end()
                    ->scalarNode('verify_token')->end()
                ->end()
            ->end()
        ->end();

        return $treeBuilder;
    }
}
