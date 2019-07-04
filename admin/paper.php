<?php require "inc/header.php"; ?>
<?php require "inc/topnav.php"; ?>

<?php require "inc/sidenav.php"; 
session_start();

if (!isset($_SESSION['admin']) && !(int) $_SESSION['admin']) {
    header("location:login.php");
}
?>

<head>
    <style>
        .dropbtn {
        background-color: #4CAF50;
        color: white;
        padding: 16px;
        font-size: 16px;
        border: none;
        cursor: pointer;
            
        }

        .dropdown {
        position: relative;
        display: inline-block;
        }

        .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        z-index: 1;
        }

        .dropdown-content a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
        }

        .dropdown-content a:hover {background-color: #f1f1f1}

        .dropdown:hover .dropdown-content {
        display: block;
        }

        .dropdown:hover .dropbtn {
        background-color: #3e8e41;
        }
    </style>

</head>
<div class="main">
    <div class="content">

        <h1>add new paper</h1>

        <form enctype="multipart/form-data">
            <div>
            <input type="text"  placeholder="Paper title" >
            <input type="text"  placeholder="Author Name" >
            <input type="text"  placeholder="ID">
            <div class="dropdown">
                <button class="dropbtn">Send To Reviwer</button>
                    <div class="dropdown-content">
                    <input type="checkbox" name="ahmed" value="Bike"> ahmed<br>
                    <input type="checkbox" name="mohamed" value="Car"> mohamed <br>
                    <input type="checkbox" name="ali" value="Bike"> ali<br>
                    <input type="checkbox" name="tark" value="Car"> tark <br>
                    <input type="checkbox" name="maher" value="Bike"> maher<br>
                    <input type="checkbox" name="said" value="Car"> said<br>
                    <button>Send</button>
                </div>
            </div>

            <input type="text"  placeholder="status">

            
            
            </div>

        </form>


    </div>
</div>




<?php require "inc/footer.php"; ?>
