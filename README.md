# Yii2 PhpUnit
[![Test & Lint](https://github.com/Horat1us/yii2-phpunit/actions/workflows/php.yml/badge.svg)](https://github.com/Horat1us/yii2-phpunit/actions/workflows/php.yml)

Yii 2 PHPUnit compatibility layer and enhancements
This package includes:
- [TestLogger](./src/TestLogger.php) - will display all log messages to console
- [TestMailer](./src/TestMailer.php) - will collect all sent mails in memory
- [TestCase](./src/TestCase.php) - base TestCase, extends PHPUnit TestCase.
It will create new `\yii\console\Application` instance before each test and apply Yii2 fixtures.
After each test it restores the error and exception handlers registered by the application.
- [MigrateFixture](./src/MigrateFixture.php) - Yii2 fixture that will apply migration.
Use case: your package contains migrations and you need to apply it before tests.

**Note: this package supposed to support old packages, that depends on it**

Compatibility: tested on PHP 8.4, PHP 8.5 (PHPUnit 13).
Projects on PHPUnit 9 stay on `0.0.x`.

## Usage
- Install package and *horat1us/yii2-phpunit* as dev dependencies
```bash
composer require --dev horat1us/yii2-phpunit:^0.1
```
- Configure your PHPUnit and create bootstrap file with alias to config:
```php
<?php
// bootstrap.php

Yii::setAlias('@configFile', 'path-to-config.php');
```
- Create your test cases that extend [Horat1us\Yii\PHPUnit\TestCase](./src/TestCase.php)

## Testing
The tests use an in-memory SQLite database (`pdo_sqlite`).
Set `DB_DSN`, `DB_USERNAME` and `DB_PASSWORD` to run them against another database.
```bash
composer test
```

## License
[LICENSE](./LICENSE)


## Example
See [horat1us/yii2-advanced-package](https://github.com/Horat1us/yii2-advanced-package) for details.
