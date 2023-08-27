<table>
    <thead>
        <th>รูป</th>
        <th>ชื่อ</th>
        <th>คะแนนเฉลี่ย</th>
        <th>เครื่องมือ</th>
    </thead>
    <style>
        th,
        td {
            border: 1px solid black;
        }

        a {
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

        while ($data = mysqli_fetch_assoc($result)) {

            $target     = $data['id'];
            $likedQuery = mysqli_query($conn, "SELECT rate FROM rating WHERE rateBy = '$selfId' AND rateTo = '$target'");
            $likeData   = mysqli_fetch_assoc($likedQuery);
            $liked      = (isset($likeData['rate'])) ? $likeData['rate'] : "-1";

            $likes_query = mysqli_query($conn, "SELECT AVG(rate) AS avg_rate FROM rating WHERE rateTo = '$target'");
            $likes_data  = mysqli_fetch_assoc($likes_query);
            $likes       = isset($likes_data['avg_rate']) ? round($likes_data['avg_rate'], 2) : "ไม่พบคะแนน";
        

        ?>
            <tr>
                <td><img src="images/<?= $data['image'] ?>"></td>
                <td><?= $data['name'] ?></td>
                <td><?= $likes?></td>
                <td>
                    <form method="POST" action="./actions/rate.php">
                        <label>ให้คะแนน</label>
                        <input type="hidden" name="id" value="<?=$data['id']?>">
                        <select name="rate">
                            <option value="1" <?=$liked == "1" ? "selected":null?> >1</option>
                            <option value="2" <?=$liked == "2" ? "selected":null?> >2</option>
                            <option value="3" <?=$liked == "3" ? "selected":null?> >3</option>
                            <option value="4" <?=$liked == "4" ? "selected":null?> >4</option>
                            <option value="5" <?=$liked == "5" ? "selected":null?> >5</option>
                            <option value="-1" <?=$liked == "-1" ? "selected":null?> >งดออกเสียง</option>
                        </select>
                        <input type="submit" value="ให้คะแนน">
                    </form>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>