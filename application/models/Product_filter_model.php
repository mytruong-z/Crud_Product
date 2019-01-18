<?php
class Product_filter_model extends CI_Model{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    public function fetch_filter_type_Ca($type){
        $this->db->distinct();
        $this->db->select($type);
        $this->db->from('category');
        return $this->db->get();
    }
    public function fetch_filter_type($type){
        $this->db->distinct();
        $this->db->select($type);
        $this->db->from('Product');
        return $this->db->get();
    }
   public function make_query($minimum_price,$maximum_price,$brand){
        $query = "SELECT * FROM  product";
        if(isset($minimum_price,$maximum_price) && !empty($minimum_price)&&!empty($maximum_price)){
            $query .= "AND price BETWEN '" .$minimum_price."' AND '".$maximum_price."' ";
        }

        if(isset($brand)){
            $brand_filter = implode(" ',' ",$brand);
            $query .= "AND name IN('".$brand_filter."'')";
        }
        return $query;
    }
    public function count_all($minimum_price,$maximum_price,$brand){
        $query = $this->make_query($minimum_price,$maximum_price,$brand);
        $data = $this->db->query($query);
        return $data->num_rows();
    }
    public function fetch_data($limit,$start,$minimum_price,$maximum_price,$brand){
        $query = $this->make_query($minimum_price,$maximum_price,$brand);
        $query .= ' LIMIT '.$start.', ' . $limit;

        $data = $this->db->query($query);
       /* print_r($this->db->last_query());
        die; */
        $output = '';
        if($data->num_rows() > 0)
        {
            foreach($data->result_array() as $row)
            {
                $output .= '
                    <div class="col-sm-4 col-lg-3 col-md-3">
                     <div style="border:1px solid #ccc; border-radius:5px; padding:16px; margin-bottom:16px; height:300px;">
                      <img align="center" style="margin-bottom: 20px" src="'.base_url().'images/products/'. $row['image'] .'" alt="" height="155px" width="150px" class="" >
                      <p align="center"><strong><a href="#">'. $row['name'] .'</a></strong></p>
                      <h4 style="text-align:center;" class="text-danger" >'. $row['price'] .'</h4>
                      <div align="center" class="atc">
                            <a  href="'.base_url().'user/Product_filter/addToCart/'.$row['id'].'" class="btn btn-success">
                                          Add to Cart</a>
                              
                       </div>
                     </div>
                    </div>
                    ';
            }
        }else{
            $output = '<h3>No Data Found</h3>';
        }
        return $output;
    }
}
?>