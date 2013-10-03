<?php
	
	
	class Parser
	{
		private $pconjList;
		private $defaultPconjList = array('WHEN','WHENEVER','WHILE','AS','AS LONG AS','AS SOON AS','SINCE','UNTIL','JUST AS','AT THE SAME TIME AS','WHERE','WHEREVER','THEREFORE','AS A RESULT','FOR THIS REASON','CONSEQUENTLY','HENCE','ACCORDINGLY','THUS','SO','BECAUSE','FOR','SINCE','IN AS MUCH AS','IN ORDER THAT','SO THAT','THAT','TO THE END THAT','FOR THE PURPOSE THAT','LEST','THUS','IN THIS MANNER','IN THAT MANNER','BY THIS MEANS','BY THAT MEANS','SUCH THAT','IF','ONLY IF','UNLESS','EXCEPT THAT','EXCEPT IF' ,'ALTHOUGH','THOUGH','EVEN THOUGH','EVEN IF','X','AND','NOW','BUT','ALSO','OR','WHETHER','TILL','THEN','NEVERTHELESS','YET','STILL','ONLY','ON THE OTHER HAND','CONVERSELY','ON THE CONTRARY','INSTEAD','NOTWITHSTANDING','NOR','LIKEWISE','EITHER','ELSE','OR ELSE','MOREOVER','NEITHER','THAN','INDEED','OTHERWISE','INASMUCH AS');
				
				
				
		// !We need to consider how to receive the list of pconj's (potential conjunctions) --> (array, string, csv, etc)
		function Parser($listOfPconj = "useDefault") { //this uses a default parameter -> it does not have to be used
												// ex. $myParser = new Parser(); OR $myParser = new Parser($myArray);
			if($listOfPconj == "useDefault") {
				$listOfPconj = $this->defaultPconjList;
			}
			
			$this->pconjList = $listOfPconj;

		}
		
		//parse unformatted text
		function parseUnformattedText($inputText) {
			//create book, clause, text nodes
			$book = new SimpleXmlElement("<book></book>");
			$clause = $book->addChild("clause");
			$text = $clause->addChild("text", $inputText);
			$text->addAttribute("chapter", 1);
			$text->addAttribute("verse", 1);
			
			//make list of pconj's for beginning of file
			$pconjs = $this->getPconjList();
			
			//convert the xml to string
			$xml = $book->asXml();			
			
			//combine the list of pconj's and xml string
			$xml = "$pconjs\n$xml";
			return $xml;
		}
		
		
		//parse formatted text
		/*
			Give the text format here for documentation
		
		
		*/
		function parseFormattedText() {
		
		}

		
		//make the list of pconj's for the beginning of file
		//returns a string of pconj's in xml format
		function getPconjList() {
			//use $this->pconjList
			
			$pconjXml = '<pconj>';
			$xmlInside = implode("</pconj>\n<pconj>", $this->pconjList);
			$pconjXml = "$pconjXml$xmlInside</pconj>\n";
			return $pconjXml;
			
		}
		

		
	
	}


?>