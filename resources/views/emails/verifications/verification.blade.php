<!DOCTYPE html>
<html lang="en">
	<title>Account Activation</title>
	<body style="margin:0px 0px 0px 0px; padding:0px 0px 0px 0px; font-family: Arial, Verdana, Sans-serif;">
		<table width="100%" height="100%"; cellpadding="0"; style="padding:20px 0px 20px 0px;" bgcolor="#ececec">
			<tr align="center">
				<td>
					<table width="562" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" style="color: #000000;
						padding: 16px 16px 16px 14px; font-family: Arial, verdana, Sans-serif; ">
						<tr>
							<td>
								<a href="{{ route('home') }}"><img src="{{asset('images/home/logo.png')}}" alt="" /></a>
							</td>
						</tr>
						
						<tr>
							<td>
								<hr>
							</td>
						</tr>
						<tr>
							<td style="padding-top:10px;"> Dear {{$user->name }},</td>
						</tr>
						<tr>
							<td>Please activate your account by clicking below button.</td>
						</tr>
						<tr>
							<td style="font-size:13px; text-align: center;">
								<a valign="center" style="-webkit-appearance: button; -moz-appearance: button; appearance: button; text-decoration: none; width:50%; padding-bottom:10px; padding-top:10px; background-color: #FE980F; border: 0; color: #FFFFFF; text-align: center; margin-top: 20px;" href="{{ route('auth.verify', $token->token) }}">Activate Account</a>
							</td>
						</tr>
						<tr></tr>
						<tr>
							<td style="text-align:center; padding-top:5px;">etrademe.com</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
	</body>
</html>