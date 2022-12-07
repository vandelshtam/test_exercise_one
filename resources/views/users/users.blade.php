@extends('layouts.main')
@section('content')
    

<head>
<meta name="viewport"
		content="width=device-width,
				initial-scale=1,
				shrink-to-fit=no">
<title>
	load data from json file
	into a bootstrap table
</title>

<!-- Include Bootstrap for styling -->
<link rel="stylesheet"
		href=
"https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

<!-- Include the Bootstrap Table CSS
for the table -->
<link rel="stylesheet"
		href=
"https://unpkg.com/bootstrap-table@1.16.0/dist/bootstrap-table.min.css">
</head>
<body>
	
<div class="container">
	<h6 class="text text-success text-center">
		Back main page
		<a href="/main" class="btn btn-secondary">Back</a>
	</h6>
	
	<h1 class="text text-success text-center ">
	All users list
	</h1>
	<h6 class="text text-success text-center">
	The list registration users
	</h6>
	<div id="container">
		<h3 id="heading">Please enter token</h3>
		<div id="btnDiv">
			<input type="text" id="token" placeholder="Token">
			<button  class="btn btn-primary" onclick="requestData()">
				get all users
			</button>
		</div>
	</div>	
	<table class="table-striped border-success">
		<thead>
		<tr >
			<th data-field="id">
			<span class="text-success">
				 ID
			</span>
			</th>
			<th data-field="username">
			<span class="text-success">
				Username
			</span>
			</th>
			<th data-field="email">
			<span class="text-success">
				Email
			</span>
			</th>
			<th data-field="">
				<span class="text-success">
					action
				</span>
			</th>
		</tr>	
		</thead>
	</table>
</div>

<!-- Include jQuery and other required
files for Bootstrap -->

<script src=
"https://code.jquery.com/jquery-3.3.1.min.js">
</script>
<script src=
"https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js">
</script>
<script src=
"https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js">
</script>

<!-- Include the JavaScript file
for Bootstrap table -->
<script src=
"https://unpkg.com/bootstrap-table@1.16.0/dist/bootstrap-table.min.js">
</script>
<script>
	
</script>
<script type="text/javascript">
	var head = document.getElementById('heading');
	var request = new XMLHttpRequest();
		function requestData() {
			let token = document.querySelector('#token');
			request.open('GET', '/api/users/', true);
            // Set the request header i.e. which type of content you are sending
            request.setRequestHeader('Authorization', 'Bearer ' + token.value);
			request.onload = function () {
				// Here we convert JSON to object
				var obj = JSON.parse(this.responseText);
				console.log(obj)
				$(document).ready(function () {
					// Use the given data to create
					// the table and display it
					$('table').bootstrapTable({
						data: obj.data	
					});
				});	
			}
			
			request.send();
		}
</script>

</body>
</html>

@endsection