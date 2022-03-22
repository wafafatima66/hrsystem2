<?php
require '../includes/conn.php';
if (isset($_POST['search'])) {
    $search = $_POST['search'];
    $search = "%$search%";

    

    if (strlen($search) > 2) {
        $query = "SELECT name,date,type,size FROM files WHERE name like '$search' UNION ALL SELECT  file_name ,file_date,file_type,file_size from emp_file WHERE file_name like '$search'  ";

        if ($runquery = $conn->query($query)) {
            while ($data = $runquery->fetch_assoc()) {
                $doc_name = $data['name'];
                $doc_date = $data['date'];
                $doc_type = $data['type'];
                $doc_size = $data['size'];

                echo '<ul class="ul-search">
            <a href="../files/' .
                    $doc_name .
                    '" target="_blank" style="text-decoration:none; color:black;"> 
            <li class="li-search"><span style="font-weight:bold;">' .
                    $doc_name .
                    '</span><p><small style="font-style:italic;">Date uploaded </small> <small style="font-weight:bold;">' .
                    $doc_date .
                    '</small>   |   <small style="font-style:italic;">File type </small><small style="font-weight:bold;">' .
                    $doc_type .
                    '</small> | </p>
            </li>
            </a>
        </ul>';
            }
        }
    }
}else {
    $query = "SELECT name,date,type,size FROM files UNION ALL SELECT  file_name ,file_date,file_type,file_size from emp_file ORDER BY date DESC LIMIT 10 ";

    if ($runquery = $conn->query($query)) {
        while ($data = $runquery->fetch_assoc()) {
            $doc_name = $data['name'];
            $doc_date = $data['date'];
            $doc_type = $data['type'];
            $doc_size = $data['size'];

            echo '<ul class="ul-search">
        <a href="../files/' .
                $doc_name .
                '" target="_blank" style="text-decoration:none; color:black;"> 
        <li class="li-search"><span style="font-weight:bold;">' .
                $doc_name .
                '</span><p><small style="font-style:italic;">Date uploaded </small> <small style="font-weight:bold;">' .
                $doc_date .
                '</small>   |   <small style="font-style:italic;">File type </small><small style="font-weight:bold;">' .
                $doc_type .
                '</small> </p>
        </li>
        </a>
    </ul>';
        }
    }
}

?>
