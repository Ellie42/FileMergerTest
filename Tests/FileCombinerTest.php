<?php
/**
 * Created by PhpStorm.
 * User: sophie
 * Date: 04/04/16
 * Time: 19:08
 */

namespace App;


class FileCombinerTest extends \PHPUnit_Framework_TestCase
{
    protected $combiner;

    public function setUp()
    {
        $this->combiner = new FileCombiner();
    }

    public function test_toArray()
    {
        $mockFile1 = \Mockery::mock(Models\Files\File::class);
        $mockFile2 = \Mockery::mock(Models\Files\File::class);

        $mockFile1->shouldReceive("getItems")->andReturn([10, 20, 30]);
        $mockFile2->shouldReceive("getItems")->andReturn([40, 50, 60]);

        $this->combiner->addFile($mockFile1)->addFile($mockFile2);

        $result = $this->combiner->toArray();

        $expectedResult = [40, 50, 60, 10, 20, 30];

        $this->assertEquals($expectedResult, $result);
    }
}
