# Laravel Line Bot

[![Latest Version on Packagist][ico-version]][https://packagist.org/packages/fei77/line-bot]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]


## Install

Via Composer

``` bash
$ composer require fei77/line-bot

# for laravel 5.4 and below add these lines to your config/app.php (for laravel 5.5 can skip this step as the provider will be added automatically)
# add the service provider
Fei77\LineBot\LineServiceProvider::class,
# register the alias
'Line' => Fei77\LineBot\Line::class,

# publish the config file
$ php artisan vendor:publish --provider=Fei77\LineBot\LineServiceProvider --tag="config"

# add these lines to your .env file
LINE_SECRET=[Channel secret]
LINE_TOKEN=[Channel access token]
```

## Usage
add a webhook to your routes/web.php
``` php
Route::post('/line/webhook', 'LineController@webhook');
```

Exclude the route from Csrf Token verivication.
``` php
protected $except = [
    '/line/webhook'
];
```

in your app/Http/Controllers/LineController.php
``` php
use Illuminate\Http\Request;
use Line;

class LineController extends Controller
{
    public function webhook(Request $request)
    {
    	$bot = new Line($request);
    	$bot->hears('hello')->reply('hi there!');
    }
}
```

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CODE_OF_CONDUCT](CODE_OF_CONDUCT.md) for details.

## Credits

- [Fei77][link-author]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/Fei77/LineBot.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/Fei77/LineBot/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/Fei77/LineBot.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/Fei77/LineBot.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/Fei77/LineBot.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/Fei77/LineBot
[link-travis]: https://travis-ci.org/Fei77/LineBot
[link-scrutinizer]: https://scrutinizer-ci.com/g/Fei77/LineBot/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/Fei77/LineBot
[link-downloads]: https://packagist.org/packages/Fei77/LineBot
[link-author]: https://github.com/Fei77
[link-contributors]: ../../contributors
