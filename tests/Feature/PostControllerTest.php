<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\SeedProducer;

class PostControllerTest extends TestCase
{

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_show_returns_json()
    {
        $seed_producer = SeedProducer::create([
                    'name' => 'Vilmorin',
                    'description' => 'opis dla vilmorin',
        ]);

        $response = $this->get('/api/seedproducers/' . $seed_producer->id);
        $response->assertStatus(200);
        $response->assertJsonFragment([
            'description' => 'opis dla vilmorin',
            'name' => 'Vilmorin',
        ]);
    }

    public function test_insert_to_database()
    {
        $seed_producer = SeedProducer::create([
                    'name' => 'Vilmorin',
                    'description' => 'opis dla vilmorin',
        ]);

        $response = $this->get('/api/seedproducers/' . $seed_producer->id);
        $response->assertStatus(200);
        $response->assertJsonFragment([
            'description' => 'opis dla vilmorin',
            'name' => 'Vilmorin',
        ]);
    }
    
    
}
