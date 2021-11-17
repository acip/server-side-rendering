<?php
namespace Spatie\Ssr\Tests\Benchmark;

use Spatie\Ssr\Engines\BinV8;

class BinV8Bench
{
  /**
   * @Revs(10)
   * @Iterations(10)
   */
  public function benchBinV8()
  {
    $engine = new BinV8();
    $engine->run("print('Hello, world!')");
  }
}
