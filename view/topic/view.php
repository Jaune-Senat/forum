<?php
    use App\Core\Session;
    use App\Service\Paginator;

$topic = $data['topic'];
$messages = $data['messages'];
$total = $data['totalMessages'];
?>

<h1 class="center-text"><?= $topic->getTitle() ?></h1>
<section id="vueTopic">
    <?php foreach($messages as $message){ ?>
        <article class="center-text">
        <div class="minprofil">
            <img src=" <?= $message->getUser()->getAvatar()?> " alt="avatar">
            <span><?= $message->getUser()->getPseudo() ?></span>
        </div>
        <div class="response"><p class="messagecore"><?= $message->getText() ?></p> <div class="datecreation"><?= $message->getCreatedAt() ?></div></div>
        <?php if(Session::get("user") && Session::get("user")->hasRole("ROLE_ADMIN")) {?>
            <a href="?ctrl=message&action=delete"> Supprimer le message</a>
        <?php } ?>
        </article>
    <?php }?>
</section>

<section><?php Paginator::getHTML("?ctrl=topic&action=voirTopic&id=".$topic->getId(), $total ) ?></section>

<?php if(Session::get("user") && ($topic->getUser()->getId() == Session::get("user")->getId() || Session::get("user")->hasRole("ROLE_ADMIN"))){ ?>
        <a class="uk-button uk-button-primary" href="?ctrl=topic&action=updateLock&id=<?= $topic->getId() ?>"><?= $topic->getIsAvailable() ? "Verrouiller" : "Déverouiller" ?> le sujet</a><br>
 <?php } ?>

<?php if($topic->getIsAvailable()){
        $user = Session::get("user");
        if($user){
            if ($user->getIsBanned() == 0) {?>
                <form class="uk-form-stacked" action="?ctrl=topic&action=addMessage&id=<?= $topic->getId() ?>" method="post">
                    <h3>Publier une réponse</h3>
                    <textarea name="response" id="response" rows="10"></textarea><br>
                    <input type="hidden" name="csrf_token" value="<?= $csrf_token ?>">
                    <input class="uk-button uk-button-primary" type="submit" name="submit" value="Répondre">
                </form>
            <?php
            } else 
                echo "<p class='center-text'><b>Vous avez été banni et ne pourrez pas publier une réponse avant le $user->getEndOfBan()</b></p>";
        }else echo "<p class='center-text'><b>Seuls les utilisateurs connectés peuvent publier une réponse</b></p>";       
    } else echo "<p class='center-text'><b>Le sujet a été vérouillé</b></p>" ;?>  
