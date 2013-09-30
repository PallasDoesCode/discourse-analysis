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
			
		}
		
		
	
	}


?>