<?
	require_once "connectiondbsql.php";

	$conexao = connectiondbsql();

	function buscaPreco($produto){
		global $conexao;
		$set = $conexao->query("SELECT B1_COD, B1_CODBAR, B1_DESC, ROUND(B0_PRV1,2) AS PRECO, B1_TIPO,
						MATRIZ = SUM(CASE WHEN B2.B2_FILIAL = '01' THEN B2_QATU ELSE 0 END),
						FILIAL = SUM(CASE WHEN B2.B2_FILIAL = '03' THEN B2_QATU ELSE 0 END)
						FROM SB1010 AS B1
						INNER JOIN SB0010 AS B0 ON B1_COD = B0_COD
						INNER JOIN SB2010 AS B2 ON B0_COD = B2_COD
							WHERE B1_DESC LIKE '".$produto."%'
							AND B1_MSBLQL = '2'
							AND B1.D_E_L_E_T_ <> '*'
							AND B0.D_E_L_E_T_ <> '*'
							AND B0_FILIAL = ''
							AND B2.D_E_L_E_T_ <> '*'
							GROUP BY B1_COD, B1_CODBAR, B1_DESC, B0_PRV1, B1_TIPO
							ORDER BY B1_DESC" );
		return $set->fetchAll();
	}


?>