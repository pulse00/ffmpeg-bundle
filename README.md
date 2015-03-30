Symfony ffmpeg bundle
=====================

[![Latest Stable Version](https://poser.pugx.org/pulse00/ffmpeg-bundle/v/stable.svg)](https://packagist.org/packages/pulse00/ffmpeg-bundle) [![Total Downloads](https://poser.pugx.org/pulse00/ffmpeg-bundle/downloads.svg)](https://packagist.org/packages/pulse00/ffmpeg-bundle) [![Latest Unstable Version](https://poser.pugx.org/pulse00/ffmpeg-bundle/v/unstable.svg)](https://packagist.org/packages/pulse00/ffmpeg-bundle) [![License](https://poser.pugx.org/pulse00/ffmpeg-bundle/license.svg)](https://packagist.org/packages/pulse00/ffmpeg-bundle)

This bundle provides a simple wrapper for the [PHP_FFmpeg](https://github.com/alchemy-fr/PHP-FFmpeg) library, 
exposing the library as a Symfony service.

### Example usage

Configure which ffmpeg binary to use in `config.yml`:


``` yaml
  dubture_f_fmpeg:
    ffmpeg_binary: /usr/bin/ffmpeg
    ffprobe_binary: /usr/bin/ffprobe
    binary_timeout: 300 # Use 0 for infinite
    threads_count: 4
```


Using the service:

```php
	$ffmpeg = $this->get('dubture_ffmpeg.ffmpeg');

	// Open video
	$video = $ffmpeg->open('/your/source/folder/input.avi');
	
	// Resize to 1280x720
	$video
        ->filters()
        ->resize(new Dimension(1280, 720), ResizeFilter::RESIZEMODE_INSET)
        ->synchronize();

    // Start transcoding and save video
    $video->save(new X264(), '/your/target/folder/video.mp4');
```
