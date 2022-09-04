<?php
require '../inc/initialize.php';
require PROJECT_PATH . '/public/file_upload.php';
header('Content-Type: application/json; charset=utf-8');

if (isset($_POST["request"])) {
    $theRequest = $_POST["request"];
    /// Create Student Item
    if ($theRequest == "CREATE STUDENT") {

        $data = json_decode($_POST["student_data"]);
        $new_student = new Student();

        $new_student->first_name = $data->first_name;
        $new_student->middle_name = $data->middle_name;
        $new_student->last_name = $data->last_name;
        $new_student->department = $data->department;
        $new_student->matric_number = $data->matric_number;
        $new_student->img_src = fileUpload($_FILES['student_img'],  "");

        if ($new_student->create()) {
            echo json_encode(
                [
                    "response" => "",
                    "data" => [
                        "id" => $new_student->id
                    ]
                ]
            );
        }
    }

    if ($theRequest == "CREATE CLASS LIST") {


        $data = json_decode($_POST["class_data"]);
        $new_class_list = new ClassList();

        $new_class_list->name = $data->name;
        $new_class_list->course_code = $data->course_code;
        $new_class_list->student_ids = $data->student_ids;
        $new_class_list->lecturer_id = $data->lecturer_id;
        // $new_class_list->date_created = $data->date_created;

        if ($new_class_list->create()) {
            echo json_encode(
                [
                    "response" => "CLASS OBJECT CREATED",
                    "data" => [
                        "id" => $new_class_list->id
                    ]
                ]
            );
        }
    }

    if ($theRequest == "CREATE ATTENDANCE") {

        $data = json_decode($_POST["attendance_data"]);
        $new_attendance_list = new Attendance();

        $new_attendance_list->class_id = $data->class_id;
        $new_attendance_list->class_count = $data->class_count;
        // $new_attendance_list->attendances = $data->attendances;
        // $new_attendance_list->date = $data->date;

        if ($new_attendance_list->create()) {
            echo json_encode(
                [
                    "response" => "ATTENDANCE ADDED TO DATABASE",
                    "data" => [
                        "id" => $new_attendance_list->id
                    ]
                ]
            );
        }
    }

    if ($theRequest == "CREATE ATTENDANCES") {

        $data = json_decode($_POST["attendances_data"]);
        $ids = [];
        // for ($i=0; $i < $_POST["attendances_count"]; $i++) { 
        for ($i = 0; $i < count($data); $i++) {
            $new_attendances_list = new Attendances();

            $new_attendances_list->attendance_list_id = $data[$i]->attendance_list_id;
            $new_attendances_list->student_id = $data[$i]->student_id;
            $new_attendances_list->time_record = $data[$i]->time_record;

            $new_attendances_list->create();

            array_push($ids, $new_attendances_list->id);
        }

        echo json_encode(
            [
                "response" => "ATTENDANCES ADDED TO DATABASE",
                "data" => [
                    "ids" => $ids
                ]
            ]
        );
    }
} else if (isset($_GET["student"])) {
    $theRequest = $_GET["student"];
    if ($theRequest == "all") {
        $all_students = Student::find_all();

        echo json_encode($all_students);
    } else if ($theRequest == "id") {
        $id = $_GET["id"];
        $student = Student::find_by_id($_GET["id"]);

        echo json_encode($student);
    }

} else if (isset($_GET["class_list"])) {
    $theRequest = $_GET["class_list"];
    if ($theRequest == "all") {
        $all_students = ClassList::find_all();

        echo json_encode($all_students);
    } else if ($theRequest == "id") {
        $id = $_GET["id"];
        $student = ClassList::find_by_id($_GET["id"]);

        echo json_encode($student);
    }

} else if (isset($_GET["attendance"])) {
    $theRequest = $_GET["attendance"];
    if ($theRequest == "all") {
        $all_students = Attendance::find_all();

        echo json_encode($all_students);
    } else if ($theRequest == "id") {
        $id = $_GET["id"];
        $student = Attendance::find_by_id($_GET["id"]);

        echo json_encode($student);
    }
} else if (isset($_GET["attendances"])) {
    $theRequest = $_GET["attendances"];
    if ($theRequest == "all") {
        $all_students = Attendances::find_all();

        echo json_encode($all_students);
    } else if ($theRequest == "id") {
        $id = $_GET["id"];
        $student = Attendances::find_by_id($_GET["id"]);

        echo json_encode($student);
    }
} 
else {
    echo json_encode(["NO DATA POSTED" => "AT ALL"]);
}
