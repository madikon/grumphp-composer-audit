# Grumphp composer audit

Executes composer audit with [GrumPHP](https://github.com/phpro/grumphp).
Since Composer 2.4 there is a new command called audit, that lists reported security vulnerabilities on current package versions.
If the task encounters a vulnerable version, a warning is displayed.

## Installation

Install composer package

```bash
composer require --dev madikon/grumphp-composer-audit
```

Add the extension loader to your `grumphp.yml`

```yaml
grumphp:
  extensions:
    - Madikon\GrumphpComposerAudit\Extension\Loader
```

## Usage

Default configuration for grumphp

```yaml
grumphp:
  tasks:
    composer_audit:
      path: ./
      format: table | sumary | json
```

Results in the folowing command line call

```bash
composer audit --working-dir=path --format=format
```
