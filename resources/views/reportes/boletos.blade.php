<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Imprimir boletos</title>
</head>
<body>

	<h1 style="text-align: center;">{{$rifa->premio}}</h1>

	<h1 style="text-align: center;">Estado: PAGADO</h1>

	<h2 style="text-align: center;">Boletos Manuales</h2>

	<p style="text-align: center;">
		@foreach($boletos as $boleto)
			{{$boleto->number}}
		@endforeach
	</p>

	<h2 style="text-align: center;">Boletos Adicionales</h2>

	<p style="text-align: center;">
		@foreach($boletos_aleatorio as $bole_ale)
			{{$bole_ale->number}}
		@endforeach
	</p>

	<h2 style="text-align: center;">Datos Personales</h2>
	<p style="text-align: center;">{{$usuario->nombres}} {{$usuario->apellidos}}</p>
	<p style="text-align: center;">{{$usuario->whatsapp}}</p>
	<p style="text-align: center;">Estado {{$usuario->estado}}</p>

	

</body> 
</html>