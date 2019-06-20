<?php
//apagar mensagem
inc([
    'db'
]);
$id=segment(3);
$op=segment(2);
if(is_numeric($id) && $op=='delete'){
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
