<?php
declare(strict_types=1);

namespace Chimera\Tests\IdentifierGenerator;

use Chimera\IdentifierGenerator\RamseyUuid;
use PHPUnit\Framework\TestCase;
use Ramsey\Uuid\Rfc4122\UuidV4;

final class RamseyUuidTest extends TestCase
{
    /**
     * @test
     *
     * @covers \Chimera\IdentifierGenerator\RamseyUuid
     */
    public function generateShouldReturnAUuidVersion4(): void
    {
        $generator  = new RamseyUuid();
        $identifier = $generator->generate();

        self::assertInstanceOf(UuidV4::class, $identifier);
    }

    /**
     * @test
     *
     * @covers \Chimera\IdentifierGenerator\RamseyUuid
     */
    public function generateShouldAlwaysReturnANewIdentifier(): void
    {
        $generator = new RamseyUuid();

        $identifier1 = $generator->generate();
        $identifier2 = $generator->generate();

        self::assertInstanceOf(UuidV4::class, $identifier1);
        self::assertInstanceOf(UuidV4::class, $identifier2);

        self::assertNotEquals($identifier1, $identifier2);
        self::assertNotSame((string) $identifier1, (string) $identifier2);
    }
}
