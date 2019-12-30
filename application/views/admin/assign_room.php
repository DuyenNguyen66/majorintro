<div class="col-xs-12" style="margin-top: 20px ">
	<h3 class="header-title">Room <?php echo $room['name']?></h3>
</div>

<div class="row card-box"> 
    <div class="tab-content">
		<table id="example3" class="table table-bordered table-hover">
		    <thead>
		        <tr>
		            <th>ID</th>
		            <th>Student Name</th>
		            <th>Student code</th>
		            <th>Email</th>
		            <th>Phone</th>
		        </tr>
		    </thead>
			<tbody>
			<?php
			 if (isset($students) && is_array($students))
			 {
			    foreach ($students as $key => $row):
			       ?>
			       	<tr>
			            <td><?php echo $row['student_id'] ?></td>
			            <td><?php echo $row['full_name']?></td>
			            <td><?php echo $row['student_code']?></td>
			            <td><?php echo $row['email']?></td>
			            <td><?php echo $row['phone']?></td>
			            
			    	</tr>
			    <?php 
			    endforeach;
		    }
		    ?>
		    </tbody>
		</table>
	</div>
</div>

<script type="text/javascript">
  $(document).ready(function(){
     $('#example3').DataTable({
        'ordering': false,
        'dom' : 'frtlp'
    });
 });
</script>