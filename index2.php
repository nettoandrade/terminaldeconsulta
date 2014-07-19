<?
   $page = (isset($_GET['page']))?$_GET['page'].".php":"iniciar.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>MA Consulta Preço</title>
</head>
<style type="text/css">
	body {
		font-family: sans-serif;
	}
	header{
		font-family: sans-serif;
		text-indent: inline-block;
	}
</style>
<body>
<header>
	<img src="logo2.png" width="140px">
	<h1>MA Tecnologia</h1>
</header>
	<select name="tipo" id="tipo">
		<option value="CodBar">Cod. Barra</option>
		<option value="Produto">Nome</option>		
		<option value="Cod">Codigo</option>
		<option value="Fab">Fabricante</option>
	</select>
	<input type="text" name="produto" id="produto" placeholder="Produto" >
	<input type="text" name="codbar" id="codbar" placeholder="Codigo De Barra">
	<input type="text" name="cod" id="cod" placeholder="Codigo">
	<input type="text" name="fab" id="fab" placeholder="Fabricante">
	<button id="consultar">Consultar</button>
	<table id="tabela">
		<thead>
			<tr>
				<th>Codigo</th>
				<th>Cod. Barra</th>
				<th>Descrição</th>
				<th>Valor R$</th>
				<th>Tipo</th>
				<th>MATRIZ</th>
				<th>FILIAL</th>
				<th>Fabricante</th>
			</tr>
		</thead>
		<tbody></tbody>
	</table>
</body>
<script src="js/jquery-1.11.1.min.js"></script>
<script>
	$('table#tabela').hide();
	$('input#produto').hide();
	$('input#cod').hide();
	$('input#fab').hide();
	$('select#tipo').click(function(){
		if ($('select#tipo').val() == "Fab") {
			$('input#codbar').hide();
			$('input#cod').hide();
			$('input#produto').hide();
			$('input#fab').show();
		};
		if ($('select#tipo').val() == "Produto") {
			$('input#codbar').hide();
			$('input#cod').hide();
			$('input#produto').show();
			$('input#fab').hide();
		};
		if ($('select#tipo').val() == "CodBar") {
			$('input#codbar').show();
			$('input#cod').hide();
			$('input#produto').hide();
			$('input#fab').hide();
		};
		if ($('select#tipo').val() == "Cod") {
			$('input#cod').show();
			$('input#codbar').hide();
			$('input#produto').hide();
			$('input#fab').hide();
		};
	});
	$('#consultar').click(function(event){
		var consult = '';
		if ($('select#tipo').val() == "CodBar")  {
			consult = "codbar="+$('#codbar').val();
		};
		if ($('select#tipo').val() == "Produto")  {
			consult = "produto="+$('#produto').val();
		};
		if ($('select#tipo').val() == "Cod")  {
			consult = "cod="+$('#cod').val();
		};
		if ($('select#tipo').val() == "Fab")  {
			consult = "fab="+$('#fab').val();
		};
		$.get('gerenciamento.php?'+consult, function(result){
			$('table#tabela').show();
			var content = '';
			$.each(result, function(key , value){
				content += '<tr>' +
				'<td>'+value[0]+'</td>'+
				'<td>'+value[1]+'</td>'+
				'<td>'+value[2]+'</td>'+
				'<td>'+Math.round(value[3]*100)/100+'</td>'+
				'<td>'+value[4]+'</td>'+
				'<td>'+value[5]+'</td>'+
				'<td>'+value[6]+'</td>'+
				'<td>'+value[7]+'</td>'+
				'</tr>';		
			});
			$('table#tabela tbody').html(content);
		});
		event.preventDefault();
	});
</script>
</html>