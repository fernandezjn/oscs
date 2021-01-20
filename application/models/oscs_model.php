<?php

    class oscs_model extends CI_Model
    {
        function login($user,$password)
        {
            $this->db->where('username',$user);
            $this->db->where('password',$password);
            $query = $this->db->get('users');
            if ( $query->num_rows() > 0 )
            {
                return $query->result();
            }
            else
            {
                return FALSE;
            }
        }

        function getRole($typeID)
        {
            $this->db->where('id',$typeID);
            $query = $this->db->get('roles');
            if ( $query->num_rows() > 0 )
            {
                return $query->result();
            }
            else
            {
                return FALSE;
            }
        }

        public function confirmPermission($id,$user)
        {
            $this->db->where('id',$id);
            $this->db->where('type',$user);
            $query = $this->db->get('users');
            if ($query->row())
            {
                return true;
            }
            return false;
        }

        public function forgotPass($email)
        {
            $this->db->where('email',$email);
            $query = $this->db->get('user_info');
            if ($query->row())
            {
                return true;
            }
            return false;
        }

        public function resetPass($id, $pass)
        {
            $query = "UPDATE `users` SET `password`='".$pass."' WHERE `id`='".$id."'";
            $this->db->query($query);
        }

        public function countAllClearedStudents()
        {
            $query = $this->db->query("SELECT u.id, COUNT(c.id) as 'number_of_cleared_departments', CONCAT(i.firstname,' ',i.middlename,' ',i.lastname)
                        FROM clerance_entries c
                        INNER JOIN user_info i on i.student_number = c.student_number
                        INNER JOIN users u on u.id = i.id
                        WHERE c.deficiencies = 'Clear' AND u.type = '3'
                        GROUP BY u.id
                        ORDER BY number_of_cleared_departments DESC");
        
            $count = 0;
            foreach($query->result() as $row)
            {
                if($row->number_of_cleared_departments == 11)
                {
                    $count =+ 1;
                }
            }

            return $count;
        }

        public function addUser($username,$password,$type,$lastname="",$firstname="",$middlename="",$suffixname="",$email="",$contactnumber="",$studentno="",$yearid="",$courseid="",$studenttypeid="",$orgid="",$departmentid="", $positionid="")
        {
            $query = "INSERT INTO `users`(`username`, `password`, `type`) VALUES ('".$username."','".$password."','".$type."')";

            $this->db->query($query);


            $query = "INSERT INTO `user_info`(`last_name`, `first_name`, `middle_name`, `suffix_name`, `email`, `contact_number`, `student_number`, `year_id`, `course_id`, `student_type_id`, `org_id`, `department_id`, `position_id`) 
                VALUES ('".$lastname."','".$firstname."','".$middlename."','".$suffixname."','".$email."','".$contactnumber."','".$studentno."','".$yearid."','".$courseid."','".$studenttypeid."','".$orgid."','".$departmentid."','".$positionid."')";

            $this->db->query($query);
        }

        public function viewUsers($role="")
        {
            $query = $this->db->query("SELECT u.id, u.username,CONCAT(i.last_name, i.first_name, i.middle_name, i.suffix_name) as 'name', u.type as 'role'
                FROM user u
                INNER JOIN user_information i on i.id = u.id
                WHERE u.type = '".$role."'");

            return $query->result();
        }

        public function viewUserInfo($id)
        {
            $query = $this->db->query("SELECT *
                FROM user u
                INNER JOIN user_information i on i.id = u.id
                WHERE u.id = '".$id."'");

            return $query->result();
        }

        public function editUserInfo($id,$password="",$lastname="",$firstname="",$middlename="",$suffixname="",$email="",$contactnumber="",$studentno="",$yearid="",$courseid="",$studenttypeid="",$orgid="",$departmentid="", $positionid="")
        {
            if($password!="")
            {
                 $query = "UPDATE `users` SET `password`='".$password."' WHERE `id`='".$id."'";

                $this->db->query($query);
            }

            $query = "UPDATE `user_info` 
                    SET `last_name`='".$lastname."',
                    `first_name`='".$firstname."',
                    `middle_name`='".$middlename=""."',
                    `suffix_name`='".$suffixname."',
                    `email`='".$email."',
                    `contact_number`='".$contactnumber."',
                    `student_number`='".$studentno."',
                    `year_id`='".$yearid."',
                    `course_id`='".$courseid."',
                    `student_type_id`='".$studenttypeid."',
                    `org_id`='".$orgid."',
                    `department_id`='".$departmentid."',
                    `position_id`='".$positionid."' 
                    WHERE id = '".$id."'";

            $this->db->query($query);
        }

        public function deleteUser($id)
        {
            $query = "DELETE FROM users WHERE id = '".$id."'";
            $this->db->query($query);
            $query = "DELETE FROM user_info WHERE id = '".$id."'";
            $this->db->query($query);
        }


        // For Remembering Username and Password Login
        // function rememberUserLogin($user,$password) 
        // {
        //     $this->db->where('username',$user);
        //     $this->db->where('password',$password);
        //     $query = $this->db->get('remember');
        //     if ($query->row())
        //     {
        //         echo "already saved";
        //     }
        //     else
        //     {
        //     	$query = "INSERT INTO `remember`(`id`, `username`, `password`) VALUES ('','".$user."','".$password."')";
        //     	$this->db->query($query);
        //     }
        // }
    }    
?>