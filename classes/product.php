<?php
$filepath=realpath(dirname(__FILE__));
include_once ($filepath."/../lib/database.php");
include_once ($filepath."/../helpers/format.php");
?>
<?php
class product
{
    private $db;
    private $fm;
    public function __construct()
    {

        $this->db = new Database;
        $this->fm = new Format;
    }
    public function insert_product($data, $files)
    {

        $productName = mysqli_real_escape_string($this->db->link, $data['productName']);
        $brand = mysqli_real_escape_string($this->db->link, $data['brand']);
        $category = mysqli_real_escape_string($this->db->link, $data['category']);
        $product_desc = mysqli_real_escape_string($this->db->link, $data['product_desc']);

        $price = mysqli_real_escape_string($this->db->link, $data['price']);
        $loai = mysqli_real_escape_string($this->db->link, $data['loai']);


        //Kiểm tra hình ảnh và lấy hình ảnh cho vào folder uploads
        $permited = array('jpg', 'jpeg', 'png', 'gif');
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_temp = $_FILES['image']['tmp_name'];

        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
        $uploaded_image = "uploads/" . $unique_image;


        if ($productName == "" || $brand == "" || $category == "" || $product_desc == "" || $price == "" || $loai == "" || $file_name == "") {
            $alert = "<span class='error'>Các ô không được để trống</span>";
            return $alert;
        } else {
            move_uploaded_file($file_temp, $uploaded_image);
            $query = "INSERT INTO tbl_product(productName,brandId,catId,product_desc,price,loai,hinhanh) VALUES ('$productName','$brand','$category','$product_desc','$price','$loai','$unique_image')";
            $result = $this->db->insert($query);
            if ($result) {
                $alert = "<span class='success'>Thêm sản phẩm thành công</span>";
                return $alert;
            } else {
                $alert = "<span class='error'>Thêm sản phẩm không thành công</span>";
                return $alert;
            }
        }
    }

    public function update_product($data, $files, $id)
    {


        $productName = mysqli_real_escape_string($this->db->link, $data['productName']);
        $brand = mysqli_real_escape_string($this->db->link, $data['brand']);
        $category = mysqli_real_escape_string($this->db->link, $data['category']);
        $product_desc = mysqli_real_escape_string($this->db->link, $data['product_desc']);

        $price = mysqli_real_escape_string($this->db->link, $data['price']);
        $loai = mysqli_real_escape_string($this->db->link, $data['loai']);


        //Kiểm tra hình ảnh và lấy hình ảnh cho vào folder uploads
        $permited = array('jpg', 'jpeg', 'png', 'gif');
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_temp = $_FILES['image']['tmp_name'];

        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
        $uploaded_image = "uploads/" . $unique_image;



        if ($productName == "" || $brand == "" || $category == "" || $product_desc == "" || $price == "" || $loai == "") {
            $alert = "<span class='error'>Các ô không được để trống</span>";
            return $alert;
        } else {
            if (!empty($file_name)) {
                //Nếu người dùng chọn ảnh
                // if ($file_size > 20480) {
                //     $alert = "<span class='error'>Kích thước ảnh phải nhỏ hơn 20mb </span>";
                //     return $alert;
                // } else
                if (in_array($file_ext, $permited) === false) {
                    // echo "<span class='error'> Bạn chỉ có thể tải lên: -".implode(',', $permited)."</span>";
                    $alert = "<span class='error'>Bạn chỉ có thể tải lên: -" . implode(',', $permited) . "</span>";
                    return $alert;
                }
                move_uploaded_file($file_temp, $uploaded_image);
                $query = "UPDATE tbl_product
                     SET productName='$productName',
                     brandId='$brand',
                     catId='$category',
                     loai='$loai',
                     price='$price',
                     hinhanh='$unique_image',
                     product_desc='$product_desc' 
                     WHERE productId='$id' ";
            }else{
                //Nếu người dùng không chọn ảnh
                $query = "UPDATE tbl_product
                     SET productName='$productName',
                     brandId='$brand',
                     catId='$category',
                     loai='$loai',
                     price='$price',
                     product_desc='$product_desc' 
                     WHERE productId='$id' ";

            }
            $result = $this->db->update($query);
            if ($result) {
                $alert = "<span class='success'>Sửa sản phẩm thành công</span>";
                return $alert;
            } else {
                $alert = "<span class='error'>Sửa sản phẩm không thành công</span>";
                return $alert;
            }
        }
            
            
        
    }
    public function del_product($id){
      $query="DELETE FROM tbl_product WHERE productId ='$id'";
        $result=$this->db->delete($query);
        if($result){
          $alert="<span class='error'>Xóa thành công</span>";
            return $alert;

        }else{
          $alert="<span class='error'>Xóa không thành công</span>";
            return $alert;

        }

    }

