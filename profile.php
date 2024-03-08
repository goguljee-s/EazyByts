
<div id="profileModal" class="modal">
    <div class="modal-content" >
        <!-- Add content for the modal here -->
        <span class="close" onclick="closeModal()">&times;</span>
        <img src="php/images/<?php echo $row['img']; ?>" alt="Profile Image" id="Image">
        <!-- <h2 style="font-size:50px"><?php echo $row['fname'] . " " . $row['lname']; ?></h2>
        <p style="font-size:30px"><?php echo $row['status']; ?></p> -->
        <!-- Add other profile information as needed -->
        <button onclick=" create()" id="cng">Change Profile</button>
    </div>
</div> 