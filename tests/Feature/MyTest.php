<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MyTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testSaveOrderToFile()
    {
        $faker = \Faker\Factory::create();
        $response = $this->withHeaders([
            'X-Header' => 'Value',
        ])->json('POST', '/order', [
            'name'  => $faker->name,
            'phone' => $faker->phoneNumber,
            'email' => $faker->email,
            'items' => $faker->word
        ]);

        $response->assertSessionHas('msg', 'Заказ успешно добавлен');
    }
}
