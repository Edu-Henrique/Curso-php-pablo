<?php

function lista_combo_cidades($id_cidade = null): string
{
    $conn = mysqli_connect("localhost", "root", "", "poophp");

    $query = "SELECT * FROM cidade ";

    $output = "";
    $result = mysqli_query($conn, $query);

    if($result)
    {
        while($row = mysqli_fetch_assoc($result))
        {            
            $id = $row["id"];
            $nome = $row["nome"];
            $check = ($id == $id_cidade) ? "selected='1'" : "";
            $output .= "<option {$check} value='{$id}'>{$nome}</option> \n";
        }
    }

    mysqli_close($conn);

    return $output;
}