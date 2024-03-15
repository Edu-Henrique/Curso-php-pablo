<?php
$conn = mysqli_connect("localhost", "root", "", "poophp");

if(!empty($_GET["action"]) and $_GET["action"] == "delete")
{
    $id = (int) $_GET["id"];                    
    mysqli_query($conn, "DELETE FROM PESSOA WHERE ID={$id}");
}

$query = "SELECT * FROM PESSOA ORDER BY ID";
$result = mysqli_query($conn, $query);

$items = "";
while($row = mysqli_fetch_assoc($result))
{
    $item = file_get_contents("html/item.html");
    $item = str_replace("{id}",        $row["id"],        $item);
    $item = str_replace("{nome}",      $row["nome"],      $item);
    $item = str_replace("{endereco}",  $row["endereco"],  $item);
    $item = str_replace("{bairro}",    $row["bairro"],    $item);
    $item = str_replace("{telefone}",  $row["telefone"],  $item);
    $item = str_replace("{email}",     $row["email"],     $item);
    $item = str_replace("{id_cidade}", $row["id_cidade"], $item);

    $items .= $item;
}
mysqli_close($conn);

$list = file_get_contents("html/list.html");
$list = str_replace("{items}", $items, $list);

echo $list;