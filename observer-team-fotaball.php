<?php

interface SubjectInterface
{
	public function attachObserver(ObserverInterface $observer);
	public function detachObserver(ObserverInterface $observer);
	public function notify(EventInterface $event);
	
}

interface ObserverInterface
{
	public function update(EventInterface $event);
}

interface EventInterface
{
	public function getName();
	public function getSender();
	
}


class FootballTeam implements SubjectInterface
{
	private $name;
	private $observers = [];
	
	public function __construct($name)
	{
		$this->name = $name; 
	}
	
	public function attachObserver(ObserverInterface $observer) {
		$this->observers[] = $observer;
	}
	
	public function detachObserver(ObserverInterface $observer)
	{
		foreach($this->observers as $key => $obs) {
			if($obs === $observer) {
				unset($this->observers[$key]);
				return; 
			}
		}
	}
	
	public function notify(EventInterface $event)
	{
		foreach($this->observers as $observer) {
			$observer->update($event);
		}
	}
	
	public function getName()
	{
		return $this->name;
	}
	
	public function goalAction()
	{
		$event = new FootbalEvent(FootbalEvent::GOAL, $this);
		$this->notify($event);
	}
	
	public function goalEnemyAction()
	{
		$event = new FootbalEvent(FootbalEvent::GOAL_ENEMY, $this);
		$this->notify($event);
	}
	
	public function fightAction()
	{
		$event = new FootbalEvent(FootbalEvent::FIGHT, $this);
		$this->notify($event);
	}
	
	
	
}


class FootballFan implements ObserverInterface
{
	private $name;
	
	public function __construct($name)
	{
		$this->name = $name;
	}
	public function update(EventInterface $event)
	{
		switch($event->getName()) {
			case FootbalEvent::GOAL:
			printf(
	            	"GOL %s скандирует речевку  \n",
	             	$this->getName(),$event->getName(), $event->getSender());
			    break;
			case FootbalEvent::GOAL_ENEMY:
			       printf("Нам Забили Гол %s кричит сюдю на мыло \n",
	             	$this->getName(),$event->getName(), $event->getSender());
		    	break;
			case FootbalEvent::FIGHT:
			printf(
			  "%s  ломает стул и бьет по голове соседу  \n",
	             	$this->getName(),$event->getName(), $event->getSender());
		     	break;
			default:
				printf(
	            	"%s команда %s в замешательстве.... \n",
	             	$this->getName(),$event->getName(), $event->getSender());
		}
	
		
	}
	public function getName()
	{
		return $this->name;
	}
}

class FootbalEvent implements EventInterface
{
	const GOAL = 'goal';
	const GOAL_ENEMY = 'goal_enemy';
	const FIGHT = 'fight';
	
	private $name;
	private $sender;
	
	public function __construct($name,FootballTeam $sender)
	{
		$this->name = $name;
		$this->sender = $sender;
	}
	
	public function getName()
	{
		return $this->name;
	}
	
	public function getSender()
	{
		return $this->sender;
	}
}



$team1 = new FootballTeam('Barcelona');

$fan1 = new FootballFan('Ion');
$fan2 = new FootballFan('Vasile');

$team1->attachObserver($fan1);
$team1->attachObserver($fan2);

$team1->goalAction();
$team1->goalEnemyAction();

$team1->detachObserver($fan1);

$team1->fightAction();

$fan3 = new FootballFan("Garry Topor");
$team1->attachObserver($fan3);
$team1->fightAction();
