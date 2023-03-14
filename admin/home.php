<?php require("./layout/Header.php") ?>
<?php require("./layout/db.php") ?>

<div class="container mt-3">
    <div style="display:flex;flex-direction:row;justify-content:space-between">
        <h2 style="color:#2b74e2;font-weight:600">Accident List</h2>
    </div>
    <br>  
    <div class="table-responsive">        
    <table class="table table-striped table-bordered">
        <thead style="text-align:center">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Mobile</th>
                <th>Address</th>
                <th>Location</th>
                <th>Time</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $result = $conn->query("SELECT * FROM list");
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    $uid=$row["uid"];
                    $result1 = $conn->query("SELECT * FROM user WHERE id='$uid'");
                    while($row1 = $result1->fetch_assoc()){
                    ?>
                        <tr>
                            <td style="text-align:center"><?php echo($row["id"]) ?></td>
                            <td><?php echo($row1["name"]) ?></td>
                            <td><?php echo($row1["mobile"]) ?></td>
                            <td><?php echo($row1["address"]) ?></td>
                            <td><a href="https://maps.google.com?q=<?php echo($row["lat"]) ?>,<?php echo($row["lan"]) ?>" target="_blank">Click here</a></td>
                            <td><?php echo($row["reg_date"]) ?></td>
                        </tr>
                    <?php
                    }
                }
            }else{
            ?>
            <tr>
                <td style="text-align:center" colspan="5">Nothing Found</td>
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
    </div>

    <p style="text-align:center;line-height:3.5;font-size:16px">
        <?php 
        for($page = 1; $page<= $number_of_page; $page++) { 
            if($page==$_GET['page']){
                echo '<a style="margin:5px;padding:14px;border-radius:5px;border:2px solid #922521;background-color:#922521;font-weight:600;color:#fff;text-decoration:none" href = "?page=' . $page . '">' . $page . ' </a>';  
            }else{
                echo '<a style="margin:5px;padding:8px;border-radius:5px;border:1px solid #aaa;color:#444;text-decoration:none" href = "?page=' . $page . '">' . $page . ' </a>';  
            }
        }  
        ?>
    </p>
    <br>
</div>


<script>
    const queryString = window.location.search;
    const urlParams = new URLSearchParams(queryString);
    if(urlParams.get('err')){
      document.write("<div id='err' style='position:fixed;bottom:30px; right:30px;background-color:#FF0000;padding:10px;border-radius:10px;box-shadow:2px 2px 4px #aaa;color:white;font-weight:600'>"+urlParams.get('err')+"</div>")
    }
    setTimeout(()=>{
        document.getElementById("err").style.display="none"
    }, 3000)
</script>

<script>
    if(urlParams.get('msg')){
      document.write("<div id='msg' style='position:fixed;bottom:30px; right:30px;background-color:#4CAF50;padding:10px;border-radius:10px;box-shadow:2px 2px 4px #aaa;color:white;font-weight:600'>"+urlParams.get('msg')+"</div>")
    }
    setTimeout(()=>{
        document.getElementById("msg").style.display="none"
    }, 3000)
</script>


<?php require("./layout/Footer.php") ?>