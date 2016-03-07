<?php

namespace Dubture\FFmpegBundle\Tests\Unit\DependencyInjection;

use Dubture\FFmpegBundle\DependencyInjection\DubtureFFmpegExtension;
use Matthias\SymfonyDependencyInjectionTest\PhpUnit\AbstractExtensionTestCase;

/**
 * Test the extensions which adds parameters and services
 * to the container.
 *
 * @author Patrik Karisch <patrik@karisch.guru>
 */
class DubtureFFmpegExtensionTest extends AbstractExtensionTestCase
{
    /**
     * {@inheritDoc}
     */
    protected function getContainerExtensions()
    {
        return array(
            new DubtureFFmpegExtension(),
        );
    }

    /**
     * {@inheritDoc}
     */
    protected function setUp()
    {
        parent::setUp();

        $this->load(array(
            'ffmpeg_binary' => '/usr/local/bin/ffmpeg',
            'ffprobe_binary' => '/usr/local/bin/ffprobe',
        ));
    }

    public function testAfterLoadingTheCorrectParametersHaveBeenSet()
    {
        $this->assertContainerBuilderHasParameter('dubture_ffmpeg.binary', '/usr/local/bin/ffmpeg');
        $this->assertContainerBuilderHasParameter('dubture_ffprobe.binary', '/usr/local/bin/ffprobe');
        $this->assertContainerBuilderHasParameter('dubture_ffmpeg.binary_timeout', 60);
        $this->assertContainerBuilderHasParameter('dubture_ffmpeg.threads_count', 4);
    }

    public function testAfterLoadingTheFFMpegServiceExists()
    {
        $this->assertContainerBuilderHasService('dubture_ffmpeg.ffmpeg', 'FFMpeg\FFMpeg');
    }

    public function testAfterLoadingTheFFProbeServiceExists()
    {
        $this->assertContainerBuilderHasService('dubture_ffmpeg.ffprobe', 'FFMpeg\FFProbe');
    }
}
