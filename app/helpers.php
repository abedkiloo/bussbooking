<?php
if (!function_exists('convert_phone_to_kenyan_format')) {
    function convert_phone_to_kenyan_format($phone_no)
    {
        $phone = "";
        //format phone
        if (substr($phone_no, 0, 2) === "07")//if phone starts with 07
        {
            $phone = "+" . substr_replace($phone_no, "254", 0, 1);
        } elseif (substr($phone_no, 0, 1) === "7")//if starts with 7
        {
            $phone = "+" . substr_replace($phone_no, "254", 0, 0);
        } elseif (substr($phone_no, 0, 4) === "+254") {
            $phone = "+" . substr_replace($phone_no, "", 0, 1);
        } elseif (substr($phone_no, 0, 3) === "254") {
            $phone = "+" . $phone_no;
        }
        return $phone;

    }
}

function api_response($success, $errors, $status_code, $status_message, $message, $data, $server_status_code = "")
{
    $response = array();
    $response['success'] = $success;
    $response['errors'] = $errors;
    $response['status_code'] = $status_code;
    $response['status_message'] = $status_message;
    $response['message'] = $message;
    $response['data'] = $data;
    $_server_status_code = $server_status_code == " " ? 200 : $server_status_code;
   return response()->json($response, $_server_status_code);
}


//format gender
function format_gender($gender)
{
    if (strtolower($gender[0] == "M")) {
        return "Male";
    } else if (strtolower($gender[0] == "F")) {
        return "Female";
    }
}

////Compress image
//function store($image_name,)
//{
//        //get filename with extension
//        $filenamewithextension = $request->file('profile_image')->getClientOriginalName();
//
//        //get filename without extension
//        $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
//
//        //get file extension
//        $extension = $request->file('profile_image')->getClientOriginalExtension();
//
//        //filename to store
//        $filenametostore = $filename . '_' . time() . '.' . $extension;
//
//        //Upload File
//        $request->file('profile_image')->storeAs('public/profile_images', $filenametostore);
//
//        //We will write TinyPNG Compress Image Code Here
//
//        return redirect('images/create')->with('success', "Image uploaded successfully.");
//
//}