    public function show_product()
    {
        $query = "SELECT tbl_product.*, tbl_category.catName, tbl_brand.brandName 
             from tbl_product INNER JOIN tbl_category ON tbl_product.catId=tbl_category.catId
             INNER JOIN tbl_brand ON tbl_product.brandId=tbl_brand.brandId
             order by tbl_product.productId desc";
        //$query="SELECT * FROM tbl_product order by productId desc";
        $result = $this->db->select($query);
        return $result;
    }
    public function getproductbyId($id)
    {
        $query = "SELECT * FROM tbl_product where productId ='$id';";
        $result = $this->db->select($query);
        return $result;
    }
    //End backend



    
    public function getproduct_feathread(){
        $query = "SELECT * FROM tbl_product where loai ='0';";
        $result = $this->db->select($query);
        return $result;
    }
    public function getproduct_new(){
        $query = "SELECT * FROM tbl_product order by productId desc LIMIT 4;";
        $result = $this->db->select($query);
        return $result;
    }
    public function get_detail($id){
        $query = "SELECT tbl_product.*, tbl_category.catName, tbl_brand.brandName 
             from tbl_product INNER JOIN tbl_category ON tbl_product.catId=tbl_category.catId
             INNER JOIN tbl_brand ON tbl_product.brandId=tbl_brand.brandId WHERE tbl_product.productId='$id'
             LIMIT 1";
        //$query="SELECT * FROM tbl_product order by productId desc";
        $result = $this->db->select($query);
        return $result;
    }
    public function getLastestGucci(){
        $query = "SELECT * FROM tbl_product where brandId=5 order by productId desc LIMIT 1;";
        $result = $this->db->select($query);
        return $result;
    }
    public function getLastestMwc(){
        $query = "SELECT * FROM tbl_product where brandId=3 order by productId desc LIMIT 1;";
        $result = $this->db->select($query);
        return $result;
    }
    public function getLastestAdidas(){
        $query = "SELECT * FROM tbl_product where brandId=1 order by productId desc LIMIT 1;";
        $result = $this->db->select($query);
        return $result;
    }
    public function getLastestDior(){
        $query = "SELECT * FROM tbl_product where brandId=4 order by productId desc LIMIT 1;";
        $result = $this->db->select($query);
        return $result;
    }

    public function insertCompare($productid, $customer_id){
        
        
        $productid = mysqli_real_escape_string($this->db->link, $productid);
        $customer_id = mysqli_real_escape_string($this->db->link, $customer_id);

        $check_compare="SELECT * FROM tbl_compare where productId='$productid' and customer_id='$customer_id'";
        $result_check_compare=$this->db->select($check_compare);
        if($result_check_compare){
            $msg="Sản phẩm đã được thêm";
            return $msg;
        }else{

        $query = "SELECT * FROM tbl_product WHERE productId='$productid'";
        $result = $this->db->select($query)->fetch_assoc();

        $image = $result["hinhanh"];
        $price = $result["price"];
        $productName = $result["productName"];

        $query_insert = "INSERT INTO tbl_compare(productId,price,hinhanh,customer_id,productName) VALUES ('$productid','$price','$image','$customer_id','$productName')";
        $insert_compare = $this->db->insert($query_insert);
        if($insert_compare){
            $alert="<span class='error'>Đã thêm sản phẩm vào trang so sánh</span>";
              return $alert;
  
          }else{
            $alert="<span class='error'>Lỗi thêm sản phẩm vào trang so sánh</span>";
              return $alert;
  
          }
        }
        
    }

    public function search_product($tukhoa){
        $tukhoa=$this->fm->validation($tukhoa);

        $query="SELECT * FROM tbl_product where productName like '%$tukhoa%'";
        $result_search=$this->db->select($query);
        return $result_search;
    }
}
?>