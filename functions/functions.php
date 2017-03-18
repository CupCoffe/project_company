<?php
require_once'../classes/db.class.php';


function select_comp($db){
    $result = $db ->select('company');
    return $result;
}

function delete_adr($db, $id_address){
    $db->delete('address',array('id_address'=>$id_address));
    return $db;
}

function delete_comp($db, $id_company){
    $db->delete('company',array('id_company'=>$id_company));
    return $db;
}

function update_comp($db,$name_company,$year,$website,$activity,$id_company){
    $db->update('company',array('name_company'=>$name_company,'year'=>$year,'activity'=>$activity,'website'=>$website),array('company.id_company'=>$id_company));
    return $db;
}

function update_adr($db,$id_address,$address){
    $db->update('address',array('address'=>$address),array('address.id_address'=>$id_address));
    return $db;
}

function update_per($db,$id_person,$name_person,$phone_number){
    $db->update('personal',array('name_person'=>$name_person,'phone_number'=>$phone_number),array('personal.id_person'=>$id_person));
    return $db;
}

function edit_comp($db,$id_company){
    $stmt = $db->select('company',array('company.id_company'=>$id_company));
    return $stmt;
}

function edit_adr($db,$id_address){
    $stmt=$db->select('address,personal',array('address.id_address'=>$id_address,'personal.id_address'=>'address.id_address'));
    return $stmt;
}

function select_adr($db,$id_company){
    $result = $db->select('address,personal',array('address.id_company'=>$id_company,'personal.id_address'=>'address.id_address'));
    return $result;
}

function add_adr_by_id($db,$id_company,$address){
    $db->insert('address', array('address' => $address, 'id_company' => $id_company));
    return $db;
}

function add_per_by_id($db,$id,$name_person,$phone_number){
    $db->insert('personal', array('name_person' => $name_person, 'id_address' => $id, 'phone_number' => $phone_number));
    return $db;
}

function select_by_compname($db,$name_company){
    $stmt = $db->select_name('company',array('company.name_company'=>$name_company));
    return $stmt;

}

function add_comp($db,$name_company,$year,$activity,$website,$address,$email,$name_person,$phone_number){
    $db->insert('company',array('name_company'=>$name_company,'year'=>$year,'activity'=>$activity,'website'=>$website));
    $id=$db->lastId;

    $db->insert('address',array('address'=>$address,'email'=>$email,'id_company'=>$id));
    $id=$db->lastId;

    $db->insert('personal',array('name_person'=>$name_person,'phone_number'=>$phone_number,'id_address'=>$id));
    return $db;
}

function save_user($db,$u_login,$password){
    $db->insert('users',array('login'=>$u_login,'password'=>$password));
    return $db;
}

?>