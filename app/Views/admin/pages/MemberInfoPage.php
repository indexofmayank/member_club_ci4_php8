<?= $this->extend('/admin/layouts/main') ?>
<?= $this->section('content') ?>
<div class="container mt-5">
        <div class="card">
            <div class="card-header text-center">
                <h2>Member Information</h2>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-4 text-center">
                        <img src="<?= site_url('member/member-photo/'.$member['m_id'])?>" class="rounded-circle" alt="User Photo" width="150" height="150">
                    </div>
                    <div class="col-md-8">
                        <h4 id="user-name"><?= esc($member['m_first_name']) ?></h4>
                        <p><strong>Date of Birth:</strong> <span id="user-dob"><?= esc($member['m_dob']) ?></span></p>
                        <p><strong>Address:</strong> <span id="user-address"><?= esc($member['m_address']) ?></span></p>
                        <p><strong>Gender:</strong> <span id="user-gender"><?= esc($member['m_gender']) ?></span></p>
                        <p><strong>Phone:</strong> <span id="user-phone"><?= esc($member['m_phone']) ?></span></span></p>
                        <p><strong>Email:</strong> <span id="user-email">johndoe@example.com</span></p>
                    </div>
                </div>
                <h5>Documents:</h5>
                <ul id="user-documents">
                    <li><a href="path_to_document1.pdf" target="_blank">Document 1</a></li>
                    <li><a href="path_to_document2.pdf" target="_blank">Document 2</a></li>
                    <!-- Add more documents as needed -->
                </ul>
            </div>
        </div>
</div>

<?= $this->endSection() ?>
