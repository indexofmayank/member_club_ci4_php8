<!-- app/Views/user_view.php -->
<?= $this->extend("/admin/layouts/main") ?>
<?= $this->section("content") ?>

<div class="card">
    <div class="card-body">
        <?= anchor('add-member', 'Add New Member', ['class' => 'btn btn-primary mb-2 hover']) ?>

        
        <div class="table-responsive-sm">
            <table id="example" class="table table-striped table-bordered table-hover" style="width:100%">
                <thead>
                    <tr>
                        <th>photo</th>
                        <th>First name</th>
                        <th>Last name</th>
                        <th>DOB</th>
                        <th>Address</th>
                        <th>Status</th>
                        <th>Gender</th>
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

