<?php
view('home/inc/header',$data);
?>
<div class="container">
    <div class="row">
        <div class="offset3 span6">
            <?php view("home/inc/topo",$data);
            $user=isAuth();
            if($user){
                view("mensagem/form/mensagem",$data);
            }
            if($mensagens && count($mensagens)>0){
                foreach ($mensagens as $mensagem) {
                    print '<hr>';
                    print '<small><b>';
                    if($user && $user['id']==$mensagem['user_id']){
                        print 'Você';
                    }else{
                        e($mensagem['name']);
                    }
                    print '</b> escreveu em ';
                    print date('d/M/Y \a\s G:i',$mensagem['created_at']);
                    if($user && $user['id']==$mensagem['user_id']){
                        $link=$_ENV['SITE_URL'].'mensagem/'.$mensagem['id'];
                        $link=$link.'/apagar';
                        print ' (<a href="'.$link.'">Apagar</a>)';
                    }
                    print ':</small><p>';
                    e($mensagem['body']);
                    print '</p>';
                }
            }else{
                print '<p class="text-center">';
                print 'Nenhum mensagem encontrada';
                print '</p>';
            }
            ?>
        </div>
    </div>
</div>
