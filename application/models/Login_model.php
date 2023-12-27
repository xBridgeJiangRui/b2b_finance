<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class login_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    function check_login($userid, $password)
    {
       $query = $this->db->query("SELECT 
        a.*, 
        b.`user_group_name`, 
        d.`module_name`, 
        e.`module_group_name`, 
        module_code, 
        c.`isenable`, 
        a.user_guid 
        FROM 
        set_user a 
        INNER JOIN set_user_group b ON a.`user_group_guid` = b.`user_group_guid` 
        INNER JOIN set_user_module c ON c.`user_group_guid` = b.`user_group_guid` 
        INNER JOIN set_module d ON d.`module_guid` = c.`module_guid` 
        INNER JOIN set_module_group e ON e.`module_group_guid` = d.`module_group_guid` 
        AND e.`module_group_guid` = a.`module_group_guid` 
        WHERE 
        a.user_id = '$userid' 
        AND a.`user_password` = md5('$password') 
        AND a.`isactive` = 1 
        AND c.`isenable` = 1 
        AND module_group_name in ('Panda B2B')
        ");

        return $query;
    }

    function check_module($userid, $password)
    {
       $query = $this->db->query("SELECT a.*,b.`user_group_name`,d.`module_name`,e.`module_group_name`,module_code,c.`isenable` 
       FROM set_user a 
       INNER JOIN set_user_group b 
       ON a.user_group_guid = b.user_group_guid 
       INNER JOIN set_user_module c ON b.user_group_guid = c.user_group_guid 
       INNER JOIN set_module d ON c.module_guid = d.module_guid 
       INNER JOIN set_module_group e ON d.module_group_guid = e.module_group_guid 
       WHERE a.user_id = '$userid' 
       AND a.isactive = 1 
       AND a.acc_guid = '".$_SESSION['customer_guid']."' 
       AND e.module_group_name = 'Panda B2B' 
       AND c.isenable = 1 
       GROUP BY a.user_guid,acc_guid,c.module_guid");

        return $query;
    }

    function check_supplier($user_id,$customer_guid)
    {
        $query = $this->db->query("SELECT a.supplier_guid, a.supplier_reg_no 
        FROM b2b_finance.supplier_info a 
        INNER JOIN b2b_finance.`user_relationship` b 
        ON a.supplier_guid = b.supplier_guid 
        INNER JOIN b2b_finance.user_info c 
        ON b.user_guid = c.user_guid 
        INNER JOIN b2b_finance.customer_relationship d
        ON a.supplier_guid = d.supplier_guid
        WHERE c.user_id = '$user_id' 
        AND d.customer_guid = '$customer_guid'
        AND a.active = '1'
        GROUP BY a.supplier_guid");

        return $query;
    }

    function validate_login($userid, $password)
    {
        $query = $this->db->query("SELECT 
        a.*, 
        b.user_group_name,
        b.admin_active
        FROM 
        b2b_finance.user_info a 
        INNER JOIN b2b_finance.user_group_info b ON a.`user_group_guid` = b.`user_group_guid` 
        WHERE a.user_id = '$userid' 
        AND a.`user_password` = md5('$password') 
        AND a.`active` = 1 
        AND b.isactive = '1'
        ");

        return $query;
    }
}
?>