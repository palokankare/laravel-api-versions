# Simple date based versioning to Laravel API Form Requests and Rerouces

**THIS PACKAGE IS STILL IN DEVELOPMENT**

This Laravel package is a proof of concept and inspired of Stripe's [blog post about API versioning](https://stripe.com/blog/api-versioning)

Rather than having large major API versions (v1, v2, v3...) the updates are small and named with the date they are released. This package tries to solve issue when it comes breaking change in Laravel From Requests (for example validation rules) and Laravel Resources.

API resources are written so that the structure they describe is what
we’d expect back from the current version of the API. When we need to
make a backwards-incompatible change we release new date based API version
that will describe how to revert the change.

Example of how versions and changes are described.
```
return [
                '2018-06-05' => [], // Latest version doesn't have any changes naturally. Doesn't have to be defined here.
                '2018-05-28' => [
                    'App\Http\Resources\BookResource' => 'App\Http\Resources\Changes\UpdatePublishedDate',
                    'App\Http\Requests\StoreBook'     => 'App\Http\Requests\Changes\\MakeAuthorNonMandatory',
                ],
                '2018-05-26' => [
                    'App\Http\Resources\BookResource' => 'App\Http\Resources\Changes\AddAuthor',
                    'App\Http\Resources\FooResource'  => 'App\Http\Resources\Changes\Bar',
                ],
        ];
```


### Installation

Publish the config-file with:
``` bash
php artisan vendor:publish --provider="Klopal\ApiVersions\ApiVersionsServiceProvider" --tag="config"
```

### Usage

...

### Testing

``` bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

### Security

If you discover any security related issues, please email kalle@klopal.com instead of using the issue tracker.

## Credits

- [Kalle Palokankare](https://github.com/palokankare)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
