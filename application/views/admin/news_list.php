<div class="col-xs-12">
    <h3 class="m-t-0 m-b-20 header-title">Nhóm ngành</h3>
</div>
<ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#list">Danh sách</a></li>
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
                            <th>Ảnh bìa</th>
                            <th>Tiêu đề</th>
                            <th>Ngành học</th>
                            <th>Biên tập viên</th>
                            <th>Ngày tạo</th>
                            <th>Trạng thái</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        if (isset($news) && is_array($news))
                        {
                            foreach ($news as $key => $row):
                                ?>
                                <tr>
                                    <td><?php echo $row['news_id'] ?></td>
                                    <td><img style="max-width: 70px;max-height:70px;border-radius:5px" src="<?= $row['image']?>"/></td>
                                    <td><?php echo $row['title'] ?></td>
                                    <td><?php echo $row['major_name'] ?></td>
                                    <td><?php echo $row['full_name'] ?></td>
                                    <td><?php echo date('d/m/Y', $row['created_at'])?></td>
                                    <td><?php echo $row['status'] == 0 ? '<a class="btn btn-warning btn-xs">Đã ẩn</a>' : '<a class="btn btn-success btn-xs">Hiển thị</a>'?></td>
                                    <td>
                                        <button type="button" class="btn btn-inverse btn-custom btn-xs">
                                            <a href="<?php echo base_url('news/view/' . $row['news_id'])?>"><i class="fa fa-search-plus"></i></a>
                                        </button>
                                        <?php if($row['status'] == 0): ?>
                                        <button type="button" class="btn btn-inverse btn-custom btn-xs">
                                            <a href="<?php echo base_url('news/enable/' . $row['news_id'])?>"><i class="fa fa-eye"></i></a>
                                        </button>
                                        <?php else: ?>
                                        <button type="button" class="btn btn-inverse btn-custom btn-xs">
                                            <a href="<?php echo base_url('news/disable/' . $row['news_id'])?>"><i class="fa fa-eye-slash"></i></a>
                                        </button>
                                        <?php endif; ?>
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

