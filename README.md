TOEICTrainerBundle
==================

English projetc 2013-2014, Thibaut Smith and Clement Schanen.


Installation
------------

1. Web server
--

Firsly, be sure to have a working PHP/SQL web server. Symfony is compatible with most web servers, but the easiest configuration would probably be on Apache.

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

4. Integration of the bundle
--

Integrate into your woking Symfony installation: edit `path/src/AppKernel.php` and add the following code in the $bundles array:
```php
    new TN\TOEICTrainerBundle\TOEICTrainerBundle(),
```

Then add the bundle's routes. Head to `path/src/config/routing.yml` and add the following:
```yaml
    toeic_t:
    resource: "@TOEICTrainerBundle/Resources/config/routing.yml"
    prefix:	/toeic
```
