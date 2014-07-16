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

define('LOWEST', 1);
define('UP', 1);
define('DOWN', 0);


interface BuildingInterface
{
    public function __construct($name, $floors, $elevators);
    public function elevatorByName($name);
}


class Building implements BuildingInterface {

	public $name;
	public $floors;
	public $elevators;

	public function __construct($name, $floors, $elevators) {
		$this->name = $name;
		$this->floors = $floors;
	}

	public function elevatorByName($name) {
		$elevator = new Elevator($name, $this->floors);
		return $elevator;
	}
}


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


class Elevator implements ElevatorInterface {

	protected $name;
	protected $floors;
	protected $floor = 1;
	protected $indicatedDirection;


	public function __construct($name, $floors) {
		$this->name = $name;
		$this->floors = $floors;
	}
		
	public function getFloor() {
		return $this->floor;
	}
	
	public function setFloor($floor) {
		$this->floor = $floor;
	}
	
	public function getDirection() {
		return $this->indicatedDirection;
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
		if( ($this->floor < $this->floors)) {
			// successful push
			// set direction to up
			$this->indicatedDirection = UP;
			return true;
		} else {
			// stay put
			return false;
		}
	}
	
	
	/**
	 * Respond to down button push.
	 * @return int 1/0
	 */
	public function pushDownButton() {
		//print_r("Pushing Down Button".PHP_EOL);
		if($this->floor > LOWEST) {
			// successful push
			// set direction to down
			$this->indicatedDirection = DOWN;
			return 1;
		} else {
			// stay put
			return false;
		}
	}


	public function updateDisplay() {
		print_r("- Currently we are on floor ". $this->getFloor()." and we're ");
		$tmp = ($this->getDirection()) ? "UP" : "DOWN";
		print_r("pressing the ". $tmp ." button, so the elevator is ");
		if($this->getDirection() == UP) {
			echo ($this->pushUpButton()) ? "starting to go up a floor. " : "staying put. ";
		} else {
			echo ($this->pushDownButton()) ? "starting to go down a floor. " : "staying put. ";
		}
		//print_r(PHP_EOL);
	}
		

	public function allowedToMove() {
		$status = 0;
		
		if(($this->getDirection() == UP) && ($this->getFloor() == $this->floors)) {
		// The elevator is staying put if the direction is up and the highest floor is reached.
		// Staying put
		$status = 0;
		}

		if(($this->getDirection() == DOWN) && ($this->getFloor() == LOWEST)) {
		// The elevator is staying put if the direction is down and the lowest floor is reached.
		// Staying put
		$status = 0;
		}		
		
		if(($this->getDirection() == UP) && ($this->getFloor() < $this->floors)) {
		// The elevator may go up to the next floor if the direction is up and the highest floor has not yet been reached.
		// Starting to go up
		$status = 1;
		$this->floor++;
		}

		if(($this->getDirection() == DOWN) && ($this->getFloor() > LOWEST)) {
			// The elevator may go down to the next floor if the direction is down and the lowest floor has not yet been reached.
			// Starting to go down
			$status = 1;
			$this->floor--;
		}
		print_r("The floor is now on ".$this->floor.PHP_EOL);
		return $status;
	}

}


$Building = new Building("Kadro Office", 5, 2);

$Elevator1 = $Building->elevatorByName("E1");
print_r("Elevator1:".PHP_EOL);

$Elevator1->pushDownButton();
do {
	$Elevator1->updateDisplay();
} while ($Elevator1->allowedToMove());

$Elevator1->pushUpButton();
do {
	$Elevator1->updateDisplay();
} while ($Elevator1->allowedToMove());

$Elevator1->pushDownButton();
do {
	$Elevator1->updateDisplay();
} while ($Elevator1->allowedToMove());

$Elevator1->pushDownButton();
do {
	$Elevator1->updateDisplay();
} while ($Elevator1->allowedToMove());

$Elevator1->pushDownButton();
do {
	$Elevator1->updateDisplay();
} while ($Elevator1->allowedToMove());


$Elevator2 = $Building->elevatorByName("E2");
print_r("Elevator2:".PHP_EOL);

$Elevator2->pushDownButton();
do {
	$Elevator2->updateDisplay();
} while ($Elevator2->allowedToMove());
