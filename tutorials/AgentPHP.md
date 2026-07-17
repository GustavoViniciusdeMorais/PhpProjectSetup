---
name: php-coding
description: 'PHP/Laravel coding skill for this project. Use when creating or reviewing Controllers, Actions, DTOs, Models, Services, Migrations, QueryBuilders, or any PHP class in this Laravel 10 codebase. Triggers: "create a controller", "create an action", "create a DTO", "write a migration", "review this PHP class", "refactor this method", "add a route", "create a service", "write a test", "review coding standards".'
argument-hint: 'Describe what you want to create or review (e.g., "CreateUserAction", "UserController store method")'
---

# PHP Coding Skill — Laravel 10 / PHP 8

## When to Use
- Creating or refactoring Controllers, Actions, DTOs, Models, Resources, Migrations
- Reviewing PHP code for standards compliance
- Writing Eloquent queries, QueryBuilder filters, or DB transactions
- Implementing business logic with Lorisleiva Actions
- Creating Spatie Laravel Data DTOs with validation
- Writing Pest tests for new features

---

## Stack & Libraries

| Concern | Library |
|---|---|
| Framework | Laravel 10 |
| PHP | 8.x |
| DTOs | `spatie/laravel-data` |
| Actions | `lorisleiva/laravel-actions` |
| QueryBuilder | `spatie/laravel-query-builder` |
| ORM | Eloquent |
| Testing | Pest |

---

## Coding Constraints (Enforce Always)

- Max **2 `if` statements** per function
- Max **1 `return`** per function
- Max **3 parameters** per function — use a DTO if exceeded
- Max **20 methods** per class
- Max **200 lines** per class
- Functions must **not** alter variables outside their scope
- Use **early returns** (happy path last)
- Use **type hinting** and **return types** on all methods
- Use **Laravel Collections** instead of `foreach` loops
- Use **PHP helper functions** (`strlen`, `implode`, etc.) instead of reimplementing them
- Apply **SOLID, DRY, KISS** principles
- Correct all **spelling mistakes** in variables, methods, classes, and strings
- DB messages stored (e.g., error translations) must be in **Brazilian Portuguese**
- **No inline comments** unless logic is genuinely complex

---

## Architecture Patterns

### Controller
- Thin controller — no business logic
- Use `try/catch` with `Throwable`
- Return JSON with `status`, `message`, `data`
- Use `findOrFail` for single-record lookups

```php
use Illuminate\Routing\Controller;
use Illuminate\Http\JsonResponse
use Throwable;

class ExampleController extends Controller
{
    public function show(int $id): JsonResponse
    {
        try {
            $record = SomeModel::findOrFail($id);

            return response()->json([
                'status'  => 'success',
                'message' => 'Operação realizada com sucesso.',
                'data'    => [$record],
            ], 200);
        } catch (Throwable $e) {
            return response()->json([
                'status'  => 'error',
                'message' => trans('system.default.error'),
                'data'    => [],
            ], 500);
        }
    }
}
```

### DTO (Spatie Laravel Data)
- Use `public` constructor property promotion
- Define `rules()` returning validation array
- Define `messages()` with PT-BR messages

```php
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Support\Validation\ValidationContext;

class CreateUserData extends Data
{
    public function __construct(
        public string $name,
        public string $email,
    ) {}

    public static function rules(ValidationContext $context): array
    {
        return [
            'name'  => ['required', 'string', 'max:255'],
            'email' => ['required', 'email'],
        ];
    }

    public static function messages(...$args): array
    {
        return [
            'name.required'  => 'O nome é obrigatório.',
            'email.required' => 'O e-mail é obrigatório.',
        ];
    }
}
```

### Action (Lorisleiva)
- Single `handle()` public method
- Call via `ActionClass::run($data)`
- No HTTP logic inside actions

```php
use Lorisleiva\Actions\Concerns\AsAction;

class CreateUserAction
{
    use AsAction;

    public function handle(CreateUserData $data): User
    {
        return User::create($data->toArray());
    }
}
```

### QueryBuilder (Spatie)
```php
use Spatie\QueryBuilder\QueryBuilder;

$users = QueryBuilder::for(User::class)
    ->allowedFields(['id', 'name', 'email'])
    ->allowedFilters(['name', 'email'])
    ->allowedIncludes(['posts'])
    ->paginate();
```

### DB Transaction (multi-table writes)
Always wrap multi-table writes in a transaction. Import `DB` facade only if not already present.

```php
use Illuminate\Support\Facades\DB;

DB::beginTransaction();

try {
    User::where('id', $id)->update(['name' => $name]);
    Profile::where('user_id', $id)->update(['bio' => $bio]);

    DB::commit();
} catch (Throwable $e) {
    DB::rollBack();
    throw $e;
}
```

---

## Eloquent Best Practices

- Eager load relationships to avoid N+1 (`with()`)
- Use query scopes for reusable filters
- Use `casts` for JSON fields and booleans
- Write queries on multiple lines for readability:

```php
User::query()
    ->where('active', true)
    ->whereHas('roles', fn ($q) => $q->where('name', 'admin'))
    ->orderBy('name')
    ->get();
```

---

## PHP Style (PSR-12 + Project Conventions)

- Nullable shorthand: `?string` not `string|null`
- `void` return type for methods that return nothing
- Typed properties — no docblock for simple types
- Enum values in camelCase
- Property promotion in constructors (comma after last item)
- String interpolation preferred: `"Hi, {$name}"`
- Each trait on its own `use` line
- Ternary on one line for short expressions; multi-line for long ones
- Avoid `else` — use early return or ternary
- Compound `if` conditions stacked vertically with `&&`
- Always use curly braces in `if` statements

---

## Security Checklist (OWASP)

- Never concatenate raw user input into queries — use Eloquent ORM or query bindings
- Validate all inputs via FormRequest or DTO `rules()`
- Return only necessary fields in API Resources
- Never expose stack traces in production responses
- Use `trans()` for user-facing messages (not hardcoded strings)

---

## Procedure: Creating a New Feature

1. **DTO** — define input shape with validation rules (`*Data.php`)
2. **Action** — implement business logic (`*Action.php`)
3. **Controller** — thin HTTP layer, call action, return JSON
4. **Resource** *(optional)* — shape API output
5. **Route** — register in `routes/api.php`
6. **Test** — write Pest test covering happy path + error cases

---

## References
- [PHP Coding Standards](../../php_coding_standards.md)
- [Agent Instructions](../../copilot-instructions.md)
- [Task Report Instructions](../../task-report-instructions.md)
