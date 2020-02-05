<div class="col-xs-12">
    <h3 class="m-t-0 m-b-20 header-title">Bài viết</h3>
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
                    <table id="example4" class="table table-striped">
                        <thead>
                        <tr>
                            <th>Ảnh bìa</th>
                            <th>Tiêu đề</th>
                            <th>Trạng thái</th>
                            <th>Ngành học</th>
                            <th>Tác giả</th>
                            <th>Ngày đăng</th>
                            <th>Lượt xem</th>
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
                                    <td><img style="max-width: 70px;max-height:70px;border-radius:5px" src="<?= $row['image']?>"/></td>
                                    <td class="title-news"><?php echo $row['title'] ?></td>
                                    <td>
                                        <?php if($row['status'] == 0): ?>
                                        <a class="btn btn-danger btn-xs">Ẩn</a>
                                        <?php elseif($row['status'] == 1): ?>
                                        <a class="btn btn-warning btn-xs">Chờ phê duyệt</a>
                                        <?php else: ?>
                                        <a class="btn btn-success btn-xs">Xuất bản</a>
                                        <?php endif; ?>
                                </td>
                                    <td><?php echo $row['major_name'] ?></td>
                                    <td><?php echo $row['full_name'] ?></td>
                                    <td><?php echo date('d/m/Y', $row['created_at']) ?></td>
                                    <td>000</td>
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

