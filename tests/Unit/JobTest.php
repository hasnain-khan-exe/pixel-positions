<?php

use App\Models\Employer;
use App\Models\Job;
use App\Models\Tag;

it('belongs to an employer', function () {
    //AAA

    //Arrange
    $employer = Employer::factory()->create([
        'name' => fake()->name(),
    ]);
    $job = Job::factory()->create(['employer_id' => $employer->id]);

    //Act and Assert/expect
    expect($job->employer->is($employer))->toBe(true);
});
it('can have tags', function () {
    // Arrange
    $job = Job::factory()->create();
    $tag = Tag::create(['name' => 'Frontend']);
    // Act
    $job->tags()->attach($tag->id);
    // Assert
    expect($job->tags)->toHaveCount(1);
});
