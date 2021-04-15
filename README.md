Zenplate
==========

### Intro

Zenplate is a simple template engine for PHP. As a matter of fact, PHP is by design a template engine already, so what this library really does is simply enabling you to load a template file and pass a bunch of variables to it. Such variables will only be visible inside the template itself (template scoped variables). 

Furthermore, the library lets you load/register a bunch of helpers that can be then used inside your templates to make things easier at the markup generation level.

To use Zenplate it is mandatory that you know how to use native php inside a template using [alternative notation](https://www.php.net/manual/en/control-structures.alternative-syntax.php). Here's [an article on the matter that you should read](https://www.joeldare.com/wiki/php:using_php_as_a_template_engine) before moving on to the remainder of this tutorial.

### The basics

Here's an example of how a template can be loaded using Zenplate.

```php
use zenplate\Zenplate;

$html = Zenplate::load("path-to-your-templates/template-1.php");

echo $html; // this will simply print the content of your `template-1.php` template.
```

Now, let's say we want to pass data to the template. We can do so like that:

```php
use zenplate\Zenplate;

$html = Zenplate::load("path-to-your-templates/template-1.php", [
   "name" => "Zenplate",
   "version" => 1
 ]);
```

Assuming the template is defined like so:

```php
// file: template-1.php

<p>Hello, this is the library <?= $name ?> which is currently at version <?= $version ?></p>
```

We will then eventually obtain this markup:

```html
<p>Hello, this is the library Zemplate which is currently at version 1</p>
```

### Loading custom helpers

If you want to spice up Zenplate, you can do so by loading custom helpers that you are going to develop youself. For instance, let's say we want to add a trivial helper which perform some simple text transformation. We can do it like so:

```php
use zenplate\helper\Helper;

class StringHelper extends Helper
{

   public function upperc($str)
   {
      return strtoupper($str);
   }
}

// and then, elsewhere, where we bootstrap our app we go like:

Zenplate::addHelper("my_string_helper", new StringHelper());
```

Once that's done, in a template loaded using Zenplate, we will be in the position to do the following:

```php
<p><?= $helpers["my_string_helper"]->upperc($a_variable) ?></p>
```

### Native helpers

Zenplate comes with some pre-loaded helpers. Have a good look [at this folder](https://github.com/nourdine/zenplate/tree/master/src/zenplate/helper) to see what they are like and what they are for. 

They are registered as `time`, `shortener` and `mprinter` if you ever wanted to use them in your templates.

### Running Unit Tests

```
composer install
composer run-script test
```
