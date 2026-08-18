<?php

use App\Models\Experience;

beforeEach(function () {
    $this->seed();
});

test('portfolio page renders successfully', function () {
    $response = $this->get('/');

    $response->assertStatus(200);
    $response->assertSee('aiman');
    $response->assertSee('Software');
    $response->assertSee('Web Systems');
});

test('portfolio page handles experiences with array or string responsibilities safely', function () {
    Experience::create([
        'title' => 'Test Lead',
        'company' => 'Test Corp',
        'description' => 'Testing responsibilities parsing',
        'responsibilities' => ['Task 1', 'Task 2'],
        'start_date' => '2024-01-01',
        'is_current' => true,
        'type' => 'job',
        'sort_order' => 10,
    ]);

    $response = $this->get('/');

    $response->assertStatus(200);
    $response->assertSee('Test Lead');
    $response->assertSee('Task 1');
});

test('portfolio page includes all main sections', function () {
    $response = $this->get('/');

    $response->assertSee('id="home"', false);
    $response->assertSee('id="about"', false);
    $response->assertSee('id="skills"', false);
    $response->assertSee('id="experience"', false);
    $response->assertSee('id="projects"', false);
    $response->assertSee('id="services"', false);
    $response->assertSee('id="contact"', false);
});

test('portfolio page includes favicon and manifest links', function () {
    $response = $this->get('/');

    $response->assertStatus(200);
    $response->assertSee('favicon.svg', false);
    $response->assertSee('favicon-32x32.png', false);
    $response->assertSee('apple-touch-icon.png', false);
    $response->assertSee('site.webmanifest', false);
});
