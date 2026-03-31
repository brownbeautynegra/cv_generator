<?php
require_once(__DIR__ . "/../model/CVmodel.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $experiences = [];
    if (!empty($_POST['exp_title'])) {
        foreach ($_POST['exp_title'] as $i => $title) {
            $title   = trim($title);
            $company = trim($_POST['exp_company'][$i] ?? '');
            $start   = trim($_POST['exp_start'][$i]   ?? '');
            $end     = trim($_POST['exp_end'][$i]     ?? '');
            $desc    = trim($_POST['exp_desc'][$i]    ?? '');

            if ($title !== '' || $company !== '') {
                $experiences[] = [
                    'title'   => $title,
                    'company' => $company,
                    'start'   => $start,
                    'end'     => $end,
                    'date'    => trim("$start – $end", ' –'),
                    'desc'    => $desc,
                ];
            }
        }
    }

    $data = [
        "name"        => trim($_POST['name']      ?? ''),
        "jobtitle"    => trim($_POST['jobtitle']  ?? ''),
        "email"       => trim($_POST['email']     ?? ''),
        "phone"       => trim($_POST['phone']     ?? ''),
        "location"    => trim($_POST['location']  ?? ''),
        "skills"      => trim($_POST['skills']    ?? ''),
        "education"   => trim($_POST['education'] ?? ''),
        "experiences" => $experiences,
        "photo"       => '',
        "photo_web"   => '',
    ];

    $photo = $_FILES['photo'] ?? null;
    if ($photo && $photo['error'] === UPLOAD_ERR_OK && $photo['size'] > 0) {
        // Absolute path for move_uploaded_file
        $uploadDir = __DIR__ . "/../assets/uploads/";
        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }
        $safeName = time() . '_' . preg_replace('/[^a-zA-Z0-9._-]/', '_', basename($photo['name']));
        $absPath  = $uploadDir . $safeName;

        if (move_uploaded_file($photo['tmp_name'], $absPath)) {
            $data['photo']     = $absPath;
            // Web-accessible relative path from the view (view/ -> ../assets/uploads/)
            $data['photo_web'] = '../assets/uploads/' . $safeName;
        }
    }

    $cv     = new CVmodel();
    $result = $cv->processData($data);

    include(__DIR__ . "/../view/displayInfo.php");
}
?>
