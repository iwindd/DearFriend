<table>
    <thead>
        <th>id</th>
        <th>ชื่อ</th>
        <th>email</th>
        <th>สถานะ</th>
        <th>เครื่องมือ</th>
    </thead>
    <style>
        th, td{
           border: 1px solid black;
        }

        a{
            padding: 1px;
            border-radius: 6px;
            border: 1px solid black; 
        }
    </style>

    <tbody> 
        <?php
            $selfId = $_SESSION['id'];
            $sql = "SELECT * FROM users  WHERE id != '$selfId'";
            $result = mysqli_query($conn, $sql);

            while ($data = mysqli_fetch_assoc($result)){   
        ?>
            <tr >
                <td><?= $data['id']?></td>
                <td><?= $data['name']?></td>
                <td><?= $data['email']?></td>
                <td><?= $data['permission'] == 1 ? "แอดมิน" : "ผู้ใช้"  ?></td>
                <td>
                    <a href="./delete_user.php?id=<?=$data['id']?>">ลบ</a>
                    <a href="./edit_user.php?id=<?=$data['id']?>">แก้ไข</a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>