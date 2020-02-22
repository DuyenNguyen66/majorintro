<div class="col-xs-12">
    <h3 class="m-t-0 m-b-20 header-title">Chuyên ngành</h3>
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
                    <table id="example4" class="table table-striped">
                        <thead>
                        <tr>
                            <th>STT</th>
                            <th>Mã ngành</th>
                            <th>Tên ngành</th>
                            <th>Nhóm ngành</th>
                            <th>Thời gian đào tạo</th>
                            <th>Bằng tốt nghiệp</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        if (isset($majors) && is_array($majors))
                        {
                            foreach ($majors as $key => $row):
                                ?>
                                <tr>
                                    <td><?php echo $row['major_id'] ?></td>
                                    <td><?php echo $row['major_code'] ?></td>
                                    <td><?php echo $row['major_name']?></td>
                                    <td><?php echo $row['group_name']?></td>
                                    <td><?php echo $row['training_time']?> năm</td>
                                    <td><?php echo $row['degree']?></td>
                                    <td>
                                        <button type="button" class="btn btn-inverse btn-custom btn-xs">
                                            <a href="<?php echo base_url('major/edit/' . $row['major_id'])?>"><i class="fa fa-edit"></i></a>
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

