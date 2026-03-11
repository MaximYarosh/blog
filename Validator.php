<?php

class Validator 
{
	public function clearData($data) 
	{
		return htmlspecialchars(trim($data));
	}

	 public function check($name, $password, $password_confirm = '')
	{

		$blackList = ['Hacker', 'Spammer', 'Bot'];
		$errors = [];

		if(empty($name) || empty($password) ) {
			array_push($errors, "Поле не повинно бути пустим, заповніть всі поля.");
			return $errors;
		}

		if(strlen($name) < 3) {
			array_push($errors, "Імя повинно бути більше ніж 3 символи!");
		}

		if(strlen($password) < 8) {
			array_push($errors, "Пароль має бути не менше 8 символів у довжину!");
		}

		if(in_array($name, $blackList)) {
			array_push($errors, "Вас заблоковано!");
		}

		if(!empty($password_confirm) && $password !== $password_confirm) {
			array_push($errors, "Паролі не співпадають!");
		}


		return $errors;
	}
}