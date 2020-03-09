<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Helpers\JsonParser;


class JsonParserTest extends TestCase
{
    /**
     * Transform array into json
     *
     * @return void
     */
    public function testCanEncodeArray()
    {
        $testArray = [
            'key1' => 'value1',
            'key2' => 'value2',
        ];
        $jsonString = JsonParser::encode($testArray);
        $this->assertJson($jsonString);
    }
}
