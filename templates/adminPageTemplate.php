<?php

class adminPageTemplate
{
	public function render($data)
	{
		
			$html = <<<HTML
		<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

		</head>
		<center>
		<br><br><br>
		<body id="main_body" >
			<div id="form_container">
				<form id="form_2678" class="appnitro" method="post" action="">
							<div class="form_description">
					<p>Modify or add a entry</p>
				</div>								
				<label class="description" for="element_1">ID </label>
				<div>
					<input id="element_1" name="element_1" class="element text medium" type="text" maxlength="255" value="{$data[0]}"/> 
				</div> 
				<label class="description" for="element_2">TITLE </label>
				<div>
					<input id="element_2" name="element_2" class="element text medium" type="text" maxlength="255" value="{$data[1]}"/> 
				</div> 
				<label class="description" for="element_3">CONTENT </label>
				<div>
					<textarea id="element_3" name="element_3" class="element textarea large">{$data[2]}</textarea> 
				</div> 
				<label class="description" for="element_4">PICTURE </label>
				<div>
					<input id="element_4" name="element_4" class="element text medium" type="text" maxlength="255" value="{$data[3]}"/> 
				</div> 
				<br>
				<input type="submit" name="modify" value="Modify/Add" />	
				</form>	
				<br>
				<br>
			</div>
			</center>
			</body>
		</html>
HTML;


		return $html;
	}
}
?>