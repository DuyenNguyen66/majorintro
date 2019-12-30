<div class="col-xs-12">
	<h3 class="header-title" style="margin-top:20px ">Students</h3>
	<button class="btn btn-success" style="margin: 20px 0 20px 20px">Room <?php echo $room['name']?></button>
	<button class="btn btn-success" style="margin: 20px 0 20px 20px"> <?php echo $room['floor_name']?></button>
	<button class="btn btn-success" style="margin: 20px 0 20px 20px"> <?php echo $room['build_name']?></button>
</div>
<div class="row card-box"> 
    <div class="tab-content">
		<table id="example3" class="table table-hover">
		    <thead>
		        <tr>
		            <th>ID</th>
		            <th>Student Name</th>
		            <th>Birthday</th>
		            <th>Code</th>
		            <th>Email</th>
		            <th>Phone</th>
		            <th>Address</th>
		            <th>Registed</th>
		            <th>Actions</th>
		        </tr>
		    </thead>
		    <tbody>
		    <?php
		     if (isset($students) && is_array($students))
		     {
		        foreach ($students as $key => $row):
		        ?>
		        <tr>
		        	<td><?php echo $row['student_id']?></td>
		            <td><?php echo $row['full_name'] ?></td>
		            <td><?php echo date('d/m/Y', $row['birthday'])?></td>
		            <td><?php echo $row['student_code']?></td>
		            <td><?php echo $row['email']?></td>
		            <td><?php echo $row['phone']?></td>
		            <td><?php echo $row['address']?></td>
		            <td><?php echo date('d/m/Y h:iA', $row['registed'])?></td>
		            <td>
		            	<button class="btn btn-inverse btn-custom btn-xs">
		            		<a href="">Delete</a>
		            	</button>
		            </td>
		        </tr>
		        <?php 
		        endforeach;
		    }
		    ?>
		    </tbody>
		</table>
	</div>
</div>