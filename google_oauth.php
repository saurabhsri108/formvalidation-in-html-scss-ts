<?php
	
	require_once 'user.php';
	
	if ( ! class_exists( 'google_oauth' ) ) {
		class google_oauth extends user {
			private $db;
			private $userTable = 'users';
			
			public function __construct() {
				$this->db = new user();
			}
			
			public function checkUser( $userData = [] ) {
				if ( ! empty( $userData ) ) {
					// Check whether user data already exists in the database
					$checkQuery = "SELECT * FROM `$this->userTable` WHERE `oauth_provider` = :oauth_provider AND `oauth_uid` = :oauth_uid";
					$this->db->query( $checkQuery );
					$this->db->bind( 'oauth_provider', $userData['oauth_provider'] );
					$this->db->bind( 'oauth_uid', $userData['oauth_uid'] );
					
					$checkResult = $this->db->resultSet();
					
					if ( $checkResult->num_rows > 0 ) {
						// Update user data if already exists
						$update_query = "UPDATE `$this->userTable` SET `username`=:username, `firstname`=:firstname, `lastname`=:lastname, `email`=:email, `password`=:password WHERE `oauth_provider`=:oauth_provider AND `oauth_uid`=:oauth_uid";
						$this->db->query( $update_query );
						$this->db->bind( 'username', $userData['username'] );
						$this->db->bind( 'firstname', $userData['firstname'] );
						$this->db->bind( 'lastname', $userData['lastname'] );
						$this->db->bind( 'email', $userData['email'] );
						$this->db->bind( 'password', $userData['password'] );
						$this->db->bind( 'oauth_provider', $userData['oauth_provider'] );
						$this->db->bind( 'oauth_uid', $userData['oauth_uid'] );
						
						$update = $this->db->resultSet();
					} else {
						// Insert user data in the database
						$insert_query = "INSERT INTO `$this->userTable`(`oauth_provider`, `oauth_uid`, `username`, `firstname`, `lastname`, `email`, `password`, `status`, `created_on`, `modified_on`) VALUES(:oauth_provider, :oauth_uid, :username, :firstname, :lastname, :email, :password, :status, :createdOn, :modifiedOn)";
						$this->db->query( $insert_query );
						$this->db->bind( 'oauth_provider', $userData['oauth_provider'] );
						$this->db->bind( 'oauth_uid', $userData['oauth_uid'] );
						$this->db->bind( 'username', $userData['username'] );
						$this->db->bind( 'firstname', $userData['firstname'] );
						$this->db->bind( 'lastname', $userData['lastname'] );
						$this->db->bind( 'email', $userData['email'] );
						$this->db->bind( 'password', $userData['password'] );
						$this->db->bind( 'status', 0 );
						$this->db->bind( 'createdOn', NOW() );
						
						$insert = $this->db->resultSet();
					}
					
					// Get user data from the database
					$userData = $this->db->resultSet();
				}
				
				// Return user data
				return $userData;
			}
		}
	}