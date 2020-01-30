<div class="col-xs-12">
    <h3 class="m-t-0 m-b-20 header-title">Nhóm ngành</h3>
</div>
<ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#list">Danh sách</a></li>
    <!--    <li><a data-toggle="tab" href="#add">Assign to Building</a></li>-->
</ul>
<div class="row card-box">
    <div class="tab-content">
        <div id="list" class="tab-pane fade in active">
            <div class="col-xs-12">
                <div class="table-responsive">
                    <?php if($this->session->flashdata('error')): ?>
                        <div style='color: red; margin: 0 0 20px 0; border: solid 1px #f0a8b5; background: rgba(230,117,136,0.15); padding: 10px; border-radius: 5px'>
                            <?php echo $this->session->flashdata('error')?>
                        </div>
                    <?php endif;?>
                    <table id="example4" class="table table-hover">
                        <thead>
                        <tr>
                            <th>STT</th>
                            <th>Mã ngành</th>
                            <th>Tên nhóm ngành</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        if (isset($major_group) && is_array($major_group))
                        {
                            foreach ($major_group as $key => $row):
                                ?>
                                <tr>
                                    <td><?php echo $row['group_id'] ?></td>
                                    <td><?php echo $row['group_code'] ?></td>
                                    <td><?php echo $row['group_name']?></td>
                                    <td>
                                        <button type="button" class="btn btn-inverse btn-custom btn-xs">
                                            <a href="<?php echo base_url('group/edit/' . $row['group_id'])?>"><i class="fa fa-edit"></i></a>
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
        </div>
    </div>
</div>

