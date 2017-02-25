<?php
require('PasswordCreator.php');
require('Form.php');

$form = new DWA\Form($_GET);
?>

<!DOCTYPE html>
<html>
<head>

	<title>XKCD Password Generator</title>

  <link href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' rel='stylesheet'>
	<link href='https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/flatly/bootstrap.min.css' rel='stylesheet'>
	<link href='css/main.css' rel='stylesheet'>
  <script src="scripts/jquery-3.1.1.min.js"></script>
  <script>
    function ToggleSymbol() {
      var c = document.getElementById('chkSymbol');
      if (c.checked) {
        debugger;
          $("#ddlSymbols").prop('disabled', false);
      } else {
          $("#ddlSymbols").prop('disabled', true);
      }
    }
  </script>
</head>
<body>
<div class="maindiv">
	<div class="centerdiv">
    <br>
		<h1>XKCD Password Generator</h1>
    <form method='GET'>


  <div id="XKCDDiv">
    <br>
    <div class="innerdiv">
        <div class="form-group">
          <label for="ddlNumberOfWords">Number of words:</label>
          <select class="form-control" name="ddlNumberOfWords" id="ddlNumberOfWords">
              <option <?php if($form->isSubmitted() && $_GET["ddlNumberOfWords"] == "3") echo "selected"; ?>>3</option>
              <option <?php if(!$form->isSubmitted() || $_GET["ddlNumberOfWords"] == "4") echo "selected"; ?>>4</option>
              <option <?php if($form->isSubmitted() && $_GET["ddlNumberOfWords"] == "5") echo "selected"; ?>>5</option>
              <option <?php if($form->isSubmitted() && $_GET["ddlNumberOfWords"] == "6") echo "selected"; ?>>6</option>
              <option <?php if($form->isSubmitted() && $_GET["ddlNumberOfWords"] == "7") echo "selected"; ?>>7</option>
              <option <?php if($form->isSubmitted() && $_GET["ddlNumberOfWords"] == "8") echo "selected"; ?>>8</option>
            </select>
        </div>
        <div class="form-group">
          <label>Options:</label>
          <div class="checkbox">
            <label><input type="checkbox" name="chkNumber" <?php if(isset($_GET["chkNumber"])) echo "checked"; ?>>Include a number</label>
          </div>
          <div class="checkbox">
            <label><input type="checkbox" name="chkSymbol" id="chkSymbol" onclick="ToggleSymbol();" <?php if(isset($_GET["chkSymbol"])) echo "checked"; ?>>Include a symbol</label>
          </div>
          <select class="form-control" name="ddlSymbols" id="ddlSymbols" width=50px <?php if(!isset($_GET["chkSymbol"])) echo "disabled=\"true\""; ?>">
            <option <?php if($form->isSubmitted() && $_GET["ddlSymbols"] == "!") echo "selected"; ?>>!</option>
            <option <?php if($form->isSubmitted() && $_GET["ddlSymbols"] == "@") echo "selected"; ?>>@</option>
            <option <?php if($form->isSubmitted() && $_GET["ddlSymbols"] == "#") echo "selected"; ?>>#</option>
            <option <?php if($form->isSubmitted() && $_GET["ddlSymbols"] == "$") echo "selected"; ?>>$</option>
            <option <?php if($form->isSubmitted() && $_GET["ddlSymbols"] == "%") echo "selected"; ?>>%</option>
            <option <?php if($form->isSubmitted() && $_GET["ddlSymbols"] == "^") echo "selected"; ?>>^</option>
            <option <?php if($form->isSubmitted() && $_GET["ddlSymbols"] == "&") echo "selected"; ?>>&amp;</option>
            <option>*</option>
          </select>
        </div>

    </div>
  </div>

<div class="innerdiv">
  <button type="submit" class="btn btn-primary">Generate Password</button>
</div>
<br>
</form>
<?php if($form->isSubmitted()){ ?>
<div class="alert alert-success centerdiv" role="alert">
  <?php echo "Password Generated: " . DWA\PasswordCreator::Generate() ?>
</div>
<?php } ?>
</body>
</html>
