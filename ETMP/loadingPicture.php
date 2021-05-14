<?php
    $conn = mysqli_connect('sql6.freesqldatabase.com','sql6410152','BpVpCG11xT','sql6410152');
    $app_id = $_POST['application'];

    $data = array(
        ':app_id' => $app_id,
    );

    //display image
    $query_display = "SELECT * FROM application WHERE id = '$app_id'";
    $result = mysqli_query($conn,$query_display);

    if(mysqli_num_rows($result) > 0)
    {
    while($row = mysqli_fetch_array($result))
    {
        if($row["id"] == $app_id)
        {
        ?>
            <p>The proof of application <?php echo $row['id'] ?> is displaying now.</p>
        <?php
            echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['payment_proof'] ).'" alt="Evidence of payment" class="proof"/>';
        }
    }
    }
    ?>