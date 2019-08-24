<?php
declare (strict_types = 1);

use App\Commands\AutomatedCommand;
use PHPUnit\Framework\TestCase;

final class AutomatedCommandTest extends TestCase
{

    private $command;

    public function setUp(): void
    {
        $this->command = new AutomatedCommand();
    }

    public function testRunCommand(): void
    {
        $result = $this->command->run(true);
        $this->assertSame('automated command has been opened', $result);
    }

    public function testExample1(): void
    {

    }

    public function testExample2(): void
    {

    }

    public function testExample3(): void
    {

    }

    public function testExtremes(): void
    {

    }

    public function testTrailingZeros(): void
    {

    }

    public function testPower_of_2(): void
    {

    }

    public function testSimple1(): void
    {

    }

    public function testSimple2(): void
    {

    }

    public function testSimple3(): void
    {

    }

    public function testMedium1(): void
    {

    }

    public function testMedium2(): void
    {

    }

    public function testMedium3(): void
    {

    }

    public function testLarge1(): void
    {

    }

    public function testLarge2(): void
    {

    }

    public function testLarge3(): void
    {

    }

    public function testLarge4(): void
    {

    }

    public function testLarge5(): void
    {

    }

    public function testLarge6(): void
    {

    }
}
