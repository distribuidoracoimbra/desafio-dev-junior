<?php // Code within app\Helpers\Helper.php



function dataAtual(){
    return $data_atual = date('Y-m-d H:i:s');
}

function dataFormat($data){
    return date('d/m/Y',strtotime($data));
}

function horaFormat($timestamp){

    $hora = date('h:i',strtotime($timestamp));
    if($hora){
        return $hora;
    }else{
        return 0;
    }
}
function dataFormatMysql($data)
{
    return date("Y-m-d", strtotime(str_replace('/', '-', $data)));
}

