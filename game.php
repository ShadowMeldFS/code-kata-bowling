<?php

class Game {

    public $name;

    public $rolls;

    public function __construct( $name ) {
        $this->name = $name;
    }

    public function bowl( array $num_pins ) {
		if (is_null($this->rolls)){
			$this->rolls = $num_pins;
		}
		else{
			$this->rolls = array_merge($this->rolls,$num_pins);
		}
    }

    public function score() {
        $score = 0;
		$frames = $this->buildgame();
		$lastframe = count($this->rolls);
		//echo var_dump($this->rolls);
		for ($frame = 0; $frame < $lastframe; $frame++){
			$frames[$frame/2][$frame % 2] = $this->rolls[$frame];
		}
		
		//echo var_dump($frames);
        // Calculate Score Here
		
		for ($x = 0; $x <= 10; $x++){
			//echo var_dump($frames[$x]);
			$frame = $frames[$x];
			//echo var_dump($frame);
			//echo "ball 1: " .$frame[0] .'<br>';
			//echo "Frame ". $x+1 ." Ball1 is " . $frames[$x][0] . ", ball two is " . $frames[$x][1] . "<br>" ;
			$framescore = $frame[0] + $frame[1];
			//echo "framescore is $framescore <br>";
			if (10 == $framescore){
				if (10 == $frame[0]){
					echo "It is a strike!<br>";
					$extraballs = $this->ScoreExtraBalls($frames[$x+1],2);
					//echo "Extraballs is $extraballs.<br>";
					if ( 10 == $extraballs && 10 == $frames[$x+1][0]){
						$extraballs += $this->ScoreExtraBalls($frames[$x+2],1);
						//echo "Extraballs is $extraballs.<br>";
					}
				}
				else{
					echo "Nice spare!";
					$extraballs = $this->ScoreExtraBalls($frames[$x+1],1);
					//echo "Extraballs is $extraballs.<br>";
				}
				$score += $framescore + $extraballs;
				//echo "Current score is $score. <br>";
			}
			else{
				$score += $framescore;	
				//echo "Current score is $score. <br>";
			}
			
		}
		

        return $score;

    }
	
	protected function ScoreExtraBalls($extraframe,$ballcount){
		//echo "Have extra balls: $ballcount<br>";
		//echo var_dump($extraframe);
		
		if ( 1 == $ballcount ){
			return $extraframe[0];
		}
		return $extraframe[0] + $extraframe[1];
	}
	
	protected function buildgame(){
		$temp = array(
		array ( 0 ,0 ),
		array ( 0 ,0 ),
		array ( 0 ,0 ),		
		array ( 0 ,0 ),
		array ( 0 ,0 ),
		array ( 0 ,0 ),
		array ( 0 ,0 ),
		array ( 0 ,0 ),
		array ( 0 ,0 ),
		array ( 0 ,0 ),
		array ( 0 ,0 ),
		);
		return $temp;
	}
}