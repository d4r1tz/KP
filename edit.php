<?php 
    include 'layout.php';
    include_once 'config.php';
    $id_get = $_GET['Traffic_ID'];
    if(isset($_POST['Submit'])) {
        $id_post = $_POST['Traffic_ID'];
        $MMSI_post = $_POST['MMSI'];
        $Last_port_post = $_POST['Last_port'];
        $Next_port_post = $_POST['Next_port'];
        $ETD_post = $_POST['ETD'];
        $ETA_post = $_POST['ETA'];
        $Draught_post = $_POST['Draught'];
        $result_post = mysqli_query($mysqli, "update `traffic` set `MMSI` = $MMSI_post, `Last_port` = '$Last_port_post', `Next_port` = '$Next_port_post',`ETD` = '$ETD_post', `ETA` = '$ETA_post', `Draught` = $Draught_post where `traffic`.`Traffic_ID` = $id_post");
        header("Location: index.php");
    }
    $data = mysqli_query($mysqli, "SELECT * FROM traffic WHERE `traffic`.`Traffic_ID` = $id_get");
    while($data2 = mysqli_fetch_array($data)) {
        $id = $data2['Traffic_ID'];
        $MMSI_get = $data2['MMSI'];
        $Last_port_get = $data2['Last_port'];
        $Next_port_get = $data2['Next_port'];
        $ETD_get = $data2['ETD'];
        $ETA_get = $data2['ETA'];
        $Draught_get = $data2['Draught'];
    }
    $kapal = mysqli_query($mysqli, "SELECT Nama_kapal FROM kapal WHERE MMSI = $MMSI_get");
    while($data3 = mysqli_fetch_array($kapal)) {$vesselName = $data3['Nama_kapal'];}
?>


<html>
    <head>
        <title>Edit LOGBOOK</title>
    </head>
    
    <body>
        <div class="container">
            <div class="card mt-4">
                <div class="card-body">
                    <h5 class="card-title fw-bolder mb-3">Edit Data Traffic</h5>
                    <form action="edit.php" method="post" name="update_traffic">
                        <div style="display:flex; align-items:flex-start;">
                            <div class="mb-3">
                                <label for="MMSI" class="form-label">MMSI</label>
                                <div class="col-md-3">
                                    <input id="MMSI" name="MMSI" type="number" list="list_MMSI" style="width:320px" class="form-control" onkeyup="GetDetail(this.value)" value=<?php echo $MMSI_get; ?> required>
                                    <datalist id="list_MMSI">
                                        <?php $result = mysqli_query($mysqli, "SELECT * FROM kapal");
                                        while($MMSI = mysqli_fetch_array($result)){
                                            echo "<option>".$MMSI['MMSI']."</option>";
                                        }?>
                                    </datalist>
                                </div>
                            </div>

                            <div style="padding: 0px 20px 0px;"></div>

                            <div class="mb-3">
                                <label for="Nama_kapal" class="form-label">Nama Kapal</label>
                                <input type="text" readonly class="form-control"id="Nama_kapal" disabled="disabled" name="Nama_kapal" style="width:320px" required value="<?php echo $vesselName; ?>">
                            </div>
                        </div>

                        <div style="display:flex; align-items:flex-start;">
                            <div class="mb-3">
                                <label for="Last_port" class="form-label">Last Port</label>
                                <input type="text" class="form-control" name="Last_port" style="width:320px"  value="<?php echo $Last_port_get; ?>" required>
                            </div>

                            <div style="padding: 0px 20px 0px;"></div>

                            <div class="mb-3">
                                <label for="Next_port" class="form-label">Next Port</label>
                                <input type="text" class="form-control" name="Next_port" style="width:320px"  value="<?php echo $Next_port_get; ?>" required>
                            </div>
                        </div>

                        <div style="display:flex; align-items:flex-start;">
                            <div class="mb-3">
                                <label for="ETD" class="form-label">ETD</label>
                                <input type="datetime-local" class="form-control" name="ETD" style="width:320px"  value=<?php echo $ETD_get; ?> required>
                            </div>

                            <div style="padding: 0px 20px 0px;"></div>
                    
                            <div class="mb-3">
                                <label for="ETA" class="form-label">ETA</label>
                                <input type="datetime-local" class="form-control"name="ETA" style="width:320px" value=<?php echo $ETA_get; ?> required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="Draught" class="form-label">Draught</label>
                            <input type="number" step="0.1" class="form-control" name="Draught" style="width:190px"  value=<?php echo $Draught_get; ?> required>
                        </div>
                
                        <div class="text-center">
                            <input type="hidden" readonly name="Traffic_ID" value=<?php echo $id;?>>
                            <input type="submit" name="Submit" class="btn btn-primary" value="Update" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script>
            function GetDetail(str) {
                if (str.length != 9) {
                    document.getElementById("Nama_kapal").value = "";
                    return;
                }
                else {
                    var xmlhttp = new XMLHttpRequest();
                    xmlhttp.onreadystatechange = function () {
                        if (this.readyState == 4 &&  this.status == 200) {
                            var myObj = JSON.parse(this.responseText);
                            document.getElementById("Nama_kapal").value = myObj[0];
                        }
                    };
                    xmlhttp.open("GET", "controller.php?MMSI=" + str, true);
                    xmlhttp.send();
                }
            }
        </script>
    </body>
</html>