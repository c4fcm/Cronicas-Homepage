Crónicas de Héroes Homepage
===========================

This is the simple homepage that lives on heroreports.org / cronicasdeheroes.mx.  It simply 
shows a map of where HeroReports is used, and links to each installation.

Localization
------------

The text is localized via an `hr_language` environment variable.  To configure this, 
set it to `spa` or `eng` via the apache config file's `SetEnv` option:
```
<VirtualHost *:80>
	ServerName www.cronicasdeheroes.mx
	ServerAlias cronicasdeheroes.mx
	DocumentRoot /var/prod-www/homepage/
	SetEnv hr_language spa
</VirtualHost>
```

If you add any text, wrap it in a call to `$t` like so:
```php
<h1><?=$t['title']?></h1>
```
and add the text to the `.po` file for each language in the `locale` directory.
