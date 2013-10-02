<?php
	
	
	class Parser
	{
		private $pconjList;
		
				
		// !We need to consider how to receive the list of pconj's (potential conjunctions) --> (array, string, csv, etc)
		function Parser($listOfPconj = array()) { //this uses a default parameter -> it does not have to be used
												// ex. $myParser = new Parser(); OR $myParser = new Parser($myArray);
			$this->pconjList = $listOfPconj;
			
		}
		
		//parse unformatted text
		function parseUnformattedText($inputText) {
			//create book, clause, text nodes
			
			
			//get text with pconj's
			$text = $this->textWithPconj($inputText);			
			
			//put text with pconj's into text node

			
			//make list of pconj's for beginning of file
			$pconjs = getPconjList();
			
			//convert the xml to string
			
			
			//combine the list of pconj's and xml string
			
		}
		
		
		//parse formatted text
		/*
			Give the text format here for documentation
		
		
		*/
		function parseFormattedText() {
		
		}
		
		//get text with pconj's
		function textWithPconj($text) {
			
			
			
		}
		
		//make the list of pconj's for the beginning of file
		//returns a string of pconj's in xml format
		function getPconjList() {
			//use $this->pconjList
			String $pconjXml = '<pconj>';
			for($i = 1; $i < $pconjList.length(); $i++) {
			
				if($pconjXml.length() < 8) {
				
					$pconjXml = $pconjXml + $pconjList[i].explode() + '</pconj>';
					
				}
				else {
				
					$pconjXml = $pconjXml + '<pconj>' + $pconjList[i].explode() + '</pconj>';
				
				}
			
			}
			
			return $pconjXml;
			
		}
		
		function setPconjList($inputText) {
		
			//receive a custom conjunction list
		
		}
		
		function setPconjList() {
		
			//use the default conjunction list
			$pconjList = new array['WHEN','WHENEVER','WHILE','AS','AS LONG AS','AS SOON AS','SINCE','UNTIL','JUST AS','AT THE SAME TIME AS','WHERE','WHEREVER','THEREFORE','AS A RESULT','FOR THIS REASON','CONSEQUENTLY','HENCE','ACCORDINGLY','THUS','SO','BECAUSE','FOR','SINCE','IN AS MUCH AS','IN ORDER THAT','SO THAT','THAT','TO THE END THAT','FOR THE PURPOSE THAT','LEST','THUS','IN THIS MANNER','IN THAT MANNER','BY THIS MEANS','BY THAT MEANS','SUCH THAT','IF','ONLY IF','UNLESS','EXCEPT THAT','EXCEPT IF' ,'ALTHOUGH','THOUGH','EVEN THOUGH','EVEN IF','X','AND','NOW','BUT','ALSO','OR','WHETHER','TILL','THEN','NEVERTHELESS','YET','STILL','ONLY','ON THE OTHER HAND','CONVERSELY','ON THE CONTRARY','INSTEAD','NOTWITHSTANDING','NOR','LIKEWISE','EITHER','ELSE','OR ELSE','MOREOVER','NEITHER','THAN','INDEED','OTHERWISE','INASMUCH AS'];
		
		}
		
	
	}


?>