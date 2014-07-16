<?
#include "connectiondbsql.php";
   $page = (isset($_GET['page']))?$_GET['page'].".php":"iniciar.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Consulta Preço</title>
</head>
<body>
	<input type="text" name="produto" id="produto" placeholder="Produto">
	<button id="consultar">Consultar</button>
	<table id="tabela">
		<thead>
			<tr>
				<th>Codigo</th>
				<th>Cod. Barra</th>
				<th>Descrição</th>
				<th>Preço</th>
				<th>Tipo</th>
				<th>MATRIZ</th>
				<th>FILIAL</th>
			</tr>
		</thead>
		<tbody>
			
		</tbody>
	</table>
</body>
<script src="js/jquery-1.11.1.min.js"></script>
<script>
	$('table#tabela').hide();
//	$('#consultar').click(function(){window.location='index.php?page=gerenciamento&produto='+$('#produto').val()});
	$('#consultar').click(function(event){
		$.get('gerenciamento.php?produto='+$('#produto').val(), function(result){
			$('table#tabela').show();
			var content = '';
			$.each(result, function(key , value){
				content += '<tr>' +
				'<td>'+value[0]+'</td>'+
				'<td>'+value[1]+'</td>'+
				'<td>'+value[2]+'</td>'+
				'<td>'+value[3]+'</td>'+
				'<td>'+value[4]+'</td>'+
				'<td>'+value[5]+'</td>'+
				'<td>'+value[6]+'</td>'+
				'</tr>';		
			});
			$('table#tabela tbody').html(content);
		});
		event.preventDefault();
	});
</script>
</html>