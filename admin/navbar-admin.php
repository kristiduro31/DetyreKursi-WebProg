<nav>
    <ul>
        <li><a class="active" href="../admin/admin-landing-page.php">Flights <i class="fa fa-plane" style="font-size:120%;"></i></a></li>
        <li>
            <a href="#">Services <i class="fa fa-cogs" style="font-size:100%"></i></a>
            <ul>
                <li><a href="admin-manage.php">Administrators <i class="fa-sharp fa-solid fa-user-tie" style="margin-left: 0"></i></a></li>
                <li><a href="user-manage.php">Users <i class="fa-solid fa-user" style="margin-left: 0"></i></a></li>
            </ul>
        </li>
        <!-- afishimi ores --> <li id="clk" style="float: right; color: white; text-align: center; margin-right: 20px; margin-top:23px; font-size: 20px;"><a href="#"></a></li>
        <li style="float: right;margin-right: 55px;"><a href="#"><i class="fa fa-user-circle" style="font-size:150%; margin-top: 10px; margin-left: 40px"></i></a>
            <ul>
                <li><a id="profile" href="../front-end/myProfile.php" target="_self">My Profile</a></li>
                <li><a id="loggedUser" href="../back-end/logout.php" target="_self">Logout</a></li>
            </ul>
        </li>
    </ul>
</nav>
<?php
echo "logged in";

