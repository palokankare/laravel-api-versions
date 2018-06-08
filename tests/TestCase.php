<?php

namespace Klopal\ApiVersions\Test;

use Carbon\Carbon;
use Illuminate\Support\Facades\Route;
use Klopal\ApiVersions\Test\Models\Book;
use Orchestra\Testbench\TestCase as Orchestra;
use Klopal\ApiVersions\Test\Requests\StoreBook;
use Klopal\ApiVersions\Test\Services\ApiVersions;
use Klopal\ApiVersions\ApiVersionsServiceProvider;
use Klopal\ApiVersions\Test\Resources\BookResource;
use Klopal\ApiVersions\Test\Services\UsedApiVersion;

class TestCase extends Orchestra
{
    protected function setUp()
    {
        parent::setUp();

        $this->setUpRoutes();
    }

    /**
     * @param \Illuminate\Foundation\Application $app
     * @return array
     */
    protected function getPackageProviders($app): array
    {
        return [ApiVersionsServiceProvider::class];
    }

    /**
     * Define environment setup.
     *
     * @param  \Illuminate\Foundation\Application $app
     * @return void
     */
    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('api-versions.api_versions', ApiVersions::class);
        $app['config']->set('api-versions.used_version', UsedApiVersion::class);
    }

    /**
     *  Setup routes.
     */
    protected function setUpRoutes()
    {
        Route::get('book', function () {
            $book = new Book();
            $book->name = 'Kalevala';
            $book->author = 'Väinämöinen';
            $book->published = Carbon::create(2018, 6, 5, 12);

            return new BookResource($book);
        });

        Route::post('book', function (StoreBook $request) {
            $book = new Book();
            $book->name = $request->name;
            $book->published = Carbon::create(2018, 6, 5, 12);

            return new BookResource($book);
        });
    }
}
