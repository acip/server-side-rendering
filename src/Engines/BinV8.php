<?php

namespace Spatie\Ssr\Engines;

use Spatie\Ssr\Engine;
use Spatie\Ssr\Exceptions\EngineError;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

class BinV8 implements Engine
{
    /** @var string */
    protected $execV8Path;

    public function __construct(string $execV8Path = null)
    {

        $this->execV8Path = $execV8Path ?? __DIR__ . '/../../bin/v8';
    }

    public function run(string $script): string
    {
        $command = [
          $this->execV8Path,
          '-e',
         $script
        ];

        $process = new Process($command, dirname($this->execV8Path));

        try {
            return substr($process->mustRun()->getOutput(), 0, -1);
        } catch (ProcessFailedException $exception) {
          var_export($exception->getMessage());

            throw EngineError::withException($exception);
        }
    }

    public function getDispatchHandler(): string
    {
        return 'print';
    }
}
