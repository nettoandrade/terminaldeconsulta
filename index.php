
<!DOCTYPE HTML>
<html>
<head>
  <title>MA Tecnologia</title>
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
  <link rel="stylesheet" type="text/css" href="css/style.css" />
  <link rel="shortcut icon" href="logo2.png" >
  <script type="text/javascript" src="js/modernizr-1.5.min.js"></script>
</head>
<body>
  <div id="main">
    <header>
      <div id="logo">
        <div id="logo_text">
          <h1><a href="index.html" id="logo2"><img src="images/logo.png" width="140px"></a>Consulta Preço</h1>
        </div>
      </div>
      <nav>
        <div id="menu_container">
          <ul class="sf-menu" id="nav">
            <li><a href="index.php">Consulta Preço</a></li>
            <li><a href="orcamento.php">Orçamento</a></li>
            <!--<li><a href="page.html">Ranking de Vendedores</a></li>
            <li><a href="another_page.html">Another Page</a></li>
            <li><a href="#">Example Drop Down</a>
              <ul>
                <li><a href="#">Drop Down One</a></li>
                <li><a href="#">Drop Down Two</a>
                  <ul>
                    <li><a href="#">Sub Drop Down One</a></li>
                    <li><a href="#">Sub Drop Down Two</a></li>
                    <li><a href="#">Sub Drop Down Three</a></li>
                    <li><a href="#">Sub Drop Down Four</a></li>
                    <li><a href="#">Sub Drop Down Five</a></li>
                  </ul>
                </li>
                <li><a href="#">Drop Down Three</a></li>
                <li><a href="#">Drop Down Four</a></li>
                <li><a href="#">Drop Down Five</a></li>
              </ul>
            </li>
            <li><a href="contact.php">Contact Us</a></li>
          --></ul>
        </div>
      </nav>
    </header>
<form>
<select name="tipo" id="tipo">
  <option value="CodBar">Cod. Barra</option>
  <option value="Produto">Nome</option>   
  <option value="Cod">Codigo</option>
  <option value="Fab">Fabricante</option>
</select>
  <input type="text" name="produto" id="produto" placeholder="Produto" autofocus>
  <input type="text" name="codbar" id="codbar"  placeholder="Codigo De Barra" autofocus>
  <input type="text" name="cod" id="cod" placeholder="Codigo" autofocus>
  <input type="text" name="fab" id="fab" placeholder="Fabricante" autofocus>
  <input type="submit" id="consultar" value="Consultar">
</form>
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
</div>
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
        '<td>'+Math.round(value[5]*100)/100+'</td>'+
        '<td>'+Math.round(value[6]*100)/100+'</td>'+
        '<td>'+value[7]+'</td>'+
        '</tr>';    
      });
      $('table#tabela tbody').html(content);
    });
    event.preventDefault();
  });
</script>
  <script type="text/javascript" src="js/jquery.js"></script>
  <script type="text/javascript" src="js/jquery.easing-sooper.js"></script>
  <script type="text/javascript" src="js/jquery.sooperfish.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      $('ul.sf-menu').sooperfish();
      $('.top').click(function() {$('html, body').animate({scrollTop:0}, 'fast'); return false;});
    });
  </script>
</body>
</html>
