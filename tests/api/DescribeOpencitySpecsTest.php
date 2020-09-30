<?php
namespace tests\api;

use Dotenv\Dotenv;
use extas\components\plugins\jsonrpc\DescribeOpencitySpecs;
use PHPUnit\Framework\TestCase;

/**
 * Class DescribeOpencitySpecsTest
 *
 * @package tests\api
 * @author jeyroik <jeyroik@gmail.com>
 */
class DescribeOpencitySpecsTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $env = Dotenv::create(getcwd() . '/tests/');
        $env->load();
    }

    public function testWrapping()
    {
        $plugin = new DescribeOpencitySpecs();
        $result = $plugin([
            'test' => [
                'request' => [],
                'response' => []
            ]
        ]);

        $this->assertEquals(
            [
                'test' => [
                    'type' => 'object',
                    'properties' => [
                        'handler' => [
                            'endpoint' => 'api/jsonrpc',
                            'protocol' => 'jsonrpc',
                            'method' => 'test'
                        ],
                        'request' => [],
                        'response' => []
                    ]
                ]
            ],
            $result,
            'Incorrect wrapping: ' . print_r($result, true)
        );
    }
}
