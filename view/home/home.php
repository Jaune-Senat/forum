<?php
    $topics = $data['topics'];
    use App\Core\Session;
?>

<h1>Liste des sujets</h1>

<main id="topic-list">
    <table class="uk-table uk-table-striped">
        <thead>
            <tr>
                <th>TITRE</th>
                <th>CREE LE</th>
                <th>PAR</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach ($topics as $topic) { ?>
                    <tr>
                        <td><a href="?ctrl=topic&action=voirTopic&id=<?= $topic->getId() ?>"><?= $topic->getTitle()?></a></td>
                        <td><?= $topic->getCreatedAt() ?></td>
                        <td><?= $topic->getUser()->getPseudo()?> </td>
                    </tr>  
                <?php }?>      
        </tbody>
    </table>
    <?php if (Session::get("user") && $topic->getUser()->getIsBanned() == 0) {?>
        <a href="http:?ctrl=topic&action=makeTopic"> Ouvrir un nouveau sujet</a> <?php } ?>
</main>