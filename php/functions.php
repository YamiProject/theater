<?php
/*Включить шаблоны*/
function include_template($file_name) 
{
    $file_name = "templates/$file_name";

    $result = "Error";
    if (!file_exists($file_name)) {
        die("Ошибка!!!!");
    }

    ob_start();
    require($file_name);
    $result = ob_get_clean();
    return $result;
}

/*Работа с данными*/

//Вывод пользователей
function users()
{ 
    require("php/connectto.php");
    $link = mysqli_connect($lc , $pls, $pw, $datebase);
    if(!$link)
    die("Connection error!");

    $query = "SELECT user_login, user_email FROM th_user";
    $result = $link->query($query);

    if(!$result)
    die("Query error!");

    $rows = $result->num_rows;

    $list = array();
    for ($i=0;$i<$rows;++$i)
    {
        $result->data_seek($i);
        $data = $result->fetch_array(MYSQLI_NUM);

        array_push($list, array("login"=>$data[0], "email"=>$data[1]));
    }

    $link->close();

    return $list;
}

//GET DATA
function get_data_actors()
{
    require("php/connectto.php");
    $link = mysqli_connect($lc , $pls, $pw, $datebase);

    if(!$link)
    die("Connection error!");

    $actors = array();

    $query = "SELECT * FROM th_actors";
    $result = $link->query($query);

    if(!$result)
    die("Query error!");

    $rows = $result->num_rows;

    for ($i=0;$i<$rows;++$i)
    {
        $result->data_seek($i);
        $data = $result->fetch_array(MYSQLI_NUM);

        array_push($actors, array("id"=>$data[0], "name"=>"$data[1]", "birth"=>"$data[2]", "info"=>"$data[3]", "photo"=>"$data[4]"));
    }

    $link->close();

    return $actors;
}

function get_data_producers()
{
    require("php/connectto.php");
    $link = mysqli_connect($lc , $pls, $pw, $datebase);

    if(!$link)
    die("Connection error!");

    $producers = array();

    $query = "SELECT * FROM th_producers";
    $result = $link->query($query);

    if(!$result)
    die("Query error!");

    $rows = $result->num_rows;

    for ($i=0;$i<$rows;++$i)
    {
        $result->data_seek($i);
        $data = $result->fetch_array(MYSQLI_NUM);

        array_push($producers, array("id"=>$data[0], "name"=>"$data[1]", "info"=>"$data[2]", "birth"=>"$data[3]", "photo"=>$data[4]));
    }

    $link->close();

    return $producers;
}

function get_data_spectacles()
{
    
    require("php/connectto.php");
    $link = mysqli_connect($lc , $pls, $pw, $datebase);

    if(!$link)
    die("Connection error!");

    $spectacles = array();
    $query = "SELECT * FROM th_spectacles_info";
    $result = $link->query($query);

    if(!$result)
    die("Query error!");

    $rows = $result->num_rows;

    for ($i=0;$i<$rows;++$i)
    {
        $result->data_seek($i);
        $data = $result->fetch_array(MYSQLI_NUM);

        array_push($spectacles, array("id"=>$data[0], "name"=>$data[1],"info"=>$data[2], "image"=>$data[3]));
    }

    $link->close();

    return $spectacles;
}

function get_data_newsLIMIT()
{
    require("php/connectto.php");
    $link = mysqli_connect($lc , $pls, $pw, $datebase);

    if(!$link)
    die("Connection error!");

    $news = array();
    $query = "SELECT * FROM th_news ORDER BY news_date DESC LIMIT 3";
    $result = $link->query($query);

    if(!$result)
    die("Query error!");

    $rows = $result->num_rows;

    for ($i=0;$i<$rows;++$i)
    {
        $result->data_seek($i);
        $data = $result->fetch_array(MYSQLI_NUM);

        array_push($news, array("id"=>$data[0], "name"=>"$data[1]", "text"=>"$data[2]", "image"=>"$data[3]","date"=>$data[4]));
    }

    $link->close();

    return $news;
}

