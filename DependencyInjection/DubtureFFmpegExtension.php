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
        $loader->load('services.xml');

        $container->setParameter('dubture_ffmpeg.binary', $config['ffmpeg_binary']);
        $container->setParameter('dubture_ffprobe.binary', $config['ffprobe_binary']);
        $container->setParameter('dubture_ffmpeg.binary_timeout', $config['binary_timeout']);
        $container->setParameter('dubture_ffmpeg.threads_count', $config['threads_count']);
    }
}
