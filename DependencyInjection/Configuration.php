<?php

namespace Symfony\Cmf\Bundle\ContentBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('symfony_cmf_content');

        $rootNode
            ->children()
                ->scalarNode('admin_class')->defaultNull()->end()
                ->scalarNode('document_class')->defaultNull()->end()
                ->scalarNode('default_template')->defaultNull()->end()
                ->scalarNode('content_basepath')->defaultValue('/cms/content')->end()
                ->scalarNode('static_basepath')->defaultValue('/cms/content/static')->end()
                ->enumNode('use_sonata_admin')
                    ->values(array(true, false, 'auto'))
                    ->defaultValue('auto')
                ->end()
                ->arrayNode('multilang')
                    ->children()
                        ->scalarNode('admin_class')->defaultNull()->end()
                        ->scalarNode('document_class')->defaultNull()->end()
                        ->enumNode('use_sonata_admin')
                            ->values(array(true, false, 'auto'))
                            ->defaultValue('auto')
                        ->end()
                        ->arrayNode('locales')
                            ->prototype('scalar')
                        ->end()->end()
                    ->end()
                ->end()->end()
            ->end()
        ;

        return $treeBuilder;
    }
}
