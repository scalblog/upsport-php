
<h2>Tableau de bord</h2>

<div class="row">
    <?php
    $tables = [

        "Publications"      => "posts",
        "Commentaires"      => "comments",
        "Administrateurs"   => "admins"
    ];

    $colors = [

        "posts"     => "green",
        "comments"  => "blue",
        "admins"    => "orange"
    ]

    ?>

    <?php
    foreach($tables as $table_name => $table) {
    ?>
        <div class="col l4 m6 s12">
            <div class="card">
                <div class="card-content <?= getColor($table, $colors); ?> white-text">
                    <span class="card-title"><?= $table_name ?></span>
                    <?php $nbrInTable = inTable($table); ?>
                    <h4><?= $nbrInTable[0] ?></h4>
                </div>
            </div>
        </div>
    <?php
    }

    ?>

   
</div>

<h4>Commentaires non lus</h4>

<?php
    $comments = get_comments();

?>

<table>
    <thead>
        <tr>
            <th>Articles</th>
            <th>Commentaires</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            foreach($comments as $comment){
                ?>
                <tr id="commentaire_<?= $comment->id; ?>">
                    <td><?= $comment->title; ?></td>
                    <td><?= substr($comment->comment,0,100); ?>...</td>
                    <td>
                        <a href="#" id="<?= $comment->id ?>" class="btn-floating btn-small waves-effect waves-light green see_comment"><i class="material-icons">done</i></a>
                        <a href="#" id="<?= $comment->id ?>" class="btn-floating btn-small waves-effect waves-light red delete_comment"><i class="material-icons">delete</i></a>
                        <a href="#comment_<?= $comment->id ?>" class="btn-floating btn-small waves-effect waves-light blue modal-trigger"><i class="material-icons">more_vert</i></a>
                        <div class="modal" id="comment_<?= $comment->id ?>">
                            <div class="modal-content">
                                <h4><?= $comment->title ?></h4>
                                <p>Question posée par <?= $comment->name." (".$comment->email.")<br/>Le ".date("d/m/Y à H:i", strtotime($comment->date)) ?></p>
                                <hr>
                                <p><?= nl2br($comment->comment) ?></p>
                            </div>
                            <div class="modal-footer">
                                <a href="#" id="<? $comment->id ?>" class="red modal-action modal-close waves-effect btn-flat delete_comment"><i class="material-icons">delete</i>  </a>
                                <a href="#" id="<? $comment->id ?>" class="green modal-action modal-close waves-effect btn-flat see_comment"><i class="material-icons">done</i>  </a>
                            </div>
                        </div>
                    </td>
                </tr>
                <?php
            }

        ?>
    </tbody>
</table>


<?php

    var_dump($_SESSION);
?>