function get_data_news()
{
    require("php/connectto.php");
    $link = mysqli_connect($lc , $pls, $pw, $datebase);

    if(!$link)
    die("Connection error!");

    $news = array();
    $query = "SELECT * FROM th_news ORDER BY news_date DESC";
    $result = $link->query($query);

    if(!$result)
    die("Query error!");

    $rows = $result->num_rows;

    for ($i=0;$i<$rows;++$i)
    {
        $result->data_seek($i);
        $data = $result->fetch_array(MYSQLI_NUM);

        array_push($news, array("id"=>$data[0], "name"=>"$data[1]", "text"=>"$data[2]", "image"=>"$data[3]", "date"=>$data[4]));
    }

    $link->close();

    return $news;
}

//GET PERSONAL DATA
function get_data_about_actor($val)
{   
    $namer = $val;
    require("php/connectto.php");
    $link = mysqli_connect($lc , $pls, $pw, $datebase);
    
    if(!$link)
    die("Connection error!");

    $actor = array();

    $query = "SELECT * FROM th_actors WHERE actors_id=$namer";
    $result = $link->query($query);

    if(!$result)
    die("Query error!");

    $rows = $result->num_rows;

    for ($i=0;$i<$rows;++$i)
    {
        $result->data_seek($i);
        $data = $result->fetch_array(MYSQLI_NUM);

        $actor["id"]=$data[0];
        $actor["name"]="$data[1]";
        $actor["birth"]="$data[2]";
        $actor["info"]="$data[3]";
        $actor["photo"]="$data[4]";
    }

    $link->close();
    return $actor;
};

function get_data_about_producer($val)
{
    $namer = $val;
    require("php/connectto.php");
    $link = mysqli_connect($lc , $pls, $pw, $datebase);

    if(!$link)
    die("Connection error!");

    $producer = array();

    $query = "SELECT * FROM th_producers WHERE producer_id=$namer";
    $result = $link->query($query);

    if(!$result)
    die("Query error!");

    $rows = $result->num_rows;

    for ($i=0;$i<$rows;++$i)
    {
        $result->data_seek($i);
        $data = $result->fetch_array(MYSQLI_NUM);

        $producer["id"]=$data[0];
        $producer["name"]=$data[1];
        $producer["info"]=$data[2];
        $producer["birth"]=$data[3];
        $producer["photo"]=$data[4];
    }

    $link->close();

    return $producer;
}

function get_data_about_news($val)
{
    $namer = $val;
    require("php/connectto.php");
    $link = mysqli_connect($lc , $pls, $pw, $datebase);

    if(!$link)
    die("Connection error!");

    $news = array();
    $query = "SELECT * FROM th_news WHERE news_id=$namer";
    $result = $link->query($query);

    if(!$result)
    die("Query error!");

    $rows = $result->num_rows;

    for ($i=0;$i<$rows;++$i)
    {
        $result->data_seek($i);
        $data = $result->fetch_array(MYSQLI_NUM);

        $news["id"]=$data[0];
        $news["name"]="$data[1]";
        $news["text"]="$data[2]"; 
        $news["image"]="$data[3]"; 
        $news["date"]=$data[4];
    }

    $link->close();

    return $news;
}

function get_data_about_spectacle($val)
{
    $namer = $val;
    require("php/connectto.php");
    $link = mysqli_connect($lc , $pls, $pw, $datebase);

    if(!$link)
    die("Connection error!");

    $spectacle = array();

    $query="SELECT spectacles_name, spectacles_date, spectacles_image, spectacles_info
    from th_spectacles_info a left join th_spectacles b on a.spectacles_id=b.spectacles_id
    WHERE a.spectacles_id=$namer";

    $result = $link->query($query);

    if(!$result)
    die("Query error!");

    $rows = $result->num_rows;

    for ($i=0;$i<$rows;++$i)
    {
        $result->data_seek($i);
        $data = $result->fetch_array(MYSQLI_NUM);

        array_push($spectacle, array("name"=>$data[0],
        "date"=>$data[1],
        "image"=>$data[2],
        "info"=>$data[3]));
    }
    
    $link->close();

    return $spectacle;
}

