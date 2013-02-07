Symfony ffmpeg bundle
=====================

This bundle provides a simple wrapper for the [PHP_FFmpeg](https://github.com/alchemy-fr/PHP-FFmpeg) library, 
exposing the library as a Symfony service.

### Example usage

Configure which ffmpeg binary to use in `config.yml`:


``` yaml
  dubture_f_fmpeg:
    binary: /usr/bin/ffmpeg

```


Using the service:

```php
	$ffmpeg = $this->get('dubture_ffmpeg.ffmpeg');
	$ffmpeg->open('Video.mpeg')
    		->encode(new WebM(), 'file.webm')
    		->encode(new X264, 'file.mp4')
    		->encode(new Ogg(), 'file.ogv')
    		->close();
```
