<?php

//
//  DISABLING SOME OF THE TESTS AS THEY TAKE VERY LONG TO COMPLETE
//

declare (strict_types = 1);

require __DIR__ . '/../vendor/autoload.php';

require_once __DIR__ . '/../core/database/Connection.php';

require __DIR__ . '/../core/Container.php';

require __DIR__ . '/../Config.php';

use App\Commands\TestCommand;
use App\Repository\HandleInput;
use PHPUnit\Framework\TestCase;

final class FeatureCommandTest extends TestCase
{

    private $command;

    public function setUp(): void
    {
        Container::bind('database', (new Connection(Config::sqlite()))->connect());

        $this->command = new TestCommand(new HandleInput);
    }

    public function testExitCommand(): void
    {
        $this->assertSame('exit', $this->command->run('Exit'));
    }

    public function testDatabaseDelete(): void
    {
        $this->assertTrue(!strpos($this->command->run('reset'), 'Parking Lot Successfully Deleted'));

    }

    // public function testCreatingDatabase(): void
    // {
    //     $this->assertTrue(!strpos($this->command->run('create_parking_lot 3131'), 'Created a parking lot with 3131 slots'));

    // }

    // public function testCreatingDatabaseTwice(): void
    // {
    //     $this->assertTrue(!strpos($this->command->run('create_parking_lot 3131'), 'Created a parking lot with 3131 slots'));
    // }

    // public function testExtremes(): void
    // {
    //     $this->command->run('reset');
    //     $this->assertTrue(!strpos($this->command->run('create_parking_lot 31311221212122121'), 'Created a parking lot with 31311221212122121 slots'));
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
