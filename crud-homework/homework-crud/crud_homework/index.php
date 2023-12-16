<?php require_once('partial/header.php'); 
include("./database/database.php");
$student= selectAllStudents();
?>

    <div class="container p-4">
        <div class="d-flex justify-content-end p-2">
            <a href="./create_html.php" class="btn btn-primary">Add +</a>
        </div>
        <?php foreach($student as $values){ ?>
        <div class="card">
            <div class="card-body">
            <div class="card-image mr-3">
                        <img class="img-fluid" width="200" src="<?=htmlspecialchars($values['profile']) ?>" alt="">
                    </div>
                    <div class="info">
                        <h1 class="display-4"><?=htmlspecialchars($values['name']) ?></h1>
                        <strong><?=htmlspecialchars($values['age']) ?></strong>
                        <p><?=htmlspecialchars($values['email']) ?></p>
                    </div>
               </div>
                <div class="action d-flex justify-content-end">
                    <a href="./update_html.php?id=<?=htmlspecialchars($values['id']) ?>" class="btn btn-primary btn-sm mr-2"><i class="fa fa-pencil"></i></a>
                    <a href="./delete_model.php?id=<?=htmlspecialchars($values['id']) ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                </div>
            </div>
        </div>
        <?php };?>
    </div>
<?php require_once('partial/footer.php'); ?>