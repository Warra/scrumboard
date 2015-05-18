<?php
use App\Models\Sprint;

class SprintTest extends TestCase {

    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testAdd()
    {
        $response = $this->call('POST', '/sprint/add/1/asd/2015-01-01/2015-01-02/20');
        $this->assertEquals(200, $response->getStatusCode());
        $sprint = Sprint::all();
        $count = count($sprint);

        $this->assertEquals(1, $count);
    }

}
