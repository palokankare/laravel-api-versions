<?php

namespace Klopal\ApiVersions\Test;

class RequestVersionsTest extends TestCase
{
    /** @test */
    public function it_will_receive_validation_error_when_making_request_to_latest_api_version_without_all_necessary_attributes()
    {
        $response = $this->withHeaders([
            'Api-Version' => '2018-06-05',
        ])->json('POST', '/book', ['name' => 'Foo']);

        $response
            ->assertStatus(422)
            ->assertJson([
                'message' => 'The given data was invalid.',
                'errors'  => [
                    'author' => [
                        0 => 'The author field is required.',
                    ],
                ],
            ]);
    }

    /** @test */
    public function it_will_not_receive_validation_error_when_making_request_to_oldest_api_version()
    {
        $response = $this->withHeaders([
            'Api-Version' => '2018-05-26',
        ])->json('POST', '/book', ['name' => 'The Name']);

        $response
            ->assertStatus(200)
            ->assertJson([
                'data' => [
                    'name'      => 'The Name',
                    'published' => '05.06.2018',
                ],
            ]);
    }
}
