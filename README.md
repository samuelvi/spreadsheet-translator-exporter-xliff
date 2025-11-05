Spreadsheet Translator Xliff Exporter
========================

![CI](https://github.com/samuelvi/spreadsheet-translator-exporter-xliff/workflows/CI/badge.svg)
[![codecov](https://codecov.io/gh/samuelvi/spreadsheet-translator-exporter-xliff/branch/master/graph/badge.svg)](https://codecov.io/gh/samuelvi/spreadsheet-translator-exporter-xliff)

Exports a given translation structure into xliff translation file format.

Related
------------

  - <a href="https://github.com/samuelvi/spreadsheet-translator-core">Core Bundle</a>
  - <a href="https://github.com/samuelvi/spreadsheet-translator-symfony-bundle">Symfony Bundle</a>


Requirements
------------

  * PHP >= 8.4
  * Composer 2.x


Installation
------------

```bash
composer require samuelvi/spreadsheet-translator-exporter-xliff
```


Development
-----------

### Setup

```bash
# Install dependencies
make install

# or
composer install
```

### Code Quality

This project uses Rector to maintain code quality and modern PHP standards.

```bash
# Check code quality (dry-run)
make rector-dry-run

# Apply code quality fixes
make rector
```

### Testing

The project includes comprehensive unit tests using PHPUnit 11.0.

```bash
# Run tests
make test

# or
vendor/bin/phpunit

# Run tests with coverage
vendor/bin/phpunit --coverage-html coverage
```


Features
--------

- **PHP 8.4 Ready**: Fully compatible with the latest PHP version
- **Type Safety**: Full type declarations for better IDE support and runtime safety
- **Modern Standards**: Code quality maintained with Rector
- **Well Tested**: Comprehensive unit test coverage
- **CI/CD**: Automated testing via GitHub Actions


Contributing
------------

We welcome contributions to this project, including pull requests and issues (and discussions on existing issues).

If you'd like to contribute code but aren't sure what, the issues list is a good place to start. If you're a first-time code contributor, you may find Github's guide to <a href="https://guides.github.com/activities/forking/">forking projects</a> helpful.

All contributors (whether contributing code, involved in issue discussions, or involved in any other way) must abide by our code of conduct.


License
-------

Spreadsheet Translator Xliff Exporter is licensed under the MIT License. See the LICENSE file for full details.