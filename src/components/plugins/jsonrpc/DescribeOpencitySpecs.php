<?php
namespace extas\components\plugins\jsonrpc;

use extas\components\plugins\Plugin;
use extas\interfaces\stages\IStageApiJsonRpcDescribe;

/**
 * Class DescribeOpencitySpecs
 *
 * @package extas\components\plugins\jsonrpc
 * @author jeyroik <jeyroik@gmail.com>
 */
class DescribeOpencitySpecs extends Plugin implements IStageApiJsonRpcDescribe
{
    /**
     * @param array $result
     * @return array
     */
    public function __invoke(array $result): array
    {
        foreach ($result as $operationName => $specs) {
            $properties = $specs;
            $properties['handler'] = [
                'endpoint' => 'api/jsonrpc',
                'protocol' => 'jsonrpc',
                'method' => $operationName
            ];
            $result[$operationName] = [
                'type' => 'object',
                'properties' => $properties
            ];
        }

        return $result;
    }
}
