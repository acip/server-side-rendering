<?php

namespace Spatie\Ssr\Tests\Engines;

use PHPUnit\Framework\TestCase;
use Spatie\Ssr\Engines\BinV8;
use Spatie\Ssr\Exceptions\EngineError;

class BinV8Test extends TestCase
{
    /** @test */
    public function it_can_run_a_script_and_return_its_contents()
    {
        $engine = new BinV8();

        $result = $engine->run("print('Hello, world!')");

        $this->assertEquals("Hello, world!", $result);
    }


    /** @test */
    public function it_throws_an_engine_error_when_a_script_is_invalid()
    {
        $engine = new BinV8();

        $this->expectException(EngineError::class);

        $engine->run('foo.bar.baz()');
    }

    /** @test */
    public function it_has_a_dispatch_handler()
    {
        $engine = new BinV8();

        $this->assertEquals('print', $engine->getDispatchHandler());
    }
}
