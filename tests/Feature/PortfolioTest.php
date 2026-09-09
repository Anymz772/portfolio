<?php

use App\Models\Experience;

beforeEach(function () {
    $this->seed();
});

test('portfolio page renders successfully', function () {
    $response = $this->get('/');

    $response->assertSuccessful();
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

    $response->assertSuccessful();
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

test('about section shows the recommended four stat cards', function () {
    $response = $this->get('/');

    $response->assertSuccessful();
    $response->assertSee('8+');
    $response->assertSee('Projects');
    $response->assertSee('Years Experience');
    $response->assertSee('Current Role');
    $response->assertSee('Primary Focus');
    $response->assertSee('Software Engineer');
    $response->assertSee('Laravel & Web Systems');
});

test('services section avoids overclaiming apis and database optimization', function () {
    $response = $this->get('/');

    $response->assertSuccessful();
    $response->assertSee('Enterprise Laravel Development');
    $response->assertSee('Spatie role security');
    $response->assertSee('Database Design & Management');
    $response->assertDontSee('RESTful APIs');
    $response->assertDontSee('Database Design & Optimization');
});

test('projects without public links use want to know more contact cta', function () {
    $response = $this->get('/');

    $response->assertSuccessful();
    $response->assertSee('Want to know more');
});

test('portfolio page includes favicon and manifest links', function () {
    $response = $this->get('/');

    $response->assertSuccessful();
    $response->assertSee('favicon.svg', false);
    $response->assertSee('favicon-32x32.png', false);
    $response->assertSee('apple-touch-icon.png', false);
    $response->assertSee('site.webmanifest', false);
});

test('portfolio page uses formspree contact form endpoint', function () {
    $response = $this->get('/');

    $response->assertSuccessful();
    $response->assertSee(config('portfolio.formspree_endpoint'), false);
});

test('laravel contact endpoint stores a valid message for local development', function () {
    $response = $this->postJson(route('contact.submit'), [
        'name' => 'Jane Doe',
        'email' => 'jane@example.com',
        'subject' => 'Project inquiry',
        'message' => 'I would like to discuss a Laravel project.',
    ]);

    $response->assertSuccessful();
    $response->assertJson([
        'success' => true,
    ]);

    $this->assertDatabaseHas('contact_messages', [
        'name' => 'Jane Doe',
        'email' => 'jane@example.com',
        'subject' => 'Project inquiry',
    ]);
});
