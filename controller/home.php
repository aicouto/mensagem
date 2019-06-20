<?php
$data=[
    'title'=>$_ENV['SITE_NAME'],
    'user'=>isAuth(),
    'mensagens'=>lerMensagens()
];
view("mensagem/home",$data);
function lerMensagens(){
    $db=db();
    $join=[
        //o user_id da tabela mensagens é igual ao id da tabela users
        "[>]users" => ["user_id" => "id"],
    ];
    $cols=[
        'mensagens.id',
        'mensagens.user_id',
        'mensagens.body',
        'mensagens.created_at',
        'users.name'
    ];
    $where=[
        'ORDER'=>[
            'id'=>'DESC'
        ]
    ];
    $mensagens=$db->select('mensagens',$join,$cols,$where);
    if($mensagens){
        return $mensagens;
    }else{
        return false;
    }
}
?>
