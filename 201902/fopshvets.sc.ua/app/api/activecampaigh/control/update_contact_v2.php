<?

	// Отображение ошибок (1 – показывать, 0 – скрывать)
	ini_set('display_errors', 1);

	// Получаем переменные 
	$email = $_GET['email'];
	$list = $_GET['list'];
	$name = $_GET['name'];
	$phone = $_GET['phone'];
	$lead = $_GET['lead'];

	// Формируем запрос
	$fields = array(
			'email'=>$email,
			'api_action'=>'contact_sync',
			'api_key'=>'816a499cb7dd31846433d832b26a9f08822e41989aa64edcd3c9d355aba0fd5c3218281c',
			'first_name'=>$name,
			'phone'=>$phone,
			'p['.$list.']'=>$list,
			'field[%lead_'.$list.'%]'=>$lead
		);
	
	// Отправляем запрос на обновление контактной информации
    $ch=curl_init();
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_URL,'https://polza.api-us1.com/admin/api.php');
    curl_setopt($ch,CURLOPT_CUSTOMREQUEST,'POST');
    curl_setopt($ch,CURLOPT_POSTFIELDS,$fields);
    curl_setopt($ch,CURLOPT_HTTPHEADER,array('application/x-www-form-urlencoded; charset=utf-8'));
    curl_setopt($ch,CURLOPT_HEADER,false);
    $out=curl_exec($ch); 
    $code=curl_getinfo($ch,CURLINFO_HTTP_CODE);

    echo $out;

?>