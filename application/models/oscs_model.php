<?php

    class oscs_model extends CI_Model
    {
        public function login($user,$password)
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

        public function getUserRole($typeID)
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

        public function getUsers($role="")
        {
            if($role !=  "")
            {
                $query = $this->db->query("SELECT u.id, u.username,CONCAT(i.last_name,', ', i.first_name,' ', i.middle_name,' ', i.suffix_name) as 'name', r.role as 'role'
                FROM users u
                INNER JOIN user_info i on i.id = u.id
                INNER JOIN roles r on r.id = u.type
                WHERE u.type = '".$role."%'");
            }
            else
            {
                $query = $this->db->query("SELECT u.id, u.username,CONCAT(i.last_name,', ', i.first_name,' ', i.middle_name,' ', i.suffix_name)  as 'name', r.role as 'role'
                FROM users u
                INNER JOIN user_info i on i.id = u.id
                INNER JOIN roles r on r.id = u.type");
            }
            

            return $query->result();
        }

        public function getUserInfo($id)
        {
            $query = $this->db->query("SELECT * , u.id as userID
                FROM users u
                INNER JOIN user_info i on i.id = u.id
                INNER JOIN roles r on r.id = u.type
                WHERE u.id = '".$id."'");

            return $query->result();
        }

        public function editUserInfo($id,$username,$type,$lastname="",$firstname="",$middlename="",$suffixname="",$email="",$contactnumber="",$studentno="",$yearid="",$courseid="",$studenttypeid="",$orgid="",$departmentid="", $positionid="")
        {
            $query = "UPDATE `users` 
                    SET `username`='".$username."',
                    `type`='".$type."'
                    WHERE id = '".$id."'";

            $this->db->query($query);

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

        public function getRoles()
        {
            $query = $this->db->query("SELECT * FROM roles");

            return $query->result();
        }

        public function getOffices() // Departments
        {
            $query = $this->db->query("SELECT * FROM departments");
            
            return $query->result();
        }

        public function getOrganizations() 
        {
             $query = $this->db->query("SELECT * FROM students_organizations");

            return $query->result();
        }

        public function getPositions() 
        {
             $query = $this->db->query("SELECT * FROM positions");

            return $query->result();
        }

        public function getYear() //Year Levels
        {
             $query = $this->db->query("SELECT * FROM year_levels");

            return $query->result();
        }

        public function getCourses() 
        {
             $query = $this->db->query("SELECT * FROM courses");

            return $query->result();
        }

        public function getStudent_types()
        {
             $query = $this->db->query("SELECT * FROM student_types");

            return $query->result();
        }

        public function getScYears() //School Years
        {
            $query = $this->db->query("SELECT * FROM sc_years");

            return $query->result();
        }

        public function newClearanceData($year,$sem,$due)
        {
            $query = "UPDATE current_clearance_data SET sc_year_id ='".$year."',semester='".$sem."', dueDate='".$due."' WHERE id=1";

            $this->db->query($query);
        }

        public function createClearanceEntry($studeNum, $scyear, $sem, $dep)
        {
            $query = "INSERT INTO `clearance_entries`( `student_number`, `sc_year_id`, `semester`, `department_id`, `deficiencies`, `user_id`, `review_status`, `req_review_status`) 
            VALUES ('".$studeNum."', '".$scyear."', '".$sem."', '".$dep."','', '0','0','0')";

            $this->db->query($query);
        }

        public function getStudents($year=null,$course=null)
        {
            if($year == null && $course == null)
            {    $query = $this->db->query("SELECT * , CONCAT(last_name,', ',first_name,' ',middle_name,' ', suffix_name) as 'name', c.course_name as 'studCourse', d.type as 'studType', e.level as 'studLevel', a.id as 'userID' FROM user_info a INNER JOIN users b on b.id = a.id 
                    INNER JOIN courses c on c.id = a.course_id
                    INNER JOIN student_types d on d.id = a.student_type_id
                    INNER JOIN year_levels e on e.id = a.year_id
                     WHERE b.type='3' ");
            }
            else
            {
                $query = $this->db->query("SELECT * , CONCAT(last_name,', ',first_name,' ',middle_name,' ', suffix_name) as 'name', c.course_name as 'studCourse', d.type as 'studType', e.level as 'studLevel', a.id as 'userID' FROM user_info a INNER JOIN users b on b.id = a.id 
                    INNER JOIN courses c on c.id = a.course_id
                    INNER JOIN student_types d on d.id = a.student_type_id
                    INNER JOIN year_levels e on e.id = a.year_id
                    WHERE b.type='3' AND a.course_id='".$course."' AND a.year_id='".$year."'");
            }

            return $query->result();
        }

        public function getStudent_info($id)
        {
            $query = $this->db->query("SELECT * , CONCAT(last_name,', ',first_name,' ',middle_name,' ', suffix_name) as 'name', c.course_name as 'studCourse', d.type as 'studType', e.level as 'studLevel', a.id as 'userID' FROM user_info a INNER JOIN users b on b.id = a.id 
                    INNER JOIN courses c on c.id = a.course_id
                    INNER JOIN student_types d on d.id = a.student_type_id
                    INNER JOIN year_levels e on e.id = a.year_id
                     WHERE a.id ='".$id."' ");

            return $query->result();
        }

        public function getCurrentClearanceData()
        {
            $query = $this->db->query("SELECT * from current_clearance_data a INNER JOIN sc_years b on b.id = a.sc_year_id");

            return $query->result();
        }

        public function getClearanceEntries($studNum,$scYear,$sem) //perStudent
        {
            $query = $this->db->query("SELECT * , CONCAT(c.first_name,' ',c.last_name) as 'name', a.student_number as 'studNum' from clearance_entries a INNER JOIN departments b on b.id = a.department_id INNER JOIN user_info c on c.department_id = b.id WHERE a.student_number = '".$studNum."' AND a.sc_year_id = '".$scYear."' AND a.semester = '".$sem."'");
            
            return $query->result();
        }

        public function getClearanceEntries2($dep,$scYear,$sem,$course=null,$yearLevel=null) //perDepartnment
        {
            if($course == null && $yearLevel == null)
            {
                $query = $this->db->query("SELECT * , CONCAT(c.last_name,', ',c.first_name,' ',c.middle_name,' ',c.suffix_name) as 'name', a.student_number as 'studNum', d.course_name as 'course', e.type as 'studType', c.email as 'email', c.contact_number as 'contact', c.year_id as 'year' 
                from clearance_entries a 
                INNER JOIN departments b on b.id = a.department_id 
                INNER JOIN user_info c on c.student_number = a.student_number
                INNER JOIN courses d on d.id = c.course_id
                INNER JOIN student_types e on e.id = c.student_type_id
                WHERE a.department_id = '".$dep."' AND a.sc_year_id = '".$scYear."' AND a.semester = '".$sem."'");
            }else
            {
            $query = $this->db->query("SELECT * , CONCAT(c.last_name,', ',c.first_name,' ',c.middle_name,' ',c.suffix_name) as 'name', a.student_number as 'studNum', d.course_name as 'course', e.type as 'studType', c.email as 'email', c.contact_number as 'contact', c.year_id as 'year' 
                from clearance_entries a 
                INNER JOIN departments b on b.id = a.department_id 
                INNER JOIN user_info c on c.student_number = a.student_number
                INNER JOIN courses d on d.id = c.course_id
                INNER JOIN student_types e on e.id = c.student_type_id
                WHERE a.department_id = '".$dep."' AND a.sc_year_id = '".$scYear."' AND a.semester = '".$sem."' AND c.course_id = '".$course."' AND c.year_id = '".$yearLevel."'");
            }
            return $query->result();
        }

        public function clearClearance($studNum, $dep, $id)
        {
            $query = "UPDATE clearance_entries SET deficiencies = 'Clear', user_id = '".$id."', review_status = '1' WHERE student_number = '".$studNum."' AND department_id = '".$dep."'";
            $this->db->query($query);
        }

        public function unclearClearance($studNum, $dep, $def, $id)
        {
            $query = "UPDATE clearance_entries SET deficiencies = '".$def."' , user_id = '".$id."', review_status = '1' WHERE student_number = '".$studNum."' AND department_id = '".$dep."'";
            $this->db->query($query);
        }

        public function unclearRegOffClearance($studNum, $dep, $id)
        {
            $query = "UPDATE clearance_entries SET deficiencies = 'notClear', user_id = '".$id."', review_status = '1' WHERE student_number = '".$studNum."' AND department_id = '".$dep."'";
            $this->db->query($query);
        }

        public function getAllApprovedClearance($studNum,$year,$sem)
        {
            $query = $this->db->query("SELECT * , CONCAT (c.last_name,', ',c.first_name,' ',c.middle_name,' ', c.suffix_name) as 'name'
                From clearance_entries a INNER JOIN departments b on b.id = a.department_id INNER JOIN user_info c on c.department_id = a.department_id  WHERE a.deficiencies = 'Clear' AND a.student_number = '".$studNum."' AND a.sc_year_id = '".$year."' AND a.semester = '".$sem."'" );

            return $query->result();
        }

        public function getPendingClearance($studNum,$year,$sem)
        {
            $query = $this->db->query("SELECT * , CONCAT (c.last_name,', ',c.first_name,' ',c.middle_name,' ', c.suffix_name) as 'name'
                From clearance_entries a INNER JOIN departments b on b.id = a.department_id INNER JOIN user_info c on c.department_id = a.department_id  WHERE a.deficiencies != 'Clear' AND a.student_number = '".$studNum."' AND a.sc_year_id = '".$year."' AND a.semester = '".$sem."'");

            return $query->result();
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