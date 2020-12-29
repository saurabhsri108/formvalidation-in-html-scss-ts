<?php
	require_once 'user.php';
	
	if ( ! class_exists( 'user_validation' ) ) {
		class user_validation extends user {
			
			private $data;
			private $errors = [];
			private static $registration_fields = [
				'username',
				'firstname',
				'lastname',
				'email',
				'password',
				'confirm_password'
			];
			private static $login_fields = [ 'email', 'password' ];
			
			private $validatedData = [];
			private $db;
			
			public function __construct( $post_data ) {
				$this->data = $post_data;
				$this->db   = new user();
				
				$this->validatedData = $this->validateForm();
				
				if ( isset( $this->validatedData['register'] ) ) {
					$this->registerUser();
				}
				
				if ( isset( $this->validatedData['login'] ) ) {
					$this->loginUser();
				}
			}
			
			public function validateForm() {
				if ( isset( $this->data['register'] ) ) {
					foreach ( self::$registration_fields as $field ) {
						if ( ! array_key_exists( $field, $this->data ) ) {
							trigger_error( "$field is not present in data" );
							
							return false;
						}
					}
					$usernameValid  = $this->validateUsername();
					$firstnameValid = $this->validateFirstname();
					$lastnameValid  = $this->validateLastname();
					$emailValid     = $this->validateEmail();
					$passwordValid  = $this->validatePassword();
					
					if ( $usernameValid && $firstnameValid && $lastnameValid && $emailValid && $passwordValid ) {
						return $this->data;
					}
				}
				
				if ( isset( $this->data['login'] ) ) {
					foreach ( self::$registration_fields as $field ) {
						if ( ! array_key_exists( $field, $this->data ) ) {
							trigger_error( "$field is not present in data" );
							
							return false;
						}
					}
					
					$emailValid    = $this->validateEmail();
					$passwordValid = $this->validatePassword();
					
					if ( $emailValid && $passwordValid ) {
						return $this->data;
					}
				}
				
				return false;
			}
			
			public function validateUsername() {
				if ( isset( $this->data['username'] ) && preg_match( '/^[a-zA-Z0-9]+$/', $this->data['username'] ) ) {
					return true;
				}
				
				return false;
			}
			
			public function validateFirstname() {
				if ( isset( $this->data['firstname'] ) && preg_match( '/^[a-zA-Z]+$/', $this->data['firstname'] ) ) {
					return true;
				}
				
				return false;
			}
			
			public function validateLastname() {
				if ( isset( $this->data['lastname'] ) && preg_match( '/^[a-zA-Z]+$/', $this->data['lastname'] ) ) {
					return true;
				}
				
				return false;
			}
			
			public function validateEmail() {
				if ( isset( $this->data['email'] ) && preg_match( '/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/', $this->data['email'] ) ) {
					return true;
				}
				
				return false;
			}
			
			public function validatePassword() {
				if ( isset( $this->data['password'] ) ) {
					return true;
				}
				
				return false;
			}
			
			public function registerUser() {
				$username  = $this->validatedData['username'];
				$firstname = $this->validatedData['firstname'];
				$lastname  = $this->validatedData['lastname'];
				$email     = $this->validatedData['email'];
				$password  = password_hash( $this->validatedData['password'], PASSWORD_BCRYPT );
				$role      = $this->validatedData['role'] ?? 'tenant';
				
				$insert_query = "INSERT INTO `users`(`oauth_provider`, `oauth_uid`, `username`, `firstname`, `lastname`, `email`, `password`, `status`, `created_on`) VALUES(:oauth_provider, :oauth_uid, :username, :firstname, :lastname, :email, :password, :status, :createdOn)";
				$this->db->query( $insert_query );
				$this->db->bind( 'oauth_provider', '' );
				$this->db->bind( 'oauth_uid', '' );
				$this->db->bind( 'username', $username );
				$this->db->bind( 'firstname', $firstname );
				$this->db->bind( 'lastname', $lastname );
				$this->db->bind( 'email', $email );
				$this->db->bind( 'password', $password );
				$this->db->bind( 'status', 0 );
				$this->db->bind( 'createdOn', date( 'Y-m-d h:i:s' ) );
				
				$insert = $this->db->lastInsertId();
				
				$role_query = "SELECT `id` FROM `roles` WHERE `role`=:role";
				$this->db->query( $role_query );
				$this->db->bind( 'role', $role );
				$roleId = $this->db->single();
				
				$insert_user_role_query = "INSERT INTO `user_roles`(`user_id`,`role_id`,`created_on`) VALUES(:userId,:roleId,:createdOn)";
				$this->db->query( $insert_user_role_query );
				$this->db->bind( 'userId', $insert );
				$this->db->bind( 'roleId', $roleId->id );
				$this->db->bind( 'createdOn', date( 'Y-m-d h:i:s' ) );
				
				if ( $this->db->execute() ) {
					return true;
				} else {
					return false;
				}
			}
			
			public function loginUser() {
			
			}
			
		}
	}