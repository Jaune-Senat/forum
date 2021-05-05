<?php
     $topic = $data['topic'];
     $messages = $data['messages'];
    use App\Core\Session;
?>

<h1 class="topich"><?= $topic->getTitle() ?></h1>

<main id="topic-list">
    <section>
        <?php foreach($messages as $message){ ?>
            <article>
            <div class="minprofil">
                <img src=" <?= $message->getUser()->getAvatar()?> " alt="avatar">
                <span><?= $message->getUser()->getPseudo() ?></span>
            </div>
            <div class="response"><p><?= $message->getText() ?></p> <?= $message->getCreatedAt() ?></div>
            <?php if(Session::get("user")->hasRole("ROLE_ADMIN")) {?>
                <a href="?ctrl=message&action=delete"> Supprimer le message</a>
            <?php } ?>
            </article>
        <?php } ?>
    </section>
</main>