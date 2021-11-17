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
    $engine = new Node('/home/dev/.nvm/versions/node/v10.15.0/bin/node', __DIR__ . '/../temp');
    $result = $engine->run("console.log('Hello, world!')");
  }
}
