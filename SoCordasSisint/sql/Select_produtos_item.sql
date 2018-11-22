SELECT
    produto.nome AS PROD,itempedido.* AS IP
    FROM
    sisintsocordas.itempedido
    INNER JOIN sisintsocordas.produto 
        ON (itempedido.produtoID = produto.produtoID)

ORDER BY PROD ASC;