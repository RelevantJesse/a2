<?php require('PasswordCreator.php')?>

<!DOCTYPE html>
<html>
<head>

	<title>Password Generator</title>

  <link href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' rel='stylesheet'>
	<link href='https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/flatly/bootstrap.min.css' rel='stylesheet'>
	<link href='css/main.css' rel='stylesheet'>
  <script src="scripts/jquery-3.1.1.min.js"></script>
  <script>
    function ToggleType() {
      var x = document.getElementById('XKCDDiv');
      var s = document.getElementById('SchneierDiv');
      if (x.style.display === 'none') {
          x.style.display = 'block';
          s.style.display = 'none';
      } else {
          x.style.display = 'none';
          s.style.display = 'block';
      }
    }

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
<?php echo var_dump(DWA\PasswordCreator::Generate()) ?>
<div class="maindiv">
	<div class="centerdiv">
    <br>
		<h1>Password Generator</h1>
    <form method='GET'>
      <div class="radio-inline">
        <label>
          <input type="radio" name="PasswordType" id="optionsRadios1" value="XKCD" onclick="ToggleType();" checked>
          XKCD
        </label>
      </div>
      <div class="radio-inline">
        <label>
          <input type="radio" name="PasswordType" id="optionsRadios2" onclick="ToggleType();" value="Schneier">
          Schneier Scheme
        </label>
      </div>
    </div>
  <br><br>

  <div id="XKCDDiv">
    <div class="centerdiv">
      <img src='images/password_strength.png' alt='Password Strength'>
    </div>
    <br>
    <br>
    <div class="innerdiv">
        <div class="form-group">
          <label for="ddlNumberOfWords">Number of words:</label>
          <select class="form-control" name="ddlNumberOfWords" id="ddlNumberOfWords">
              <option>3</option>
              <option selected="True">4</option>
              <option>5</option>
              <option>6</option>
              <option>7</option>
              <option>8</option>
            </select>
        </div>
        <div class="form-group">
          <label>Options:</label>
          <div class="checkbox">
            <label><input type="checkbox" name="chkNumber">Include a number</label>
          </div>
          <div class="checkbox">
            <label><input type="checkbox" name="chkSymbol" id="chkSymbol" onclick="ToggleSymbol();">Include a symbol</label>
          </div>
          <select class="form-control" name="ddlSymbols" id="ddlSymbols" width=50px disabled="true">
            <option>!</option>
            <option>@</option>
            <option>#</option>
            <option>$</option>
            <option>%</option>
            <option>^</option>
            <option>&amp;</option>
            <option>*</option>
          </select>
        </div>

    </div>
  </div>

  <div id="SchneierDiv">

  </div>

<div class="innerdiv">
  <button type="submit" class="btn btn-primary">Generate Password</button>
</div>
<br>
</form>
</body>
</html>
