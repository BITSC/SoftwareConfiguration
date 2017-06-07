<?php session_start();?>
<?php
    require "../admin/sql.php";
    require "jsonHelper.php";		//json格式化字符串

    $ID = $_SESSION["id"];		//获取当前用户ID
  //  $ID = "5";

	//判断用户的权限， 市或省
    $sql = "select * from user WHERE id=".$ID;

    $result=mysql_query($sql);

    $privilege;

    while($row=mysql_fetch_array($result))
    {
        $privilege = $row['privilege'];
    }

	//权限对应的获取操作
    $entdata;

    if($privilege == 3)		//省用户的数据获取
    {
        $sql = "SELECT searchId, searchName, sum(first_num) as a, sum(now_num) as b FROM researchdata
                 group by searchId
                order by searchId";
        $result=mysql_query($sql);
        $i=0;
        while($row=mysql_fetch_array($result))
        {
            $entdata[$i]['research_id'] = $row['searchId'];
            $entdata[$i]['research_name'] = $row['searchName'];
            $entdata[$i]['first_num'] = $row['a'];
            $entdata[$i]['now_num'] = $row['b'];
            $i++;
        }

        $group['entdata'] = $entdata;
        $group['code'] = 1;

        $returnStr = JSON($group);

        echo $returnStr;
    }
    else	//市用户的获取
    {
        $sql = "SELECT cityName, searchId, searchName, sum(first_num) as a, sum(now_num) as b FROM researchdata
                WHERE userId=".$ID." group by searchId ORDER  BY searchId";

        $result=mysql_query($sql);
        $i=0;
        while($row=mysql_fetch_array($result))
        {
            $entdata[$i]['city_name'] = $row['cityName'];
            $entdata[$i]['research_id'] = $row['searchId'];
            $entdata[$i]['research_name'] = $row['searchName'];
            $entdata[$i]['first_num'] = $row['a'];
            $entdata[$i]['now_num'] = $row['b'];
            $i++;
        }

        $group['entdata'] = $entdata;
        $group['code'] = 1;

        $returnStr = JSON($group);

        echo $returnStr;
    }
?>