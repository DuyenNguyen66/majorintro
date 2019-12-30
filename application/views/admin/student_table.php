<table id="example3" class="table table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Student Name</th>
            <th>Student code</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Gender</th>
            <th>Birthday</th>
            <th>Status</th>
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
            <td><?php echo $row['student_id'] ?></td>
            <td><?php echo $row['full_name']?></td>
            <td><?php echo $row['student_code']?></td>
            <td><?php echo $row['email']?></td>
            <td><?php echo $row['phone']?></td>
            <td><?php echo $row['gender'] == 1 ? 'Nữ' : 'Nam'?></td>
            <td><?php echo date('d/m/Y',$row['birthday'])?></td>
            <td><?php echo $row['status'] == 0 ? '<a class="btn btn-warning btn-xs">Disabled</a>' : '<a class="btn btn-success btn-xs">Enabled</a>' ?></td>
            <td>
                <button type="button" class="btn btn-inverse btn-custom btn-xs">
                    <a href="<?php echo base_url('profile/'. $row['student_id'])?>">View Profile</a>
                </button>
                <?php if($row['status'] == 0 ): ?>
                <button type="button" class="btn btn-inverse btn-custom btn-xs">
                    <a href="<?php echo base_url('student/enable/' . $row['student_id'])?>">Verify</a>
                </button>
                <?php else:?>
                <button type="button" class="btn btn-inverse btn-custom btn-xs">
                    <a href="<?php echo base_url('student/disable/' . $row['student_id'])?>">Disable</a>
                </button>
                <?php endif;?>
            </td>
        </tr>
        <?php 
        endforeach;
    }
    ?>
    </tbody>
</table>
<script type="text/javascript">
  $(document).ready(function(){
     $('#example3').DataTable({
        'ordering': false,
        'dom' : 'frtlp'
    });
 });
</script>