<?php 
    session_start();
    require "conexao.php";

    if(count($_SESSION['carrinho']) == '0') {
        echo"<script>alert('Não existem produtos no carrinho de compras')</script>";
        echo"<script>window.location = '../meu-carrinho.php'</script>";
    }else{
        $insert_pedido = "INSERT INTO pedido (data_pedido, data_hora_pedido, valor_pedido, status_pedido) VALUES('".date('Y-m-d')."','".date('Y-m-d H:i:s')."', '0', '0')";
        mysqli_query($conexao, $insert_pedido);
        $read_ultimo_pedido = mysqli_query($conexao,"SELECT id_pedido FROM pedido ORDER BY id_pedido DESC LIMIT 1");
        if(mysqli_num_rows($read_ultimo_pedido) > '0'){
            foreach($read_ultimo_pedido as $read_ultimo_pedido_view);
        }         
        foreach($_SESSION['carrinho'] as $id_produto => $qtd_produto){

            $read_produto_carrinho = mysqli_query($conexao, "SELECT nome_produto, valor_produto FROM produto WHERE id_produto = '".$id_produto."'");
            if (mysqli_num_rows($read_produto_carrinho) > '0'){
                foreach($read_produto_carrinho as $read_produto_carrinho_view);
                $valor_total_produto_carrinho = $qtd_produto * $read_produto_carrinho_view['valor_produto'];
                $valor_total_venda += $valor_total_produto_carrinho;
            }

            $insert_itens_pedido = "INSERT INTO itens_pedido (id_pedido, id_produto, quantidade, valor_produto, valor_total) VALUES('".$read_ultimo_pedido_view['id_pedido']."', '".$id_produto."', '".$qtd_produto."', '".$read_produto_carrinho_view['valor_produto']."', '".$valor_total_produto_carrinho."')";

            mysqli_query($conexao, $insert_itens_pedido);
        }
        $update_pedido = "UPDATE pedido SET valor_pedido = '".$valor_total_venda."' WHERE id_pedido = '".$read_ultimo_pedido_view['id_pedido']."'";
        mysqli_query($conexao, $update_pedido);
        unset( $_SESSION['carrinho'] );
        echo"<script>alert('Pedido Finalizado com sucesso')</script>";
        echo"<script>window.location = '../meus-pedidos.php'</script>";
    }
?>