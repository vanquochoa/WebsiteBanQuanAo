<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include '../classes/category.php' ?>

<?php
$cat = new category();
if (isset($_GET['catid']) || $_GET['catid'] != NULL) {
    $id = $_GET['catid'];
    
}


	if($_SERVER['REQUEST_METHOD']=='POST'){
		$catName=$_POST['catName'];
		$updateCat=$cat->update_category($catName,$id);
	}

?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Sửa danh mục</h2>
        <?php
        if (isset($updateCat)) {
            echo $updateCat;
        }
        ?>
        <?php
        $get_cate_name = $cat->getcatbyId($id);
        if ($get_cate_name) {
            while ($result = $get_cate_name->fetch_assoc()) {


        ?>
                <div class="block copyblock">
                    <form action="" method="post">
                        <table class="form">
                            <tr>
                                <td>
                                    <input type="text" value="<?php echo $result['catName'] ?>" name="catName" placeholder="Sửa danh mục với tên mới..." class="medium" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="submit" name="submit" Value="Sửa" />
                                </td>
                            </tr>
                        </table>
                    </form>

            <?php
            }
        }
            ?>
                </div>
    </div>
</div>
<?php include 'inc/footer.php'; ?>