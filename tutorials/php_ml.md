# Machine Learning with PHP

- [PHP-ML](https://php-ml.readthedocs.io/en/latest/)
- [GitHub Examples](https://github.com/php-ai/php-ml-examples)

### Requirements
```sh
composer create-project laravel/laravel ml-api
cd ml-api
composer require php-ai/php-ml
```

```sh
php artisan make:controller MachineLearningController
```

### Controller
```php
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Phpml\Classification\DecisionTree;
use Phpml\Dataset\CsvDataset;

class MachineLearningController extends Controller
{
    public function trainModel()
    {
        $dataset = new CsvDataset(storage_path('app/data.csv'), 1, true);

        $classifier = new DecisionTree();
        $classifier->train($dataset->getSamples(), $dataset->getTargets());

        // JSON
        file_put_contents(storage_path('app/model.json'), json_encode($classifier));
        
        return response()->json(['message' => 'Model trained and saved']);
    }

    public function predict(Request $request)
    {
        $data = $request->all();
        $sample = array_values($data); //array format

        // Load the trained model (deserialize)
        $classifier = json_decode(file_get_contents(storage_path('app/model.json')), true);
        
        $prediction = $classifier->predict($sample);

        return response()->json(['prediction' => $prediction]);
    }
}
```

### Routes
```php
use App\Http\Controllers\MachineLearningController;

Route::get('/train-model', [MachineLearningController::class, 'trainModel']);
Route::post('/predict', [MachineLearningController::class, 'predict']);
```
