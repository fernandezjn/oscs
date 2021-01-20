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
            $query = "SELECT u.id, COUNT(c.id) as 'number_of_cleared_departments', CONCAT(i.firstname,' ',i.middlename,' ',i.lastname)
                        FROM clerance_entries c
                        INNER JOIN user_info i on i.student_number = c.student_number
                        INNER JOIN users u on u.id = i.id
                        WHERE c.deficiencies = 'Clear' AND u.type = '3'
                        GROUP BY u.id
                        ORDER BY number_of_cleared_departments DESC";
            $this->db->query($query);

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