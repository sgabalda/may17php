
<html>
	<head>
		<title>Form</title>
	</head>
	<body>
	<form name="htmlform" method="post" action="send.php">
			<p>
			<label for="first_name">First Name *</label>
			<input  type="text" name="first_name" maxlength="50" size="30">
			</p>

			<p>
			<label for="last_name">Last Name *</label>
			<input  type="text" name="last_name" maxlength="50" size="30">
			</p>

                        <p>
                        <label for="birth_date">Last Name *</label>
                        <input  type="date" name="birth_date">
                        </p>

			<label for="email">Email Address *</label>
			<input  type="email" name="email" maxlength="80" size="30">


			<p>
			<label for="gender">Gender</label>
                        <input  type="radio" name="gender" value="Female"> Female
			<input  type="radio" name="gender" value="Male"> Male
			<input  type="radio" name="gender" value="Other"> Other
			</p>

			<p>
			<label for="hobbies">Hobbies</label>
			<input  type="checkbox" name="hobbies[]" value="Sport">Sport
			<input  type="checkbox" name="hobbies[]" value="Music">Music
			<input  type="checkbox" name="hobbies[]" value="Reading">Reading
			<input  type="checkbox" name="hobbies[]" value="Yoga">Yoga
			</p>

			<p>
			<label for="password">Password</label>
			<input type="password" name="password">
			</p>

			<p>
                        <label for="passwordrepeat">Repeat Password</label>
                        <input type="password" name="passwordrepeat">
			</p>

			<p>
                        <label for="country">Country</label>
			<select name="country">
				<option value="">Country...</option>
				<option value="AF">Afghanistan</option>
				<option value="AL">Albania</option>
				<option value="DZ">Algeria</option>
				<option value="AS">American Samoa</option>
				<option value="AD">Andorra</option>
				<option value="AG">Angola</option>
				<option value="AI">Anguilla</option>
				<option value="AG">Antigua &amp; Barbuda</option>
				<option value="ZW">Zimbabwe</option>
			</select>
			</p>

			<p>
			<label for ="car">Select one or more cars</label>
			<select multiple name="car[]">
				<option value="volvo">Volvo</option>
				<option value="saab">Saab</option>
				<option value="opel">Opel</option>
				<option value="audi">Audi</option>
			</select>
			</p>

			<p>
			<label for="upload">Upload an image</label>
			<input type="hidden" name="upload" value="kakaka">
			</p>

			<p>
			<label for="comments">Comments *</label>
			<textarea  name="comments" maxlength="1000" cols="25" rows="6"></textarea>
			</p>


			<input type="submit" value="Submit">
		</form>

<style>
label {display: block;}
	</body>
</html>
