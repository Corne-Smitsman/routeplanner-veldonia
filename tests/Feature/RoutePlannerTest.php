<?php

/**
 * User stories 4.4, 4.5 en 4.8 — Testscenario's algoritme
 * TODO: rechtstreekse route, route met verplichte overstap (Duinzicht -> Zonnedal),
 *       randgeval overstaptijd en 'geen route gevonden'.
 */

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RoutePlannerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
