<?php
     use App\Core\Session;

     $topic = $data['topic'];
     $messages = $data['messages'];
?>

<h1 class="center-text"><?= $topic->getTitle() ?></h1>
<section>
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
<?php if($topic->getIsAvailable() == 1){
        if (Session::get("user") && $topic->getUser()->getIsBanned() == 0) {?>
            <form class="uk-form-stacked" action="?ctrl=topic&action=addMessage&id=<?= $topic->getId() ?>" method="post">
                <h3>Publier une réponse</h3>
                <textarea name="response" id="response" rows="10"></textarea><br>
                <input type="hidden" name="csrf_token" value="<?= $csrf_token ?>">
                <input class="submit" type="submit" name="submit" value="Publier une réponse">
            </form>
        <?php } elseif (Session::get("user") && $topic->getUser()->getIsBanned() == 1){?>
            <b>Vous avez été banni et ne pourrez pas publier une réponse avant le</b> <?= Session::get("user")->getEndOfBan() ?>
        <?php } else echo "<b>Seuls les utilisateurs connectés peuvent publier une réponse</b>"; 
    } else echo "<b>Le sujet a été vérouillé</b>" ;?>   
