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
		/*
		    - There is no format required for the parsing of unformatted text
		    
		    - The applet will display the entirety of the inputted text file in a single
		      node, where the user can then choose his or her own breaks, logical or not.
		*/
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
			- The format for the inputted text file is as follows:
			
			  <chapter>:<verse> <conjunction>
			  <clause>
			  <conjunction>
			  <clause>
			  ...
			  ..
	          .
			
            **********
			- An example of the above format being used in a real input file:
			
			  1:1 X
			  It seemed good to me also
			  X
			  having had perfect understanding of all things from the very first to write
			  you an orderly account, [most] excellent Theophilius
			  
			**********  
			- !!NOTE!!
			
			  ~ That <chapter> and <verse> are OPTIONAL; if omitted, then blanks: " "
			    will be inserted in their place and the colon will be left out, too
			    
			  ~ If the <chapter> and <verse> are stated once, the remaining conjunction lines will hold the same <chapter> and <verse> until the <chapter> and <verse> are specified.
			  			Ex.  1:1 X
			  				It seemed good to me also
			 				X
			 				having had perfect understanding of all things 
			  				1:2 X
			  				from the very first to write
			  				
			  				--Is the same as--
			  				
			  				1:1 X
			  				It seemed good to me also
			 			-->	1:1 X
			 				having had perfect understanding of all things 
			  				1:2 X
			  				from the very first to write
			    
			  ~ If two clauses are next to each other on separate lines, the conjunction X will be placed between the two clauses.
			  			Ex.
			  			It seemed good to me also
			 			having had perfect understanding of all things 
			  			
			  			--Is the same as--
			  			It seemed good to me also
			  			X
			 			having had perfect understanding of all things 
			  			
			    
			  ~ The conjunction X signifies that the conjunction is logically implied,
			    thus suggesting a logical break, unless it is the X at the very beginning
			    of the text, following the first <chapter> and <verse>.  This X signifies
			    the beginning of the text itself
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