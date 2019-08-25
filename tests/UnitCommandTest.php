<?php
declare (strict_types = 1);

namespace Tests;

use App\Commands\TestCommand;
use App\Repository\HandleInput;
use PHPUnit\Framework\TestCase;

final class UnitCommandTest extends TestCase
{

    private $command;

    public function setUp(): void
    {
        $this->command = new TestCommand(new HandleInput);
    }

    public function testRunCommand(): void
    {
        $this->assertSame('exit', $this->command->run('Exit'));
    }

    public function testExample1(): void
    {
        $this->assertSame('Parking Lot Successfully Deleted', $this->command->run('reset'));
        $this->assertSame('Created a parking lot with 3131 slots', $this->command->run('create_parking_lot 3131'));
    }

    // public function testExample2(): void
    // {
    //     $this->command->run('reset');
    // }

    // public function testExample3(): void
    // {

    // }

    // public function testExtremes(): void
    // {

    // }

    // public function testTrailingZeros(): void
    // {

    // }

    // public function testPower_of_2(): void
    // {

    // }

    // public function testSimple1(): void
    // {

    // }

    // public function testSimple2(): void
    // {

    // }

    // public function testSimple3(): void
    // {

    // }

    // public function testMedium1(): void
    // {

    // }

    // public function testMedium2(): void
    // {

    // }

    // public function testMedium3(): void
    // {

    // }

    // public function testLarge1(): void
    // {

    // }

    // public function testLarge2(): void
    // {

    // }

    // public function testLarge3(): void
    // {

    // }

    // public function testLarge4(): void
    // {

    // }

    // public function testLarge5(): void
    // {

    // }

    // public function testLarge6(): void
    // {

    // }
}
