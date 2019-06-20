<?php
//apagar mensagem
$id=segment(3);
$op=segment(4);
if(is_numeric($id) && $op=='apagar'){
    apagarMensagem($id);
    redirect($_ENV['SITE_URL']);
}
function apagarMensagem($id){
    $db=db();
    $where=[
        'id'=>$id
    ];
    $db->delete('mensagens',$where);
}
?>
