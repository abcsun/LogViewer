LogViewer for Laravel/ Lumen
=================
本项目基于 [Laravel LogViewer](https://github.com/BootstrapCMS/LogViewer)开发，源项目为laravel开发，支持以日期方式读取查看log文件。在此基础上增加了Lumen LogViewer，用于查看lumen.log文件，同时增加了本地bootstrap和Jquery源，防止被墙：）

###Lumen使用帮助
####安装
- 使用`composer requirean`安装
- 增加logviewer路由组
<pre>
$app->group(['namespace' => 'GrahamCampbell\LogViewer\Http\Controllers'], function ($app) {
  $app->get('/logviewer/lumen/show', ['as' => 'logviewer.lumen.show', 'uses' => 'LogViewerController@getLumenShow']);
  $app->get('/logviewer/lumen/delete', ['as' => 'logviewer.lumen.delete', 'uses' => 'LogViewerController@getLumenDelete']);
  $app->get('/logviewer/lumen/{level}', ['as' => 'logviewer.lumen.data', 'uses' => 'LogViewerController@getLumenData']);
});
</pre>
- 复制本组件中的assets/logviewer文件夹到主项目的public/assets下
- 使用http://youdomain/logviewer/lumen/show查看日志文件

使用截图如下
![](http://i4.tietuku.com/fc6a62d361eaeda2.png)

###Laravel使用帮助
Laravel LogViewer was created by, and is maintained by [Graham Campbell](https://github.com/GrahamCampbell), and provides a LogViewer admin module for [Laravel 5](http://laravel.com). Feel free to check out the [releases](https://github.com/BootstrapCMS/LogViewer/releases), [license](LICENSE), and [contribution guidelines](CONTRIBUTING.md).

## Installation

[PHP](https://php.net) 5.5+ or [HHVM](http://hhvm.com) 3.6+, and [Composer](https://getcomposer.org) are required.

To get the latest version of Laravel LogViewer, simply add the following line to the require block of your `composer.json` file:

```
"graham-campbell/logviewer": "~1.0"
```

You'll then need to run `composer install` or `composer update` to download it and have the autoloader updated.

Once Laravel LogViewer is installed, you need to register the service provider. Open up `config/app.php` and add the following to the `providers` key.

* `'GrahamCampbell\LogViewer\LogViewerServiceProvider'`


## Configuration

Laravel LogViewer supports optional configuration.

To get started, you'll need to publish all vendor assets:

```bash
$ php artisan vendor:publish
```

This will create a `config/logviewer.php` file in your app that you can modify to set your configuration. Also, make sure you check for changes to the original config file in this package between releases.

There are two config options:

##### Middleware

This option (`'middleware'`) defines the middleware to be put in front of the endpoints provided by this package. A common use will be for your own authentication middleware. The default value for this setting is `[]`.

##### Per Page

This option (`'per_page'`) defines defines how many log entries are displayed per page. The default value for this setting is `20`.

##### Layout

This option (`'layout'`) defines the layout to extend when building views. The default value for this setting is `'layouts.default'`.


## Usage

Laravel LogViewer is designed to work with [Bootstrap CMS](https://github.com/BootstrapCMS/CMS). In order for it to work in any Laravel application, you must ensure that you know how to use my [Laravel Core](https://github.com/GrahamCampbell/Laravel-Core) package as configuration and knowledge of the `app:install` and `app:update ` commands is required.

Laravel LogViewer will register four routes. The only one of interest to you is `'logviewer'` (`logviewer.index`) as it will be the main entry point for the use of this package. You can checkout the other three routes in the [source](https://github.com/BootstrapCMS/LogViewer/blob/master/src/routes.php) if you must.


## License

Laravel LogViewer is licensed under [The MIT License (MIT)](LICENSE).
