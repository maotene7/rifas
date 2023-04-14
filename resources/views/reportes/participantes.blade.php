<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Imprimir Participante</title>
</head>
<body>

	<h1 style="text-align: center;">{{$rifa->premio}}</h1>

	<table border="1" width="100%">
		<tr>
			<td>Nombre</td>
			<td>Boletos</td>
			<td>Boletos Aleatorios</td>
		</tr>
		@foreach($usuarios as $us)
		<tr>
			<td>{{$us->nombres}} {{$us->apellidos}}</td>
			<td>
				@foreach($boletos as $bol)

					@if($bol->id_us == $us->id)
						{{$bol->number}}
					@endif
				@endforeach
			</td>
			<td>
				@foreach($boletos_aleatorio as $bol_ale)

					@if($bol_ale->id_us == $us->id)
						{{$bol_ale->number}}
					@endif
				@endforeach
			</td>
		</tr>
		@endforeach
	</table>	

</body> 
</html>