<?php
namespace Kadro;
header("Content-Type: text/plain");
################################################################################
################################################################################
##########  ###  ###          ###       ######         #####         ###########
##########  ##  ####  ######  ###  #####  ####  #####  ####  #######  ##########
##########  #  #####  ######  ###  #####  ####  #####  ####  #######  ##########
##########    ######          ###  #####  ####  ##   ######  #######  ##########
##########  #  #####  ######  ###  #####  ####  ###   #####  #######  ##########
##########  ##  ####  ######  ###  #####  ####  ####  #####   #####   ##########
##########  ###  ###  ######  ###        #####  #####  #####         ###########
################################################################################
/**
 * @copyright Kadro Solutions, Inc.
 * @author Mike Trimm <mtrimm@kadro.com>
 * @year 2014
 * @notes Code challenge for PHP Object Oriented Code Proficiency
**/

interface BuildingInterface
{
    public function __construct($name, $floors, $elevators);
    public function elevatorByName($name);
}

//------------------------------------------------------------------------------

/* ASSIGNMENT - IMPLEMENT THE BUILDING CLASS */


class Building implements BuildingInterface {

	public $name;
	public $floors;
	public $elevators;

	public function __construct($name, $floors, $elevators) {
		$this->name = $name;
		$this->floors = $floors;
		$this->elevators = $this->elevators + 1;
	}

	public function elevatorByName($name) {
		$elevator = new Elevator($name, $this->floors);
		return $elevator;
	}
}

################################################################################

interface ElevatorInterface
{

    public function __construct($name, $floors);
    public function getFloor();
    public function getDirection();
    public function getName();
    public function setName($name);
    public function pushUpButton();
    public function pushDownButton();

}

//------------------------------------------------------------------------------

/* ASSIGNMENT - IMPLEMENT THE ELEVATOR CLASS */

class Elevator implements ElevatorInterface {

	protected $name;
	protected $floors;
	protected $floor = 1;
	protected $direction;

	public function __construct($name, $floors) {
		$this->name = $name;
		$this->floors = $floors;
	}
		
	public function getFloor() {
		return $this->floor;
	}
	
	public function getDirection() {
		return $this->direction;
	}
	
	public function getName() {
		return $this->name;
	}
	
	public function setName($name) {
		$this->name = $name;
	}
	
	/**
	 * Respond to up button push.
	 * @return int 1/0
	 */
	public function pushUpButton() {
		if($this->floor == $this->floors) {
			//do nothing
			return 0;
		} else {
			// successful push
			// start elevator up
			$this->direction = 1;
			$this->floor++;
			return 1;
		}
	}
	
	/**
	 * Respond to down button push.
	 * @return int 1/0
	 */
	public function pushDownButton() {
		if($this->floor == 1) {
			//do nothing
			return 0;
		} else {
			// successful push
			// start elevator down
			$this->direction = 0;
			$this->floor--;
			return 1;
		}
	}

}


################################################################################

/* ASSIGNMENT - MAKE YOUR PROGRAM OUTPUT THE FOLLOWING... */
/*
Elevator1:
- Currently we are on floor 1 and we're pressing the DOWN button, so the elevator is staying put. The floor is now on 1.
- Currently we are on floor 1 and we're pressing the UP button, so the elevator is starting to go up a floor. The floor is now on 2.
- Currently we are on floor 2 and we're pressing the UP button, so the elevator is starting to go up a floor. The floor is now on 3.
- Currently we are on floor 3 and we're pressing the UP button, so the elevator is starting to go up a floor. The floor is now on 4.
- Currently we are on floor 4 and we're pressing the UP button, so the elevator is starting to go up a floor. The floor is now on 5.
- Currently we are on floor 5 and we're pressing the UP button, so the elevator is staying put. The floor is now on 5.
- Currently we are on floor 5 and we're pressing the DOWN button, so the elevator is starting to go down a floor. The floor is now on 4.
- Currently we are on floor 4 and we're pressing the DOWN button, so the elevator is starting to go down a floor. The floor is now on 3.
- Currently we are on floor 3 and we're pressing the DOWN button, so the elevator is starting to go down a floor. The floor is now on 2.
- Currently we are on floor 2 and we're pressing the DOWN button, so the elevator is starting to go down a floor. The floor is now on 1.
- Currently we are on floor 1 and we're pressing the DOWN button, so the elevator is staying put. The floor is now on 1.
- Currently we are on floor 1 and we're pressing the DOWN button, so the elevator is staying put. The floor is now on 1.
- Currently we are on floor 1 and we're pressing the DOWN button, so the elevator is staying put. The floor is now on 1.
Elevator2:
- Currently we are on floor 1 and we're pressing the DOWN button, so the elevator is staying put. The floor is now on 1.
*/
/* WITH THE FOLLOWING CODE: */

$Building = new Building("Kadro Office", 5, 2);

$Elevator1 = $Building->elevatorByName("E1");
print_r("Elevator1:".PHP_EOL);

