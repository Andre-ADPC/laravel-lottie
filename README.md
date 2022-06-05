<!-- @format -->

### Introduction | 简介

# NOTE: this is still a work-in-progress | 注意：这仍然是一个正在进行的工作

As the name suggests, laravel-lottie can make it easier for you to use [Lottie Animation JSON files](https://lottiefiles.com/), in Laravel Blade templates. It is also possible to use [Ali-Pay's emoji Animations](https://design.alipay.com/emotion).

This package was forked from [Pys/1992](https://github.com/pys1992/laravel-blade-lottie) on Github and is being adapted for use with both Lottie-Web and Bodymovin, running on Laravel 9 and PHP 8.
It is still a work-in-progress, and this is my first attempt to create a Laravel package.

顾名思义，laravel-lottie 可以让你更轻松地在 Laravel Blade 模板中使用 [Lottie Animation JSON 文件](https://lottiefiles.com/)。 也可以使用 [Ali-Pay 的 emoji Animations](https://design.alipay.com/emotion)。

这个包是从 Github 上的 [Pys/1992](https://github.com/pys1992/laravel-blade-lottie) 派生的，并且正在适应 Lottie-Web 和 Bodymovin，在 Laravel 9 和 PHP 8 上运行。
它仍在进行中，这是我第一次尝试创建 Laravel 包。

## Usage | 用法

### Installing the package | 安装包

    composer require adpc/laravel-lottie

### Publishing the Required Files | 发布必要文件

    php artisan lottie:publish

This operation will copy the configuration file to `config/lottie.php` and will also publish the required frontend files to `public/vendor/lottie`.

这个操作会把配置文件复制为 `config/lottie.php`，还会把需要用到的前端文件发布到 `public/vendor/lottie`。

### Opting-out of Package Discovery | 选择退出包发现

If you would like to disable "package discovery" for this package, you may list the package name in the `extra` section of Your application's `composer.json` file in the ROOT of Your application before running `composer update`, as shown below. You can refer to [Laravel's Documentation](https://laravel.com/docs/9.x/packages#opting-out-of-package-discovery) to read more about managing the packages you use in the development of your applications.

如果您想禁用此包的“包发现”，您可以在运行 `composer update` 之前，在应用程序的根目录中的 `composer.json` 文件的 `extra` 部分列出包名称，如图所示 以下。 您可以参考 [Laravel 的文档](https://laravel.com/docs/9.x/packages#opting-out-of-package-discovery) 了解更多关于应用程序开发中的包管理。

    "extra": {
    "laravel": {
        "dont-discover": [
            "adpc/laravel-lottie"
        ]
    }

},

### Implementing app.js into the Blade File | 在 Blade 文件中实现 app.js

Add `<script src="{{ asset('vendor/lottie/app.js') }}" defer></script>` to the required pages in the script section. Generally, adding it to the `views/layouts/app.blade.php` will be more convenient.

在需要用到页面中添加 `<script src="{{ asset('vendor/lottie/app.js') }}" defer></script>`。但是通常来说，把它添加到 `views/layouts/app.blade.php` 中会比较方便。

### Tips for Improved Performance | 提高性能的提示

• I recommend using the CDN pre-connect link because it has a fast connection response so that your script doesn’t affect the page load- speed too much.
• Ideally, adding the script to the FOOTER section will prevent loading too early, but it depends on the use-case and UX page rendering requirements.
• Pre-connect the library server in the HEAD for faster script loading:

    <link rel="preconnect" href="https://cdnjs.cloudflare.com/" crossorigin>

• Next, prefetch the JSON animation files in HEAD for faster loading:

    <link rel="preload" as="fetch" crossorigin="anonymous" type="application/json" href="/animation/your-animation.json">

### Implementing a Lottie animation JSON data file into the Blade File | 在 Blade 文件中实现 Lottie 动画 JSON 数据文件

The JSON files can be downloaded for free on the [lottie files](https://lottiefiles.com/) official website. To download a file, you need to register an account.
There is a test JSON from Pys/1992's repository available [here](https://raw.githubusercontent.com/pys1992/storage/main/hello-lottie.json). Download and save or copy the content of the JSON file to ` storage/app/public/lottiefiles/hello.json`.

有一个来自 Pys/1992 存储库的测试 JSON 可用 [这里](https://raw.githubusercontent.com/pys1992/storage/main/hello-lottie.json) 。 下载并保存或复制 JSON 文件的内容到 `storage/app/public/lottiefiles/hello.json` 。

### Using the Package Components | 使用包组件

After introducing `<x-lottie-hello/>` in `views/layouts/app.blade.php`, and opening your project in a browser, you should be able to see a GIF render of the JSON file:

在 `views/layouts/app.blade.php` 中引入 `<x-lottie-hello/>` 后，在浏览器中打开您的项目，您应该能够看到 JSON 文件的 GIF 渲染：

![](https://cdn.jsdelivr.net/gh/pys1992/storage@main/20210331110313.gif)

## About app.js | 关于 app.js

Firstly, [lottie-web](https://github.com/airbnb/lottie-web) is essential, or, you could use [Bodymovin's package](https://cdnjs.cloudflare.com/ajax/libs/bodymovin/5.9.4/lottie.min.js) which has a bit more functionality if you require it. The `laravel-lottie` package also uses [alpinejs](https://github.com/alpinejs/alpine). Alpine.JS is used to implement some of the JS operations.
These vendor files are packaged in `public/vendor/lottie/app.js`, so you can use them directly.

You can also package `lottie-web`, `bodymovin` and `alpinejs` in your own `app.js`. If you do, then the above mentioned `<script src="{{ asset('vendor/lottie/app. js') }}" defer></script>` is unnecessary.

首先，[lottie-web](https://github.com/airbnb/lottie-web) 是必不可少的，或者，你可以使用[Bodymovin's package](https://cdnjs.cloudflare.com/ajax/libs/bodymovin/5.9.4/lottie.min.js)，如果您需要，它具有更多功能。 laravel-lottie 包也使用 [alpinejs](https://github.com/alpinejs/alpine)。 Alpine.JS 用于实现一些 JS 操作。
这些 vendor 文件打包在 `public/vendor/lottie/app.js` 中，因此您可以直接使用它们。

您也可以将 `lottie-web`、`bodymovin` 和 `alpinejs` 打包到自己的 `app.js` 中。 如果你这样做了，那么上面提到的`<script src="{{asset('vendor/lottie/app.js') }}" defer></script>`就没有必要了。

Example code snippets | 示例代码片段

```html
<script src="js/bodymovin.js" type="text/javascript"></script>
<!-- OR -->
<script
  src="https://cdnjs.com/libraries/bodymovin"
  type="text/javascript"
></script>
```

## How to Configure the Animation's Parameters | 如何配置动画的参数

It depends on [lottie-web](https://github.com/airbnb/lottie-web#usage), which provides some properties and methods for controlling animations.
In the case of Bodymovin's Usage, please refer to their [documentation](http://airbnb.io/lottie/#/web).

它依赖于[lottie-web](https://github.com/airbnb/lottie-web#usage)，它提供了一些控制动画的属性和方法。
关于 Bodymovin 的使用，请参考他们的[文档](http://airbnb.io/lottie/#/web)。

### Loop Control | 属性

In `config/lottie.php` you can define the global loop playback property. If it is defined separately for each component, you can do this:

在 `config/lottie.php` 中可以定义全局的是否循环播放属性，如果为每个组件单独定义，可以这样做：

```html
<x-lottie-hello loop="true" />
```

or | 或者

```html
<x-lottie-hello loop="3" />
```

Or use abbreviated as: | 或者简写为：

```html
<x-lottie-hello loop />
```

### The autoplay Attribute | 自动播放属性

The global autoplay property can also be defined in `config/lottie.php`. If it is defined separately for each component, you can do the following:

在 `config/lottie.php` 中可以定义全局的是否自动播放属性，如果为每个组件单独定义，可以这样做：

```html
<x-lottie-hello autoplay="false" />
```

Or use abbreviated as: | 或者简写为：

```html
<x-lottie-hello autoplay />
```

### Call Method | 调用方法

In the blade component, when alpine.js is initialized, the `lottie-web` instance is bound to `animation`. So, you can use `animation` to call the methods provided by `lottie-web` to control the animation.

For example, if you want a click animation to stop, you can do so by calling `animation.stop()` in the click event. `click` is provided by alpine.js, you can read more about various usage cases at [alpinejs#use](https://github.com/alpinejs/alpine#use).

在刀片组件中，初始化 alpine.js 时，`lottie-web` 实例绑定到 `animation`。因此，您可以使用 `animation` 调用 `lottie-web` 提供的方法来控制动画。

例如，如果您希望点击动画停止，您可以通过在点击事件中调用 `animation.stop()` 来实现。 `click` 由 alpine.js 提供，您可以在 [alpinejs#use](https://github.com/alpinejs/alpine#use) 阅读更多关于各种使用案例的信息。

```html
<x-lottie-hello @click="animation.stop()" />
```

## Custom CSS 'class' | 自定义 CSS 'class'

The custom CSS class can be appended to the animation container. Refer to the [Laravel Documentation](https://laravel.com/docs/9.x/blade#default-merged-attributes).
For example, you can customize the CSS class as follows:

自定义 CSS 类可以附加到动画容器中，参考 [Laravel 文档](https://laravel.com/docs/9.x/blade#default-merged-attributes)。
例如，您可以按如下方式自定义 CSS 类：

```html
<x-lottie-hello class="h-16 w-auto z-20" />
```

## Custom non 'class' Attributes | 自定义非 'class' 属性

If you need to conditionally compile classes on other HTML elements that shouldn't receive merged attributes, you can use the `@class` directive.
The custom attribute will be added to the animation container. If the same attribute already exists, the original will be overwritten. Refer to [Laravel documentation](https://laravel.com/docs/9.x/blade#non-class-attribute-merging).

For example, you can customize the element with the `style` attribute:

如果您需要有条件地编译不应接收合并属性的其他 HTML 元素上的类，您可以使用 `@class` 指令。
自定属性的会被添加到动画容器上，如果已存在相同属性，则会把原来的覆盖，参考 [Laravel 文档](https://laravel.com/docs/9.x/blade#non-class-attribute-merging)。
例如，您可以使用 `style` 属性自定义元素：

```html
<x-lottie-hello style="w-100px h-auto z-10 bg-gray-700 " />
```

## About 'data_source' | 关于 'data_source'

Support to configure `url` and content. If a `url` is selected, the browser will send a request to obtain JSON data, which means that the network overhead will be increased; and if content is selected, the JSON data will be rendered through the backend, appended to HTML , and sent to the frontend. If the JSON data is large, the HTML page code might also get quite large. This hasn't been tested, yet.

支持配置 `url` 和内容。如果选择了 `url`，浏览器会发送请求获取 JSON 数据，这意味着网络开销会增加；如果选择了内容，JSON 数据将通过后端渲染，附加到 HTML，然后发送到前端。如果 JSON 数据很大，HTML 页面代码也可能会变得很大。这还没有经过测试。
