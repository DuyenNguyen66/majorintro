<table id="example3" class="table">
    <?php if (isset($rooms) && is_array($rooms)):
        foreach ($rooms as $key => $row):
            if($haveRegister == 0):
                if($row['total_student'] < 5):?>
                <div class="room">
                    <a href="" class="button" data-toggle="modal" data-target="#chz-confirm" data-room="<?php echo $row['room_id']?>" data-floor="<?php echo $row['floor_id']?>" data-build="<?php echo $row['building_id']?>">
                        <h4><?php echo $row['name']?></h4>
                        <h4><?php echo $row['total_student']?>/10</h4>
                    </a>
                </div>
                <?php elseif($row['total_student'] >= 5 && $row['total_student'] < 10): ?>
                <div class="room1">
                    <a href="" class="button" data-toggle="modal" data-target="#chz-confirm" data-room="<?php echo $row['room_id']?>" data-floor="<?php echo $row['floor_id']?>" data-build="<?php echo $row['building_id']?>">
                        <h4><?php echo $row['name']?></h4>
                        <h4><?php echo $row['total_student']?>/10</h4>
                    </a>
                </div>
                <?php else: ?>
                <div class="room2 tooltip">
                    <a>
                        <h4><?php echo $row['name']?></h4>
                        <h4><?php echo $row['total_student']?>/10</h4>
                        <span class="tooltiptext">Room is full now</span>
                    </a>
                </div>
    <?php endif;
            else:
                if($row['total_student'] < 5):?>  
                <div class="room tooltip">
                    <a>
                        <h4><?php echo $row['name']?></h4>
                        <h4><?php echo $row['total_student']?>/10</h4>
                        <span class="tooltiptext">You registed room in this term.</span>
                    </a>
                </div>
                <?php elseif($row['total_student'] >= 5 && $row['total_student'] < 10): ?>
                <div class="room1 tooltip">
                    <a>
                        <h4><?php echo $row['name']?></h4>
                        <h4><?php echo $row['total_student']?>/10</h4>
                        <span class="tooltiptext" >You registed room in this term.</span>
                    </a>
                </div>
                <?php else: ?>
                <div class="room2 tooltip">
                    <a>
                        <h4><?php echo $row['name']?></h4>
                        <h4><?php echo $row['total_student']?>/10</h4>
                        <span class="tooltiptext">Room is full now</span>
                    </a>
                </div>
    <?php endif;
            endif;
        endforeach;
    endif; ?>
</table>

<div class="modal fade" id="chz-confirm" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-img">
                <img src="<?php echo base_url('assets/images/exclamation.jpg')?>">
            </div>
            <div class="modal-description">
                <h2>Are You Sure?</h2>
                <p>Are you sure you want to register this room?</p>
            </div>
            <div class="modal-button">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" style="margin-right: 10px;color: #FFFFFF;">Cancel</button>
                <button type="button" class="btn btn-primary chz-confirm">Confirm</button>
            </div>  
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $('.button').click(function(e){
            e.preventDefault();
            var building_id = $(this).attr('data-build');
            var floor_id = $(this).attr('data-floor');
            var room_id = $(this).attr('data-room');
            $('.chz-confirm').click(function(){
                $.get('register/chooseRoom', {room_id:room_id}, function(data){
                    loadRoom(building_id, floor_id);
                });
                $(this).attr('data-dismiss', 'modal');
            });
        });
    });
</script>
