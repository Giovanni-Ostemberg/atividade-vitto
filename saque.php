<?php


saque(301);

function saque($valor)
{

    // primeiro, checaremos se o número é inteiro
    if (is_int($valor) && $valor < 10001 && $valor > 0) {
        $resto = $valor;
        $stringRetorno = "";
        // agora, checaremos se o número é divisível por 2
        if ($valor % 2 === 0 || $valor / 2 >= 2) {
            // Condicionamos a entrada para quando o número tiver divisão por 200 maior que 0 e que possibilite o retorno com as cédulas disponíveis
            if (floor($resto / 200) > 0 && $resto != 201 && $resto != 203) {
                $nota_200 = ($resto % 200 != 1 && $resto % 200 != 3) ? floor($resto / 200) : floor($resto / 200) - 1;
                $resto -= $nota_200 * 200;
                $stringRetorno .=   $nota_200 . " nota(s) de R$200,00";
            }

            // Condicionamos a entrada para quando o número tiver divisão por 100 maior que 0 e que possibilite o retorno com as cédulas disponíveis
            if (floor($resto / 100) > 0 && $resto != 101 && $resto != 103) {
                $nota_100 = ($resto != 201 && $resto != 203) ? floor($resto / 100) : floor($resto / 100) - 1;
                $resto -= $nota_100 * 100;
                // Formatando a saída
                $stringRetorno .= (($stringRetorno != "") ? (($resto == 0) ? " e " : ", ") : "");
                $stringRetorno .=  $nota_100 . " nota(s) de R$100,00";
            }

            // Condicionamos a entrada para quando o número tiver divisão por 50 maior que 0 e que possibilite o retorno com as cédulas disponíveis
            if (floor($resto / 50) > 0 && $resto != 51 && $resto != 53) {
                $nota_50 = ($resto != 101 && $resto != 103) ? floor($resto / 50) : floor($resto / 50) - 1;
                $resto -= $nota_50 * 50;
                // Formatando a saída
                $stringRetorno .= (($stringRetorno != "") ? (($resto == 0) ? " e " : ", ") : "");
                $stringRetorno .=  $nota_50 . " nota(s) de R$50,00";
            }

            // Condicionamos a entrada para quando o número tiver divisão por 10 maior que 0 e que possibilite o retorno com as cédulas disponíveis
            if ((floor($resto / 20) > 0 && $resto != 21 && $resto != 23)) {
                $nota_20 = ($resto != 41 && $resto != 43) ? floor($resto / 20) : floor($resto / 20) - 1;
                $resto -= $nota_20 * 20;
                // Formatando a saída
                $stringRetorno .= (($stringRetorno != "" && $nota_20 != 0) ? (($resto == 0) ? " e " : ", ") : "");
                $stringRetorno .= ($nota_20 != 0) ? $nota_20 . " nota(s) de R$20,00" : "";
            }


            if ((floor($resto / 10) > 0 && $resto != 11 && $resto != 13) || (($resto - (10 * floor($resto / 10))) / 5 > 3)) {
                // Garantindo o resultado correto, caso o resto seja 21 ou 23
                $nota_10 = ($resto != 21 && $resto != 23) ? floor($resto / 10) : floor($resto / 10) - 1;
                $resto -= $nota_10 * 10;
                // Formatando a saída
                $stringRetorno .= (($stringRetorno != "") ? (($resto == 0) ? " e " : ", ") : "");
                $stringRetorno .=   $nota_10 . " nota(s) de R$10,00";
            }

            if (floor($resto / 5) > 0 && ($resto - 5) % 2 != 1) {
                $nota_5 = ($resto != 11 && $resto != 13) ? floor($resto / 5) : floor($resto / 5) - 1;

                $resto -= $nota_5 * 5;
                // Formatando a saída
                $stringRetorno .= (($stringRetorno != "") ? (($resto == 0) ? " e " : ", ") : "");
                $stringRetorno .=  $nota_5 . " nota(s) de R$5,00";
            }
            if (floor($resto / 2) > 0) {
                $nota_2 = floor($resto / 2);
                // Formatando a saída
                $stringRetorno .= (($stringRetorno != "") ? " e " :  "");
                $stringRetorno .=  $nota_2 . " nota(s) de R$2,00";
            }

            echo ("Notas entregues: " . $stringRetorno . '.');
        } else {

            echo "Não dispomos de tais valores. Por favor, informe um valor válido. ";
        }
    } else {

        echo "favor digitar um número inteiro válido: entre 1 e 10.000";
    }
}
