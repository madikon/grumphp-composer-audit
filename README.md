# Grumphp composer audit

Execute composer audit with [GrumPHP](https://github.com/phpro/grumphp).

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
