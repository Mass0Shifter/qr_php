<?php 
    require '../inc/initialize.php';
    require PROJECT_PATH . '/public/file_upload.php';
    header('Content-Type: application/json; charset=utf-8');

    if(isset($_POST["request"])){
        $theRequest = $_POST["request"];
        if($theRequest == "CREATE STUDENT"){
            $data = json_decode($_POST["student_data"]);
            $new_student = new Student();
            
            $new_student->first_name = $data["first_name"];
            $new_student->middle_name = $data["middle_name"];
            $new_student->last_name = $data["last_name"];
            $new_student->department = $data["department"];
            $new_student->matric_number = $data["matric_number"];
            $new_student->img_src = fileUpload($_FILES['student_img'],  $data["matric_number"]);

            if($new_student->create()){
                echo json_encode(
                    [
                        "response" => "",
                        "data" => [
                            "id"=>$new_student->id
                        ]
                    ]
                );
            }
        }

        if($theRequest == "CREATE CLASS"){

            $new_class_list = new ClassList();

            $new_class_list->name = $_POST["name"];
            $new_class_list->course_code = $_POST["course_code"];
            $new_class_list->student_ids = $_POST["student_ids"];
            $new_class_list->department = $_POST["department"];
            $new_class_list->lecturer_id = $_POST["lecturer_id"];
            $new_class_list->date_created = $_POST["date_created"];

            $new_class_list->save();
        }

        if($theRequest == "CREATE ATTENDANCE LIST"){

            $new_attendance_list = new Attendance();
            
            $new_attendance_list->class_id = $_POST["class_id"];
            $new_attendance_list->class_count = $_POST["class_count"];
            $new_attendance_list->attendances = $_POST["attendances"];
            $new_attendance_list->date = $_POST["date"];

            $new_attendance_list->save();
        }

        if($theRequest == "CREATE ATTENDANCES LIST"){

            $new_attendances_list = new Attendances();
            
            $new_attendances_list->attendance_list_id = $_POST["attendance_list_id"];
            $new_attendances_list->student_id = $_POST["student_id"];
            $new_attendances_list->time_record = $_POST["time_record"];

            $new_attendances_list->save();
        }
    }

    if(isset($_GET["student"])){
        $theRequest = $_GET["student"];
        if($theRequest == "all"){
            $all_students = Student::find_all();

            echo json_encode($all_students);
        }else if($theRequest == "id"){
            $id = $_GET["id"];
            $student = Student::find_by_id($_GET["id"]);

            echo json_encode($student);
        }
    }

    echo json_encode(["NO DATA POSTED"=>"AT ALL"]);
 ?>