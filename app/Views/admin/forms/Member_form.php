<?= $this->extend("/admin/layouts/main") ?>
<?= $this->section("content") ?>

<div class="card">
    <div class="card-body">
        <h2>Add New Member</h2>
        <form action="<?= base_url('member/save') ?>" method="post">
            <div class="mb-3 row">
                <div class="col">
                    <label for="m_first_name" class="form-label">First Name *</label>
                    <input type="text" class="form-control" id="m_first_name" name="m_first_name" required>
                </div>
                <div class="col">
                    <label for="m_last_name" class="form-label">Last Name *</label>
                    <input type="text" class="form-control" id="m_last_name" name="m_last_name" required>
                </div>
            </div>
            <div class="mb-3">
                <label for="dob" class="form-label">Date of Birth *</label>
                <input type="date" class="form-control" id="dob" name="dob" required>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address *</label>
                <input type="text" class="form-control" id="address" name="address" required>
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status *</label>
                <select class="form-select" id="status" name="status" required>
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="gender" class="form-label">Gender *</label>
                <select class="form-select" id="gender" name="gender" required>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone *</label>
                <input type="text" class="form-control" id="phone" name="phone" required>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
</div>

<?= $this->endSection() ?>
