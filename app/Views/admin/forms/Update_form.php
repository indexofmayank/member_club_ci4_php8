<?= $this->extend('/admin/layouts/main') ?>
<?= $this->section('content') ?>

<?php helper('form'); // Load form helper ?>


<div class="card">
    <div class="card-body">
        <h2>Update Member</h2>

        <?php if (isset($validation)): ?>
            <div class="alert alert-danger">
                <?= $validation->listErrors() ?>
            </div>
        <?php endif; ?>

        <form action="<?= base_url('member-update/'.$member['m_id']) ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field() ?>
            <div class="mb-3 row">
                <div class="col">
                    <label for="m_first_name" class="form-label">First Name *</label>
                    <input type="text" class="form-control" id="m_first_name" name="m_first_name" value="<?= esc($member['m_first_name']) ?>" required>
                </div>
                <div class="col">
                    <label for="m_last_name" class="form-label">Last Name *</label>
                    <input type="text" class="form-control" id="m_last_name" name="m_last_name" value="<?= esc($member['m_last_name']) ?>" required>
                </div>
            </div>
            <div class="mb-3">
                <label for="dob" class="form-label">Date of Birth *</label>
                <input type="date" class="form-control" id="dob" name="dob" value="<?= esc($member['m_dob']) ?>" required>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address *</label>
                <input type="text" class="form-control" id="address" name="address" value="<?= esc($member['m_address']) ?>" required>
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status *</label>
                <select class="form-select" id="status" name="status" required>
                    <option value="active" <?= set_select('status', 'active') ?>>Active</option>
                    <option value="inactive" <?= set_select('status', 'inactive') ?>>Inactive</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="gender" class="form-label">Gender *</label>
                <select class="form-select" id="gender" name="gender" required>
                    <option value="male" <?= set_select('gender', 'male') ?>>Male</option>
                    <option value="female" <?= set_select('gender', 'female') ?>>Female</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone *</label>
                <input type="text" class="form-control" id="phone" name="phone" value="<?= esc($member['m_phone']) ?>" required>
            </div>

            <div class="mb-3 row">
                <div class="col">
                <img src="<?= site_url('member/member-photo/'.$member['m_id']) ?>" alt="photo" style="width: 60px; height: auto; margin-top: 3px;">
                </div>
                <div class="col-11">
                <label for="photo" class="form-label">Photo</label>
                <input type="file" class="form-control" id="photo" name="photo" value="<?= set_value('photo')?>">
                </div>
            </div>
            <div class="row">
                
            </div>

            <div class="mb-3">
                <label for="documents" class="form-label">Documents</label>
                <input type="file" class="form-control" id="documents" name="documents[]" multiple accept="application/pdf">
            </div>



            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
</div>

<?= $this->endSection() ?>
