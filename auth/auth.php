<?php

function login()
{

    include 'ajax/connection.php';


    if (isset($_SESSION['id_user'])) //если сесcия есть
    {
        if (isset($_COOKIE["phone"])) {
            $id = $_SESSION['id_user'];
            setcookie("phone", $_COOKIE['phone'], time() + 1800, "/");
            return true;
        } else {
            $rez = mysqli_query($con, "SELECT * FROM users WHERE id_user='{$_SESSION['id_user']}'"); //запрашивается строка с искомым id

            if (mysqli_num_rows($rez) == 1) //если получена одна строка
            {
                $row = mysqli_fetch_assoc($rez); //она записывается в ассоциативный массив

                setcookie("phone", $row['phone'], time() + 1800, "/");

                $id = $_SESSION['id_user'];
                setcookie("id_user", $id);
                return true;
            } else return false;
        }
    }
    return true;
}