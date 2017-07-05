<div class="um-admin-metabox">
	<?php $role = $object['data'];

	$fields = array(
		array(
			'id'       		=> '_um_status',
			'type'     		=> 'selectbox',
			'label'    		=> __( 'Registration Status', 'ultimatemember' ),
			'description' 	=> __( 'Select the status you would like this user role to have after they register on your site', 'ultimatemember' ),
			'value' 		=> ! empty( $role['_um_status'] ) ? $role['_um_status'] : array(),
			'options'		=> array(
				'approved'	=> __('Auto Approve','ultimatemember'),
				'checkmail' => __('Require Email Activation','ultimatemember'),
				'pending'	=> __('Require Admin Review','ultimatemember')
			),
		),
		array(
			'id'       		=> '_um_auto_approve_act',
			'type'     		=> 'selectbox',
			'label'    		=> __( 'Action to be taken after registration', 'ultimatemember' ),
			'description' 	=> __( 'Select what action is taken after a person registers on your site. Depending on the status you can redirect them to their profile, a custom url or show a custom message', 'ultimatemember' ),
			'value' 		=> ! empty( $role['_um_auto_approve_act'] ) ? $role['_um_auto_approve_act'] : array(),
			'options'		=> array(
				'redirect_profile' 	=> __( 'Redirect to profile', 'ultimatemember' ),
				'redirect_url'		=> __( 'Redirect to URL', 'ultimatemember' ),
			),
			'conditional'	=> array( '_um_status', '=', 'approved' )
		),
		array(
			'id'       		=> '_um_auto_approve_url',
			'type'     		=> 'text',
			'label'    		=> __( 'Set Custom Redirect URL', 'ultimatemember' ),
			'value' 		=> ! empty( $role['_um_auto_approve_url'] ) ? $role['_um_auto_approve_url'] : '',
			'conditional'	=> array( '_um_auto_approve_act', '=', 'redirect_url' )
		),

		array(
			'id'       		=> '_um_login_email_activate',
			'type'     		=> 'checkbox',
			'label'    		=> __( 'Login user after validating the activation link?', 'ultimatemember' ),
			'description' 	=> __( 'Login the user after validating the activation link', 'ultimatemember' ),
            'value' 		=> ! empty( $role['_um_login_email_activate'] ) ? $role['_um_login_email_activate'] : 0,
			'conditional'	=> array( '_um_status', '=', 'checkmail' )
		),
		array(
			'id'       		=> '_um_checkmail_action',
			'type'     		=> 'selectbox',
			'label'    		=> __( 'Action to be taken after registration', 'ultimatemember' ),
			'description' 	=> __( 'Select what action is taken after a person registers on your site. Depending on the status you can redirect them to their profile, a custom url or show a custom message', 'ultimatemember' ),
            'value' 		=> ! empty( $role['_um_checkmail_action'] ) ? $role['_um_checkmail_action'] : array(),
			'options'		=> array(
				'show_message' 	=> __( 'Show custom message', 'ultimatemember' ),
				'redirect_url'	=> __( 'Redirect to URL', 'ultimatemember' ),
			),
			'conditional'	=> array( '_um_status', '=', 'checkmail' )
		),
		array(
			'id'       		=> '_um_checkmail_message',
			'type'     		=> 'textarea',
			'label'    		=> __( 'Personalize the custom message', 'ultimatemember' ),
            'value' 		=> ! empty( $role['_um_checkmail_message'] ) ? $role['_um_checkmail_message'] : '',
			'conditional'	=> array( '_um_checkmail_action', '=', 'show_message' )
		),
		array(
			'id'       		=> '_um_checkmail_url',
			'type'     		=> 'text',
			'label'    		=> __( 'Set Custom Redirect URL', 'ultimatemember' ),
            'value' 		=> ! empty( $role['_um_checkmail_url'] ) ? $role['_um_checkmail_url'] : '',
			'conditional'	=> array( '_um_checkmail_action', '=', 'redirect_url' )
		),
		array(
			'id'       		=> '_um_url_email_activate',
			'type'     		=> 'text',
			'label'    		=> __( 'URL redirect after e-mail activation', 'ultimatemember' ),
			'description' 	=> __( 'If you want users to go to a specific page other than login page after e-mail activation, enter the URL here.', 'ultimatemember' ),
            'value' 		=> ! empty( $role['_um_url_email_activate'] ) ? $role['_um_url_email_activate'] : '',
			'conditional'	=> array( '_um_status', '=', 'checkmail' ),
		),

		array(
			'id'       		=> '_um_pending_action',
			'type'     		=> 'selectbox',
			'label'    		=> __( 'Action to be taken after registration', 'ultimatemember' ),
			'description' 	=> __( 'Select what action is taken after a person registers on your site. Depending on the status you can redirect them to their profile, a custom url or show a custom message', 'ultimatemember' ),
            'value' 		=> ! empty( $role['_um_pending_action'] ) ? $role['_um_pending_action'] : array(),
			'options'		=> array(
				'show_message' 	=> __( 'Show custom message', 'ultimatemember' ),
				'redirect_url'	=> __( 'Redirect to URL', 'ultimatemember' ),
			),
			'conditional'	=> array( '_um_status', '=', 'pending' )
		),
		array(
			'id'       		=> '_um_pending_message',
			'type'     		=> 'textarea',
			'label'    		=> __( 'Personalize the custom message', 'ultimatemember' ),
            'value' 		=> ! empty( $role['_um_pending_message'] ) ? $role['_um_pending_message'] : '',
			'conditional'	=> array( '_um_pending_action', '=', 'show_message' )
		),
		array(
			'id'       		=> '_um_pending_url',
			'type'     		=> 'text',
			'label'    		=> __( 'Set Custom Redirect URL', 'ultimatemember' ),
			'conditional'	=> array( '_um_pending_action', '=', 'redirect_url' ),
            'value' 		=> ! empty( $role['_um_pending_url'] ) ? $role['_um_pending_url'] : '',
		)
	);

	echo UM()->metabox()->render_metabox_section( $fields, array( 'name' => 'role' ) ); ?>

</div>
