<?php

use App\Models\Skill;
use App\Models\User;
use Illuminate\Support\Facades\Schema;

test('admin can create a skill without proficiency', function () {
    $user = User::factory()->create();

    $this->actingAs($user)
        ->post(route('admin.skills.store'), [
            'name' => 'Laravel',
            'category' => 'backend',
            'sort_order' => 1,
            'is_active' => 1,
        ])
        ->assertRedirect(route('admin.skills.index'));

    $this->assertDatabaseHas('skills', [
        'name' => 'Laravel',
        'category' => 'backend',
    ]);

    expect(Schema::hasColumn('skills', 'proficiency'))->toBeFalse();
});

test('admin skills index does not show proficiency', function () {
    $user = User::factory()->create();

    Skill::create([
        'name' => 'MySQL',
        'category' => 'database',
        'sort_order' => 1,
        'is_active' => true,
    ]);

    $this->actingAs($user)
        ->get(route('admin.skills.index'))
        ->assertSuccessful()
        ->assertSee('MySQL')
        ->assertDontSee('Proficiency');
});