print_r("- Currently we are on floor ". $Elevator1->getFloor()." and we're ");
print_r("pressing the DOWN button, so the elevator is ");
echo ($Elevator1->pushDownButton()) ? "starting to go down a floor. " : "staying put. ";
print_r("The floor is now on ". $Elevator1->getFloor().".");
print_r(PHP_EOL);

print_r("- Currently we are on floor ". $Elevator1->getFloor()." and we're ");
print_r("pressing the UP button, so the elevator is ");
echo ($Elevator1->pushUpButton()) ? "starting to go up a floor. " : "staying put. ";
print_r("The floor is now on ". $Elevator1->getFloor().".");
print_r(PHP_EOL);

print_r("- Currently we are on floor ". $Elevator1->getFloor()." and we're ");
print_r("pressing the UP button, so the elevator is ");
echo ($Elevator1->pushUpButton()) ? "starting to go up a floor. " : "staying put. ";
print_r("The floor is now on ". $Elevator1->getFloor().".");
print_r(PHP_EOL);

print_r("- Currently we are on floor ". $Elevator1->getFloor()." and we're ");
print_r("pressing the UP button, so the elevator is ");
echo ($Elevator1->pushUpButton()) ? "starting to go up a floor. " : "staying put. ";
print_r("The floor is now on ". $Elevator1->getFloor().".");
print_r(PHP_EOL);

print_r("- Currently we are on floor ". $Elevator1->getFloor()." and we're ");
print_r("pressing the UP button, so the elevator is ");
echo ($Elevator1->pushUpButton()) ? "starting to go up a floor. " : "staying put. ";
print_r("The floor is now on ". $Elevator1->getFloor().".");
print_r(PHP_EOL);

print_r("- Currently we are on floor ". $Elevator1->getFloor()." and we're ");
print_r("pressing the UP button, so the elevator is ");
echo ($Elevator1->pushUpButton()) ? "starting to go up a floor. " : "staying put. ";
print_r("The floor is now on ". $Elevator1->getFloor().".");
print_r(PHP_EOL);

print_r("- Currently we are on floor ". $Elevator1->getFloor()." and we're ");
print_r("pressing the DOWN button, so the elevator is ");
echo ($Elevator1->pushDownButton()) ? "starting to go down a floor. " : "staying put. ";
print_r("The floor is now on ". $Elevator1->getFloor().".");
print_r(PHP_EOL);

print_r("- Currently we are on floor ". $Elevator1->getFloor()." and we're ");
print_r("pressing the DOWN button, so the elevator is ");
echo ($Elevator1->pushDownButton()) ? "starting to go down a floor. " : "staying put. ";
print_r("The floor is now on ". $Elevator1->getFloor().".");
print_r(PHP_EOL);

print_r("- Currently we are on floor ". $Elevator1->getFloor()." and we're ");
print_r("pressing the DOWN button, so the elevator is ");
echo ($Elevator1->pushDownButton()) ? "starting to go down a floor. " : "staying put. ";
print_r("The floor is now on ". $Elevator1->getFloor().".");
print_r(PHP_EOL);

print_r("- Currently we are on floor ". $Elevator1->getFloor()." and we're ");
print_r("pressing the DOWN button, so the elevator is ");
echo ($Elevator1->pushDownButton()) ? "starting to go down a floor. " : "staying put. ";
print_r("The floor is now on ". $Elevator1->getFloor().".");
print_r(PHP_EOL);

print_r("- Currently we are on floor ". $Elevator1->getFloor()." and we're ");
print_r("pressing the DOWN button, so the elevator is ");
echo ($Elevator1->pushDownButton()) ? "starting to go down a floor. " : "staying put. ";
print_r("The floor is now on ". $Elevator1->getFloor().".");
print_r(PHP_EOL);

print_r("- Currently we are on floor ". $Elevator1->getFloor()." and we're ");
print_r("pressing the DOWN button, so the elevator is ");
echo ($Elevator1->pushDownButton()) ? "starting to go down a floor. " : "staying put. ";
print_r("The floor is now on ". $Elevator1->getFloor().".");
print_r(PHP_EOL);

print_r("- Currently we are on floor ". $Elevator1->getFloor()." and we're ");
print_r("pressing the DOWN button, so the elevator is ");
echo ($Elevator1->pushDownButton()) ? "starting to go down a floor. " : "staying put. ";
print_r("The floor is now on ". $Elevator1->getFloor().".");
print_r(PHP_EOL);

$Elevator2 = $Building->elevatorByName("E2");
print_r("Elevator2:".PHP_EOL);

print_r("- Currently we are on floor ". $Elevator2->getFloor()." and we're ");
print_r("pressing the DOWN button, so the elevator is ");
echo ($Elevator2->pushDownButton()) ? "starting to go down a floor. " : "staying put. ";
print_r("The floor is now on ". $Elevator2->getFloor().".");
print_r(PHP_EOL);

