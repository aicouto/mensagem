<?php
if(method()=='POST'){
    $result=criarMensagem();
    if(isset($result['error'])){
        redirect($_ENV['SITE_URL'].'?erro');
    }else{
        redirect($_ENV['SITE_URL']);
    }
}
function criarMensagem(){
    $user=isAuth();
    $body=@$_POST['body'];
    $body=limparBody($body);
    $bodySize=mb_strlen($body);
    if($bodySize>1 && $bodySize<60 && $user){
        $data=[
            'body'=>$body,
            'created_at'=>time(),
            'user_id'=>$user['id']
        ];
        $db=db();
        $result=$db->insert('mensagens',$data);
    }else{
        $result=false;
    }
    if($result){
        return true;
    }else{
        return ['error'=>'unknown_error'];
    }
}
function limparBody($body){
    return trim($body);
}
?>
