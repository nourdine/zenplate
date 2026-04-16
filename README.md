Zenplate
==========

### Intro

**Zenplate** is a simple template engine for PHP. As a matter of fact, PHP is by design a template engine already, so what this library really does is simply enabling you to load a template file and pass a bunch of variables to it. Such variables will only be visible inside the template itself (template scoped variables). 

Furthermore, Zenplate lets you register a bunch of helpers that can then be used inside your templates to make things easier at the markup generation level.

To use Zenplate it is mandatory that you know how to use native php inside a template using [alternative notation](https://www.php.net/manual/en/control-structures.alternative-syntax.php). Here's [an article on the matter that you should read](https://www.joeldare.com/wiki/php:using_php_as_a_template_engine) before moving on to the remainder of this introduction.

### The basics

Here's an example of how a template can be loaded using Zenplate:

```php
use zenplate\Zenplate;

$html = Zenplate::load("path-to-your-templates/template-1.php");

echo $html; // this will simply print the content of your `template-1.php` template.
```

Now, let's say we want to pass some data to the template. Here's how it is done:

```php
use zenplate\Zenplate;

$html = Zenplate::load("path-to-your-templates/template-1.php", [
   "name" => "Zenplate",
   "version" => 1
 ]);
```

Assuming the template looks like the following snippet:

```html
// file: template-1.php

<p>Hello, this is the <?= $name ?> library which is currently at version <?= $version ?></p>
```

We will eventually obtain the following markup where `$name` and `$version` have been correctly resolved:

```html
<p>Hello, this is the Zemplate library which is currently at version 1</p>
```

### Loading custom helpers

If you want to spice up Zenplate, you can do so by loading any helper class that you have developed youself. For instance, let's imagine we want to add a trivial helper which performs some simple text transformation. The following code shows how the helper registration is done:

```php
use Zenplate\Helper\Helper;

class StringHelper extends Helper
{
   public function upperc(string $str): string
   {
      return strtoupper($str);
   }
}

// ...and then, elsewhere, where we bootstrap our app, we go like:

Zenplate::addHelper("my_string_helper", new StringHelper());
```

Once the new helper added, we will be in the position to do the following inside any of our templates:

```php
<p><?= $helpers["my_string_helper"]->upperc($a_variable) ?></p>
```

### Native helpers

Zenplate comes with some pre-loaded native helpers. Have a good look [at this folder](https://github.com/nourdine/zenplate/tree/master/src/Helper) to see what they are like.

If you ever wanted to use them in your templates, they can be accessed using the names `sub`, `time`, `shortener` and `mprinter`.

Have a good one!
