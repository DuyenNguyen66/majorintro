<table id="example3" class="table table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Room Name</th>
            <th>Type</th>
            <th># of Students</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
     <?php
     if (isset($rooms) && is_array($rooms))
     {
        foreach ($rooms as $key => $row):
        ?>
        <tr>
            <td><?php echo $row['room_id'] ?></td>
            <td><?php echo $row['name']?></td>
            <td><?php echo $row['type'] == 0 ? '<i style="color: cornflowerblue;font-size: 20px;" class="fa fa-mars"></i>' : '<i style="color: pink;font-size: 20px;" class="fa fa-venus"></i>'?></td>
            <td><?php echo $row['total_student']?>/10</td>
            <td>
                <?php if($row['total_student'] == 10):?>
                <button type="button" class="btn btn-danger btn-xs">Full</button>
                <?php else:?>
                <button type="button" class="btn btn-success btn-xs">Active</button>
                <?php endif;?>
            </td>
            <td>
                <?php if($row['total_student'] == 10 && $row['status'] == 1):?>
                    <button type="button" class="btn btn-inverse btn-custom btn-xs">
                        <a href="<?php echo base_url('room/disable/' . $row['room_id'])?>">Deactive</a>
                    </button>
                <?php endif; ?>
                <button type="button" class="btn btn-inverse btn-custom btn-xs">
                    <a href="<?php echo base_url('room/view/' . $row['room_id'])?>">View Students</a>
                </button>
                <button type="button" class="btn btn-inverse btn-custom btn-xs">
                    <a href="<?php echo base_url('room/edit/' . $row['room_id'])?>">Edit</a>
                </button>
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