<?php

use App\Models\Color;
use Laravel\Lumen\Testing\DatabaseMigrations;

class ColorTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * Creates a color and tests if it is in the database
     *
     * @return void
     * @test
     */
    public function createsColor()
    {
        $model = Color::factory()->raw();

        $response = $this->post('/colors', $model);
        $response->assertResponseOk();
        $response->seeJson($model);

        $this->seeInDatabase('colors', $model);
    }

    /**
     * Checks if a color gets listed
     * @test
     */
    public function listsColor()
    {
        $this->get('/colors')->assertResponseOk();

        $model = Color::factory()->create();

        $response = $this->get('/colors');
        $response->assertResponseOk();
        $response->seeJson($model->getAttributes());
    }

    /**
     * Deletes a color and checks if it is removed from the database
     * @test
     */
    public function deletesColor()
    {
        $model = Color::factory()->create();

        $this->seeInDatabase('colors', $model->getAttributes());

        $this->delete('/colors/' . $model->id)->assertResponseOk();
        $this->notSeeInDatabase('colors', $model->getAttributes());
    }
}
