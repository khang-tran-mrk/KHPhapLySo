<%@ page language="java" contentType="text/html; charset=UTF-8"
    pageEncoding="UTF-8"%>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Insert title here</title>
<style>
		.container{
			width: 100%;
			height: 100vh;
			display: flex;
			justify-content: center;
			align-items: center;
		}
	</style>
</head>
<body>
	
	<div class="container">
		<form method="POST" action="../LoginController">
			<div class="form-control">
				<label for="">Username</label>
				<input name="username" type="text">
			</div>
			<div class="form-control">
				<label for="">password</label>
				<input name="password" type="password">
			</div>
			<button type="submit">Login</button>
		</form>
		<table>
			<tr>
				<td></td>
			</tr>
		</table>
	</div>
</body>
</html>