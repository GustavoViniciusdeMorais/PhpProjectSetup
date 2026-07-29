# Custom Instructions

### Agent Rules
- [Report template instructions](./task-report-instructions.md)
- Answer me in US English.
- The messages in the code that will be registered in the database must be in Portuguese (Brazilian).
- Do not add comments in the code.
- Do not give me code examples if I don't ask for them.
- Keep your answers simple and concise, I will ask for more details if needed.
- Always give me just the best three options when I ask for alternatives, keep your answers simple and short.
- No need to show me your thinking process.
- Always try to predict just the 10 next lines of code, wait for me.
- Always correct the words spelling mistakes in the code, portuguese or english, the texts, variables, methods
classes, everything.
- After your technical answers, always give me the name and links of the references you used
- Always use transaction control when updating more than one db table at a time. Add the use of illuminate db facade class just if it is not already in the script
- Always give a summary about the main process of the analized class, function or system process.
- Always build just the main class or function structure, do not try coding the business rule unless I ask to do.
- Never run commands in terminal or ask me to run the commands, just give the the instructions to following debugs in english human language.
- Always search for code in the files I attach to you in your side, in your server, never run commands in my server, never.
- Do not try to write and read from DB in the same time, always work with the returned ORM object that Laravel gives from save return.

### Project technical libraries requirements for composer
- laravel version 10
- php version 8
- php composer version 2.6.6 2023-12-08

### Coding Rules
- [My PHP Standards](./php_coding_standards.md)
- PHP Standards Recommendations PSR-12
- Use Spatie Laravel Data for DTOs
- Use Lorisleiva Actions for Action Classes
- Use try-catch in controller functions to return JSON responses with status, message, and data.
- Use Eloquent ORM for database interactions.
- Right the eloquent orm queries for better performance, human reading and maintenance, as simple as possible.
- Use type hinting and return types in all functions and methods.
- Use Laravel Collections for handling arrays of data instead of foreach loops, always.
- Search solutions of Laravel Framework first, if not exists create with php.
- Avoid sql injections, always use query bindings or Eloquent ORM and sanitize inputs.
- Always take in consideration all the rules about code cognitive complexity.
- A function can not alter the value of a variable out of its scope
- A function can not have more then two if statements
- A function can not have more then one return
- A function can not have more then 3 parameters, if so, create a data transfer object
- A class can not have more then 20 methods
- A class can not have more then 200 lines of code
- Every code suggestion must be easy for humans to understand and junior developers to maintain.
- Always use php helper functions, for instance, strlen to get string length.
- Always use the principles of SOLID, DRY (Don't repeat yourself), KISS (Keep It Simple Stupid)


### DTO Class
```php
use Spatie\LaravelData\Data;
use Illuminate\Validation\Rule;
use Spatie\LaravelData\Support\Validation\ValidationContext;

class PostData extends Data
{
    public function __construct(
        public string $title,
        public string $content,
    ) {
    }

    public static function rules(ValidationContext $context): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string'],
        ];
    }

    public static function messages(...$args): array
    {
        return [
            'title.required' => 'O título é obrigatório.',
            'content.required' => 'O conteúdo é obrigatório.',
        ];
    }
}
```

### Action Class
```php
use Lorisleiva\Actions\Concerns\AsAction;

class ExampleAction
{
    use AsAction;

    public function handle(PostData $data): void
    {
        // code
    }
}
```
### Controller
```php
use Illuminate\Routing\Controller;
use Throwable;

class ExampleController extends Controller
{
    /**
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function someFunctionName($id, Request $request)
    {
        try {
            $user = User::findOrFail($id);
            return response()->json([
                "status" => "success",
                "message" => "Operação realizada com sucesso.",
                "data" => [$user]
            ], 200);
        } catch (Throwable $e) {
            return response()->json([
                "status" => "error",
                "message" => trans("system.default.error"),
                "data" => []
            ], 500);
        }
    }
}
```

### Querybuilder
```php
use Spatie\QueryBuilder\QueryBuilder;

$users = QueryBuilder::for(User::class)
    ->allowedFields(['id', 'name'])
    ->allowedFilters('name')
    ->allowedIncludes(['posts'])
    -
```

### Database Transaction example
```php
use Illuminate\Support\Facades\DB;

DB::beginTransaction();

DB::table("users")
    ->where("id", 1)
    ->update(["name" => "test@email.com"]);

DB::commit();
```

### Print for debugging
```php
print_r(json_encode([
    'message' => $e->getMessage(),
    'file' => $e->getFile(),
    'line' => $e->getLine(),
    'details' => $e->getTrace(),
]));echo "\n\n";exit;
```
