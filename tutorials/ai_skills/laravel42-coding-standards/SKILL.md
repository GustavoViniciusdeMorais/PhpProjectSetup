---
name: laravel42-coding-standards
description: 'Laravel 4.2 / PHP 7 coding standards for the legacy api v1 (/var/www/html/api). Use when creating or reviewing any PHP class in api v1: Queues, Services, Integrations, Controllers, Models, or classes under app/lib. Triggers: "laravel 4.2", "api v1", "legacy code", "no type hints", "PHP 7 compatibility", "review this legacy class", "create a class in app/lib", "Redis payload", "queue job".'
argument-hint: 'Describe the class or file to create or review (e.g., "Queues\EmailService", "review app/lib/Integrations/OneSignal/BaseOneSignal.php")'
---

# Laravel 4.2 / PHP 7 Coding Standards — api v1

## Mandatory: Follow the Agent Rules

Always read and follow [`../../copilot-instructions.md`](../../copilot-instructions.md) before creating, refactoring, or reviewing any PHP code.

Concretely, this covers the agent rules on: no comments in code, database messages in Brazilian Portuguese, transaction control for multi-table updates, `vscode_askQuestions`-driven pair programming, building only the main class/function structure, and never running terminal commands.

## When to Use

- Creating or refactoring any class inside `/var/www/html/api` (`app/lib/**`, `app/controllers/**`, `app/models/**`)
- Reviewing a legacy class for PHP 7 / Laravel 4.2 compatibility
- Fixing IDE complaints (`Undefined type`, `Expected type 'string', got ...`)

Do **not** use this skill for the packages in `/var/www/html/apiv2` — those are Laravel 10 / PHP 8 and follow [`php-coding`](../php-coding/SKILL.md).

---

## Stack & Constraints

| Concern | Value |
|---|---|
| Framework | Laravel 4.2 |
| PHP | 7.x (legacy style) |
| Base path | `/var/www/html/api` |
| Class location | `app/lib/<Namespace>/<Class>.php` (composer classmap) |
| Collections | `Illuminate\Support\Collection` — **`collect()` does not exist** |
| DB access | `Illuminate\Support\Facades\DB` (Query Builder) |
| Config | `\Configurations::read('key')`, `\App::environment()` |

**Language features that must NOT be used:** scalar/`array` parameter type hints, return type declarations, arrow functions, spread operator, `match`, enums, attributes, constructor property promotion, named arguments, `readonly`. Target the lowest syntax that the existing api v1 files already use.

---

## Pre-Delivery Checklist

- [ ] No parameter type hints, no return types anywhere in the class
- [ ] Every method has a PHPDoc with matching `@param` / `@return`
- [ ] All facades used are imported with `use`, no leading `\` on imported classes
- [ ] Query Builder chains, one method per line, bindings/`whereIn` instead of string concatenation
- [ ] Collection methods used instead of `foreach`
- [ ] Max 3 parameters, max 2 `if`, max 1 `return`, max 20 methods, max 200 lines
- [ ] No comments in code
- [ ] User-facing / DB messages in Brazilian Portuguese
- [ ] Verified the IDE reports no errors in the file

---

## References

- [Agent Instructions](../../copilot-instructions.md) — **mandatory, always apply first**
- [`php-standards`](../php-standards/SKILL.md) — PSR-12 and project style rules
- [PHP 7 type declarations](https://www.php.net/manual/en/functions.arguments.php#functions.arguments.type-declaration)
- [Laravel 4.2 Query Builder](https://laravel.com/docs/4.2/queries)
- [Laravel 4.2 Collections](https://laravel.com/docs/4.2/eloquent-collections)
