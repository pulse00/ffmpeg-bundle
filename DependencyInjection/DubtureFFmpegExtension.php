<?php

namespace Dubture\FFmpegBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * This is the class that loads and manages your bundle configuration
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html}
 */
class DubtureFFmpegExtension extends Extension
{
    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $loader = new Loader\XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));

        // Depending on the dependency injection version load the corresponding factories
        // The new setFactory method was introduced in 2.6 and the old way removed in 3.0
        if (method_exists('Symfony\\Component\\DependencyInjection\\Definition', 'setFactory')) {
            $loader->load('factories.xml');
        } else {
            $loader->load('factories-2.3.xml');
        }

        $container->setParameter('dubture_ffmpeg.binary', $config['ffmpeg_binary']);
        $container->setParameter('dubture_ffprobe.binary', $config['ffprobe_binary']);
        $container->setParameter('dubture_ffmpeg.binary_timeout', $config['binary_timeout']);
        $container->setParameter('dubture_ffmpeg.threads_count', $config['threads_count']);
    }
}
