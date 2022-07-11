<?php

namespace Tests;

use Orchestra\Testbench\TestCase;
use ReflectionClass;
use WireUi\PhosphorIcons\PhosphorIconsServiceProvider;

class UnitTestCase extends TestCase
{
    protected function getPackageProviders($app)
    {
        return [
            PhosphorIconsServiceProvider::class,
        ];
    }

    /** Call protected/private method of a class */
    public function invokeMethod(mixed $object, string $method, array $parameters = []): mixed
    {
        $reflection = new ReflectionClass(get_class($object));
        $method     = $reflection->getMethod($method);
        $method->setAccessible(true);

        return $method->invokeArgs($object, $parameters);
    }
}
