<?php 


return array(
	'index.php/signin' => 'auth/signIn',
	'user' => 'user/getAll',
	'user/([0-9]+)' => 'user/get/$1'
);