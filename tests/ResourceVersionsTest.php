<?php

namespace Klopal\ApiVersions\Test;

class ResourceVersionsTest extends TestCase
{
    /** @test */
    public function it_will_receive_the_latest_version_of_book_resource_from_api()
    {
        $response = $this->withHeaders([
            'Api-Version' => '2018-06-05',
        ])->json('GET', '/book');

        $response
            ->assertStatus(200)
            ->assertJson([
                'data' => [
                    'name'      => 'Kalevala',
                    'published' => [
                        'date'          => '2018-06-05 12:00:00.000000',
                        'timezone_type' => 3,
                        'timezone'      => 'UTC',
                    ],
                ],
            ]);
    }

    /** @test */
    public function it_will_receive_the_oldest_version_of_book_resource_from_api()
    {
        $response = $this->withHeaders([
            'Api-Version' => '2018-05-26',
        ])->json('GET', '/book');

        $response
            ->assertStatus(200)
            ->assertJson([
                'data' => [
                    'name'      => 'Kalevala',
                    'published' => '05.06.2018',
                ],
            ]);
    }
}
