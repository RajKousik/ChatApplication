<?php

while($row = mysqli_fetch_assoc($sql)){

    $sql2 = "SELECT * FROM messages WHERE (incoming_msg_id = {$row['unique_id']}
            OR outgoing_msg_id = {$row['unique_id']}) AND (outgoing_msg_id = {$outgoing_id}
            OR incoming_msg_id = {$outgoing_id}) ORDER BY msg_id DESC LIMIT 1";

    $query2 = mysqli_query($conn, $sql2);
    $row2 = mysqli_fetch_assoc($query2);
    if(mysqli_num_rows($query2) > 0){
        $result = $row2['msg'];
    }else{
        $result = "No Message Available";
    }

    $you = "";
    //if last sent msg is long
    (strlen($result) > 25) ? $msg = substr($result, 0, 25).'...' : $msg = $result;

    //last sent msg is sent by whom?
    if(isset($row2['outgoing_msg_id'])){
        if($outgoing_id == $row2['outgoing_msg_id']){
            $you = "You: "; 
        }
    }else{
        $you = "";
    }

    //status fetching from database
    ($row['status'] == "Offline Now") ? $offline = "offline" : $offline = "";


    //the userslist which is displayed in users.js
    //if user clicked on a person...go to chat.php along with user's unique_id which is stored in user_id
    $output .= '<a href="chat.php?user_id='.$row['unique_id'].'">       
                    <div class="content">
                        <img src="php/images/'. $row['img'].'" alt="">
                        <div class="details">
                            <span>'. $row['fname'] . " " . $row['lname'] . '</span>
                            <p>' . $you . $msg .'</p>
                        </div>
                    </div>
                    <div class="status-btn'." ". $offline .'"><i class="fas fa-circle"></i></div>
                </a>';
}

?>