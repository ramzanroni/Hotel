<?php 
 include_once 'dbconn.php';
 $sql=$conn->query("SELECT * FROM room_booking");
 $count=0;
 while ($row=mysqli_fetch_array($sql))
{
     if ($row['Status']==0) {
         $count++;
     }
     
 }
?>

 <!-- Sidebar  -->
 <nav id="sidebar">
    <div class="sidebar-header">
        <h3>Hotel Management</h3>
    </div>

    <ul class="list-unstyled components">
        <p> <i class="fas fa-user-cog fa-2x text-danger"></i>&nbsp <?php echo $user;?></p>
        <li class="active">
            <a href="admin.php">Home</a>
        </li>
            <li>
            <a href="#pageSubmenu1" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Booking</a>
            <ul class="collapse list-unstyled" id="pageSubmenu1">
                <li>
            <a href="new_booking.php">New Booking &nbsp <span class="badge badge-warning"><?php echo $count; ?></span>
            <a href="active_booking.php">Check Booking</a>
        </li>
                
                
            </ul>
        </li>
        

        <li>
            <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Rooms</a>
            <ul class="collapse list-unstyled" id="pageSubmenu">
                <li>
                    <a href="addroom.php">Add Room</a>
                </li>
                <li>
                    <a href="view_room_condition.php">View Room Condition</a>
                </li>
                <li>
                    <a href="edit_room_cat.php">Update Room</a>
                </li>
                
            </ul>
        </li>
        <li>
            <a href="all_user.php">User</a>
        </li>
        <li>
            <a href="#">Contact</a>
        </li>
    </ul>
</nav>
<script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>
