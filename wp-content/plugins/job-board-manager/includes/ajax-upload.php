<?php



class JOB_BM_FILE__Ajax_Image_Upload
{


    public function upload(){

        check_ajax_referer('job_file_upload_allow', 'nonce');

        $file = array(
            'name' => $_FILES['job_file_uploader_file']['name'],
            'type' => $_FILES['job_file_uploader_file']['type'],
            'tmp_name' => $_FILES['job_file_uploader_file']['tmp_name'],
            'error' => $_FILES['job_file_uploader_file']['error'],
            'size' => $_FILES['job_file_uploader_file']['size']
        );
        $file = $this->fileupload_process($file);
    }


    public function fileupload_process($file){

        $attachment = $this->handle_file($file);

        if (is_array($attachment)) {
            $html = $this->getHTML($attachment);

            $response = array(
                'success' => true,
                'html' => $html,
            );

            echo json_encode($response);
            exit;
        }

        $response = array('success' => false);
        echo json_encode($response);
        exit;
    }

    function handle_file($upload_data){

        $return = false;
        $uploaded_file = wp_handle_upload($upload_data, array('test_form' => false));

        if (isset($uploaded_file['file'])) {
            $file_loc = $uploaded_file['file'];
            $file_name = basename($upload_data['name']);
            $file_type = wp_check_filetype($file_name);

            $attachment = array(
                'post_mime_type' => $file_type['type'],
                'post_title' => preg_replace('/\.[^.]+$/', '', basename($file_name)),
                'post_content' => '',
                'post_status' => 'inherit'
            );



            $attach_id = wp_insert_attachment($attachment, $file_loc);
            $attach_data = wp_generate_attachment_metadata($attach_id, $file_loc);
            wp_update_attachment_metadata($attach_id, $attach_data);

            $return = array('data' => $attach_data, 'id' => $attach_id);

            return $return;
        }

        return $return;
    }

    function getHTML($attachment){

        $attach_id = $attachment['id'];
        $file = explode('/', $attachment['data']['file']);
        $file = array_slice($file, 0, count($file) - 1);
        $path = implode('/', $file);
        $image = $attachment['data']['sizes']['thumbnail']['file'];
        $post = get_post($attach_id);
        $dir = wp_upload_dir();
        $path = $dir['baseurl'] . '/' . $path;

		$full_img_url = wp_get_attachment_url($attach_id);
        $html = '';
        $html .= '';
        $html .= ('<img attach_id="'.$attach_id.'" src="'.$full_img_url.'" title="' . $post->post_title . '" />');

        return $html;
    }



    public function delete_file(){
        $attach_id = $_POST['attach_id'];
        wp_delete_attachment($attach_id, true);
        exit;
    }

}




$job_bm_file = WP_CONTENT_DIR . '/plugins/' . basename(dirname(__FILE__)) . '/' . basename(__FILE__);

$aaui = new JOB_BM_FILE__Ajax_Image_Upload();

register_activation_hook($job_bm_file, array($aaui, 'initialize_default_options'));

add_action('wp_ajax_job_file_uploader', array($aaui, 'upload'));
add_action('wp_ajax_file_delete', array($aaui, 'delete_file'));

/* For non logged-in user */
add_action('wp_ajax_nopriv_job_file_uploader', array($aaui, 'upload'));
add_action('wp_ajax_nopriv_file_delete', array($aaui, 'delete_file'));

