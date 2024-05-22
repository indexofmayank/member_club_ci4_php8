<?= $this->extend("/admin/layouts/main") ?>
<?= $this->section("content") ?>

<style>
    .action-button {
        background-color: transparent;
        border: none;
        margin-right: 3px;
        padding: 0;
        cursor: pointer;
    }
    .action-button:hover {
        border: 1px solid;
        border-radius: 0.25rem;
    }
    .action-button .fas {
        font-size: 1.2rem;
    }
    .action-button.delete:hover {
        border-color: #dc3545;
        color: #dc3545;
    }
    .action-button.edit:hover {
        border-color: #007bff;
        color: #007bff;
    }
    .action-button.view:hover {
        border-color: #17a2b8;
        color: #17a2b8;
    }
</style>

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
                        <th><strong>Action</strong></th>
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
                            <td>
                                <button class="action-button delete" data-toggle="tooltip" title="Delete" data-id="<?= $member['m_id'] ?>">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                                <button class="action-button edit" data-toggle="tooltip" title="Edit" data-id="<?= $member['m_id'] ?>">
                                    <i class="fas fa-pencil-alt"></i>
                                </button>
                                <button class="action-button view" data-toggle="tooltip" title="View" data-id="<?= $member['m_id'] ?>">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </td>
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

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Delete Confirmation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this member?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" id="confirmDelete" class="btn btn-danger">Delete</button>
            </div>
        </div>
    </div>
</div>

<!-- Initialize tooltips and handle button actions -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Initialize tooltips
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        });

        // Handle delete button click
        var memberId;
        document.querySelectorAll('.action-button.delete').forEach(function(button) {
            button.addEventListener('click', function() {
                memberId = this.getAttribute('data-id');
                var deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'));
                deleteModal.show();
            });
        });

        // Handle edit button click
        var memberId;
        document.querySelectorAll('.action-button.edit').forEach(function(button) {
            button.addEventListener('click', function() {
                memberId = this.getAttribute('data-id');
                window.location.href='<?= base_url('member-edit') ?>/' + memberId;
            });
        });

        // Handle view button click
        var memberId;
        document.querySelectorAll('.action-button.view').forEach(function(button) {
            button.addEventListener('click', function() {
                memberId = this.getAttribute('data-id');
                window.location.href='<?= base_url('member-view-by-id') ?>/'+memberId;
            })
        })

        // Confirm delete action
        document.getElementById('confirmDelete').addEventListener('click', function() {
            window.location.href = '<?= base_url('delete') ?>/' + memberId;
        });
    });
</script>

<?= $this->endSection() ?>
