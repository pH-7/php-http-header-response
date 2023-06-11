# PHP HTTP Response

**Simple PHP package to easily send the right HTTP header responses to the browser 🐘**


## Requirement
 * [PHP v8.0](https://www.php.net/releases/8.0/en.php) or higher 🚀


## Installation

The simplest way to add this library to your project, is with Composer

```console
composer require ph-7/php-http-response-header
```

## 🪄 Usage - Examples

### Send Header By HTTP Code
```php
use PH7\PhpHttpResponseHeader\Header;

// Sends "200 OK" header to the browser
Http::setHeadersByCode(200);

// ...

// Send "201 Created" header
Http::setHeadersByCode(201);

// ...

// Sends "404 Not Found" to the browser
Http::setHeadersByCode(404);

// ...

// Sends "400 Bad Request" header to the browser
Http::setHeadersByCode(400);


// and so on ...
```

**But, the library has many more handy methods such as below:**

### Maintenance Code
```php
use PH7\PhpHttpResponseHeader\Header;

// Send 503, Service Temporarily Unavailable to the browser mentioning that you are doing a maintenance (good practice!)
Http::setMaintenanceCode($maintenanceTimeSeconds: 360);
```

### Get HTTP Protocol

```php
use PH7\PhpHttpResponseHeader\Header;

//  The HTTP server protocol
Http::getProtocol()
```

### Set Content Type
```php
use PH7\PhpHttpResponseHeader\Header;

// Send "Content-Type: application/json" header to the browser
Http::setContentType('application/json');

// Send "Content-type: text/xml" to the browser
Http::setContentType('text/xml');
```


## 🧑‍🍳 Who baked this?

[![Pierre-Henry Soria](https://s.gravatar.com/avatar/a210fe61253c43c869d71eaed0e90149?s=200)](https://PH7.me 'Pierre-Henry Soria personal website')

**Pierre-Henry Soria**. A super passionate and enthusiastic software engineer! 🚀 True cheese 🧀 , coffee, and chocolate lover! 😋 Reach me at [PH7.me](https://PH7.me) 💫

☕️ Are you enjoying it? **[Offer me a coffee](https://ko-fi.com/phenry)** and boost the software development at the same time! 💪

[![@phenrysay][twitter-image]](https://twitter.com/phenrysay) [![pH-7][github-image]](https://github.com/pH-7)


## ⚖️ License

**PHP HTTP Response** is generously distributed under the _[MIT](https://opensource.org/licenses/MIT)_ 🎉 Enjoy!


<!-- GitHub's Markdown reference links -->
[twitter-image]: https://img.shields.io/badge/Twitter-1DA1F2?style=for-the-badge&logo=twitter&logoColor=white
[github-image]: https://img.shields.io/badge/GitHub-100000?style=for-the-badge&logo=github&logoColor=white
