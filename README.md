TOEICTrainerBundle
==================

English project 2013-2014, Thibaut Smith and Clement Schanen.


Installation
------------

1. Web server
--

Firstly, be sure to have a working PHP/SQL web server. Symfony is compatible with most web servers, but the easiest configuration would probably be on Apache.

2. Downloading Symfony
--

Then install Symfony. We advice you to use Composer: for more information about Composer, please [check here](https://getcomposer.org/). About [ways to download](http://symfony.com/download) Symfony, and [Symfony itself](http://symfony.com/download). To install Symfony using Composer, you can use this command:

```bash
php composer.phar create-project symfony/framework-standard-edition path/ 2.4.2
(you may edit path/ for a more sexy url, or `mv` it to something else)
```

3. Downloading this bundle
--

Install this bundle. Create a directory `TN` in `path/src/`, then clone this repository:
```bash
    git clone https://github.com/TelecomNancyNet/TOEICTrainerBundle.git
```
4. Install BraincraftedBootstrapBundle
--

Firstly, you have to download the BraincraftedBootstrapBundle using composer.

So you need to edit `path/composer.json` with this informations :
```json
{
    "require": {
        "braincrafted/bootstrap-bundle": "~2.0"
    }
}

{
    "repositories": [
        {
            "type": "package",
            "package": {
                "name": "jquery/jquery",
                "version": "1.10.2",
                "dist": {
                    "url": "http://code.jquery.com/jquery-1.10.2.js",
                    "type": "file"
                }
            }
        }
    ],
    "require": {
        ... other dependencies
        "twbs/bootstrap": "3.0.*",
        "jquery/jquery":  "1.10.*"
    }
}
```
And add the bundle to `path/app/AppKernel.php` :

```php
# app/AppKernel.php

class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = array(
            // ...
            new Braincrafted\Bundle\BootstrapBundle\BraincraftedBootstrapBundle(),
        );
        // ...
    }
}
```
Finally, if you use Assetic, you can run this command :
```php
php app/console assetic:dump
```

If it is not the case, see further informations see in [BraincraftedBootstrapBundle website's](http://bootstrap.braincrafted.com/).

5. Integration of the bundle
--

Integrate into your working Symfony installation: edit `path/src/AppKernel.php` and add the following code in the $bundles array:
```php
    new TN\TOEICTrainerBundle\TOEICTrainerBundle(),
```

Then add the bundle's routes. Head to `path/app/config/routing.yml` and add the following:
```yaml
    toeic_t:
    resource: "@TOEICTrainerBundle/Resources/config/routing.yml"
    prefix:	/toeic
```
