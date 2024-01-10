
# LaravelRequestDefault README

## Introduction

LaravelRequestDefault is a Laravel library designed to enhance Laravel Requests by allowing developers to set default values for request parameters. This library is particularly useful in scenarios where certain request parameters may not be provided but are needed for the application logic to function correctly. It seamlessly integrates with Laravel's existing request validation system, making it a convenient addition to any Laravel project.

## Features

- **Default Value Setting**: Easily set default values for any request parameters.
- **Seamless Integration**: Works coherently with Laravel's validation and request handling.
- **Flexible Configuration**: Define defaults for various request types within your application.

## Installation

To install LaravelRequestDefault, you need to require the package via Composer. Run the following command in your terminal:

```bash
composer require wibesoft-company/laravel-request-default
```

## Usage

### Basic Usage

After installing the package, use the `InputDefaulter` trait in your form request classes. Here's an example:

```php
<?php

namespace App\Http\Requests\BotMatch;

use Illuminate\Foundation\Http\FormRequest;
use WibesoftCompany\LaravelRequestDefault\Traits\InputDefaulter;

class FilterRequest extends FormRequest
{
    use InputDefaulter;

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'page' => 'numeric',
            'per_page' => 'numeric',
            'from_date' => 'date',
            'to_date' => 'required|date|date_equals:to_date',
        ];
    }

    public function defaults(): array
    {
        return [
            'page' => 1,
            'per_page' => 10,
            'from_date' => now()->subDays(10)
        ];
    }
}
```

### Defining Defaults

Define your default values in the `defaults` method of your form request. The `defaults` method should return an associative array where the keys are the request parameters and the values are their respective defaults.

## License

LaravelRequestDefault is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

---

For more information, please visit the [project homepage](https://github.com/wibesoft-company/laravel-request-default).

