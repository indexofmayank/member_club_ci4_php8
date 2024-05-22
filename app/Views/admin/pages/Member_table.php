<?= $this->extend("/admin/layouts/main") ?>
<?= $this->section("content") ?>

<div class="card">
    <div class="card-body">
        <?= anchor('add-member', 'Add New Member', ['class' => 'btn btn-primary mb-2 hover']) ?>
        <div class="mb-3">
            <form action="<?= base_url('member-table') ?>" method="GET">
                <input type="text" class="form-label" name="search" value="<?= esc($searchTerm ?? '') ?>" placeholder="Search...">
                <button type="submit" class="btn btn-primary">Search</button>
            </form>
        </div>
        <div class="table-responsive-sm">
            <table id="example" class="table table-striped table-bordered table-hover" style="width:100%">
                <thead>
                    <tr>
                        <th>Photo</th>
                        <th>
                            <a href="<?= base_url('member-table?sort_column=m_first_name&sort_direction=' . ($sort_column == 'm_first_name' && $sort_direction == 'ASC' ? 'DESC' : 'ASC')) ?>">
                                First name
                                <?php if ($sort_column == 'm_first_name'): ?>
                                    <i class="fa fa-arrow-<?= $sort_direction == 'ASC' ? 'up' : 'down' ?>"></i>
                                <?php endif; ?>
                            </a>
                        </th>
                        <th>
                            <a href="<?= base_url('member-table?sort_column=m_last_name&sort_direction=' . ($sort_column == 'm_last_name' && $sort_direction == 'ASC' ? 'DESC' : 'ASC')) ?>">
                                Last name
                                <?php if ($sort_column == 'm_last_name'): ?>
                                    <i class="fa fa-arrow-<?= $sort_direction == 'ASC' ? 'up' : 'down' ?>"></i>
                                <?php endif; ?>
                            </a>
                        </th>
                        <th>
                            <a href="<?= base_url('member-table?sort_column=m_dob&sort_direction=' . ($sort_column == 'm_dob' && $sort_direction == 'ASC' ? 'DESC' : 'ASC')) ?>">
                                Dob
                                <?php if ($sort_column == 'm_dob'): ?>
                                    <i class="fa fa-arrow-<?= $sort_direction == 'ASC' ? 'up' : 'down' ?>"></i>
                                <?php endif; ?>
                            </a>
                        </th>
                        <th>
                            <a href="<?= base_url('member-table?sort_column=m_address&sort_direction=' . ($sort_column == 'm_address' && $sort_direction == 'ASC' ? 'DESC' : 'ASC')) ?>">
                                Address
                                <?php if ($sort_column == 'm_address'): ?>
                                    <i class="fa fa-arrow-<?= $sort_direction == 'ASC' ? 'up' : 'down' ?>"></i>
                                <?php endif; ?>
                            </a>
                        </th>
                        <th>
                            <a href="<?= base_url('member-table?sort_column=m_status&sort_direction=' . ($sort_column == 'm_status' && $sort_direction == 'ASC' ? 'DESC' : 'ASC')) ?>">
                                Status
                                <?php if ($sort_column == 'm_status'): ?>
                                    <i class="fa fa-arrow-<?= $sort_direction == 'ASC' ? 'up' : 'down' ?>"></i>
                                <?php endif; ?>
                            </a>
                        </th>
                        <th>
                            <a href="<?= base_url('member-table?sort_column=m_gender&sort_direction=' . ($sort_column == 'm_gender' && $sort_direction == 'ASC' ? 'DESC' : 'ASC')) ?>">
                                Gender
                                <?php if ($sort_column == 'm_gender'): ?>
                                    <i class="fa fa-arrow-<?= $sort_direction == 'ASC' ? 'up' : 'down' ?>"></i>
                                <?php endif; ?>
                            </a>
                        </th>
                        <th>Phone</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($members as $member): ?>
                        <tr>
                            <td>
                                <img src="<?= site_url('member/member-photo/'.$member['m_id']) ?>" alt="photo" style="width: 40px; height: auto;">
                            </td>
                            <td><?= esc($member['m_first_name']) ?></td>
                            <td><?= esc($member['m_last_name']) ?></td>
                            <td><?= esc($member['m_dob']) ?></td>
                            <td><?= esc($member['m_address']) ?></td>
                            <td><?= esc($member['m_status']) ?></td>
                            <td><?= esc($member['m_gender']) ?></td>
                            <td><?= esc($member['m_phone']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <div class="d-flex justify-content-center">
                <?= $pager->links('group1', 'pagination') ?>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