function get_data_about_user($val)
{
    $namer = $val;
    
    require("php/connectto.php");
    $link = mysqli_connect($lc , $pls, $pw, $datebase);
    if(!$link)
    die("Connection error!");

    $user = array();

    $query = "SELECT * FROM th_user WHERE user_login='$namer'";
    $result = $link->query($query);

    if(!$result)
    die("Query error!");

    $rows = $result->num_rows;

    $list = array();
    for ($i=0;$i<$rows;++$i)
    {
        $result->data_seek($i);
        $data = $result->fetch_array(MYSQLI_NUM);

        $user["id"]=$data[0];
        $user["login"]=$data[1];
        $user["email"]=$data[2];
        $user["name"]="$data[4]";
        $user["sec_name"]="$data[5]"; 
        $user["phone"]="$data[6]"; 
        $user["image"]="$data[7]"; 

    }

    $link->close();
    
    return $user;
    
}

function get_data_about_users_tickets($val)
{
    $namer = $val;

    require("php/connectto.php");
    $link = mysqli_connect($lc , $pls, $pw, $datebase);
    if(!$link)
    die("Connection error!");

    $user = array();

    $query = "SELECT a.tickets_id, a.tickets_spectacle_date, c.spectacles_name 
    FROM th_tickets a inner join th_spectacles b on a.tickets_spectacle_date=b.spectacles_date inner JOIN th_spectacles_info c on b.spectacles_id=c.spectacles_id
    WHERE a.tickets_user_id='$namer'
    ORDER BY a.tickets_spectacle_date, a.tickets_id";

    $result = $link->query($query);

    if(!$result)
    die("Query error!");

    $rows = $result->num_rows;

    $tickets = array();

    for ($i=0;$i<$rows;++$i)
    {
        $result->data_seek($i);
        $data = $result->fetch_array(MYSQLI_NUM);

        array_push($tickets, array("id"=>$data[0], "date"=>$data[1], "name"=>$data[2]));
    }

    $link->close();
    return $tickets;
}

function get_data_about_tickets($val)
{
    $namer = $val;
    require("php/connectto.php");
    $link = mysqli_connect($lc , $pls, $pw, $datebase);

    if(!$link)
    die("Connection error!");

    $tickets = array(array());

    $query="SELECT a.tickets_spectacle_date, c.spectacles_name, a.tickets_row, a.tickets_seat, a.tickets_price, a.tickets_user_id
    FROM th_tickets a inner join th_spectacles b on a.tickets_spectacle_date=b.spectacles_date inner JOIN th_spectacles_info c on b.spectacles_id=c.spectacles_id
    WHERE a.tickets_spectacle_date='$namer'
    ORDER BY a.tickets_row, a.tickets_seat";

    $result = $link->query($query);

    if(!$result)
    die("Query error!");

    $rows = $result->num_rows;

    for ($i=0;$i<$rows;++$i)
    {
        $result->data_seek($i);
        $data = $result->fetch_array(MYSQLI_NUM);

        array_push($tickets, array("date"=>$data[0],
        "name"=>$data[1],
        "row"=>$data[2],
        "seat"=>$data[3],
        "price"=>$data[4],
        "userq"=>$data[5]));
    }
    
    $link->close();

    return $tickets;
}

function transform_ticket_table($arr)
{   

    for($i=1;$i<=8;$i++){

        for($j=1;$j<=12;$j++)
        {
            for($n=1;$n<=count($arr);$n++)
            {
                if(isset($arr[$n]["row"]))
               $a = $arr[$n]["row"];
                else
                $a="";
                
               if(isset($arr[$n]["seat"]))
                $b = $arr[$n]["seat"];
                else
                $b = "";
                
                if($a==$i && $b==$j && $arr[$n]["userq"]==null)
                {
                    $places[$i][$j]= array("row"=>$arr[$n]["row"], "seat" => $arr[$n]["seat"], "price"=>$arr[$n]["price"]);
                   
                    break;
                }
                else
                {
                    $places[$i][$j]="No";
                    
                }
                
            }
        }
    }

    return $places;
};

function ticket_buy($date, $row, $seat, $userid)
{
    require("php/connectto.php");
    $link = mysqli_connect($lc , $pls, $pw, $datebase);
    if(!$link)
    die("Connection error!");

    

    $query = "UPDATE th_tickets SET tickets_user_id=$userid
    WHERE tickets_row=$row and tickets_seat=$seat and tickets_spectacle_date='$date'";

    $result = $link->query($query);

    if(!$result)
    die("Query error!");

    $link->close();
}
?>