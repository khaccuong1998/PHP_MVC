<?php

    function hash_password($username, $password) {
        return sha1($username . $password);
    }
// ham tu dong tao ra cau insert sql
// vd data = [
//     'name'=> $name,
//     'email'=> $email,
// ]
function gen_insert_fields_form_array($data = [])
{
    $result = new stdClass();
    $result->fields = $result->values = $result->bind_values = [];

    foreach ($data as $key => $value) {
        $result->fields[] = "`{$key}`";
        $key_name = ":{$key}";
        $result->values[] = $key_name;   // :name, :email
        $result->bind_values[$key_name] = $value; // :name => "NGuyen vawn a"
    }

    // to string
    $result->field_string = implode(', ', $result->fields);
    $result->value_string = implode(', ', $result->values);

    return $result;
}

// hàm tự tạo ra câu truy vấn sql update
function gen_update_fields_form_array($data = [])
{
    $result = new stdClass();
    $result->fields = $result->bind_values = [];

    foreach ($data as $key => $value) {
        $key_name = ":{$key}";
        $result->fields[] = "`{$key}` = {$key_name}";
        $result->bind_values[$key_name] = $value;
    }
    // to string
    $result->field_string = implode(', ', $result->fields);

    return $result;
}

function to_api_json($status, $message = '', $data)
{
    $response = [
        'status' => $status,
        'message' => $message
    ];

    // thành công mới trả ra data
    if ($status === API_SUCCESS) {
        $response['data'] = $data;
    }

    exit(json_encode($response));
}