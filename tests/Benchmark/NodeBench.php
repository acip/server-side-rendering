<?php

namespace Spatie\Ssr\Tests\Benchmark;

use Spatie\Ssr\Engines\Node;

/**
 * @BeforeMethods("setup")
 */
class NodeBench
{
    private $nodePath;

    private $tempPath;

    public function setup(): void
    {
        $this->nodePath = getenv('NODE_PATH') ?: '/usr/local/bin/node';
        $this->tempPath = __DIR__ . '/../temp';
    }
    /**
     * @Revs(10)
     * @Iterations(10)
     */
    public function benchNode()
    {
        $engine = new Node($this->nodePath, $this->tempPath);
        $engine->run("console.log('Hello, world!')");
    }
}
