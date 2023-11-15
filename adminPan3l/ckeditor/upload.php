<?php


$funcNum = $_GET['CKEditorFuncNum'];
$url = '';

include_once "../main.php";

// Make sure that the anonymous function reference number used to pass the URL of a file to CKEditor is set
if( $funcNum ){

    // Check if there is an error
    if( ! $_FILES['upload']['error'] ) {

        // Replace file name spaces and convert to lower case.
        $file = pathinfo( $_FILES['upload']['name'] );
        $new_file_name = str_replace(' ', '_', strtolower( $file['filename'] ) ) . '-' . time() . '.' . $file['extension'];

        // Check if file was uploaded
        if( move_uploaded_file( $_FILES['upload']['tmp_name'], 'uploads/' . $new_file_name )){

            $message = 'File successfully uploaded';

            // Check if we're running locally or live
            if( $_SERVER['SERVER_NAME'] == 'localhost' ) {
                $url = $_SERVER['HTTP_HOST'] . '/ckeditor/uploads/' . $new_file_name;
            } else {
                $url = $_SERVER['HTTP_HOST'] . '/uploads/' . $new_file_name;
            }
        }

    } else {
        // Output all errors
        $message = 'Oops!  Your upload triggered the following error:  ' . $_FILES['upload']['error'];
    }

    // Return the message to the CKEDITOR File Manager
    echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($funcNum, '$url', '$message');</script>";

}
