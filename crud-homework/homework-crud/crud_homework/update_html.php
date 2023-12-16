<?php require_once('partial/header.php'); 
include("./database/database.php");

$id = htmlspecialchars($_GET['id']);
$student = selectOnestudent($id);
foreach($student as $one){

?>
    <div class="container p-4">
        <form action="./update_model.php" method="post">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($id)?>">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Name" name="name" value="<?php echo htmlspecialchars($one["name"])?>">
            </div>
            <div class="form-group">
                <input type="number" class="form-control" placeholder="Age" name="age" value="<?php echo htmlspecialchars($one["age"])?>">
            </div>
            <div class="form-group">
                <input type="email" class="form-control" placeholder="Email" name="email" value="<?php echo htmlspecialchars($one["email"])?>">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Image URL" name="image_url" value="<?php echo htmlspecialchars($one["profile"])?>">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">Update</button>
            </div>
        </form>
    </div>
<?php }; require_once('partial/footer.php'); ?>